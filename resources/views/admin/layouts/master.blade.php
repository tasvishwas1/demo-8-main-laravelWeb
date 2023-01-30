<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>Cuba - Premium Admin Template</title>
    @include('admin.layouts.css')
</head>
<body onload="startTime()">
<div class="loader-wrapper">
    <div class="loader-index"><span></span></div>
    <svg>
        <defs></defs>
        <filter id="goo">
            <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
            <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"></fecolormatrix>
        </filter>
    </svg>
</div>
<!-- tap on top starts-->
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<!-- tap on tap ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-header">
        @include('admin.layouts.header')
    </div>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
    @include('admin.layouts.sidebar')
    <!-- Page Sidebar Ends-->
        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">

{{--                    <div class="row">--}}
{{--                        <div class="col-6">--}}
{{--                            @yield('breadcrumb-title')--}}
{{--                        </div>--}}
{{--                        <div class="col-6">--}}
{{--                            <ol class="breadcrumb">--}}
{{--                                @yield('breadcrumb-items')--}}
{{--                            </ol>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        @include('admin.layouts.footer')
    </div>
</div>
<!-- latest jquery-->

{{--Settings Modal Start Here--}}
<div class="modal fade modal-bookmark" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="settingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settingModalLabel">Add Task</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-bookmark needs-validation" id="bookmark-form" novalidate="">
                    <div class="row">
                        <div class="mb-3 mt-0 col-md-12">
                            <label for="task-title">Task Title</label>
                            <input class="form-control" id="task-title" type="text" required="" autocomplete="off">
                        </div>
                        <div class="mb-3 mt-0 col-md-12">
                            <label for="sub-task">Sub task</label>
                            <input class="form-control" id="sub-task" type="text" required="" autocomplete="off">
                        </div>
                        <div class="mb-3 mt-0 col-md-12">
                            <div class="d-flex date-details">
                                <div class="d-inline-block">
                                    <label class="d-block mb-0" for="chk-ani">
                                        <input class="checkbox_animated" id="chk-ani" type="checkbox">Remind on
                                    </label>
                                </div>
                                <div class="d-inline-block">
                                    <input class="datepicker-here form-control" type="text" data-language="en" placeholder="Date">
                                </div>
                                <div class="d-inline-block">
                                    <select class="form-control">
                                        <option>7:00 am</option>
                                        <option>7:30 am</option>
                                        <option>8:00 am</option>
                                        <option>8:30 am</option>
                                        <option>9:00 am</option>
                                        <option>9:30 am</option>
                                        <option>10:00 am</option>
                                        <option>10:30 am</option>
                                        <option>11:00 am</option>
                                        <option>11:30 am</option>
                                        <option>12:00 pm</option>
                                        <option>12:30 pm</option>
                                        <option>1:00 pm</option>
                                        <option>2:00 pm</option>
                                        <option>3:00 pm</option>
                                        <option>4:00 pm</option>
                                        <option>5:00 pm</option>
                                        <option>6:00 pm</option>
                                    </select>
                                </div>
                                <div class="d-inline-block">
                                    <label class="d-block mb-0" for="chk-ani1">
                                        <input class="checkbox_animated" id="chk-ani1" type="checkbox">Notification
                                    </label>
                                </div>
                                <div class="d-inline-block">
                                    <label class="d-block mb-0" for="chk-ani2">
                                        <input class="checkbox_animated" id="chk-ani2" type="checkbox">Mail
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 mt-0 col-md-6">
                            <select class="js-example-basic-single">
                                <option value="task">My Task</option>
                            </select>
                        </div>
                        <div class="mb-3 mt-0 col-md-6">
                            <select class="js-example-disabled-results" id="bm-collection">
                                <option value="general">General</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-12 my-0">
                            <textarea class="form-control" required="" autocomplete="off">  </textarea>
                        </div>
                    </div>
                    <input id="index_var" type="hidden" value="6">
                    <button class="btn btn-secondary" id="Bookmark" onclick="submitBookMark()" type="submit">Save</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{--Settings Modal End Here--}}

@include('admin.layouts.script')
<!-- login js-->
<!-- Plugin used-->
</body>
</html>
