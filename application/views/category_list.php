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
body {
  margin: 0;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 15%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 20px 20px 40px;
  text-decoration: none;
}

li a.active {
  background-color: #4CAF50;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}
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

<ul>
  <li><a  href="#contact">users</a></li>
  <li ><a href="<?=base_url();?>Category">Category</a></li>
  <li><a href="<?=base_url();?>Product">Product</a></li>
  <li><a href="#contact">Banners</a></li>
  <li><a href="#about">Newsletter</a></li>
  <li><a href="#about">Testimonials</a></li>
  <li><a href="#about">Settings</a></li>
  <li><a href="#about">Review</a></li>
</ul>

<div style="margin-left:15%;padding:1px 16px;">
<h1>Name list</h1>
      <button class="btn"><a href="<?=base_url();?>Category/add">Add</a></button>
      <table id="table_id">
         <thead>
            <tr>
               <th>#</th>
               <th>Category Name</th>
               <th>Active</th>
               <th>Update</th>
               <th>Delete</th>
            </tr>
         </thead>
         <tbody>
            <?php
               $i=1; 
               foreach($update as $value) { ?>
            <tr>
               <td><?=$i; ?></td>
               <td><?=$value->category_name; ?></td>
               <td><button>Active</button></td>
               <td><button><a href="<?=base_url();?>Category/update_data/<?=$value->category_id; ?>">Update</button></td>
               <td><button><a href="<?=base_url();?>Category/deletedata/<?=$value->category_id; ?>">Delete</button></td>
            </tr>
            <?php
               $i++;
               }
               ?>
         </tbody>
       </table>
</div>

</body>
</html>
<script type="text/javascript">
   $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
