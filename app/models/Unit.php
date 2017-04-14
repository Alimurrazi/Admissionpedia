<?php


class Unit extends Eloquent{

	protected $table = "units";
	protected $guarded = ['unit_id']; 

	public $timestamps = false;

}