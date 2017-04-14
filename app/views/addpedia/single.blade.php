@extends('addpedia.master')
@section('header')
	Welcome to, <strong></strong>
@stop

@section('content')
	{{ Form::open() }}
		{{Form::label('unit','Unit: ')}}
		{{Form::text('')}}
		{{Form::submit("add", array("class"=>"btn btn-default"))}}
	{{ Form::close()}}
@stop
	