@extends('admin.layouts.master')
@section('style')

@endsection

{{--@section('breadcrumb-title')--}}
{{--    <h3>Category</h3>--}}
{{--@endsection--}}
{{--@section('breadcrumb-items')--}}
{{--    <li class="breadcrumb-item">--}}
{{--        <a href="index.html">--}}
{{--            <i data-feather="home"></i>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--    <li class="breadcrumb-item">Dashboard</li>--}}
{{--    <li class="breadcrumb-item active">Default</li>--}}
{{--@endsection--}}

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h5>Category List</h5>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('admin.category.create') }}" class="btn btn-pill btn-success pull-right"
                               type="button">
                                <i class="fa fa-plus-square-o"></i> Add New
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dt-ext table-responsive">
                        <table class="display" id="export-button">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal-->
    <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Category Details</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="details_modal_body"></div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        const datatable_url = '/get-category-list';
        const form_url = '/category';
        const modal_url = '/category-details';

        $.extend(true, $.fn.dataTable.defaults, {
            columns: [
                {data: 'name', name: 'categories.name'},
                {data: 'image', name: 'categories.image'},
                {data: 'status', name: 'categories.status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });
    </script>
    <script src="{{ asset('assets/datatables.js') }}"></script>
@endsection
