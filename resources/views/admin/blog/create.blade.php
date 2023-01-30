@extends('admin.layouts.master')
@section('style')

@endsection

{{--@section('breadcrumb-title')--}}
{{--    <h3>Blog</h3>--}}
{{--@endsection--}}
{{--@section('breadcrumb-items')--}}
{{--    <li class="breadcrumb-item">--}}
{{--        <a href="#">--}}
{{--            <i data-feather="home"></i>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--    <li class="breadcrumb-item">Category</li>--}}
{{--    <li class="breadcrumb-item active">Create</li>--}}
{{--@endsection--}}

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Create Blog</h5>
                </div>
                <div class="card-body add-post">
                    <form role="form" id="addEditForm" enctype="multipart/form-data">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="validationCustom01">Title:</label>
                                <input class="form-control" id="validationCustom01" type="text" placeholder="Post Title"
                                       required="">
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="mb-3">
                                <label>Type:</label>
                                <div class="m-checkbox-inline">
                                    <label class="edo-ani" for="chk-ani">
                                        <input class="checkbox_animated" id="chk-ani" type="checkbox">Text
                                    </label>
                                    <label class="edo-ani" for="chk-ani">
                                        <input class="checkbox_animated" id="chk-ani" type="checkbox">Image
                                    </label>
                                    <label class="edo-ani" for="chk-ani">
                                        <input class="checkbox_animated" id="chk-ani" type="checkbox">Video
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-form-label">Category:
                                    <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple">
                                        <option value="AL">Lifestyle</option>
                                        <option value="WY">Travel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="email-wrapper">
                                <div class="theme-form">
                                    <div class="mb-3">
                                        <label>Content:</label>
                                        <textarea id="text-box" name="text-box" cols="10" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-form-label">Image:
                                    <input class="form-control dropify" type="file" name="image" id="name" required>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="btn-showcase text-end">
                        <button class="btn btn-primary" type="submit">Post</button>
                        <input class="btn btn-light" type="reset" value="Discard">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var formUrl = '/blog';
        var redirect_url = '/blog';

        $('.dropify').dropify();
        $(document).ready(function () {
            CKEDITOR.replace('text-box');
        });
    </script>
    <script src="{{ asset('assets/form.js') }}"></script>
    <script src="{{ asset('assets/js/editor/ckeditor/adapters/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>
@endsection
