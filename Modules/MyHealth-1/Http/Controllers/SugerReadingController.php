<?php

namespace Modules\MyHealth\Http\Controllers;

use App\Ad;
use App\AdPage;
use App\Business;
use App\Contact;
use Illuminate\Http\Request;
use Modules\MyHealth\Entities\PatientDetail;
use Modules\MyHealth\Entities\PatientSugarReading;
use Modules\MyHealth\Entities\SugarReadingBreakfast;
use Modules\MyHealth\Entities\SugarReadingLunchs;
use Modules\MyHealth\Entities\SugarReadingDinner;
use App\Utils\ModuleUtil;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Utils\BusinessUtil;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class SugerReadingController extends Controller
{
    protected $businessUtil;
    protected $moduleUtil;
    /**
     * Constructor
     *
     * @param ProductUtils $product
     * @return void
     */
    public function __construct(BusinessUtil $businessUtil, ModuleUtil $moduleUtil)
    {
        $this->businessUtil = $businessUtil;
        $this->moduleUtil = $moduleUtil;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    if (request()->ajax()) {
        // $users = User::where('id', Auth::user()->id)
        //     ->where('member', 0)
        //     ->first();

        // if ($users) {
            //$member = Member::where('username', $users->username)->first();
           
            $sugar_readings = PatientSugarReading::leftJoin('sugar_reading_breakfasts', 'patient_sugar_readings.id', '=', 'sugar_reading_breakfasts.sugar_reading_id')
                ->leftJoin('sugar_reading_lunchs', 'patient_sugar_readings.id', '=', 'sugar_reading_lunchs.sugar_reading_id')
                ->leftJoin('sugar_reading_dinners', 'patient_sugar_readings.id', '=', 'sugar_reading_dinners.sugar_reading_id')
                ->where('member_id',Auth::user()->id)
                ->select([
                    'patient_sugar_readings.id as id',
                    'patient_sugar_readings.sugar_reading_breakfast as sugar_reading_breakfast',
                     'patient_sugar_readings.sugar_reading_lunch as sugar_reading_lunch',
                      'patient_sugar_readings.sugar_reading_dinner as sugar_reading_dinner',
                    'patient_sugar_readings.date as sugar_reading_date',
                   
                    'sugar_reading_breakfasts.reading_number_one as breakfast_reading_number_one',
                    'sugar_reading_breakfasts.reading_number_two as breakfast_reading_number_two',
                     'sugar_reading_breakfasts.reading_number_three as breakfast_reading_number_three',
                    'sugar_reading_breakfasts.time_one as breakfast_time_one',
                    'sugar_reading_breakfasts.reading_one as breakfast_reading_one',
                    'sugar_reading_breakfasts.note_one as breakfast_note_one',
                    'sugar_reading_breakfasts.time_two as breakfast_time_two',
                    'sugar_reading_breakfasts.reading_two as breakfast_reading_two',
                    'sugar_reading_breakfasts.note_two as breakfast_note_two',
                    'sugar_reading_breakfasts.time_three as breakfast_time_three',
                    'sugar_reading_breakfasts.reading_three as breakfast_reading_three',
                    'sugar_reading_breakfasts.note_three as breakfast_note_three',
                     'sugar_reading_lunchs.reading_number_one as lunch_reading_number_one',
                    'sugar_reading_lunchs.reading_number_two as lunch_reading_number_two',
                     'sugar_reading_lunchs.reading_number_three as lunch_reading_number_three',
                    'sugar_reading_lunchs.time_one as lunch_time_one',
                    'sugar_reading_lunchs.reading_one as lunch_reading_one',
                    'sugar_reading_lunchs.note_one as lunch_note_one',
                    'sugar_reading_lunchs.time_two as lunch_time_two',
                    'sugar_reading_lunchs.reading_two as lunch_reading_two',
                    'sugar_reading_lunchs.note_two as lunch_note_two',
                    'sugar_reading_lunchs.time_three as lunch_time_three',
                    'sugar_reading_lunchs.reading_three as lunch_reading_three',
                    'sugar_reading_lunchs.note_three as lunch_note_three',
                    'sugar_reading_dinners.time_one as dinner_time_one',
                    'sugar_reading_dinners.reading_one as dinner_reading_one',
                    'sugar_reading_dinners.note_one as dinner_note_one',
                    
                          'sugar_reading_dinners.time_two as dinner_time_two',
                    'sugar_reading_dinners.reading_two as dinner_reading_two',
                    'sugar_reading_dinners.note_two as dinner_note_two',
                    
                          'sugar_reading_dinners.time_three as dinner_time_three',
                    'sugar_reading_dinners.reading_three as dinner_reading_three',
                    'sugar_reading_dinners.note_three as dinner_note_three',
                ])
                
                ; // Execute the query
           
            return DataTables::of($sugar_readings)
            
    ->addColumn('breakfast1', function ($row) {
            $html = '<div class="btn-group">';
            if ($row->sugar_reading_breakfast == "0") {
               $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@add', [$row->id]) . '" class="btn btn-info btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: #61CBF3; color: white; border: none;">
                                <i class="fa fa-plus"></i> ' . __("messages.add") . '
                              </a>'; 
            }
            else
            {
                
                  if ($row->breakfast_reading_number_one == "1" ) {
                     $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@edit', [$row->id]) . '" class="btn btn-warning btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: green; color: white; border: none;">
                    <i class="fa fa-edit"></i> ' . __("messages.edit") . '   </a>';
                      $html .= '<br>'; 
                  $html .= ' Time: ' . $row->breakfast_time_one; 
                    $html .= '<br>';
                     $html .= ' Reading: ' . $row->breakfast_reading_one; 
                      $html .= '<br>';
                    $html .= ' Note: ' . $row->breakfast_note_one; 
                  }
                  else
                  { $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@add', [$row->id]) . '" class="btn btn-info btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: #61CBF3; color: white; border: none;">
                                <i class="fa fa-plus"></i> ' . __("messages.add") . '
                              </a>'; 
                      
                  }
                 
                
                
            }
              $html .= '</div>';
                
                return $html;
        })
        ->addColumn('breakfast2', function ($row) {
            $html = '<div class="btn-group">';
            if ($row->sugar_reading_breakfast == "0") {
                $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@add', [$row->id]) . '" class="btn btn-info btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: #61CBF3; color: white; border: none;">
                                <i class="fa fa-plus"></i> ' . __("messages.add") . '
                              </a>'; 
            }
            else
            {
                     if ($row->breakfast_reading_number_two == "1" ) {
                     $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@edit', [$row->id]) . '" class="btn btn-warning btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: green; color: white; border: none;">
                    <i class="fa fa-edit"></i> ' . __("messages.edit") . '   </a>';
                      $html .= '<br>'; 
                  $html .= ' Time: ' . $row->breakfast_time_two; 
                    $html .= '<br>';
                     $html .= ' Reading: ' . $row->breakfast_reading_two; 
                      $html .= '<br>';
                    $html .= ' Note: ' . $row->breakfast_note_two; 
                  }
                  else
                  { $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@add', [$row->id]) . '" class="btn btn-info btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: #61CBF3; color: white; border: none;">
                                <i class="fa fa-plus"></i> ' . __("messages.add") . '
                              </a>'; 
                      
                  }
            }
              $html .= '</div>';
                
                return $html;
        })
        ->addColumn('breakfast3', function ($row) {
             $html = '<div class="btn-group">';
            if ($row->sugar_reading_breakfast == "0") {
                $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@add', [$row->id]) . '" class="btn btn-info btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: #61CBF3; color: white; border: none;">
                                <i class="fa fa-plus"></i> ' . __("messages.add") . '
                              </a>'; 
            }
            else
            {
                  
                      if ($row->breakfast_reading_number_three == "1" ) {
                     $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@edit', [$row->id]) . '" class="btn btn-warning btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: green; color: white; border: none;">
                    <i class="fa fa-edit"></i> ' . __("messages.edit") . '   </a>';
                      $html .= '<br>'; 
                  $html .= ' Time: ' . $row->breakfast_time_three; 
                    $html .= '<br>';
                     $html .= ' Reading: ' . $row->breakfast_reading_three; 
                      $html .= '<br>';
                    $html .= ' Note: ' . $row->breakfast_note_three; 
                  }
                  else
                  { $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@add', [$row->id]) . '" class="btn btn-info btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: #61CBF3; color: white; border: none;">
                                <i class="fa fa-plus"></i> ' . __("messages.add") . '
                              </a>'; 
                      
                  }
            }
              $html .= '</div>';
                
                return $html;
        })
         ->addColumn('breakfast', function ($row) {
           
            return '';
        })
       
     
         ->addColumn('lunch1', function ($row) {
           $html = '<div class="btn-group">';
            if ($row->sugar_reading_lunch == "0") {
                $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@add', [$row->id]) . '" class="btn btn-info btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: #61CBF3; color: white; border: none;">
                                <i class="fa fa-plus"></i> ' . __("messages.add") . '
                              </a>'; 
            }
            else
            {
                   if ($row->lunch_reading_number_one == "1" ) {
                     $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@edit', [$row->id]) . '" class="btn btn-warning btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: green; color: white; border: none;">
                    <i class="fa fa-edit"></i> ' . __("messages.edit") . '   </a>';
                      $html .= '<br>'; 
                  $html .= ' Time: ' . $row->lunch_time_one; 
                    $html .= '<br>';
                     $html .= ' Reading: ' . $row->lunch_reading_one; 
                      $html .= '<br>';
                    $html .= ' Note: ' . $row->lunch_note_one; 
                  }
                  else
                  { $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@add', [$row->id]) . '" class="btn btn-info btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: #61CBF3; color: white; border: none;">
                                <i class="fa fa-plus"></i> ' . __("messages.add") . '
                              </a>'; 
                      
                  }
            }
              $html .= '</div>';
                
                return $html;
        })
        ->addColumn('lunch2', function ($row) {
           $html = '<div class="btn-group">';
            if ($row->sugar_reading_lunch == "0") {
                $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@add', [$row->id]) . '" class="btn btn-info btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: #61CBF3; color: white; border: none;">
                                <i class="fa fa-plus"></i> ' . __("messages.add") . '
                              </a>'; 
            }
            else
            {
                    if ($row->lunch_reading_number_two == "1" ) {
                     $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@edit', [$row->id]) . '" class="btn btn-warning btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: green; color: white; border: none;">
                    <i class="fa fa-edit"></i> ' . __("messages.edit") . '   </a>';
                      $html .= '<br>'; 
                  $html .= ' Time: ' . $row->lunch_time_two; 
                    $html .= '<br>';
                     $html .= ' Reading: ' . $row->lunch_reading_two; 
                      $html .= '<br>';
                    $html .= ' Note: ' . $row->lunch_note_two; 
                  }
                  else
                  { $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@add', [$row->id]) . '" class="btn btn-info btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: #61CBF3; color: white; border: none;">
                                <i class="fa fa-plus"></i> ' . __("messages.add") . '
                              </a>'; 
                      
                  }
            }
              $html .= '</div>';
                
                return $html;
        })
        ->addColumn('lunch3', function ($row) {
            $html = '<div class="btn-group">';
            if ($row->sugar_reading_lunch == "0") {
                $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@add', [$row->id]) . '" class="btn btn-info btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: #61CBF3; color: white; border: none;">
                                <i class="fa fa-plus"></i> ' . __("messages.add") . '
                              </a>'; 
            }
            else
            {
                    if ($row->lunch_reading_number_three == "1" ) {
                     $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@edit', [$row->id]) . '" class="btn btn-warning btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: green; color: white; border: none;">
                    <i class="fa fa-edit"></i> ' . __("messages.edit") . '   </a>';
                      $html .= '<br>'; 
                  $html .= ' Time: ' . $row->lunch_time_three; 
                    $html .= '<br>';
                     $html .= ' Reading: ' . $row->lunch_reading_three; 
                      $html .= '<br>';
                    $html .= ' Note: ' . $row->lunch_note_three; 
                  }
                  else
                  { $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@add', [$row->id]) . '" class="btn btn-info btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: #61CBF3; color: white; border: none;">
                                <i class="fa fa-plus"></i> ' . __("messages.add") . '
                              </a>'; 
                      
                  }
            }
              $html .= '</div>';
                
                return $html;
        })
         ->addColumn('lunch', function ($row) {
           
            return '';
        })
        
      
          ->addColumn('dinner1', function ($row) {
           $html = '<div class="btn-group">';
            if ($row->sugar_reading_dinner == "0") {
                $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@add', [$row->id]) . '" class="btn btn-info btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: #61CBF3; color: white; border: none;">
                                <i class="fa fa-plus"></i> ' . __("messages.add") . '
                              </a>'; 
            }
            else
            {
                   if ($row->dinner_reading_number_one == "1" ) {
                     $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@edit', [$row->id]) . '" class="btn btn-warning btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: green; color: white; border: none;">
                    <i class="fa fa-edit"></i> ' . __("messages.edit") . '   </a>';
                      $html .= '<br>'; 
                  $html .= ' Time: ' . $row->dinner_time_one; 
                    $html .= '<br>';
                     $html .= ' Reading: ' . $row->dinner_reading_one; 
                      $html .= '<br>';
                    $html .= ' Note: ' . $row->dinner_note_one; 
                  }
                  else
                  { $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@add', [$row->id]) . '" class="btn btn-info btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: #61CBF3; color: white; border: none;">
                                <i class="fa fa-plus"></i> ' . __("messages.add") . '
                              </a>'; 
                      
                  }
            }
              $html .= '</div>';
                
                return $html;
        })
        ->addColumn('dinner2', function ($row) {
            $html = '<div class="btn-group">';
            if ($row->sugar_reading_dinner == "0") {
                $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@add', [$row->id]) . '" class="btn btn-info btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: #61CBF3; color: white; border: none;">
                                <i class="fa fa-plus"></i> ' . __("messages.add") . '
                              </a>'; 
            }
            else
            {
                   if ($row->dinner_reading_number_two == "1" ) {
                     $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@edit', [$row->id]) . '" class="btn btn-warning btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: green; color: white; border: none;">
                    <i class="fa fa-edit"></i> ' . __("messages.edit") . '   </a>';
                      $html .= '<br>'; 
                  $html .= ' Time: ' . $row->dinner_time_two; 
                    $html .= '<br>';
                     $html .= ' Reading: ' . $row->dinner_reading_two; 
                      $html .= '<br>';
                    $html .= ' Note: ' . $row->dinner_note_two; 
                  }
                  else
                  { $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@add', [$row->id]) . '" class="btn btn-info btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: #61CBF3; color: white; border: none;">
                                <i class="fa fa-plus"></i> ' . __("messages.add") . '
                              </a>'; 
                      
                  }
            }
              $html .= '</div>';
                
                return $html;
        })
        ->addColumn('dinner3', function ($row) {
             $html = '<div class="btn-group">';
            if ($row->sugar_reading_dinner == "0") {
                $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@add', [$row->id]) . '" class="btn btn-info btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: #61CBF3; color: white; border: none;">
                                <i class="fa fa-plus"></i> ' . __("messages.add") . '
                              </a>'; 
            }
            else
            {
                    if ($row->dinner_reading_number_three == "1" ) {
                     $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@edit', [$row->id]) . '" class="btn btn-warning btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: green; color: white; border: none;">
                    <i class="fa fa-edit"></i> ' . __("messages.edit") . '   </a>';
                      $html .= '<br>'; 
                  $html .= ' Time: ' . $row->dinner_time_three; 
                    $html .= '<br>';
                     $html .= ' Reading: ' . $row->dinner_reading_three; 
                      $html .= '<br>';
                    $html .= ' Note: ' . $row->dinner_note_three; 
                  }
                  else
                  { $html .= '<a href="#" data-href="' . action('\Modules\MyHealth\Http\Controllers\SugerReadingController@add', [$row->id]) . '" class="btn btn-info btn-xs btn-modal" data-container=".suger_reading_model" style="background-color: #61CBF3; color: white; border: none;">
                                <i class="fa fa-plus"></i> ' . __("messages.add") . '
                              </a>'; 
                      
                  }
            }
              $html .= '</div>';
                
                return $html;
        })
         ->addColumn('dinner', function ($row) {
           
            return '';
        })
        
      
         ->removeColumn('id')
        ->rawColumns(['breakfast1', 'breakfast2', 'breakfast3', 'breakfast','lunch1', 'lunch2', 'lunch3', 'lunch','dinner1', 'dinner2', 'dinner3', 'dinner'])
       
        ->make(true);
        // }
    }

    return view('myhealth::patient.sugar_reading');
}
        public function sugar_reading()
    {



        return view('myhealth::patient.sugar_reading');
    }
   public function fetchData(Request $request)
{
    $type = $request->input('type');
    $reading_id = $request->input('sugar_reading_id');

    // Initialize the data array
    $data = [
        'reading_value' => null,
        'note' => null,
        'time' => null,
    ];

    // Select the appropriate model based on the type
    $model = null;

    if ($type == 'breakfast') {
        $model = SugarReadingBreakfast::class;
    } elseif ($type == 'lunch') {
        $model = SugarReadingLunchs::class; // Assuming you have this model
    } elseif ($type == 'dinner') {
        $model = SugarReadingDinner::class; // Assuming you have this model
    }
 
    // If a model was found, fetch the data
    if ($model) {
        $result = $model::where('sugar_reading_id', $reading_id)->first();

        if ($result) {
            $data['reading_value'] = $result->reading;
            $data['note'] = $result->note;
            $data['time'] = $result->time;
        }
    }

    // Return the data as JSON
    return response()->json($data);
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('myhealth::patient.add_date');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = $request->except('_token');
        $year = request('year1') . request('year2') . request('year3') . request('year4');
        $month = request('month1') . request('month2');
        $day = request('date1') . request('date2');
        
        $dateString = "$year-$month-$day";
        $user = User::where('id', auth()->user()->id)->first();
        // Use Carbon to create a date object
        $date = \Carbon\Carbon::createFromFormat('Y-m-d', $dateString);
        try {
            $tests_data = array(
                'date' => $date,
                'member_id' =>$user->id,
            );
            $result=PatientSugarReading::create($tests_data);
           
            $output = [
                'success' => 1,
                'msg' => __('myhealth::patient.test_add_success')
            ];

            return redirect()->back()->with('status', $output);
        } catch (\Exception $e) {
            \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());

            $output = [
                'success' => 0,
                'msg' => __('messages.something_went_wrong')
            ];

            return redirect()->back()->with('status', $output);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       

 $sugarReading = PatientSugarReading::findOrFail($id); // Replace with your actual model

    return view('myhealth::patient.edit_sugar_reading', compact('sugarReading'));
 }
public function add($id)
    {
       

 $sugarReading = PatientSugarReading::findOrFail($id); // Replace with your actual model

    return view('myhealth::patient.add_sugar_reading', compact('sugarReading'));
 }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $breakfast=0;
        $lunch=0;
        $dinner=0;
        $data = $request->except('_token');
        $hour = $request->input('hour');
        $minute = $request->input('minute');
        $second = 0; // Fixed value for seconds
    
        // Format the time as HH:MM:SS
        $time = sprintf('%02d:%02d:%02d', $hour, $minute, $second);
        try {
            if ($request->sugar_reading=='breakfast')
            {
               $breakfast=1; 
                  $update_data = array(
                'sugar_reading_breakfast' => $breakfast
            );
            $patient_details = PatientSugarReading::where('id', $id)->update($update_data);
            
            $sugarReadingId = $id; 
            if($request->sugar_reading_number ==  "1")
            {
            $breakfastData = [
            'breakfast_reading_number_one' => $request->sugar_reading_number,
            'breakfast_time_one' => $time,
            'breakfast_reading_one' => $request->reading_value,
            'breakfast_note_one' => $request->note,
            ];
            }
            elseif($request->sugar_reading_number ==  "2")
            {
             $breakfastData = [
            'breakfast_reading_number_two' => $request->sugar_reading_number,
            'breakfast_time_two' => $time,
            'breakfast_reading_two' => $request->reading_value,
            'breakfast_note_two' => $request->note,
            ];
          
            }
            else
            {
              $breakfastData = [
            'breakfast_reading_number_three' => $request->sugar_reading_number,
            'breakfast_time_three' => $time,
            'breakfast_reading_three' => $request->reading_value,
            'breakfast_note_three' => $request->note,
            ];
            }
           
            $result = SugarReadingBreakfast::updateOrCreate(
            ['sugar_reading_id' => $sugarReadingId], // Attributes to find the record
            $breakfastData // Data to update or create
            );
              dd($result);
              $output = [
                'success' => 1,
                'msg' => __("myhealth::patient.details_update_success")
            ];
            }
            elseif($request->sugar_reading=='lunch')
            {
                 $lunch=1;
                 $update_data = array(
                'sugar_reading_lunch' => $lunch
            );
               $patient_details = PatientSugarReading::where('id', $id)->update($update_data);  
              
               $lunch_data = array(
                'sugar_reading_id' => $id,
                'time' => $time,
                'reading' => $request->reading_value,
                'note' => $request->note
            );
           $sugarReadingId = $id; 
            $result=SugarReadingLunchs::updateOrCreate(
            ['sugar_reading_id' => $sugarReadingId], 
            $lunch_data // Data to update or create
            );
             
                $output = [
                'success' => 1,
                'msg' => __("myhealth::patient.details_update_success")
            ];
            }
             elseif($request->sugar_reading=='dinner')
            {
                $dinner=1;
             $update_data = array(
                'sugar_reading_dinner' => $dinner
            );
             $patient_details = PatientSugarReading::where('id', $id)->update($update_data);
             $dinner_data = array(
                'sugar_reading_id' => $id,
                'time' => $time,
                'reading' => $request->reading_value,
                'note' => $request->note
            );
             $sugarReadingId = $id;
            $result=SugarReadingDinner::updateOrCreate(
            ['sugar_reading_id' => $sugarReadingId], 
            $dinner_data 
            );
              $output = [
                'success' => 1,
                'msg' => __("myhealth::patient.details_update_success")
            ];
                
            }
           
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());

            $output = [
                'success' => 0,
                'msg' => __("messages.something_went_wrong")
            ];
        }


        return back()->with('status', $output);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


      /**
     * Retrieves list of customers, if filter is passed then filter it accordingly.
     *
     * @param  string  $q
     * @return JSON
     */
    public function getPatient()
    {
        if (request()->ajax()) {
            $term = request()->input('q', '');
            $patient = Business::where('is_patient', 1)->leftjoin('users', 'business.id', 'users.business_id')
                    ->leftjoin('patient_details', 'users.id', 'patient_details.user_id');
      

            if (!empty($term)) {
                $patient->where(function ($query) use ($term) {
                    $query->Where('users.username', 'like', '%' . $term .'%')
                            ->orWhere('patient_details.mobile', 'like', '%' . $term .'%')
                            ->orWhere('patient_details.name', 'like', '%' . $term .'%');
                });
            }

            $patient->select(
                'users.id',
                'username',
                'patient_details.mobile',
                'patient_details.name'
            );

          
            $patient = $patient->get();
            return json_encode($patient);
        }
    }

}
