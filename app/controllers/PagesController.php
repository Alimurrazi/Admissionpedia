<?php
 
use app\controllers\ScienceController;

class PagesController extends BaseController{
	public function index(){

	}
     
    public function test()
    {
    	return View::make('firstpage');
    }

	public function create(){
		return View::make('students.create_student'); 
	}

 
	public function science($reg_no, $year){
		return View::make('students.entryScience')->with('reg_no', $reg_no)
		->with('year',$year);
	}

	public function commerce($reg_no, $year){
		return View::make('students.entryCommerce')->with('reg_no', $reg_no)
		->with('year',$year);
	}

	public function humanities($reg_no, $year){
		return View::make('students.entryHumanities')->with('reg_no', $reg_no)
		->with('year',$year);
	}


	public function store(){
			
		$data = Input::all();

		$rules= ['reg_no' => 'required|digits:6'];
		$validator = Validator::make($data, $rules);
		
		if($validator->fails())
			return Redirect::back()->withInput()->withErrors($validator->messages());

		$student = new Student;
		$student->reg_no = (integer) Input::get('reg_no');
		$student->board = Input::get('board');
		$student->year = Input::get('year');
		$student->group = Input::get('group');
		$student->type = Input::get('type'); 

			if($student->group == 'Science')
				return Redirect::route('datapassScience',['reg_no'=>$student->reg_no, 'year'=>$student->year]);
			if($student->group == 'Commerce')
				return Redirect::route('datapassCommerce',['reg_no'=>$student->reg_no, 'year'=>$student->year]);
			if($student->group == 'Humanities')
				return Redirect::route('datapassHumanities',['reg_no'=>$student->reg_no, 'year'=>$student->year]);
		
	}

	public function checkScience(){
		
		// hidden input
		// return Input::get('year');
		// return Input::get('reg_no');		

		//input validation
			
		$data = Input::all();
		$rules = array(
            'ssc_gpa' => 'required|regex:/^\d*(\.\d{2})?$/',
            'hsc_gpa' => 'required|regex:/^\d*(\.\d{2})?$/'
        );

		$validator =  Validator::make($data, $rules);

		if($validator->fails())
			return Redirect::back()->withInput()->withErrors($validator->messages());

		// end of input validation

		$ssc_gpa = (float) Input::get('ssc_gpa');
		$hsc_gpa = (float) Input::get('hsc_gpa');

		// return $univ = DB::select('select distinct(univ_name),univ_id from `universities` natural join `units` 
		// where hsc_req<$hsc_gpa and ssc_req<$ssc_gpa and unit_id in 
		// (select unit_id from `group` where group_id=1)');
		// $data = null;
		// $i=0;
		// foreach ($universities as $university) {
		// 	$data[$i++]['name'] = '';
		// 	$data[$i++]['units'] = ;
				
		// }

 		$info = DB::table('universities')
		        ->join('units', 'universities.univ_id','=','units.univ_id')
		        ->join('group', 'units.unit_id', '=','group.unit_id')
		        ->where('units.ssc_req','<=',$ssc_gpa)
		        ->where('units.hsc_req','<=',$hsc_gpa)
		        ->where('group.group_id','=',1)
		        ->distinct()
		        ->groupBy('univ_name')
		        ->get();

		return View::make('students.univShow')->with('info', $info);
		        
	}


	public function checkCommerce(){
		//input validation
		
		$data = Input::all();
		$rules = array(
            'ssc_gpa' => 'required|regex:/^\d*(\.\d{2})?$/',
            'hsc_gpa' => 'required|regex:/^\d*(\.\d{2})?$/'
        );

		$validator =  Validator::make($data, $rules);

		if($validator->fails())
			return Redirect::back()->withInput()->withErrors($validator->messages());

		// end of input validation


		$ssc_gpa = (float) Input::get('ssc_gpa');
		$hsc_gpa = (float) Input::get('hsc_gpa');


		$info = DB::table('universities')
		        ->join('units', 'universities.univ_id','=','units.univ_id')
		        ->join('group', 'units.unit_id', '=','group.unit_id')
		        ->where('units.ssc_req','<=',$ssc_gpa)
		        ->where('units.hsc_req','<=',$hsc_gpa)
		        ->where('group.group_id','=',2)
		        ->distinct()
		        ->groupBy('univ_name')
		        ->get();

		return View::make('students.univShow')->with('info', $info);
		
	}


