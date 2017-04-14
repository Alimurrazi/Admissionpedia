<?php

/**
* 
*/
 
class ScienceController extends BaseController
{
	public $global;

	public function science($reg_no, $year)
  {
    $this->global=$year;
		return View::make('students.entryScience')->with('reg_no', $reg_no)
		->with('year',$year);
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


	public function checkScience()
  {
		$data = Input::all();
		$rules = array(
            'ssc_gpa' => 'required|regex:/^\d*(\.\d{2})?$/',
            'ssc_gpa_without_optional' => 'required|regex:/^\d*(\.\d{2})?$/',
            'hsc_gpa' => 'required|regex:/^\d*(\.\d{2})?$/',
            'hsc_gpa_without_optional' => 'required|regex:/^\d*(\.\d{2})?$/'
        );
        


		$validator =  Validator::make($data, $rules);

		if($validator->fails())
		return Redirect::back()->withInput()->withErrors($validator->messages());
        
        DB::table('science_student')->delete();
        DB::table('science_student')->insert(
          [
          'primary_id'=>1,
          'Bangla'=>Input::get('bangla'),
          'English'=>Input::get('english'),
          'Physics'=>Input::get('physics'),
          'Chemistry'=>Input::get('chemistry'),
          'Biology'=>Input::get('biology'),
          'Mathmatics'=>Input::get('mathmatics'),
          'Highest_gpa'=>Input::get('high_gpa'),
          'ssc_gpa'=>Input::get('ssc_gpa'),
          'hsc_gpa'=>Input::get('hsc_gpa'),
          'ssc_gpa_without_4th_subject'=>Input::get('ssc_gpa_without_optional'),
          'hsc_gpa_without_4th_subject'=>Input::get('hsc_gpa_without_optional')
          ]
        	);

        $Bangla=$this->convert(Input::get('bangla'));
        $English=$this->convert(Input::get('english'));
        $Physics=$this->convert(Input::get('physics'));
        $Chemistry=$this->convert(Input::get('chemistry'));
        $Biology=$this->convert(Input::get('biology'));
        $Mathmatics=$this->convert(Input::get('mathmatics'));

    

		$ssc_gpa = (float) Input::get('ssc_gpa');
		$hsc_gpa = (float) Input::get('hsc_gpa');
		$ssc_gpa_without_optional= (float) Input::get('ssc_gpa_without_optional');
		$hsc_gpa_without_optional=(float) Input::get('hsc_gpa_without_optional');
         
    $pass_year=Input::get('pass_year');

      $cuet=DB::table('donot_delete')
            ->join('units','donot_delete.univ_id','=','units.univ_id')
            ->groupBy('univ_name');
      $ruet=DB::table('donot_delete')
            ->join('units','donot_delete.univ_id','=','units.univ_id')
            ->groupBy('univ_name');
      $buet=DB::table('donot_delete')
            ->join('units','donot_delete.univ_id','=','units.univ_id')
            ->groupBy('univ_name');
      $kuet_butex=DB::table('donot_delete')
            ->join('units','donot_delete.univ_id','=','units.univ_id')
            ->groupBy('univ_name');

       if(($ssc_gpa+$hsc_gpa)/2>=4.0)
       {
        if(($English+$Physics+$Chemistry+$Mathmatics)>=19)
        {
            $cuet=DB::table('engineering_universities')
                ->where('engineering_universities.year_allowed','<=',$pass_year)
                ->join('units','engineering_universities.univ_id','=','units.univ_id')
                
               ->where('units.group_id','=',1)
               ->where('engineering_universities.univ_code','=','CUET')
               ->where('units.ssc_req_with_optional','<=',$ssc_gpa)
               ->where('units.hsc_req_with_optional','<=',$ssc_gpa)
               ->where('units.total_req_with_optional','<=',$ssc_gpa+$hsc_gpa)

               ->distinct()
               ->groupBy('univ_name');
        }
       }

     if($Mathmatics>=4 && $Physics>=4 && $Chemistry>=4 && $English>=3.5)
     {
      if(($English+$Physics+$Chemistry+$Mathmatics)>=18.5)
        {
            $ruet=DB::table('engineering_universities')
                ->where('engineering_universities.year_allowed','<=',$pass_year)
                ->join('units','engineering_universities.univ_id','=','units.univ_id')
                
               ->where('units.group_id','=',1)
               ->where('engineering_universities.univ_code','=','RUET')
               ->where('units.ssc_req_with_optional','<=',$ssc_gpa)
               ->where('units.hsc_req_with_optional','<=',$ssc_gpa)
               ->where('units.total_req_with_optional','<=',$ssc_gpa+$hsc_gpa)

               ->distinct()
               ->groupBy('univ_name');
        }
     }
       
        if(($Bangla+$English+$Physics+$Chemistry+$Mathmatics)>=24)
        {
            $buet=DB::table('engineering_universities')
                ->where('engineering_universities.year_allowed','<=',$pass_year)
                ->join('units','engineering_universities.univ_id','=','units.univ_id')
                
               ->where('units.group_id','=',1)
               ->where('engineering_universities.univ_code','=','BUET')
               ->where('units.ssc_req_with_optional','<=',$ssc_gpa)
               ->where('units.hsc_req_with_optional','<=',$ssc_gpa)
               ->where('units.total_req_with_optional','<=',$ssc_gpa+$hsc_gpa)

               ->distinct()
               ->groupBy('univ_name');
        }

       if(($English+$Physics+$Chemistry+$Mathmatics)>=19)
        {
      $kuet_butex=DB::table('engineering_universities')
                ->where('engineering_universities.year_allowed','<=',$pass_year)
                ->join('units','engineering_universities.univ_id','=','units.univ_id')
                
               ->where('units.group_id','=',1)
               ->where('engineering_universities.univ_code','=','KUET')
               ->orwhere('engineering_universities.univ_code','=','BUTEX')
               ->where('units.ssc_req_with_optional','<=',$ssc_gpa)
               ->where('units.hsc_req_with_optional','<=',$ssc_gpa)
               ->where('units.total_req_with_optional','<=',$ssc_gpa+$hsc_gpa)

               ->distinct()
               ->groupBy('univ_name');
        }

          
        $info =DB::table('universities')
               ->where('universities.year_allowed','<=',$pass_year)
               ->join('units','universities.univ_id','=','units.univ_id')
                
               ->where('units.group_id','=',1)

               ->where('units.ssc_req_with_optional','<=',$ssc_gpa)
               ->where('units.hsc_req_with_optional','<=',$hsc_gpa)
               ->where('units.total_req_with_optional','<=',$ssc_gpa+$hsc_gpa)

               ->where('units.ssc_req_without_optional','<=',$ssc_gpa_without_optional)
               ->where('units.hsc_req_without_optional','<=',$hsc_gpa_without_optional)
               ->where('units.total_req_without_optional','<=',$ssc_gpa_without_optional+$hsc_gpa_without_optional)
               ->union($buet)
               ->union($kuet_butex)
               ->union($ruet)
               ->union($cuet)
               ->distinct()
               ->groupBy('univ_name')
               ->get();   

       $info1=DB::table('universities')
               ->join('units','universities.univ_id','=','units.univ_id')
               ->where('units.group_id','=',1)
               ->distinct()
               ->groupBy('univ_name')
               ->get();

       $unselected_univ=[];
       $unselected_univ_id=[];
       $i=0;
       foreach ($info1 as $info1)
       {
     //   echo $info1->univ_name;
         $check=0;
         foreach($info as $test_info)
         {
    //      echo "$info1->univ_name $test_info->univ_name<br>";
          if($info1->univ_name==$test_info->univ_name)
          $check=1;
         }
         if($check==0)
         {
        //  echo $info1->univ_name;
          $unselected_univ[$i]=$info1->univ_name;
          $unselected_univ_id[$i]=$info1->univ_id;
          $i++;
         }
       }
       

      $group_id=1;    
 
  return View::make('students.univShow')->with('info', $info)->with('data',$data)->with('unselected_univ',$unselected_univ)->with('unselected_univ_id',$unselected_univ_id)->with('group_id',$group_id);
  
	}

  public function dept($univ_id,$unit_id,$group_id){

  
  $student = DB::table('science_student')->where('primary_id','=',1)->first();


    $gpa_bng=$student->Bangla;
    $gpa_bng=$this->convert($gpa_bng);
    $gpa_eng=$student->English;
    $gpa_eng=$this->convert($gpa_eng);
    $gpa_phy=$student->Physics;
    $gpa_phy=$this->convert($gpa_phy);
    $gpa_che=$student->Chemistry;
    $gpa_che=$this->convert($gpa_che);
    $gpa_mat=$student->Mathmatics;
    $gpa_mat=$this->convert($gpa_mat);
    $gpa_bio=$student->Biology;
    $gpa_bio=$this->convert($gpa_bio);
    $gpa_high=$student->Highest_gpa;
    $gpa_high=$this->convert($gpa_high);
    $gpa_ssc=$student->ssc_gpa;
    $gpa_hsc=$student->hsc_gpa;

   $temp_depts=DB::table('universities')
              ->join('units','universities.univ_id','=','units.univ_id')
              ->where('universities.univ_id','=', $univ_id)
              ->where('units.unit_id', '=', $unit_id)
              ->where('units.group_id','=',1)
              ->distinct()
              ->get();



    $departments = DB::table('science_departments')->get();

    $depts= [] ;
    $non_selected_depts=[];

    foreach ($temp_depts as $temp_dept) {
      foreach ($departments as $department) {
        if(   
           $department->unit_id==$temp_dept->unit_id
          )
        {
        $dept_name=$department->dept_name;

      if($department->all_sub=='yes')
      {
      if($gpa_bng>=$department->Bangla
            && $gpa_eng>=$department->English
            && $gpa_phy>=$department->Physics
            && $gpa_che>=$department->Chemistry
            && $gpa_mat>=$department->Mathmatics
            && $gpa_bio>=$department->Biology
            && $gpa_high>=$department->Highest_gpa
            && $gpa_ssc>=$department->ssc_req_with_optional
            && $gpa_hsc>=$department->hsc_req_with_optional
            && ($gpa_ssc+$gpa_hsc)>=$department->total_req_with_optional
              )
         {      
      $depts[]= DB::table('science_departments')
        ->where('science_departments.unit_id','=',$unit_id)
        ->where('science_departments.dept_name','=',$dept_name)
        ->distinct()
        ->get();
         }
         else
         {
         $non_selected_depts[]= DB::table('science_departments')
        ->where('science_departments.unit_id','=',$unit_id)
        ->where('science_departments.dept_name','=',$dept_name)
        ->distinct()
        ->get();
         }
        }

        else
      {
      if(($gpa_bng>=$department->Bangla && $department->Bangla!=0)
            || ($gpa_eng>=$department->English && $department->English!=0)
            || ($gpa_phy>=$department->Physics && $department->Physics!=0)
            || ($gpa_che>=$department->Chemistry && $department->Chemistry!=0)
            || ($gpa_mat>=$department->Mathmatics && $department->Mathmatics!=0)
            || ($gpa_bio>=$department->Biology && $department->Biology!=0)
            || ($gpa_high>=$department->Highest_gpa && $department->Highest_gpa!=0)
            && 
            ($gpa_ssc>=$department->ssc_req_with_optional
            && $gpa_hsc>=$department->hsc_req_with_optional
            && ($gpa_ssc+$gpa_hsc)>=$department->total_req_with_optional)
           )
         {      
      $depts[]= DB::table('science_departments')
        ->where('science_departments.unit_id','=',$unit_id)
        ->where('science_departments.dept_name','=',$dept_name)
        ->distinct()
        ->get();
         }
         else
         {
       $non_selected_depts[]= DB::table('science_departments')
        ->where('science_departments.unit_id','=',$unit_id)
        ->where('science_departments.dept_name','=',$dept_name)
        ->distinct()
        ->get();
         }
        }

    }
           }
    }
    return View::make('students.deptShow')->with('depts', $depts)->with('non_selected_depts',$non_selected_depts)->with('group_id',$group_id);

  }

   public function req_check($unit_id,$group_id,$dept_name)
   {

    $student = DB::table('science_student')->where('primary_id','=',1)->first();

    $gpa_bng=$student->Bangla;
    $gpa_bng=$this->convert($gpa_bng);
    $gpa_eng=$student->English;
    $gpa_eng=$this->convert($gpa_eng);
    $gpa_phy=$student->Physics;
    $gpa_phy=$this->convert($gpa_phy);
    $gpa_che=$student->Chemistry;
    $gpa_che=$this->convert($gpa_che);
    $gpa_mat=$student->Mathmatics;
    $gpa_mat=$this->convert($gpa_mat);
    $gpa_bio=$student->Biology;
    $gpa_bio=$this->convert($gpa_bio);
    $gpa_high=$student->Highest_gpa;
    $gpa_high=$this->convert($gpa_high);
    $gpa_ssc=$student->ssc_gpa;
    $gpa_hsc=$student->hsc_gpa;
    $gpa_ssc_without_4th_sub=$student->ssc_gpa_without_4th_subject;
    $gp_hsc_without_4th_sub=$student->hsc_gpa_without_4th_subject;

    $req_dept_gpa=[];
    $req_unit_gpa=[];
    $user_dept_gpa=[];
    $user_unit_gpa=[];
    $req_dept=[];

    $index_unit=0;
    $index_dept=0;
    $unit_req=DB::table('units')
          ->where('units.unit_id','=',$unit_id)
          ->first();
    
    $i=0;
    if($unit_req->with_optional=='yes')
    {
      $req_unit[$i]="SSC GPA (with optional)";
      $user_unit_gpa[$i]=$gpa_ssc;
      $req_unit_gpa[$i++]=$unit_req->ssc_req_with_optional;

 
      $req_unit[$i]="HSC GPA (with optional)";
      $user_unit_gpa[$i]=$gpa_hsc;
      $req_unit_gpa[$i++]=$unit_req->hsc_req_with_optional;

 
      $req_unit[$i]="SSC & HSC GPA (with optional)";
      $user_unit_gpa[$i]=$gpa_ssc+$gpa_hsc;
      $req_unit_gpa[$i++]=$unit_req->total_req_with_optional;
    }
    else
    {
      $i=0;

    
      $req_unit[$i]="SSC GPA (without optional)";
      $user_unit_gpa[$i]=$gpa_ssc_without_4th_sub;
      $req_unit_gpa[$i++]=$unit_req->ssc_req_without_optional;


    
      $req_unit[$i]="SSC & HSC GPA (without optional)";
      $user_unit_gpa[$i]=$gpa_ssc_without_4th_sub;
      $req_unit_gpa[$i++]=$unit_req->total_req_without_optional;

 

      $req_unit[$i]="SSC & HSC GPA (without optional)";
      $user_unit_gpa[$i]=$gpa_ssc_without_4th_sub+$gpa_ssc_without_4th_sub;
      $req_unit_gpa[$i++]=$unit_req->total_req_without_optional;
    }

    $dept_req= DB::table('science_departments')
        ->where('science_departments.unit_id','=',$unit_id)
        ->where('science_departments.dept_name','=',$dept_name)
        ->distinct()
        ->first();
      
  //  $req_dept[$index_dept++]=$dept_req->all_sub;

    $all_sub=$dept_req->all_sub;
    

    $i=0;
    

    if($dept_req->Highest_gpa>0)
    {  
    $req_dept[$i]="Any Science Subject";
    $user_dept_gpa[$i]=$gpa_high;
    $req_dept_gpa[$i++]=$dept_req->Highest_gpa;
    }
    if($dept_req->Bangla>0)
    {
    $req_dept[$i]="Bangla";
    $user_dept_gpa[$i]=$gpa_bng;
    $req_dept_gpa[$i++]=$dept_req->Bangla;
    }
    if($dept_req->English>0)
    {
    $req_dept[$i]="English";
    $user_dept_gpa[$i]=$gpa_eng;
    $req_dept_gpa[$i++]=$dept_req->English;
    }
    if($dept_req->Physics>0)
    {
    $req_dept[$i]="Physics";
    $user_dept_gpa[$i]=$gpa_phy;
    $req_dept_gpa[$i++]=$dept_req->Physics;
    }
    if($dept_req->Chemistry>0)
    {  
    $req_dept[$i]="Chemistry";
    $user_dept_gpa[$i]=$gpa_che;
    $req_dept_gpa[$i++]=$dept_req->Chemistry;
    }
    if($dept_req->Mathmatics>0)
    {
    $req_dept[$i]="Mathmatics";
    $user_dept_gpa[$i]=$gpa_mat;
    $req_dept_gpa[$i++]=$dept_req->Mathmatics;
    }
    if($dept_req->Biology>0)
    {  
    $req_dept[$i]="Biology";
    $user_dept_gpa[$i]=$gpa_bio;
    $req_dept_gpa[$i++]=$dept_req->Biology;
    }
    if($dept_req->ssc_req_with_optional>0)
    {  
    $req_dept[$i]="SSC GPA (with optional)";
    $user_dept_gpa[$i]=$gpa_ssc;
    $req_dept_gpa[$i++]=$dept_req->ssc_req_with_optional;
    }
    if($dept_req->hsc_req_with_optional>0)
    {  
    $req_dept[$i]="HSC GPA (with optional)";
    $user_dept_gpa[$i]=$gpa_hsc;
    $req_dept_gpa[$i++]=$dept_req->hsc_req_with_optional;
    }
    if($dept_req->total_req_with_optional>0)
    {  
    $req_dept[$i]="Total SSC & HSC GPA (with optional)";
    $user_dept_gpa[$i]=$gpa_ssc+$gpa_hsc;
    $req_dept_gpa[$i++]=$dept_req->total_req_with_optional;
    }

return View::make('students.dept_req')->with('req_unit',$req_unit)->with('all_sub',$all_sub)->with('req_dept',$req_dept)->with('req_dept_gpa',$req_dept_gpa)->with('req_unit_gpa',$req_unit_gpa)->with('user_unit_gpa',$user_unit_gpa)->with('user_dept_gpa',$user_dept_gpa);
   }

}