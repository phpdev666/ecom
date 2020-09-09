@extends('layouts.admin')

@section('content')
<div class="col-sm-12">

    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

</div>
<!-- main content start-->
<div id="page-wrapper" style="min-height: 918px;">
   <div class="main-page">
      <div class="tables">
         <h2 class="title1">Tables</h2>
           @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
         <div class="bs-example widget-shadow" data-example-id="hoverable-table">
            <h4>News List:</h4>
            <a class="btn btn-success" style="float: right;" href="{{ url('news') }}">Send user mail</a>
            <table class="table table-hover datatable" id="tbid">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>massage</th>
                      <th>date</th>
                      <td>Show</td>
                    
                  </tr>
               </thead>
              
                  
                 
               <tbody>

               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


<script type="text/javascript">
  // $(function () {
    
    var table = $('#tbid').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('student-list') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'msg', name: 'msg'},
            {data: 'created_at', name: 'created_at'},
            
           
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    // });

    // var table = $('.yajra-datatable').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     ajax: "{{ route('student-list') }}",
    //     columns: [
    //         {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    //         {data: 'name', name: 'name'},
    //         {data: 'email', name: 'email'},
    //         {data: 'username', name: 'username'},
    //         {data: 'phone', name: 'phone'},
    //         {data: 'dob', name: 'dob'},
    //         {
    //             data: 'action', 
    //             name: 'action', 
    //             orderable: true, 
    //             searchable: true
    //         },
    //     ]
    // });
    
  });
</script>
<script>
   function myFunction($id) {
     var txt;
     var r = confirm("Press a button!");
     if (r == true) {
       window.location.href = "/Delete/user/"+$id;
     } else {
       txt = "You pressed Cancel!";
     }
     document.getElementById("demo").innerHTML = txt;
   }
</script>           


@endsection
