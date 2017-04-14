<?php

/**
* 
*/
class MyController extends \BaseController
{
	
	public function index()
	{
		# code...

		$univ = University::all();
		return View::make('addpedia.index', ['univ' => $univ]);
	}

	public function create(){
		$univ = new University;
		return View::make('addpedia.create')->with('univ', $univ);
	}

	public function store(){
		$data = Input::all();

		$rules= [
			'total_seat' => ['regex:/^\d{1,5}$/'],
			'last_apply_date' => 'required'
		];

		$validator = Validator::make($data, $rules);

		if($validator->fails())
			return Redirect::back()->withInput()->withErrors($validator->messages());

		$university = University::create($data);
		return Redirect::route('university.index')->with("message","successfully created ". $university->univ_name);
	}

	public function edit($univ_code){
		$univ = University::where('univ_code',$univ_code)->first();
		return View::make('addpedia.edit')->with('univ',$univ);
	}

	public function update($univ_code){
		//return $univ_code;
		
		
		//$univ = DB::select('select univ_code from universities where univ_code=?', [$univ_code]);
		$univ = University::where('univ_code',$univ_code)
			->update(['univ_code'=>Input::get('univ_code'),'univ_name'=>Input::get('univ_name'),
						'total_seat'=>Input::get('total_seat'),
						'last_apply_date'=>Input::get('last_apply_date')]);
		//$univ->update(Input::all());

		// $univ->univ_code = Input::get('univ_code');
		// $univ->univ_name = Input::get('univ_name');
		// $univ->total_seat = Input::get('total_seat');
		// $univ->last_apply_date = Input::get('last_apply_date');
		// $univ->save();
		$edit = University::where('univ_code',$univ_code)->first();
		return Redirect::route('university.index')->
							with("message", "successfully edited ". $edit->univ_name);
	}

	public function delete($univ_code){
		$univ = University::where('univ_code',$univ_code)->first();
		//$unit = Unit::where('univ_id', $univ->univ_id);
		DB::delete('delete from universities where univ_code=?',[$univ_code]);
		DB::delete('delete from units where univ_id=?', [$univ->univ_id]);
		DB::delete('delete from departments where univ_id=?', [$univ->univ_id]);
		return Redirect::route('university.index')->with("message", "successfully deleted ".$univ->univ_name);	
	}



	public function show($univ_code){

		$univ = University::where('univ_code',$univ_code)->first();     // return the row that matches url 
		//$unit = DB::select('select * from units where univ_id = ?', [$univ->univ_id]);
		$unit = Unit::where('univ_id', $univ->univ_id )->get();
		return View::make('units.single')->with('unit', $unit);
	}

}





