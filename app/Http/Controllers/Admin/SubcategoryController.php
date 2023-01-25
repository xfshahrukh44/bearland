<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use Image;
use File;

class SubcategoryController extends Controller
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
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $subcategory = Subcategory::where('parent_category', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $subcategory = Subcategory::paginate($perPage);
            }

           
        }
         return view('admin.subcategory.index', compact('subcategory'));
       // return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('admin.subcategory.create');
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
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'parent_category' => 'required',
			'name' => 'required',
			'image'=>'required'
		]);

            $subcategory = new subcategory($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $subcategory_path = 'uploads/subcategories/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($subcategory_path) . DIRECTORY_SEPARATOR. $profileImage);

                $subcategory->image = $subcategory_path.$profileImage;
            }
            
            $subcategory->save();

            return redirect('admin/subcategory')->with('flash_message', 'Subcategory added!');
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
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $subcategory = Subcategory::findOrFail($id);
            return view('admin.subcategory.show', compact('subcategory'));
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
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $subcategory = Subcategory::findOrFail($id);
            return view('admin.subcategory.edit', compact('subcategory'));
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
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'parent_category' => 'required',
			'name' => 'required',
			'image'=>'required'
		]);
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $subcategory = subcategory::where('id', $id)->first();
            $image_path = public_path($subcategory->image); 
            
            if(File::exists($image_path)) 
            {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/subcategories/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/subcategories/'.$fileNameToStore;               
        }
           

            $subcategory = Subcategory::findOrFail($id);
             $subcategory->update($requestData);

             return redirect('admin/subcategory')->with('flash_message', 'Subcategory updated!');
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
        $model = str_slug('subcategory','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Subcategory::destroy($id);

            return redirect('admin/subcategory')->with('flash_message', 'Subcategory deleted!');
        }
        return response(view('403'), 403);

    }
}
