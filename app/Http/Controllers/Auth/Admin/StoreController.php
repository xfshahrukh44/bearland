<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Category;
use App\Models\Store;
use Illuminate\Http\Request;
use Image;
use File;
use DB;

class StoreController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('store','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $store = Store::where('category', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('sku', 'LIKE', "%$keyword%")
                ->orWhere('length', 'LIKE', "%$keyword%")
                ->orWhere('height', 'LIKE', "%$keyword%")
                ->orWhere('width', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('color', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $store = Store::paginate($perPage);
            }
            $categories = DB::table('categories')->get();
            return view('admin.store.index', compact('store','categories'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('store','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $categories = Category::all();
              
            $sub_categories = DB::table('subcategories')->get();
            
            return view('admin.store.create',compact('categories','sub_categories'));
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('store','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request,
              [
        			'category' => 'required',
        			'name' => 'required',
        			'slug' => 'required',
        			'price' => 'required',
        			'sku' => 'required',
        			'length' => 'required',
        			'height' => 'required',
        			'width' => 'required',
        			'image' => 'required',
                     'detail'=>'required',
                     'unit_of_measure'=>'required',
                     'sub_category'=>'required'
		          ]);

            $store = new store($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');

                //make sure yo have image folder inside your public
                $store_path = 'uploads/stores/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName;

                Image::make($file)->save(public_path($store_path) . DIRECTORY_SEPARATOR. $profileImage);

                $store->image = $store_path.$profileImage;
            }
            $store->unit_of_measure = $request->unit_of_measure;
            $store->detail = $request->detail;
            $store->sub_category = $request->sub_category;
            $store->save();

            return redirect('admin/store')->with('flash_message', 'Store added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('store','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $store = Store::findOrFail($id);
            return view('admin.store.show', compact('store'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('store','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $store = Store::findOrFail($id);
            $categories = Category::all();
            $sub_categories = DB::table('subcategories')
                                ->get();
                                
            return view('admin.store.edit', compact('store','categories','sub_categories'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('store','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
      			'category' => 'required',
      			
      			'name' => 'required',
      			'slug' => 'required',
      			'price' => 'required',
      			'sku' => 'required',
      			'length' => 'required',
      			'height' => 'required',
      			'width' => 'required',
                'unit_of_measure'=>'required',
                'detail'=>'required'
		  ]);

            $requestData = $request->all();


        if ($request->hasFile('image')) {

            $store = store::where('id', $id)->first();
            $image_path = public_path($store->image);

            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/stores/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/stores/'.$fileNameToStore;
        }
            $requestData['unit_of_measure'] = $request->unit_of_measure;
            $requestData['detail'] = $request->detail;
            $requestData['sub_category'] = $request->sub_category;

            $store = Store::findOrFail($id);
            $store->update($requestData);
            return redirect('admin/store')->with('flash_message', 'Store updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('store','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Store::destroy($id);

            return redirect('admin/store')->with('flash_message', 'Store deleted!');
        }
        return response(view('403'), 403);

    }
    
    public function getSub($id)
    {
        
        
        $data = DB::table('subcategories')
                ->where('parent_category',$id)
                ->get();
                
        return json_encode($data);
                
    }

    
}
