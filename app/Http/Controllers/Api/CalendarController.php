<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calendars = Calendar::all();
        return response()->json([
        "success" => true,
        "message" => "Calendar List",
        "data" => $calendars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getDateForSpecificDayBetweenDates($startDate,$endDate,$str_date){
        $endDate = strtotime($endDate);
        for($i = strtotime($str_date, strtotime($startDate)); $i <= $endDate; $i = strtotime('+1 week', $i))
        $date_array[]=date('Y-m-d',$i);
        return $date_array;
    }
            
    public function store(Request $request)
    {
        $input = $request->all();
    
        $name = $input['name'];
        $date_from = $input['date_from'];
        $date_to = $input['date_to'];
        $arr_dates = [] ;

        foreach($input['days'] as $day) {
            $tmp_arr = $this->getDateForSpecificDayBetweenDates($date_from,$date_to,ucfirst($day));
            $arr_dates = array_merge($arr_dates,$tmp_arr);
        }

        Calendar::whereBetween('date', array(\Carbon\Carbon::parse($date_from), \Carbon\Carbon::parse($date_to)))->delete();

        foreach($arr_dates as $sDate) {
            $calendar = Calendar::create([
                'name'=>$input['name'],
                'date'=>\Carbon\Carbon::parse($sDate)->format('Y/m/d')
            ]);
        }

       
        return response()->json([
        "success" => true,
        "message" => "Calendar created successfully."
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function show(Calendar $calendar)
    {
        //
        $calendar = Student::find($id);
        if (is_null($calendar)) {
            return $this->sendError('Calendar not found.');
        }
        return response()->json([
        "success" => true,
        "message" => "Calendar retrieved successfully.",
        "data" => $calendar
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function edit(Calendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calendar $calendar)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
        'name' => 'required'
        ]);
 
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
 
        $calendar->name = $input['name'];
        $calendar->save();
 
        return response()->json([
        "success" => true,
        "message" => "Calendar updated successfully.",
        "data" => $calendar
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calendar $calendar)
    {
        $calendar->delete();
        return response()->json([
        "success" => true,
        "message" => "Calendar deleted successfully.",
        "data" => $calendar
        ]);
    }
}