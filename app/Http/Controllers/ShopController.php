<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\inquiry;
use App\Models\Store;
use App\newsletter;
use App\Program;
use App\imagetable;
use SoapClient;
use App\Product;
use App\Category;
use App\Banner;
use DB;
use View;
use Session;
use App\Http\Traits\HelperTrait;
use App\orders;
use App\orders_products;

class ShopController extends Controller{

  public function __construct()
  {
      $logo = imagetable::select('img_path')
                           ->where('table_name','=','logo')
                           ->first();

    $favicon = imagetable::
                           select('img_path')
                           ->where('table_name','=','favicon')
                           ->first();

    View()->share('logo',$logo);
    View()->share('favicon',$favicon);

  }


  // create cart and add products function

  public function createCart(Request $request) {




      $id = $request->product_id;
      $qty = $request->qty;


      $cart = array();
      $cartId = $id;

      if(Session::has('cart')){
        $cart = Session::get('cart');
      }

      if($id!=""&&intval($qty)>0)
      {
        if(array_key_exists($cartId,$cart)){
          unset($cart[$cartId]);
      }

            $product_detail = Store::findOrFail($request->product_id);

            $cart[$cartId]['id'] = $id;
            $cart[$cartId]['name'] = $product_detail->name;
            $cart[$cartId]['baseprice'] = $product_detail->price;
            $cart[$cartId]['qty'] = $qty;


            Session::put('cart',$cart);
            Session::flash('message', 'Product Added to cart Successfully');
            Session::flash('alert-class', 'alert-success');
            return redirect('show-cart');


      }
      else {
        Session::flash('flash_message', 'Sorry! You can not proceed with 0 quantity');
        Session::flash('alert-class', 'alert-success');
        return back();

      }

  }
    // get cart from session and show it to user
    
  public function cart()
  {
      
    $cart = Session::get('cart');
   
    
    if(count($cart)>0){
    return view('shop-views.cart',['cart'=>$cart]);
    }else{
       Session::flash('flash_message', 'Sorry! No Products Found In Your Cart');
        Session::flash('alert-class', 'alert-success');
        return redirect('/'); 
    }


  }
  
  // remove products from cart
  public function removeItems($p_id)
  {
      $cart = Session::get('cart');
      if(array_key_exists($p_id,$cart)){
          unset($cart[$p_id]);      // remove item using product id
          Session::put('cart');
          
        Session::flash('flash_message', 'Product Removed From Your Cart Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect('show-cart'); 
          
      }
      
      
  }
  
  
  	public function updateCart(Request $request)
    {
        
     
        
			$cart = Session::get('cart');
			
			$cart = array();
			$index = 0;
			
			foreach($request->product_id as $product_id) {

					   $productFirstrow = Store::where('id',$product_id)->first();

						$cart[$product_id]['id'] = $product_id;
						$cart[$product_id]['name'] = $productFirstrow->product_title;
						$cart[$product_id]['baseprice'] = $productFirstrow->price;
						$cart[$product_id]['qty'] = $_POST['qty'][$index];

				        $index++;

			}

			Session::put('cart',$cart);

			Session::flash('message', 'Your Cart Updated Successfully');
			Session::flash('alert-class', 'alert-success');

			return back();

	}











}



?>
