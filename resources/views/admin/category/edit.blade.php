@extends('layouts.app')
@section('content')
    <div class="container-fluid bg-white mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Edit Category #{{ $category->id }}</h3>
                    
                        <a class="btn btn-success pull-right" href="{{ url('/admin/category') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    
                    <div class="clearfix"></div>
                    <hr>

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::model($category, [
                        'method' => 'PATCH',
                        'url' => ['/admin/category', $category->id],
                        'files' => true
                    ]) !!}

                    @include ('admin.category.form', ['submitButtonText' => 'Update'])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
        </div>
        @include('layouts.admin.footer')
    </div>
@endsection
