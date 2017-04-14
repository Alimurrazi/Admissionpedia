@extends('addpedia.master')    	
@section('test')
   
   <head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

   <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
    font-size: 20px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #2F4F4F;
    color: white;
}

    body
    {
          h3 {
    background-color: #00ff00;
    } 
    }
    </style>
    </head>
     
     

    <body>
    <h3 style=" text-align: center ;background-color: #2F4F4F;color:white">Unit Requirement</h3>

         <table> 
  <tr>
    <th>Exam</th>
    <th>Required GPA</th>
    <th>Your GPA</th>
    <th>Status</th>
  </tr>


    
    @for($i=0;$i<sizeof($req_unit);$i++)
    <tr>
    <td>{{$req_unit[$i]}}</td>
    <td>{{$req_unit_gpa[$i]}}</td>
    <td>{{$user_unit_gpa[$i]}}</td>
    @if($user_unit_gpa[$i]>=$req_unit_gpa[$i])
    <td><i class="fa fa-check" style="color:green; "></i></td>
    @else
    <td><i class="fa fa-remove" style="color:red; ></td>
    @endif
    </tr>
    @endfor
    
</table>
     

     <br/>

    @if($req_dept!=null)
    <p>
    <h3 style=" text-align: center;background-color: #2F4F4F;color:white">Subject Requirement</h3>
    </p>
    <br/>

    @if($all_sub=='yes')
    <h3 style=" text-align: center;background-color: #2F4F4F;color:white;font-size:30px" >GPA must greater than or equal in below subjects and exams</h3>
    @else
    <h3 style=" text-align: center;background-color: #2F4F4F;color:white;font-size:30px">GPA must greater than or equal gpa in below subjects and exams</h3>
    @endif
    

     <table> 
  <tr>
    <th>Subject / Exam</th>
    <th>Required GPA</th>
    <th>Your GPA</th>
    <th>Status</th>
  </tr>


   
    @for($i=0;$i<sizeof($req_dept);$i++)
    <tr>
    <td>{{$req_dept[$i]}}</td>
    <td>{{$req_dept_gpa[$i]}}</td>
    <td>{{$user_dept_gpa[$i]}}</td>
    @if($user_dept_gpa[$i]>=$req_dept_gpa[$i])
    <td><i class="fa fa-check" style="color:green;"></i></td>
    @else
    <td><i class="fa fa-remove" style="color:red;"></i></td>
    @endif
    </tr>
    @endfor
    
</table>




    @endif
 </body>

@stop