<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light"
                                                            src="{{ asset('assets/images/logo/logo.png') }}" alt=""><img
                    class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i>
            </div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid"
                                                                 src="{{ asset('assets/images/logo/logo-icon.png') }}"
                                                                 alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="index.html"><img class="img-fluid"
                                                                   src="{{ asset('assets/images/logo/logo-icon.png') }}"
                                                                   alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                                                              aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1">General</h6>
                            <p class="lan-2">Dashboards,widgets & layout.</p>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0);">
                            <i data-feather="home"></i> <span class="lan-3">Dashboard</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a class="lan-4" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0);">
                            <i data-feather="align-left"></i><span>Category</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('admin.category.index') }}">Category</a></li>
                            <li><a href="{{ route('admin.category.create') }}">Add Category</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-8">Applications</h6>
                            <p class="lan-9">Ready to use Apps</p>
                        </div>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="bookmark.html">
                            <i data-feather="heart"> </i><span>Roles And Permissions</span>
                        </a>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Forms & Table</h6>
                            <p>Ready to use froms & tables </p>
                        </div>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                                data-feather="file-text"></i><span>Forms</span></a>
                        <ul class="sidebar-submenu">
                            <li><a class="submenu-title" href="#">Form Controls<span class="sub-arrow"><i
                                            class="fa fa-angle-right"></i></span></a>
                                <ul class="nav-sub-childmenu submenu-content">
                                    <li><a href="form-validation.html">Form Validation</a></li>
                                    <li><a href="base-input.html">Base Inputs</a></li>
                                    <li><a href="radio-checkbox-control.html">Checkbox & Radio</a></li>
                                    <li><a href="input-group.html">Input Groups</a></li>
                                    <li><a href="megaoptions.html">Mega Options</a></li>
                                </ul>
                            </li>
                            <li><a class="submenu-title" href="#">Form Widgets<span class="sub-arrow"><i
                                            class="fa fa-angle-right"></i></span></a>
                                <ul class="nav-sub-childmenu submenu-content">
                                    <li><a href="datepicker.html">Datepicker</a></li>
                                    <li><a href="time-picker.html">Timepicker</a></li>
                                    <li><a href="datetimepicker.html">Datetimepicker</a></li>
                                    <li><a href="daterangepicker.html">Daterangepicker</a></li>
                                    <li><a href="touchspin.html">Touchspin</a></li>
                                    <li><a href="select2.html">Select2</a></li>
                                    <li><a href="switch.html">Switch</a></li>
                                    <li><a href="typeahead.html">Typeahead</a></li>
                                    <li><a href="clipboard.html">Clipboard</a></li>
                                </ul>
                            </li>
                            <li><a class="submenu-title" href="#">Form layout<span class="sub-arrow"><i
                                            class="fa fa-angle-right"></i></span></a>
                                <ul class="nav-sub-childmenu submenu-content">
                                    <li><a href="default-form.html">Default Forms</a></li>
                                    <li><a href="form-wizard.html">Form Wizard 1</a></li>
                                    <li><a href="form-wizard-two.html">Form Wizard 2</a></li>
                                    <li><a href="form-wizard-three.html">Form Wizard 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Components</h6>
                            <p>UI Components & Elements </p>
                        </div>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                                data-feather="command"></i><span>Icons</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="flag-icon.html">Flag icon</a></li>
                            <li><a href="font-awesome.html">Fontawesome Icon</a></li>
                            <li><a href="ico-icon.html">Ico Icon</a></li>
                            <li><a href="themify-icon.html">Thimify Icon</a></li>
                            <li><a href="feather-icon.html">Feather icon</a></li>
                            <li><a href="whether-icon.html">Whether Icon</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Pages</h6>
                            <p>All neccesory pages added</p>
                        </div>
                    </li>
                    <li class="mega-menu"><a class="sidebar-link sidebar-title" href="#"><i
                                data-feather="layers"></i><span>Others</span></a>
                        <div class="mega-menu-container menu-content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col mega-box">
                                        <div class="link-section">
                                            <div class="submenu-title">
                                                <h5>Error Page</h5>
                                            </div>
                                            <ul class="submenu-content opensubmegamenu">
                                                <li><a href="error-400.html">Error 400</a></li>
                                                <li><a href="error-401.html">Error 401</a></li>
                                                <li><a href="error-403.html">Error 403</a></li>
                                                <li><a href="error-404.html">Error 404</a></li>
                                                <li><a href="error-500.html">Error 500</a></li>
                                                <li><a href="error-503.html">Error 503</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col mega-box">
                                        <div class="link-section">
                                            <div class="submenu-title">
                                                <h5> Authentication</h5>
                                            </div>
                                            <ul class="submenu-content opensubmegamenu">
                                                <li><a href="login.html" target="_blank">Login Simple</a></li>
                                                <li><a href="login_one.html" target="_blank">Login with bg
                                                        image</a></li>
                                                <li><a href="login_two.html" target="_blank">Login with image
                                                        two </a></li>
                                                <li><a href="login-bs-validation.html" target="_blank">Login
                                                        With validation</a></li>
                                                <li><a href="login-bs-tt-validation.html" target="_blank">Login
                                                        with tooltip</a></li>
                                                <li><a href="login-sa-validation.html" target="_blank">Login
                                                        with sweetalert</a></li>
                                                <li><a href="sign-up.html" target="_blank">Register Simple</a>
                                                </li>
                                                <li><a href="sign-up-one.html" target="_blank">Register with Bg
                                                        Image </a></li>
                                                <li><a href="sign-up-two.html" target="_blank">Register with Bg
                                                        video</a></li>
                                                <li><a href="sign-up-wizard.html" target="_blank">Register
                                                        wizard</a></li>
                                                <li><a href="unlock.html">Unlock User</a></li>
                                                <li><a href="forget-password.html">Forget Password</a></li>
                                                <li><a href="reset-password.html">Reset Password</a></li>
                                                <li><a href="maintenance.html">Maintenance</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col mega-box">
                                        <div class="link-section">
                                            <div class="submenu-title">
                                                <h5>Coming Soon</h5>
                                            </div>
                                            <ul class="submenu-content opensubmegamenu">
                                                <li><a href="comingsoon.html">Coming Simple</a></li>
                                                <li><a href="comingsoon-bg-video.html">Coming with Bg video</a>
                                                </li>
                                                <li><a href="comingsoon-bg-img.html">Coming with Bg Image</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col mega-box">
                                        <div class="link-section">
                                            <div class="submenu-title">
                                                <h5>Email templates</h5>
                                            </div>
                                            <ul class="submenu-content opensubmegamenu">
                                                <li><a href="basic-template.html">Basic Email</a></li>
                                                <li><a href="email-header.html">Basic With Header</a></li>
                                                <li><a href="template-email.html">Ecomerce Template</a></li>
                                                <li><a href="template-email-2.html">Email Template 2</a></li>
                                                <li><a href="ecommerce-templates.html">Ecommerce Email</a></li>
                                                <li><a href="email-order-success.html">Order Success</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Miscellaneous</h6>
                            <p>Bouns pages & apps</p>
                        </div>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                                data-feather="image"></i><span>Gallery</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="gallery.html">Gallery Grid</a></li>
                            <li><a href="gallery-with-description.html">Gallery Grid Desc</a></li>
                            <li><a href="gallery-masonry.html">Masonry Gallery</a></li>
                            <li><a href="masonry-gallery-with-disc.html">Masonry with Desc</a></li>
                            <li><a href="gallery-hover.html">Hover Effects</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
