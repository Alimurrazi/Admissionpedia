@extends ('addpedia.master')

@section('header')
	<h1 class="container">{{$univ->univ_name}}</h1>
	<h1 class="container">{{$unit->unit_name}}</h1>
@stop

@section('content')
	
	{{Form::open(['route' => ['dept.store', $univ->univ_code, $unit->unit_name], 'method' => 'post'])}}

		<div class="form-group">
			{{Form::label('univ_id', 'Univ_id')}}
			{{Form::number('univ_id', $univ->univ_id, array("class" => "form-control uneditable-input"))}}
		</div>

		<div class="form-group">
			{{Form::label('unit_id', 'Unit_Id')}}
			{{Form::number('unit_id', $unit->unit_id, array("class" => "form-control"))}}
		</div>
		<div class="form-group">
			{{Form::label('dept_code', 'Dept Code')}}
			{{Form::text('dept_code', null, array("class" => "form-control"))}}
		</div>
		<div class="form-group">
			{{Form::label('dept_name', 'Dept Name')}}
			{{Form::text('dept_name', null, array("class" => "form-control"))}}
		</div>
		<div class="form-group">
			{{Form::label('seat', 'Seat')}}
			{{Form::number('seat', null, array("class" => "form-control"))}}
		</div>
		<div class="form-group">
			{{Form::label('requirements', 'requirements')}}
			{{Form::text('requirements', null, array("class" => "form-control"))}}
		</div>
		<div class="form-group">
			{{ Form::submit("Save", array("class"=>"btn btn-primary"))}}
		</div>		
		
	{{Form::close()}}
@stop

@section('footer')
	<br>
	<a href="{{url('addpedia/'.$univ->univ_code.'/'.$unit->unit_name)}}">
		<button class="btn btn-default pull-right"><span class="glyphicon glyphicon-chevron-left"></span> Back</button>
	</a>
	<br>
@stop
