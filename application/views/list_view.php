<!DOCTYPE html>
<html>
   <head>
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
         <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

     <style>
         table, td, th {  
         border: 1px solid #ddd;
         text-align: left;
         }
         table {
         border-collapse: collapse;
         width: 100%;
         }
         th, td {
         padding: 15px;
         }
         button{
         background-color: powderblue;
         font-size: 20px;
         padding: 10px;
         }
         .btn{
            float: right;
            padding: 10px;
            margin: 0px 100px 30px 0px;
            font-size: 25px;
            text-de coration: none;
         }
         a:visited{
         text-decoration:none;
         color: black;          
         }
         a:active{
         text-decoration:none;
         color: black;          
         }
         a:link{
         text-decoration:none;
         color: black;          
         }
         button:hover{
            background-color: pink;
         }
      </style>
   </head>
   <body>
      <h1>Name list</h1>
      <button class="btn"><a href="<?=base_url();?>Test/add/">Add</a></button>
      <table id="table_id">
         <thead>
            <tr>
               <th>#</th>
               <th>First Name</th>
               <th>Last Name</th>
               <th>Email</th>
               <th>Update</th>
               <th>Delete</th>
            </tr>
         </thead>
         <tbody>
            <?php
               $i=1; 
               foreach($update  as $value) { ?>
            <tr>
               <td><?=$i; ?></td>
               <td><?=$value->first_name; ?></td>
               <td><?=$value->last_name; ?></td>
               <td><?=$value->email; ?></td>
               <td><button><a href="<?=base_url();?>Test/update_data/<?=$value->id; ?>">Update</button></td>
               <td><button><a href="<?=base_url();?>Test/deletedata/<?=$value->id; ?>">Delete</button></td>
            </tr>
            <?php
               $i++;
               }
               ?>
         </tbody>
      </table>
 <!--     <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
      
    </div>
  </div> -->

</body>
</html>
<script type="text/javascript">
   $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
