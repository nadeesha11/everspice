@extends('admin.master')

@section('content')


 <!--<h1 class="m-5 p-2 ">DASHBOARD</h1>-->
     
     
   
           <h3 class="m-1 text-center " style="margin-bottom:15px!important">Registerd customers</h3>
           
        <div id="customer_names"  style="overflow-x:auto;">    
       <table id="cus" class="table table-striped m-5 p-3" style="width:100%" >
    <thead>
    <tr>
      <th ></th>
      <th >Name</th>
      <!--<th >Last Name</th>-->
      <th >UserName</th>
        <th>Email</th>
      <th >Phone</th>
       <th >Role</th>
      <!--<th >Handle</th>-->
    </tr>
  </thead>
  <tbody>
          
        @php

          $id = 1;

        @endphp
        @foreach ($users as $user)
    
       
    <tr>
       
      <td>{{$id++}}</td>
      <td>{{$user->first_name}} {{$user->last_name}}</td>
      <td>{{$user->username   }}</td>
      <td>{{$user->email   }}</td>
      <td>{{$user->phone   }}</td>
      <td>{{$user->role   }}</td>
   
      
    </tr>
 
    @endforeach

  </tbody>
  
  
</table>
</div> 




      <script>
      
      
           $(document).ready( function () {
           $('#cus').DataTable();
      });



      </script>
         
         

@endsection