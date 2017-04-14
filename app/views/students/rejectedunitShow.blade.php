@extends('addpedia.master')

@section('unit')
	@foreach($units as $unit)
	<ul class="list-group">
		<li class="list-group-item list-group-item-success">
			<strong>Unit : {{ link_to('entryrej/'.$unit->univ_id.'/'.$unit->unit_id.'/'.
				$unit->group_id,$unit->unit_name) }}
			</strong>
		</li>
	</ul>
	@endforeach
@stop


