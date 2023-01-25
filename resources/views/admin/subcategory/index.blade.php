@extends('layouts.app')

@push('before-css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Subcategory</h3>
                   
                        <a class="btn btn-success pull-right" href="{{ url('/admin/subcategory/create') }}"><i
                                    class="icon-plus"></i> Add Subcategory</a>
             
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Parent Category</th><th>Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subcategory as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->parent_category }}</td><td>{{ $item->name }}</td>
                                    <td>
                                        @can('view-'.str_slug('Subcategory'))
                                            <a href="{{ url('/admin/subcategory/' . $item->id) }}"
                                               title="View Subcategory">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                       
                                            <a href="{{ url('/admin/subcategory/' . $item->id . '/edit') }}"
                                               title="Edit Subcategory">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                     
                                            <form method="POST"
                                                  action="{{ url('/admin/subcategory' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Subcategory"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                 


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $subcategory->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @include('layouts.admin.footer')
    </div>

@endsection

@push('js')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {

            @if(\Session::has('message'))
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '{{session()->get('message')}}',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
            @endif
        })

        $(function () {
            $('#myTable').DataTable({
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });
    </script>

@endpush
