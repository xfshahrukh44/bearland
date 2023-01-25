@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Create New Subcategory</h3>
                    @can('view-'.str_slug('Subcategory'))
                    <a  class="btn btn-success pull-right" href="{{url('/admin/subcategory')}}"><i class="icon-arrow-left-circle"></i> Add Subcategory</a>
                    @endcan

                    <div class="clearfix"></div>
                    <hr>
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ url('/admin/subcategory') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('admin.subcategory.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin.footer')
    </div>
@endsection
