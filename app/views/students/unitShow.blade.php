@extends('addpedia.master')

@section('test')


<head>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: center;
    padding: 8px;
}


tr:hover{background-color:#f5f5f5}


th {
    background-color: #008080;
    color: white;
    font-size: 30px;
}
</style>
</head>
<body>

  </style>

<!-- <h2>Your GPA fullfills these subject's requirement</h2> -->

<table>
   
   	    <?php
	    $i=0;
	    ?>	
  <tr>
    <th style="width:25%">Unit Name</th>
    <th style="width:25%">Form Price</th>
    <th style="width:25%">Date of Exam</th>
    <th style="width:25%">Exam Time</th>
  </tr>
    
    @foreach($units as $unit)
    <tr>
    <td style="font-size: 18px" >{{ link_to('entry/'.$unit->univ_id.'/'.$unit->unit_id.'/'.
				$unit->group_id,$unit->unit_name) }}
    </td>
    <td style="font-size: 18px">{{$unit->price}}</td>
    <td style="font-size: 18px">{{$unit->exam_date}}</td>
    <td style="font-size: 18px">{{ $unit->day }} at {{ $unit->time }}</td>
    </tr>
    @endforeach

</table>

<br/>
@stop

