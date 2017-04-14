<?php

class Student extends Eloquent{

	protected $table = "student_reg";

	protected $guarded = ['reg_no'];

	public $timestamps = false;

}