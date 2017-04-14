@extends ('addpedia.master')

@section('content')
	
	<h3>Create Unit For {{$univ->univ_name}}</h3>

	<br>

	{{Form::open(['route' => ['unit.store', $univ->univ_code], 'method' => 'post'])}}

		<div class="form-group">
			{{Form::label('univ_id', 'Univ_id')}}
			{{Form::number('univ_id', $univ->univ_id, array("class" => "form-control"))}}
		</div>

		<div class="input-field">
			{{Form::label('unit_name', 'Unit_name')}}
			{{Form::text('unit_name', null, array("class" => "","required"))}}
		</div>
		<div class="input-field">
			{{Form::label('hsc_req', 'H.S.C req.')}}
			{{Form::text('hsc_req', null, array("class" => "","required"))}}
		</div>
		<div class="input-field">
			{{Form::label('ssc_req', 'S.S.C req.')}}
			{{Form::text('ssc_req', null, array("class" => "","required"))}}
		</div>
		<div class="input-field">
			{{Form::label('total', 'Total')}}
			{{Form::text('total', null, array("class" => "","required"))}}
		</div>
		<div class="input-field">
			{{Form::label('exam_date', 'Exam Date')}}
			{{Form::text('exam_date', null, array("class" => "datepicker"))}}
		</div>
		<div class="input-field">
			{{Form::label('price', 'Price (Tk)')}}
			{{Form::number('price', null, array("class" => ""))}}
		</div>
		<div class="input-field">
			{{Form::label('day', 'Day')}}
			{{Form::text('day', null, array("class" => "","required"))}}
		</div>
		<div class="input-field">
			{{Form::label('time', 'Time')}}
			{{Form::text('time', null, array("class" => "","required"))}}
		</div>
		<div class="input-field">
			{{ Form::submit("Create", array("class"=>"btn btn-primary"))}}
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


