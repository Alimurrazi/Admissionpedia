@extends('addpedia.master')

@if($depts!=null)
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
    <h3 style=" text-align: center;background-color: #2F4F4F;color:white ">Eligible Subject</h3>

<!-- <h2>Your GPA fullfills these subject's requirement</h2> -->

<table>
   
   	    <?php
	    $i=0;
	    ?>	 
  <tr>
    <th style="width:50%">Department Name</th>
    <th style="width:50%">Total Seat</th>
  </tr>

    @foreach($depts as $dept)
    <tr>
    <td style="font-size: 18px" >{{ link_to('entry/'.'req_check/'.$dept[$i]->unit_id.'/'.$group_id.'/'.$dept[$i]->dept_name,$dept[$i]->dept_name) }}
    </td>
    <td style="font-size: 18px">{{$dept[$i]->seat}}</td> 
    </tr>
    @endforeach
 
</table>

<br/>
@endif


@if($non_selected_depts!=null)

  </style>
<h3 style=" text-align: center;background-color: #2F4F4F;color:white ">Not Eligible Subject</h3>

<table>
   
   	    <?php
	    $i=0;
	    ?>	
  <tr>
    <th>Department Name</th>
  </tr>

    @foreach($non_selected_depts as $non_selected_depts)
    <tr>
    <td style="font-size: 18px">
      
      {{ link_to('entry/'.'req_check/'.$non_selected_depts[$i]->unit_id.'/'.$group_id.'/'.$non_selected_depts[$i]->dept_name,$non_selected_depts[$i]->dept_name) }}

    </td>
    </tr>
    @endforeach

</table>

</body>
  @endif

  @stop
