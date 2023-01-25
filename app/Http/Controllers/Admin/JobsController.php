<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index(){
        $jobModel = Jobs::all();
        return view('admin.job.index')->with('data',$jobModel);
    }
    public function create(){
        return view('admin.job.create');
    }
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'detail' => 'required',
            'date' => 'required',
        ]);
        $jobModel = new Jobs();
        $jobModel->title = $request->title;
        $jobModel->sub_title = $request->sub_title;
        $jobModel->detail = $request->detail;
        $jobModel->submission_date = $request->date;
        $jobModel->save();
        if($jobModel){
            return redirect('admin/jobs')->with('message', 'Job added!');
        }
        else{
            return redirect('admin/jobs')->with('flash_message', 'Something Went Wrong!');
        }
       
    }

    public function edit($id)
    {
        $jobModel = Jobs::find($id);
        return view('admin.job.create')->with('model',$jobModel);
    }
    public function update($id, Request $request)
    {
        $jobModel = Jobs::find($id);
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'detail' => 'required',
            'date' => 'required',
        ]);
        
        $jobModel->title = $request->title;
        $jobModel->sub_title = $request->sub_title;
        $jobModel->detail = $request->detail;
        $jobModel->submission_date = $request->date;
        $jobModel->save();
        if($jobModel){
            return redirect('admin/jobs')->with('message', 'Job Updated!');
        }
        else{
            return redirect('admin/jobs')->with('flash_message', 'Something Went Wrong!');
        }
    }

    public function delete($id){
        $jobModel = Jobs::find($id)->delete();
        
        if($jobModel){
            return redirect('admin/jobs')->with('message', 'Job Deleted!');
        }
        else{
            return redirect('admin/jobs')->with('flash_message', 'Something Went Wrong!');
        }
    }
}
