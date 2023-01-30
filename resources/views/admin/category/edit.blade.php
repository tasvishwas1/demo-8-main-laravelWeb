@extends('admin.layouts.master')
@section('style')

@endsection
@section('breadcrumb-title')
    <h3>Category</h3>
@endsection
@section('breadcrumb-items')
    <li class="breadcrumb-item">
        <a href="#">
            <i data-feather="home"></i>
        </a>
    </li>
    <li class="breadcrumb-item">Category</li>
    <li class="breadcrumb-item active">Create</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form role="form" id="addEditForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="edit_value" id="edit_value" value="{{ $category->id }}" />

                        <div class="form theme-form">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" id="name"
                                               placeholder="Name" value="{{ $category->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" id="description"
                                                  rows="3" required>{{ $category->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label>Image <span class="text-danger">*</span></label>
                                        <input class="form-control dropify" data-default-file="{{ url($category->image) }}" type="file" name="image" id="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="text-end">
                                        <button class="btn btn-success me-3">Update</button>
                                        <button class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var formUrl = '/category';
        var redirect_url = '/category';

        $('.dropify').dropify();
    </script>
    <script src="{{ asset('assets/form.js') }}"></script>
@endsection
