@extends('addpedia.master')

@section('header')

	<div class="container">		
		<h1><strong>{{$univ->univ_name}}</strong></h1>
		<h3>Unit - {{$unit->unit_name}}</h3>
	</div>

@stop

@section('content')
	
	<br><br>
	<a href="{{url('addpedia/'.$univ->univ_code.'/'.$unit->unit_name.'/create')}}">
		<button class="btn btn-default">Creat Department</button>
	</a>

	<a href="{{url('addpedia/'.$univ->univ_code)}}">
		<button class="btn btn-default pull-right"><span class="glyphicon glyphicon-chevron-left"></span> Back</button>
	</a>
	<br><br>

	<table class="table table-condensed table-striped table-bordered">
		<thead>
			<tr>
				<td><strong>Dept_Code</strong></td>
				<td><strong>Dept_Name</strong></td>
				<td><strong>Seats</strong></td>
				<td><strong>Requirements</strong></td>
			</tr>
		</thead>
		<tbody>
			@foreach($dept as $key)
			<tr>
				<td>{{ $key->dept_code }}</td>
				<td>{{$key->dept_name}}</td>
				<td>{{$key->seat}}</td>
				<td>{{$key->requirements}}</td>
				<td>
					<a href="{{url('addpedia/'.$univ->univ_code.'/'.$unit->unit_name.'/'.$key->dept_code.'/edit')}}">
						<button class="btn btn-block btn-sm btn-primary">Edit</button>
					</a>
				</td>
				<td>
					{{Form::open(['route'=>['dept.delete',$univ->univ_code,$unit->unit_name,$key->dept_code],'method'=>'delete'])}}
						{{Form::submit("Delete", array("class"=>"btn btn-sm btn-block btn-danger"))}}
					{{Form::close()}}
				</td>
			</tr>	
			@endforeach
		</tbody>

	</table>
@stop