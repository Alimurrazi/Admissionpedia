<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'PagesController@test');

Route::get('/home', 'PagesController@create');
Route::post('/home', ['as'=>'student.store', 'uses' => 'PagesController@store']);

Route::get('entryScience/{reg_no}/{year}',['as' => 'datapassScience', 'uses' => 'ScienceController@science']);
Route::get('entryCommerce/{reg_no}/{year}', ['as' => 'datapassCommerce', 'uses' =>'PagesController@commerce']);
Route::get('entryHumanities/{reg_no}/{year}', ['as' => 'datapassHumanities', 'uses' =>'PagesController@humanities']);

Route::post('entryS', ['as'=>'gpa.science', 'uses' => 'ScienceController@checkScience']);
Route::post('entryC', ['as'=>'gpa.commerce', 'uses' => 'CommerceController@checkCommerce']);
Route::post('entryH', ['as'=>'gpa.humanities', 'uses' => 'HumanitiesController@checkHumanities']);
 
Route::get('/test','PagesController@test');

Route::get('entryrej/{univ_id}/{group_id}','UnselectedController@univ');
Route::get('entryrej/{univ_id}/{unit_id}/{group_id}','UnselectedController@unit_req');
 
Route::get('entry/{univ_id}/{group_id}', 'PagesController@unit');
Route::get('entry/{univ_id}/{unit_id}/{group_id}', 'PagesController@dept');



Route::get('entry/science/{univ_id}/{unit_id}/{group_id}',['as'=>'science_dept','uses'=>'ScienceController@dept']);
Route::get('entry/commerce/{univ_id}/{unit_id}/{group_id}',['as'=>'commerce_dept','uses'=>'CommerceController@dept']);
Route::get('entry/humanities/{univ_id}/{unit_id}/{group_id}',['as'=>'humanities_dept','uses'=>'HumanitiesController@dept']);


Route::get('entry/req_check/{unit_id}/{group_id}/{dept_name}','PagesController@req_check');
Route::get('entry/science/req_check/{unit_id}/{group_id}/{dept_name}',
	['as'=>'science_dept_req','uses'=>'ScienceController@req_check']);
Route::get('entry/commerce/req_check/{unit_id}/{group_id}/{dept_name}',
	['as'=>'commerce_dept_req','uses'=>'CommerceController@req_check']);
Route::get('entry/humanities/req_check/{unit_id}/{group_id}/{dept_name}',
	['as'=>'humanities_dept_req','uses'=>'HumanitiesController@req_check']);






// routes to get universities
Route::get('addpedia', 'MyController@index' );    // okay index page

//redirect in index page when university created
Route::get('addpedia', ['as' => 'university.index', 'uses' => 'MyController@index']); //

Route::get('addpedia/create', 'MyController@create' );

Route::post('addpedia/create',['as' => 'university.store','uses'=> 'MyController@store']);   // making a route to handle form

Route::get('addpedia/{univ_code}/edit', 'MyController@edit');

Route::put('addpedia/{univ_code}', ['as' => 'university.update', 'uses' => 'MyController@update']);

Route::delete('addpedia/{univ_code}/delete', ['as' => 'university.delete', 'uses' => 'MyController@delete']);


//route to get units for corresponding universities using univ_id

Route::get('addpedia/{univ_code}', 'UnitController@index' );   // okay

//Route::get('addpedia/{univ_code}', ['as' => 'units.index', 'uses' => 'UnitController@index'])

Route::get('addpedia/{univ_code}/create', 'UnitController@create');

Route::post('addpedia/{univ_code}',['as' => 'unit.store','uses'=> 'UnitController@store']);   // making a route to handle form

Route::get('addpedia/{univ_code}/{unit_name}', 'UnitController@show');

Route::get('addpedia/{univ_code}/{unit_id}/edit', 'UnitController@edit');

Route::put('addpedia/{univ_code}/{unit_id}', ['as' => 'unit.update', 'uses' => 'UnitController@update']);

Route::delete('addpedia/{univ_code}/{unit_name}/delete', ['as' => 'unit.delete', 'uses' => 'UnitController@delete']);



//routes for department
Route::get('addpedia/{univ_code}/{unit_name}', 'DeptController@index');

Route::get('addpedia/{univ_code}/{unit_name}/create', 'DeptController@create');

Route::post('addpedia/{univ_code}/{unit_name}', ['as' => 'dept.store', 'uses' => 'DeptController@store']);

Route::get('addpedia/{univ_code}/{unit_id}/{dept_code}/edit', 'DeptController@edit');

Route::put('addpedia/{univ_code}/{unit_id}/{dept_code}', ['as' => 'dept.update', 'uses' => 'DeptController@update']);

Route::delete('addpedia/{univ_code}/{unit_name}/{dept_code}/delete', 
	['as' => 'dept.delete', 'uses' => 'DeptController@delete']);



// again

Route::get('demo', 'DemoController@view');


//<span class="card-title">{{ link_to('entry/'.$univ->univ_code.'/'.$univ->group_id,$univ->univ_name,$univ->group_id) }}</span>

//<strong>Department Name : {{{ $dept[$i]->dept_name }}}</strong>
//				 	<strong>Unit : {{ link_to('entry/'.$dept[$i]->dept_name.'/'.$dept[$i]->univ_code.'/'.$dept[$i]->unit_name.'/'.$group_id,$dept[$i]->dept_name) }}
//			</strong>
