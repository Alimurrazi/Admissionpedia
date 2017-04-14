@extends('addpedia.master')
@section('varsity')
@if($info!=null)
<style type="text/css">
h6{
	text-align: center;
  }
  .card{
  	text-align: center;
  	font-size: 5px;
  }
  h4{
	text-align: center;
	color: white;
  }
  .card{
  	background-color: white;
  	text-align: center;
  	font-size: 5px;
  }




	</style>
    <div class="panel-heading teal"><h4> Eligible University</h4></div>

	@foreach($info as $univ)

	 @if($univ->univ_name!="no_varsity")
	<div class="card col-md-6 hoverable" style="min-height:180px;max-width:640px;margin:0.1rem;">
	    <div class="card-content">
  <span class="card-title" style="font-size: 20px;">{{ link_to('entry/'.$univ->univ_id.'/'.$univ->group_id,$univ->univ_name) }}</span>
	      <br><h6>Seat: {{{ $univ->total_seat }}}</h6>
	      <h6>Last Apply Date:  {{{ $univ->last_apply_date }}}</h6>
	      @endif

	    </div>
	</div>
	@endforeach
@stop



<!-- @section('seat')
	@foreach($info as $univ)
		
		<ul class="collection">	
			<li class="collection-item">{{{ $univ->total_seat }}}</li>
		</ul>
	@endforeach
@stop


@section('apply')
	@foreach($info as $univ)
		<ul class="collection">	
			<li class="collection-item">Last Apply Date:  {{{ $univ->last_apply_date }}}</li>
		</ul>
	@endforeach
@stop -->
@else
@section('content')
	<h1>No Universities to show for you !</h1>
@stop
@endif

@section('non_selected_varsity')
  <div class="panel-heading teal"><h4>Not Eligible University</h4></div>
  <br>
  	    <?php
	    $i=0;
	    ?>
  	@foreach($unselected_univ as $unselected_univ)
	 @if($unselected_univ!="no_varsity")
	<div class="card col-md-6 hoverable" style="min-height:120px;max-width:640px;margin:0.1rem;">
	    <div class="card-content">
  <span class="card-title">{{ link_to('entryrej/'.$unselected_univ_id[$i].'/'.$group_id,$unselected_univ)}}</span>
	    </div>
	</div>
	  @endif
	    <?php
	    $i++;
	    ?>
	@endforeach
@stop


