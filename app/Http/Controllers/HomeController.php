<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inquiry;
use App\schedule;
use App\newsletter;
use App\post;
use App\banner;
use App\imagetable;
use App\Page;
use DB;
use App\Models\Subcategory;
use App\Category;
use Mail;
use View;
use App\Models\Store;
use Session;
use App\Http\Helpers\UserSystemInfoHelper;
use App\Http\Traits\HelperTrait;
use App\Jobs;
use Auth;
use App\Profile;


class HomeController extends Controller
{
    use HelperTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     // use Helper;

    public function __construct()
    {
        //$this->middleware('auth');

        $logo = imagetable::
                     select('img_path')
                     ->where('table_name','=','logo')
                     ->first();

        $favicon = imagetable::
                     select('img_path')
                     ->where('table_name','=','favicon')
                     ->first();

        View()->share('logo',$logo);
        View()->share('favicon',$favicon);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = DB::table('banners')->get();

        $cms_home1 = DB::table('pages')->where('id', 1)->first();

        $products = DB::table('products')->get()->take(10);

        $testimonials = DB::table('testimonials')->get();
        return view('welcome', compact('banner', 'cms_home1','testimonials'));
    }


    public function contactUsSubmit(Request $request)
    {
        $inquiry = new inquiry;
        $inquiry->inquiries_fname = $request->name;

        $inquiry->inquiries_email = $request->email;
        $inquiry->inquiries_phone = $request->phone;
        $inquiry->extra_content = $request->message;

        $inquiry->save();

        Session::flash('message', 'Thank you for contacting us. We will get back to you asap');
        Session::flash('alert-class', 'alert-success');
        return back();
    }

    public function newsletterSubmit(Request $request)
    {
        $is_email = newsletter::where('newsletter_email',$request->email)->count();

        if($is_email == 0) {

        $inquiry = new newsletter;
        //$inquiry->newsletter_name = $request->name;
        $inquiry->newsletter_email = $request->email;
        //$inquiry->newsletter_message = $request->comment;
        $inquiry->save();
        Session::flash('message', 'Thank you for contacting us. We will get back to you asap');
        Session::flash('alert-class', 'alert-success');
        return redirect('/');

        } else {
            Session::flash('flash_message', 'email already exists');
            Session::flash('alert-class', 'alert-success');
            return redirect('/');
        }

    }

    public function aboutUs()
    {
        $pageContent = DB::table('pages')->where('page_name', 'LIKE', "%Home%")->first();
        return view('about-us', compact('pageContent'));
    }

    public function specialOffer()
    {
        $cms_home2 = DB::table('pages')->where('id', 2)->first();
        return view('special-offer',compact('cms_home2'));
    }

    public function careers()
    {

        $pageContent = Page::where('page_name', 'LIKE', "%career%")->first();
        $jobModel = Jobs::all();
        return view('careers', compact('jobModel','pageContent'));
    }

    public function contactUs()
    {
        return view('contact-us');
    }

    public function shop(Request $request)
    {
        $category_id = $request->category_id;
        $sub_category_id = $request->sub_category_id;

        if($category_id){
            $products = Store::where('sub_category','=',$category_id)->paginate(10);
        }else if ($sub_category_id) {
            $products = Store::where('sub_category','=',$sub_category_id)->paginate(10);
        }else{
            $products = Store::paginate(10);
        }
        $sub_cat  =  Subcategory::all();
        $category = Category::all();

        $mainCat =  Subcategory::with('category:id,name')->select('id','name','parent_category')->where('id',$category_id)->first();

        return view('store',compact('products','sub_cat','category','mainCat'));
    }
    public function storeDetail($id)
    {
     $slug = "";
      $get_product_detail = Store::findOrFail($id);
      return view('store-details',compact('slug','get_product_detail'));
    }

    public function termsConditions()
    {
      return view('terms-conditions');
    }

