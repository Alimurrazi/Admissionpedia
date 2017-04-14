<?php

/**
* 
*/
class University extends Eloquent
{
	protected $primaryKey = 'univ_id';
	protected $table = "universities";
	protected $guarded = ['univ_id']; 

	public $timestamps = false;
}
