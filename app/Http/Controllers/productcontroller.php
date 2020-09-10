<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\categort;
use Storage;
use DB;

class productcontroller extends Controller
{
     public function insertpro()
		   {
		   	 $catdata = DB::table('categort')
		            ->distinct()
		            ->get();
		   	
		   	return view('addpro',['catdata' => $catdata]);
		   }
   public function addproduct(request $request)
			   {
			           $this->validate($request, [
			            'modelno' => 'required',
			             'cat_id' => 'required',
			              'productname' => 'required',
			               'shot_description' => 'required',
			                'description' => 'required',
			                 'image' => 'required',
			                  'price' => 'required',
			                   'discount' => 'required',
			                    'discount_price' => 'required',
			                     'sell_price' => 'required',  
			        ]);
			           //fast image
			      	        $file = $request->file('image');
					        $file->move('uploads/productimage', $file->getClientOriginalName());


							$id=DB::table('product')->insertGetId(
						    ['modelno' => $request->input('modelno'),
						    'cat_id' => $request->input('cat_id'),
						    'productname' => $request->input('productname'),
						    'shot_description' => $request->input('shot_description'),
						    'description' => $request->input('description'),
						    'image' => $file->getClientOriginalName(),
						    'price' => $request->input('price'),
						    'discount' => $request->input('discount'),
						    'discount_price' => $request->input('discount_price'),
						    'sell_price' => $request->input('sell_price'),
						    'status' => 'active',	
						],
						);
				//  print_r($id);
				// exit();


					         //all images

					$images=array();
				    if($files=$request->file('imgname')){
				        foreach($files as $file){
				            $name=$file->getClientOriginalName();
				            $file->move('uploads/allimg',$name);
				            $images[]=$name;
				   DB::table('product_image')->insert(
										    ['imgname' => $name,'product_id'=>$id],
										);
				       }
				   }
         return redirect('/productilist')->with('success', 'Record inserted successfully.');

			   }
	public function productilist()
			{
				 // $tabdata = DB::table('product')
		   //          ->distinct()
		   //          ->get();

		        $tabdata = DB::table('categort')
			
            ->leftJoin('product', 'product.cat_id', '=', 'categort.cat_id')
            ->get();
			    // echo '<pre>';
			    // print_r($pro);
			    // exit();
				return view('listproduct',['tabdata' => $tabdata]);
			}
	public function delete($id)
		    {
		    	// Delete image
		       $get = DB::table('product')
	           ->where('product_id', $id)
	            ->get();

	        	@unlink('uploads/productimage/'.$get[0]->image);

					//delete all image
					 $get = DB::table('product_image')
					           ->where('product_id', $id)
					            ->delete();

					//delete data
		        DB::table('product')
		            ->where('product_id', $id)
		            ->delete();
		      
		    return redirect('/productilist')->with('success', 'Record Delete successfully.');
		    }
		public function show($id)
		{
			 $pro = DB::table('product')
			 ->where('product_image.product_id', $id)
            ->leftJoin('product_image', 'product_image.product_id', '=', 'product.product_id')
            ->get();
			    // echo '<pre>';
			    // print_r($users);
			    // exit();
						// $pro = DB::table('product')
						// 	        ->where('product_id', $id)
						//             ->get();
			return view('showpro',['pro' => $pro]);
		}
	public function edit($id)
			    {
			        // echo $id;

			        $get = DB::table('product')->where('product_id', $id)->get();

			            $cat = DB::table('categort')->get();
			        // print_r($cat);
			        // exit();
			        return view('editprodata', ['get' => $get,'cat' => $cat]);
			    }
        public function updatedata(request $request)
		    {
		    	$id = $request->input('product_id');
		     if ($request->file('image')) {
		     	$file = $request->file('image');
		     	 $file->move('uploads/productimage', $file->getClientOriginalName());
		     	 $img=$file->getClientOriginalName();
		     }
		     else {
		     	$img = $request->input('old_img');
		     }
		     
		        
		       // DB::table('categort')->whereIn('id', $id)->update($data);
		         
		        // echo "<pre>";
		        // print_r($data);
		        // exit();
		        $data=(['modelno' => $request->input('modelno'),
						    'cat_id' => $request->input('cat_id'),
						    'productname' => $request->input('productname'),
						    'shot_description' => $request->input('shot_description'),
						    'description' => $request->input('description'),
						    'image' => $img,
						    'price' => $request->input('price'),
						    'discount' => $request->input('discount'),
						    'discount_price' => $request->input('discount_price'),
						    'sell_price' => $request->input('sell_price'),
						    'status' => 'active',	
						]);

		        DB::table('product')
		            ->where('product_id', $id)
		            ->update($data);

		         return redirect('/productilist')->with('success', 'Record Updata  successfully.');
		    }

		    public function deletesubimag($id)
			    {
			    	 $get = DB::table('product_image')
		           ->where('image_id', $id)
		            ->get();
			    	// print_r($get[0]->imgname);
			    	// exit();
		            	$isd=$get[0]->product_id;
		        	@unlink('uploads/allimg/'.$get[0]->imgname);

						//delete all image
						 $get = DB::table('product_image')
						           ->where('image_id', $id)
						            ->delete();
					  return redirect('/edit/pro/'.$isd);
			    }
		    public function insertotherimage($id)
			    {
			    	return view("addimage" ,['id' => $id]);
			    }

		    public function insertimg(request $request)
				    {
				    	$id=$request->input('insert_id');
				    	
				    	        $this->validate($request, [
			            'imgname' => 'required',
			           
			       			 ]);
					   $file = $request->file('imgname');

			       
			        $file->move('uploads/allimg/', $file->getClientOriginalName());

			        DB::table('product_image')->insert(
		                    	    ['product_id' => $id,
		                    	    'imgname' => $file->getClientOriginalName(),
		                    	    ]
		                    	);

		          return redirect('/edit/pro/'.$id);
				    }
		public function active($id)
				    {
				    	$get = DB::table('product')->where('product_id', $id)->get();
				    
				    	if($get[0]->status=='active') {
				    		
				    		$data= (['status' => 'deactivate']);
				    		 DB::table('product')
						            ->where('product_id', $id)
						            ->update($data);
				    	}
				    	else{
				    	
				    		$data= (['status' => 'active']);
				    		 DB::table('product')
						            ->where('product_id', $id)
						            ->update($data);
				    	}
				    
				    	       

					 return redirect('/productilist')->with('success', 'Record Updata  successfully.');
				    }
		    
}
