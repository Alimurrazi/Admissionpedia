@extends('addpedia.master')

@section('form')

	<div class="panel panel-default">
		<div class="panel-heading teal">
		<h4>Fill The Info</h4>
		 </div>
		<div class="panel-body">
					
			{{ Form::open(['route'=>'student.store', 'method'=>'post'])}}
				<div class="input-field">
					{{ Form::label('reg_no', 'Registration No')}}
					{{ Form::text('reg_no',null, ['class' => '','required'])}}
					{{ $errors->first('reg_no')}}
				</div>
                

				<div class="input-field">
					
					<!-- {{ Form::text('blood',null ,array("class"=>"form-control")) }} -->
					{{ Form::select('board', [
						'' => 'Select Your Board',
						'Dhaka' => 'Dhaka', 
						'Rajshahi'=>'Rajshahi', 
						'Comilla'=>'Comilla', 
						'Barishal'=>'Barisahl',
						'Chittagong'=>'Chittagong',
						'Sylhet'=>'Sylhet', 
						'Dinajpur'=>'Dinajpur', 
						'Madrasa'=>'Madrasa'
					], null, array('class' => ''))}}
					
				</div>
				<div class="input-field">
					<!-- {{ Form::text('blood',null ,array("class"=>"form-control")) }} -->
					{{ Form::select('year', [
						'' => 'Select Passed Year',
						date('Y') => date('Y'),
						date('Y')-1 => date('Y')-1
					], null, array('class' => ''))}}
				</div>
				
				<div class="input-field">
					<!-- {{ Form::text('blood',null ,array("class"=>"form-control")) }} -->
					{{ Form::select('type', [
						'' => 'Select Type',
						'HSC' => 'HSC',
						'A-level' => 'A-level',
						'Foreigner' => 'Foreigner' 
					], null, array('class' => ''))}}

				</div>
				<div class="input-field">
					<!-- {{ Form::text('blood',null ,array("class"=>"form-control")) }} -->
					{{ Form::select('group', [
						'' => 'Select Group',
						'Science' => 'Science',
						'Commerce' => 'Commerce',
						'Humanities' => 'Humanities'
					], null, array('class' => ''))}}
					
				</div>

				<div class="input-field">
					{{ Form::submit('Submit', ['class'=>'btn btn-primary right'])}}
				</div>

			{{ Form::close()}}
		</div>
	</div>
@stop