    public function filterItems(Request $request)
    {
        $products = DB::table('stores')
                        ->where('category','=', $request->category)
                        ->where('sub_category','=', $request->sub_category)
                        ->where('pack_size','like','%'.$request->pack_size.'%')
                        ->where('unit_of_measure','like','%'.$request->measure_unit.'%')
                       ->paginate(30);
        $mainCat =  Subcategory::with('category:id,name')->select('id','name','parent_category')->where('id',$products[0]->sub_category)->first();
        $sub_cat  =  Subcategory::all();
        $category = Category::all();

        // dd($products,$mainCat);
        // $data = "";
        // if(count($products) > 0){
        //   foreach($products as $product){
        //       $product_image = DB::table('subcategories')->where('id',$product->sub_category)->first()->image;

        //       $data .= '<tr><td><a href="/store-details/'.$product->id.'")" class="pro_small_box"><img src="'.$product_image.'" class="img-responsive" width="100px;"/></a></td><td>'.$product->name.'</td>
        //                   <td>'.$product->vendor_stock_number.'</td><td>'.$product->size." ? : ".$product->pack_size.'</td><td><a data-fancybox="" tabindex="0" href="asset(`images/smart-locker-img-1.png`)"><img src="asset(`images/variation-img-1.png`)"/></a>
        //                         <a data-fancybox="" tabindex="0" href="asset(`images/smart-locker-img-2.png`)"><img src="asset(`images/variation-img-2.png`)"/></a></td><td>'.$product->unit_of_measure.'</td><td>$'.$product->price.'</td>
        //                   <td><a href="url(`store-details/`.$product->id)" class="btn_red"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Add</a></td></tr>';
        //   }
        // }


        // return response()->json($data);

      return view('store',compact('products','sub_cat','category','mainCat'));

    }

    public function MainSearch(Request $request){
        $products = DB::table('stores')
                        ->where('name','like','%'.$request->search.'%')
                        ->orWhere('vendor_stock_number', $request->search)
                       ->paginate(30);
        $sub_cat  =  Subcategory::all();
        $category = Category::all();
        $mainCat =  Subcategory::with('category:id,name')->select('id','name','parent_category')->where('id',$products[0]->sub_category)->first();
        return view('store',compact('products','sub_cat','category','mainCat'));
    }



    function csvToArray($filename = '', $delimiter = ',')
    {
    if (!file_exists($filename) || !is_readable($filename))
        return false;

    $header = null;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== false)
    {


        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
        {

          if (!$header)
                $header = $row;
            else{
                $data[] = array_combine($header, $row);
            }
        }
        fclose($handle);
    }

    return $data;
    }


    public function importCsv()
    {
        //$file = public_path('csv1.csv');



        $customerArr = $this->csvToArray($file);


        DB::table('stores')->insert($customerArr);

        Session::flash('message', 'Csv Uploaded Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/');

    }


    public function catalogRequest()
    {
        return view('catalog-request');
    }

    public function catalogRequestSubmit(Request $request)
    {

        $data_array = array(
        'user_id'=>Auth::user()->id,
        'company'=>$request->company,
        'title'=>$request->title,
        'content'=>$request->content,
        'address'=>$request->address2,
        'postal'=>$request->zip_code,
        'city'=>$request->city,
        'state'=>$request->state,
        'country'=>$request->country,
        'phone_no'=>$request->phone_no
        );

        DB::table('profiles')->where('user_id',Auth::user()->id)->update($data_array);


        Session::flash('message', 'Catalog Request Submitted!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/');

    }

    public function GetSubCategories(Request $request){

        $sub_categories = Subcategory::where('parent_category',$request->category_id)->get();
        $data = '';
        foreach($sub_categories as $sub_category){

            // $data += "<option value='". $sub_category->id ."'>.$sub_category->name.</option>";
             $data .= "<option value='". $sub_category->id ."'>".$sub_category->name."</option>";
        }

        return response()->json($data);
    }









}