	public function checkHumanities(){
		//input validation
		
		$data = Input::all();
		$rules = array(
            'ssc_gpa' => 'required|regex:/^\d*(\.\d{2})?$/',
            'hsc_gpa' => 'required|regex:/^\d*(\.\d{2})?$/'
        );

		$validator =  Validator::make($data, $rules);

		if($validator->fails())
			return Redirect::back()->withInput()->withErrors($validator->messages());

		// end of input validation


		$ssc_gpa = (float) Input::get('ssc_gpa');
		$hsc_gpa = (float) Input::get('hsc_gpa');


		$info = DB::table('universities')
		        ->join('units', 'universities.univ_id','=','units.univ_id')
		        ->join('group', 'units.unit_id', '=','group.unit_id')
		        ->where('units.ssc_req','<=',$ssc_gpa)
		        ->where('units.hsc_req','<=',$hsc_gpa)
		        ->where('group.group_id','=',3)
		        ->distinct()
		        ->groupBy('univ_name')
		        ->get();

		return View::make('students.univShow')->with('info', $info);
		
	}

	public function unit($univ_id, $group_id){
      
      /*  
        $engineering_varsities=DB::table('engineering_universities')
         ->join('units', 'engineering_universities.univ_id','=','units.univ_id')
	        ->where('engineering_universities.univ_code','=', $univ_code)
	        ->where('units.group_id','=',$group_id)
	        ->distinct();
*/
		$units = DB::table('universities')
	        ->join('units', 'universities.univ_id','=','units.univ_id')
	    //    ->join('group', 'units.unit_id', '=','group.unit_id')
	        ->where('universities.univ_id','=', $univ_id)
	        ->where('units.group_id','=',$group_id)
	       // ->where('group.group_id','=',$group_id)
	        ->distinct()
	  //      ->union($engineering_varsities)
	        ->get();
 
		return View::make('students.unitShow')->with('units', $units);
	}

    public function convert($gpa_sub)
   {
     if($gpa_sub=='A+')
      $gpa_sub=5.00;
     else if($gpa_sub=='A')
      $gpa_sub=4.00;
     else if($gpa_sub=='A-')
      $gpa_sub=3.50;
     else if($gpa_sub=='B')
      $gpa_sub=3.00;
     else if($gpa_sub=='C')
      $gpa_sub=2.00;
     else if($gpa_sub=='D')
      $gpa_sub=1.00;
     else
      return 0;
     return $gpa_sub;
   }


	public function dept($univ_id,$unit_id,$group_id){
	if($group_id==1)
	{ 
	  return Redirect::route('science_dept',['univ_id'=>$univ_id, 'unit_id'=>$unit_id, 'group_id'=>$group_id]); 
	}
	if($group_id==2)
	{
	   return Redirect::route('commerce_dept',['univ_id'=>$univ_id, 'unit_id'=>$unit_id, 'group_id'=>$group_id]);
	}
	if($group_id==3)
	{
	   return Redirect::route('humanities_dept',['univ_id'=>$univ_id, 'unit_id'=>$unit_id, 'group_id'=>$group_id]);
	}
	
	}

	public function req_check($unit_id,$group_id,$dept_name)
	{
		if($group_id==1)
		{
          return Redirect::route('science_dept_req',['unit_id'=>$unit_id, 'group_id'=>$group_id, 'dept_name'=>$dept_name]); 
		}
		if($group_id==2)
		{
			return Redirect::route('commerce_dept_req',['unit_id'=>$unit_id, 'group_id'=>$group_id, 'dept_name'=>$dept_name]); 
		}
	    if($group_id==3)
		{
			return Redirect::route('humanities_dept_req',['unit_id'=>$unit_id, 'group_id'=>$group_id, 'dept_name'=>$dept_name]); 
		}

	}

}

















