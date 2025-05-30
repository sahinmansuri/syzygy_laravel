<?php

namespace Modules\Shipping\Http\Controllers;

use App\Transaction;
use App\TransactionPayment;
use App\Utils\ModuleUtil;
use App\Utils\ProductUtil;
use App\Utils\TransactionUtil;
use App\Utils\Util;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Modules\Shipping\Entities\CollectionOfficer;
use Modules\Shipping\Entities\RouteOperation;
use Yajra\DataTables\Facades\DataTables;

use App\Category;

class CollectionOfficerController extends Controller
{
    protected $commonUtil;
    protected $moduleUtil;
    protected $productUtil;
    protected $transactionUtil;

    /**
     * Constructor
     *
     * @param Util $commonUtil
     * @return void
     */
    public function __construct(Util $commonUtil, ModuleUtil $moduleUtil, ProductUtil $productUtil, TransactionUtil $transactionUtil)
    {
        $this->commonUtil = $commonUtil;
        $this->moduleUtil =  $moduleUtil;
        $this->productUtil =  $productUtil;
        $this->transactionUtil =  $transactionUtil;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (request()->ajax()) {
            $business_id = request()->session()->get('user.business_id');

            $helpers = CollectionOfficer::leftjoin('users', 'collection_officers.created_by', 'users.id')
                ->where('collection_officers.business_id', $business_id)
                ->select([
                    'collection_officers.*',
                    'users.username as created_by',
                ]);

            if (!empty(request()->employee_no)) {
                $helpers->where('employee_no', request()->employee_no);
            }
            if (!empty(request()->helper_name)) {
                $helpers->where('helper_name', request()->helper_name);
            }
            if (!empty(request()->nic_number)) {
                $helpers->where('nic_number', request()->nic_number);
            }
            if (!empty(request()->user_id)) {
                $helpers->where('created_by', request()->user_id);
            }
            if (!empty(request()->start_date) && !empty(request()->end_date)) {
                $helpers->whereDate('joined_date', '>=', request()->start_date);
                $helpers->whereDate('joined_date', '<=', request()->end_date);
            }
            return DataTables::of($helpers)
                ->addColumn(
                    'action',
                    function ($row) {
                        $html = '<div class="btn-group">
                        <button type="button" class="btn btn-info dropdown-toggle btn-xs" 
                            data-toggle="dropdown" aria-expanded="false">' .
                            __("messages.actions") .
                            '<span class="caret"></span><span class="sr-only">Toggle Dropdown
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-left" role="menu">';
                        if (auth()->user()->can('fleet.helpers.edit')) {
                            $html .= '<li><a href="#" data-href="' . action('\Modules\Shipping\Http\Controllers\CollectionOfficerController@edit', [$row->id]) . '" class="btn-modal" data-container=".view_modal"><i class="glyphicon glyphicon-edit"></i> ' . __("messages.edit") . '</a></li>';
                        }

                        if (auth()->user()->can('fleet.helpers.delete')) {
                            $html .= '<li><a href="#" data-href="' . action('\Modules\Shipping\Http\Controllers\CollectionOfficerController@destroy', [$row->id]) . '" class="delete_button"><i class="fa fa-trash"></i> ' . __("messages.delete") . '</a></li>';
                        }
                        $html .= '<li class="divider"></li>';
                        $html .= '<li><a href="' . action('\Modules\Shipping\Http\Controllers\CollectionOfficerController@show', [$row->id]) . '?tab=ledger" class=""><i class="fa fa-anchor"></i> ' . __("lang_v1.ledger") . '</a></li>';
                        return $html;
                    }
                )
                ->editColumn('joined_date', '{{@format_date($joined_date)}}')
                ->removeColumn('id')
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $business_id = request()->session()->get('user.business_id');

        $prefix_type = 'employee_no';
        //Generate reference number
        $ref_count = $this->transactionUtil->onlyGetReferenceCount($prefix_type, $business_id, false);
        //Generate reference number
        $employee_no = $this->transactionUtil->generateReferenceNumber($prefix_type, $ref_count);

        $departments =  Category::where('business_id', $business_id)
                            ->where('category_type', 'hrm_department')
                            ->pluck('name','id');
        $enable_hrm = $this->moduleUtil->hasThePermissionInSubscription($business_id, 'hr_module');
        return view('shipping::settings.officer.create')->with(compact(
            'employee_no','departments','enable_hrm'
        ));
    
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $business_id = request()->session()->get('business.id');
        try {
            $data = $request->except('_token');
            $data['joined_date'] = $this->commonUtil->uf_date($data['joined_date']);
            $data['business_id'] = $business_id;
            $data['created_by'] = Auth::user()->id;

            //update emploeyee count
            $this->transactionUtil->setAndGetReferenceCount('employee_no', $business_id);


            CollectionOfficer::create($data);

            $output = [
                'success' => true,
                'tab' => 'officer',
                'msg' => __('lang_v1.success')
            ];
        } catch (\Exception $e) {
            Log::emergency('File: ' . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            $output = [
                'success' => false,
                'tab' => 'officer',
                'msg' => __('messages.something_went_wrong')
            ];
        }

        return redirect()->back()->with('status', $output);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $business_id = request()->session()->get('business.id');
        $helper_dropdown = CollectionOfficer::where('business_id', $business_id)->pluck('helper_name', 'id');
        $view_type = request()->tab;
        $helper = CollectionOfficer::find($id);
        $contact_id = $id;

        return view('shipping::settings.officer.show')->with(compact(
            'helper_dropdown',
            'view_type',
            'helper','contact_id'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $helper = CollectionOfficer::find($id);

        return view('shipping::settings.officer.edit')->with(compact(
            'helper'
        ));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->except('_token', '_method');
            $data['joined_date'] = $this->commonUtil->uf_date($data['joined_date']);

            CollectionOfficer::where('id', $id)->update($data);

            $output = [
                'success' => true,
                'tab' => 'officer',
                'msg' => __('lang_v1.success')
            ];
        } catch (\Exception $e) {
            Log::emergency('File: ' . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            $output = [
                'success' => false,
                'tab' => 'officer',
                'msg' => __('messages.something_went_wrong')
            ];
        }

        return redirect()->back()->with('status', $output);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {

            CollectionOfficer::where('id', $id)->delete();

            $route_operations = RouteOperation::where('helper_id', $id)->get();
            foreach ($route_operations as $route_operation) {
                Transaction::where('id', $route_operation->transaction_id)->delete();
                TransactionPayment::where('transaction_id', $route_operation->transaction_id)->delete();
            }
            RouteOperation::where('helper_id', $id)->delete();

            $output = [
                'success' => true,
                'msg' => __('lang_v1.success')
            ];
        } catch (\Exception $e) {
            Log::emergency('File: ' . $e->getFile() . 'Line: ' . $e->getLine() . 'Message: ' . $e->getMessage());
            $output = [
                'success' => false,
                'msg' => __('messages.something_went_wrong')
            ];
        }

        return $output;
    }
}
