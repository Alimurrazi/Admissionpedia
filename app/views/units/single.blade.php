@extends('addpedia.master')

@section('content')
	<h3>{{$univ->univ_name}}</h3>
	<br>
	<a href="{{url('addpedia/'.$univ->univ_code.'/create')}}">
		<button class="btn waves-effect waves-light">Creat Units</button>
	</a>
	<a href="{{url('addpedia')}}">
		<button class="btn btn-default pull-right"><span class="glyphicon glyphicon-chevron-left"></span> Back</button>
	</a>

	<br><br>
	
	<table class="table table-striped table-condensed table-bordered">
		<thead>
			<tr>
				<td><strong>Unit_name</strong></td>
				<td><strong>H.S.C Req.</strong></td>
				<td><strong>S.S.C Req.</strong></td>
				<td><strong>Total</strong></td>
				<td><strong>Exam Date</strong></td>
				<td><strong>Price</strong></td>
				<td><strong>Day</strong></td>
				<td><strong>Time</strong></td>
			</tr>
		</thead>
		<tbody>
			@foreach($unit as $key)
				<tr>
					<td>{{link_to('/addpedia/'. $univ->univ_code .'/'. $key->unit_name, $key->unit_name)}}</td>
					<td>{{$key->hsc_req}}</td>
					<td>{{$key->ssc_req}}</td>
					<td>{{$key->total}}</td>
					<td>{{$key->exam_date}}</td>
					<td>{{$key->price}}</td>
					<td>{{$key->day}}</td>
					<td>{{$key->time}}</td>
					<td>
						<a href="{{url('addpedia/'.$univ->univ_code.'/'.$key->unit_name. '/edit')}}">
							<button class="btn btn-floating waves-effect waves-light blue darken-3 tooltipped"
								data-position="top" data-delay="30" data-tooltip="Edit Me">
									<span class="glyphicon glyphicon-edit"></span>
							</button>
						</a>
					</td>
					<td>
						{{Form::open(['route'=>['unit.delete',$univ->univ_code, $key->unit_name],'method'=>'delete'])}}
							<!-- {{Form::submit("Delete", array("class"=>"btn btn-sm btn-block btn-danger"))}} -->
							<button class="btn btn-floating red darken-2 tooltipped" type="submit" value="Delete"
								data-position="top" data-delay="30" data-tooltip="Delete Me">
									<span class="glyphicon glyphicon-trash"></span>
							</button>
						{{Form::close()}}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop
	
