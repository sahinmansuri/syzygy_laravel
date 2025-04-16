<?php

namespace Modules\MPCS\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\BusinessLocation;
use App\Utils\BusinessUtil;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Modules\MPCS\Entities\Mpcs9cCashFormSettings;

class Form9CSettingsController extends Controller
{
    /**
     * All Utils instance.
     *
     */
    protected $commonUtil;
    protected $businessUtil;

    private $barcode_types;

    /**
     * Constructor
     *
     * @param ProductUtils $product
     * @return void
     */
    public function __construct(BusinessUtil $businessUtil)
    {
        
        $this->businessUtil = $businessUtil;
        $this->middleware('web');
    }
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        } 
        if (request()->ajax()) {
         
 
           $header = Mpcs9cCashFormSettings::query();

         
            return Datatables::of($header)
                ->removeColumn('id')
                ->removeColumn('business_id')
                ->removeColumn('created_at')
                ->removeColumn('updated_at')
                ->editColumn('action', function ($row) {
                    $html = '<button href="#" data-href="' . url('/mpcs/edit-form-9c-settings/' . $row->id) . '" class="btn-modal btn btn-primary btn-xs" data-container=".update_form_9_c_settings_modal"><i class="fa fa-edit" aria-hidden="true"></i> ' . __("messages.edit") . '</button>';
                    return $html;
                })

                ->rawColumns(['action'])
                ->make(true);
        }
       
        $business_id = request()->session()->get('business.id');
       
        $settings = Mpcs9cCashFormSettings::where('business_id', $business_id)->first();
        $business_locations = BusinessLocation::forDropdown($business_id);
        return view('mpcs::forms.form_9c')->with(compact(
            'business_locations',
            'settings'
        ));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function create()
    {
        return view('mpcs::forms.partials.create_9c_form_settings');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        
        $business_id = session()->get('user.business_id');
 
        $data = array(
            'business_id' => $business_id,
            'date_time' => $request->input('datepicker'),
            'starting_number' => $request->input('form_starting_number'),
            'ref_pre_form_number' => $request->input('ref_previous_form_number'),
            'added_user' =>auth()->user()->username,
            'created_at' => date('Y-m-d H:i'),
            'updated_at' => date('Y-m-d H:i'),
        );

        Mpcs9cCashFormSettings::insertGetId($data);

        $output = [
            'success' => 1,
            'msg' => __('mpcs::lang.form_9a_settings_add_success')
        ];

       return redirect()->back()->with('success', __('mpcs::lang.form_9a_settings_add_success'));

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $business_id = request()->session()->get('user.business_id');
 
        $settings = Mpcs9cCashFormSettings::where('business_id', $business_id)->where('id', $id)->first();
        return view('mpcs::forms.partials.edit_9c_form_settings')->with(compact(
                    'settings'
        ));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        
        $business_id = request()->session()->get('user.business_id');
 
        $data = array(
            'business_id' => $business_id,
            'date_time' => $request->input('datepicker'),
            'starting_number' => $request->input('form_starting_number'),
            'ref_pre_form_number' => $request->input('ref_previous_form_number'),
            'added_user' =>auth()->user()->username,
            'created_at' => date('Y-m-d H:i'),
            'updated_at' => date('Y-m-d H:i'),
        );


        Mpcs9cCashFormSettings::where('id', $id)->update($data);

        $output = [
            'success' => 1,
            'msg' => __('mpcs::lang.form_9a_settings_update_success')
        ];

      return redirect()->back()->with('success', __('mpcs::lang.form_9a_settings_add_success'));
    }

    public function get9CForm(Request $request)
    {
        $business_id = request()->session()->get('user.business_id');
        

        $selected_date = $request->input('selected_date');
        $pre_day = Carbon::parse($selected_date)->subDay()->format('Y-m-d');

        $form_9c = DB::table(
                    function ($query) use ($business_id, $selected_date) {
                        $query->from('mpcs_9a_form_settings')
                            ->where('business_id', $business_id)
                            ->whereDate('date', $selected_date);
                        }, 'a')
                ->get()
                ->first();

        return $form_9c;
    }
}
