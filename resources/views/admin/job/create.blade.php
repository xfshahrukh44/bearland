@extends('layouts.app')

@section('content')
<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">{{ isset($model) ? 'Edit Job' : 'Create Job' }}</h3>

                    <a class="btn btn-success pull-right" href="{{url('/admin/job/create')}}">
                        <i class="icon-arrow-left-circle"></i> View Jobs</a>

                    <div class="clearfix"></div>
                    <hr>
                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ isset($model) ? '/admin/job/update/'.$model->id : '/admin/job/store' }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('title') ? 'has-error' : ''}}">
                            <label for="title" class="col-md-12 control-label ">Title</label>
                            <div class="col-md-12">
                                <input class="form-control" required="required" name="title" type="text" value="{{ old('title',isset($model) ? $model->title : '') }}" id="title">
                                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('sub_title') ? 'has-error' : ''}}">
                            <label for="sub_title" class="col-md-12 control-label ">Sub Title</label>
                            <div class="col-md-12">
                                <input class="form-control" required="required" name="sub_title" type="text" value="{{ old('sub_title',isset($model) ? $model->sub_title : '') }}" id="sub_title">
                                {!! $errors->first('sub_title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('detail') ? 'has-error' : ''}}">
                            <label for="'detail" class="col-md-12 control-label ">Detail</label>
                            
                            <div class="col-md-12">
                                <textarea class="form-control" name="detail"  id="summary-ckeditor" value="{{ $model->detail ?? ''}}" >{{ $model->detail ?? ''}}</textarea>
                                {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('date') ? 'has-error' : ''}}">
                            <label for="date" class="col-md-12 control-label ">Submission Date</label>
                            <div class="col-md-12">
                                <input class="form-control" required="required" name="date" value="{{ old('date' , isset($model) ? $model->submission_date  : '') }}" type="date" id="date">
                                {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-lg-4 col-12 align-content-center">
                                <input class="btn btn-primary" type="submit" value="Create">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin.footer')
</div>
@endsection