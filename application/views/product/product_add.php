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
         <h3 style="text-align: center;margin-bottom: 40px;">Product</h3>
         <form method="post" class="form-horizontal" action="<?=base_url();?>Product/savedata">
            <div class="form-group">
               <label class="control-label col-sm-2" for="category_name">Category Name:</label>
               <div class="col-sm-10">
                  <input type="name" class="form-control" id="category_name" placeholder="Enter Category Name" name="category_name">
               </div>
            </div>
             <button><input type="submit" name="save" id="submit" value="Save Data"></button>

         </form>
      </div>
   </body>
</html>