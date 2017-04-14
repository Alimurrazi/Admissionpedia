@extends('addpedia.master')
@section('content')
	
	<a style="margin-top:3%;" class="right" href="{{url('addpedia/create')}}">
		<button class="btn waves-effect waves-light btn-large">Creat Universities</button>
	</a>		


	<h1>List Of Universities</h1>

	<table class="table table-condensed table-striped table-bordered">
			<thead>
				<tr>
					<td><strong>Univ_code</strong></td>
					<td><strong>Univ_name</strong></td>
					<td><strong>Total_seat</strong></td>
				</tr>
			</thead>
			<br>
			<tbody>
				@foreach($univ as $key)
					<tr>
						<td><strong>{{link_to('/addpedia/'. $key->univ_code, $key->univ_code)}}</strong></td>

						<td>{{ $key->univ_name }}</td>
						<td>{{ $key->total_seat}}</td>
						<td>
							<a href="{{url('addpedia/'.$key->univ_code.'/edit')}}">
								<button class="btn btn-floating waves-effect waves-light blue darken-3 tooltipped"
								data-position="top" data-delay="30" data-tooltip="Edit Me">
									<span class="glyphicon glyphicon-edit"></span>
								</button>
							</a>
						</td>
						<td>
							{{Form::open(['route'=>['university.delete',$key->univ_code],'method'=>'delete'])}}
								<!-- {{Form::submit("Delete", array("class"=>"btn btn-floating"))}} -->
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


