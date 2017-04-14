<?php

/**
* 
*/
class UnitController extends \BaseController
{
		
	public function index($univ_code){

		$univ = University::where('univ_code',$univ_code)->first();     // return the row that matches url 
		//$unit = DB::select('select * from units where univ_id = ?', [$univ->univ_id]);
		$unit = Unit::where('univ_id', $univ->univ_id )->get();
		return View::make('units.single')
		->with('univ',$univ)
		->with('unit', $unit);
	}

	public function create($univ_code){
		$univ = University::where('univ_code',$univ_code)->first();
		return View::make('units.createUnit')->with('univ', $univ);
	}

	public function store($univ_code){
		$univ = University::where('univ_code',$univ_code)->first();

		$unit = new Unit;
		$unit->univ_id = Input::get('univ_id');
		$unit->unit_name = Input::get('unit_name');
		$unit->hsc_req = (float)Input::get('hsc_req');
		$unit->ssc_req = (float)Input::get('ssc_req');
		$unit->total = (float)Input::get('total');
		$unit->exam_date = Input::get('exam_date');
		$unit->price = Input::get('price');
		$unit->day = Input::get('day');
		$unit->time = Input::get('time');

		$unit->save();
		return Redirect::to('addpedia/'.$univ->univ_code)->with('message', 'succefully created unit '.$unit->unit_name);
	}

	public function edit($univ_code,$unit_name){
		$univ = University::where('univ_code',$univ_code)->first();
		$unit = Unit::where('univ_id', $univ->univ_id )
		->where('unit_name', $unit_name)->first();
		
		return View::make('units.editUnit')
		->with('unit', $unit)
		->with('univ', $univ);
	}

	public function update($univ_code,$unit_name){
		
		$univ = University::where('univ_code',$univ_code)->first();
		$unit = Unit::where('univ_id',$univ->univ_id)
			->where('unit_name', $unit_name)
				->update(['univ_id'=>Input::get('univ_id'),'unit_name'=>Input::get('unit_name'),
							'hsc_req'=>Input::get('hsc_req'),'ssc_req'=>Input::get('ssc_req'),
							'total'=>Input::get('total'), 'exam_date' => Input::get('exam_date'),
							'price' =>Input::get('price'), 'day' => Input::get('day'),
							'time' => Input::get('time')]);
		
		return Redirect::to('addpedia/'.$univ->univ_code)
			->with('message', 'succefully edited unit '.$unit_name);
	}

	public function delete($univ_code,$unit_name){
		$univ = University::where('univ_code',$univ_code)->first();
		$unit = Unit::where('univ_id', $univ->univ_id )
		->where('unit_name', $unit_name)->first();
		DB::delete('delete from units where unit_name=?',[$unit->unit_name]);
		DB::delete('delete from departments where unit_id=?',[$unit->unit_id]);

		return Redirect::to('addpedia/'.$univ->univ_code)
			->with('message', 'succefully deleted unit '.$unit_name);
	}


	public function show($univ_code,$unit_name){
		$univ = University::where('univ_code',$univ_code)->first();
		$unit = Unit::where('univ_id', $univ->univ_id )
		->where('unit_name', $unit_name)->first();

		return View::make('units.singleUnit')
			->with('univ',$univ)
			->with('unit', $unit);
	}
}





