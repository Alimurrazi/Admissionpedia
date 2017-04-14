@extends ('addpedia.master')

@section('header')
	<h1 class="container">edit Unit For {{$unit->unit_name}}</h1>
@stop

@section('content')
	{{Form::open(['route'=>['unit.update' , $univ->univ_code, $unit->unit_name], 'method' => 'put'])}}

		
		<div class="form-group">
			{{Form::label('unit_name', 'Unit_name')}}
			{{Form::text('unit_name', $unit->unit_name, array("class" => "form-control"))}}
		</div>
		<div class="form-group">
			{{Form::label('univ_id', 'Univ_id')}}
			{{Form::number('univ_id', $unit->univ_id, array("class" => "form-control"))}}
		</div>
		<div class="form-group">
			{{Form::label('hsc_req', 'H.S.C req.')}}
			{{Form::text('hsc_req', $unit->hsc_req, array("class" => "form-control"))}}
		</div>
		<div class="form-group">
			{{Form::label('ssc_req', 'S.S.C req.')}}
			{{Form::text('ssc_req', $unit->ssc_req, array("class" => "form-control"))}}
		</div>
		<div class="form-group">
			{{Form::label('total', 'Total')}}
			{{Form::text('total', $unit->total, array("class" => "form-control"))}}
		</div>
		<div class="form-group">
			{{Form::label('exam_date', 'Exam Date')}}
			{{Form::text('exam_date', $unit->exam_date, array("class" => "form-control"))}}
		</div>
		<div class="form-group">
			{{Form::label('price', 'Price')}}
			{{Form::number('price', $unit->price, array("class" => "form-control"))}}
		</div>
		<div class="form-group">
			{{Form::label('day', 'Day')}}
			{{Form::text('day', $unit->day, array("class" => "form-control"))}}
		</div>
		<div class="form-group">
			{{Form::label('time', 'Time')}}
			{{Form::text('time', $unit->time, array("class" => "form-control"))}}
		</div>
		<div class="form-group">
			{{ Form::submit("Save", array("class"=>"btn btn-primary"))}}
		</div>		
		
	{{Form::close()}}
@stop

@section('footer')
	<br>
	<a href="{{url('addpedia/'.$univ->univ_code)}}">
		<button class="btn btn-default pull-right"><span class="glyphicon glyphicon-chevron-left"></span> Back</button>
	</a>
	<br>
@stop
