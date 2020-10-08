<!DOCTYPE html>
<html lang="en">
<head>
  <title>Category Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style type="text/css">
  	.cat_name{
  		font-size: 25px;
  		margin-top: 60px;
  	}
  	button{
	    font-size: 20px;
    	background-color: #4a2d08c9;
    	color: black;
    	padding: 6px;
  	}
  </style>
</head>
<body>

<div class="container">
  <h2>Category Form</h2>

  <form method="post">
    <div class="form-group">
      <label for="category_name" class="cat_name">Category Name:</label>
      <input type="text" class="form-control" id="category_name" placeholder="Enter Category Name" value="<?php echo $data->category_name ; ?>" name="category_name">
    </div>
    <button><input type="submit" name="update" value="Update"/></button>
  </form>

</div>

</body>
</html>
