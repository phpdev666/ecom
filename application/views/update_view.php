<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
   <body>
      <div class="container">
         <h2>Form</h2>
         <form method="post">
            <div class="form-group">
               <label for="first_name">First Name:</label>
               <input type="name" class="form-control" id="first_name" placeholder="Enter First Name" value="<?=$data->first_name ; ?>" name="first_name">
            </div>
            <div class="form-group">
               <label for="last_name">Last Name:</label>
               <input type="name" class="form-control" id="last_name" placeholder="Enter Last Name" value="<?=$data->last_name ; ?>" name="last_name">
            </div>
            <div class="form-group">
               <label for="email">Email:</label>
               <input type="email" class="form-control" id="email" placeholder="Enter email" value="<?=$data->email ; ?>" name="email">
            </div>
            <!-- <input type="hidden" name="id" value="<?=$data->id;?>"> -->
            <button><input type="update" name="update" id="update" value="Update Data"></button>
         </form>
      </div>
   </body>
</html>