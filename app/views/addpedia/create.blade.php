
@extends('addpedia.master')
@section('header')
	
@stop

@section('content')
	<a href="{{url('addpedia')}}">
		<button class="btn waves-effect waves-light right"><span class="glyphicon glyphicon-chevron-left"></span> Back</button>
	</a>
	{{ Form::open(['route'=>'university.store','method'=>'post'], array("class"=>"univ"))}}
		<div class="input-field">
			{{ Form::label('univ_code', 'Univ_code') }}
			{{ Form::text('univ_code',null ,array("class"=>"","required","style"
				=> "text-transform:uppercase")) }}

		</div>
		<div class="input-field">
			{{ Form::label('univ_name', 'Univ_name') }}
			{{ Form::text('univ_name',null ,array("class"=>"","required")) }}
		</div>
		<div class="input-field">
			{{ Form::label('total_seat', 'Total Seat (In Digit)') }}
			{{ Form::number('total_seat',null ,array("class"=>"","required")) }}
			{{ $errors->first('total_seat')}}
		</div>
		<div class="input-field">
			{{ Form::label('last_apply_date', 'Last_apply_date') }}
			{{ Form::text('last_apply_date',null ,array("class"=>"datepicker")) }}
			{{ $errors->first('last_apply_date')}}
		</div>
		<div class="input-field">
			{{ Form::submit("Create", array("class"=>"btn"))}}			
		</div>		
	{{ Form::close()}}

@stop 

@section('footer')
	
	
@stop

