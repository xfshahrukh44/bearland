@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">{{ $store->name }}</h3>

                        <a class="btn btn-success pull-right" href="{{ url('/admin/store') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>

                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $store->id }}</td>
                            </tr>
                            <tr><th> Category </th><td> {{ $store->category }} </td></tr><tr><th> Name </th><td> {{ $store->name }} </td></tr><tr><th> Slug </th><td> {{ $store->slug }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @include('layouts.admin.footer')
    </div>
@endsection
