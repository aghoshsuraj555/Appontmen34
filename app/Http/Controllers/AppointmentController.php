<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Appointment;
use DB;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view('view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('modal.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	  $this->validate($request,[
		'name'=>array(
            'required',
            'regex:/(^([a-z A-Z.]+)(\d+)?$)/u'
        ),
		'email'=>'required|email',
		'date'=>'required|date|after:yesterday',
		'time'=>'required',
		'title'=>'required'
		]);	
	$count=appointment::whereBetween('appointment_start_time', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->get();
	if(count($count)>5)
	{
	  return redirect('/calendar')->with('error','Appointment Exceed for this week');	
	}	
	$insert_id= patient::create([ 
	  'patient_name'=>$request->input('name'),
      'patient_email'=>$request->input('email'),
      ]);
	  $end=strtotime($request->input('date').' '.$request->input('time'));
	  $result= appointment::create([ 
      'patient_id'=>$insert_id->id,
      'appointment_start_time'=>date('Y-m-d H:i:s',strtotime($request->input('date').' '.$request->input('time'))),
	  'appointment_end_time'=>date('Y-m-d H:i:s',strtotime('+30 minutes',$end)),
	  'appointment_title'=>$request->input('title')
      ]);
	  if($result)
	  {
	  return redirect('/calendar')->with('success','Appointment Created');
	  }
	  else
	  {	  
	  return redirect('/calendar')->with('error','Appointment Not Created');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       echo 'hai';die();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $result=DB::table('appointments')->where('appointment_id', $id)->delete();
	 if($result)
	 {
	 return redirect('/calendar')->with('success','Appointment deleted');	 
	 }
     else
     {
	  return redirect('/calendar')->with('error','Appointment not deleted');	 
	 }  
    }
	 public function calendar()
    {
     $data['appointments']=DB::table('appointments')->join('patients','appointments.patient_id','=','patients.patient_id')->orderBy('appointment_id', 'DESC')->get();	
     return view('calendar')->with($data);
    }

}
