<?php   if ($products) {
                    foreach ($products as $key => $product) {

                    	?>
<div style="padding: 10px; font-size: 12px; display: flex; border: 1px solid rgb(165, 172, 178);">
<a style=" color: #000;" href="/products/<?php echo $product->product_id;?>" > 
 <img style="  max-width: 10vh;  max-height: 5vh;float: right;" src="{{url('uploads/productimage/',$product->image)}}">
<?php echo substr($product->productname, 0,30) ;?>
      <br>
     <b> <?php echo $product->sell_price ;?></b>

 </a>

 </div>

 <?php }}
