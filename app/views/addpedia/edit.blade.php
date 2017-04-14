@extends('addpedia.master')

@section('header')
	{{$univ->univ_name}}
@stop

@section('content')
	<a href="{{url('addpedia')}}">
		<button class="btn waves-effect waves-light right"><span class="glyphicon glyphicon-chevron-left"></span> Back</button>
	</a>
	{{ Form::open(['route'=>['university.update',$univ->univ_code],'method'=>'put'])}}
		<br><br>
		<div class="form-group">
			{{ Form::label('univ_code', 'Univ_code: ') }}
			{{ Form::text('univ_code', $univ->univ_code, array("class" => "form-control","required")) }}
		</div>
		<div class="form-group">
			{{ Form::label('univ_name', 'Univ_name: ') }}
			{{ Form::text('univ_name', $univ->univ_name, array("class" => "form-control","required")) }}
		</div>
		<div class="form-group">
			{{ Form::label('total_seat', 'Total_seat: ') }}
			{{ Form::number('total_seat', $univ->total_seat, array("class" => "form-control","required")) }}
		</div>
		<div class="form-group">
			{{ Form::label('last_apply_date', 'Last_apply_date: ') }}
			{{ Form::text('last_apply_date', $univ->last_apply_date, array("class" => "datepicker")) }}
		</div>
		<div class="form-group">
			{{ Form::submit("Save", array("class"=>"btn btn-primary"))}}
		</div>
	{{ Form::close()}}
@stop

@section('footer')
	<br>
	
@stop
