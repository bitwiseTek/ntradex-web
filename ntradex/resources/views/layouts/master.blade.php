<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="x-dns-prefetch-control" content="on"></meta>
    <meta name="author" content="Bitwise Tech">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="/assets/img/logo10.png">
    <meta name="robots" content="noindex, nofollow">

    <title>nTradeX : @yield('page_title')</title>
    
    <link rel="icon" href="../../favicon.ico">  
    <!-- Stylesheets -->
    <!-- Web fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

        <!-- Bootstrap and OneUI CSS framework -->
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" id="css-main" href="/assets/css/oneui.css">

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="/assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="/assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="/assets/js/plugins/select2/select2.min.css">
        <link rel="stylesheet" href="/assets/js/plugins/select2/select2-bootstrap.min.css">
        <link rel="stylesheet" href="/assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css">
        <link rel="stylesheet" href="/assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
        <link rel="stylesheet" href="/assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.min.css">
        <link rel="stylesheet" href="/assets/js/plugins/dropzonejs/dropzone.min.css">
        <link rel="stylesheet" href="/assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css">

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="/assets/js/plugins/slick/slick.min.css">
        <link rel="stylesheet" href="/assets/js/plugins/slick/slick-theme.min.css">

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="/assets/js/plugins/datatables/jquery.dataTables.min.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
        <script src="/assets/js/core/jquery.min.js"></script>
        <script src="/assets/js/core/bootstrap.min.js"></script>
        <script src="/assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="/assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="/assets/js/core/jquery.appear.min.js"></script>
        <script src="/assets/js/core/jquery.countTo.min.js"></script>
        <script src="/assets/js/core/jquery.placeholder.min.js"></script>
        <script src="/assets/js/core/js.cookie.min.js"></script>
        <script src="/assets/js/core/sitev4.js"></script>
        <script src="/assets/js/app.js"></script>

        <!-- Page Plugins -->
        <script src="/assets/js/plugins/chartjs/Chart.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="/assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="/assets/js/plugins/bootstrap-datetimepicker/moment.min.js"></script>
        <script src="/assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
        <script src="/assets/js/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="/assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="/assets/js/plugins/select2/select2.full.min.js"></script>
        <script src="/assets/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>
        <script src="/assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js"></script>
        <script src="/assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
        <script src="/assets/js/plugins/dropzonejs/dropzone.min.js"></script>
        <script src="/assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>

        <!-- Page JS Code -->
        <!-- <script src="/assets/js/pages/base_pages_dashboard_v2.js"></script> -->

        <!-- Page JS Plugins -->
        <script src="/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <script src="/assets/js/pages/base_pages_login.js"></script>

        <!-- Page JS Code -->
        <script src="/assets/js/pages/base_pages_register.js"></script>

        <!-- Page JS Code -->
        <script src="/assets/js/pages/base_pages_buy.js"></script>

        <!-- Page JS Code -->
        <script src="/assets/js/pages/base_pages_admin_ecurrency.js"></script>

        <!-- Page JS Code -->
        <script src="/assets/js/pages/base_pages_admin_bank.js"></script>

        <!-- Page JS Code -->
        <script src="/assets/js/pages/base_pages_sell.js"></script>

        <!-- Page JS Code -->
        <script src="/assets/js/pages/imagepreview.js"></script>

        <!-- Page JS Code -->
        <script src="/assets/js/pages/base_forms_pickers_more.js"></script>

        <!-- Page JS Code -->
        <script src="/assets/js/plugins/jquery-vide/jquery.vide.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

        <!-- Page JS Code -->
        <script src="/assets/js/pages/base_tables_datatables.js"></script>

        <!-- Page Plugins -->
        <script src="assets/js/plugins/slick/slick.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $("#dob").datepicker({
                    dateFormat: "yy-mm-dd",
                    changeYear: true, 
                    showOtherMonths: true,
                    selectOtherMonths: true,
                    changeMonth: true,
                    yearRange: "-100:+10"
                });

                $("#country_id").on('change', function(e) {
                      console.log(e);
                      var countryId = e.target.value;
                            
                      $.get('/ajax-states?countryId=' + countryId, function(data) {
                      $("#state_id").empty();  
                      $.each(data, function(index, stateObj) {
                        $("#state_id").append('<option value="' + stateObj.id+ '">' + stateObj.state + '</option>');
                      });
                    });  
                  });
                });
            jQuery(function () {
                // Init page helpers (Appear plugin)
                App.initHelpers('appear');

                // Init page helpers (Slick Slider plugin)
                App.initHelpers('slick');
            });
        </script>
  </head>
  <body>
    <!-- Page Container -->
        <!--
            Available Classes:

            'enable-cookies'             Remembers active color theme between pages (when set through color theme list)

            'sidebar-l'                  Left Sidebar and right Side Overlay
            'sidebar-r'                  Right Sidebar and left Side Overlay
            'sidebar-mini'               Mini hoverable Sidebar (> 991px)
            'sidebar-o'                  Visible Sidebar by default (> 991px)
            'sidebar-o-xs'               Visible Sidebar by default (< 992px)

            'side-overlay-hover'         Hoverable Side Overlay (> 991px)
            'side-overlay-o'             Visible Side Overlay by default (> 991px)

            'side-scroll'                Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (> 991px)

            'header-navbar-fixed'        Enables fixed header
        -->
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">

            <!-- Sidebar -->
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="side-header side-content bg-white-op">
                            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                            <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times"></i>
                            </button>
                            <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                            <div class="btn-group pull-right">
                                <button class="btn btn-link text-gray dropdown-toggle" data-toggle="dropdown" type="button">
                                    <i class="si si-drop"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right font-s13 sidebar-mini-hide">
                                    <li>
                                        <a data-toggle="theme" data-theme="default" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-default pull-right"></i> <span class="font-w600">Default</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/amethyst.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-amethyst pull-right"></i> <span class="font-w600">Amethyst</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/city.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-city pull-right"></i> <span class="font-w600">City</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/flat.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-flat pull-right"></i> <span class="font-w600">Flat</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/modern.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-modern pull-right"></i> <span class="font-w600">Modern</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/smooth.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-smooth pull-right"></i> <span class="font-w600">Smooth</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <a class="h5 text-white" href="/">
                                <img src="/assets/img/logo10.png" width="40" alt=""> <span class="h4 font-w600 sidebar-mini-hide">nTradeX
                            </a>
                        </div>
                        <!-- END Side Header -->

                        <!-- Side Content -->
                        <div class="side-content">
                            <ul class="nav-main">
                                @if(Session::get('user_id'))
                                  @if(Session::get('account_type')=='user')
                                      <li>
                                        <a href="/users/summary"><i class="si si-home"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                                      </li>
                                      <li>
                                        <a href="/users/exchange-currencies"><i class="si si-link"></i><span class="sidebar-mini-hide">Exchange</span></a>
                                      </li>
                                      <li>
                                        <a href="/users/transactions"><i class="si si-equalizer"></i><span class="sidebar-mini-hide">Transactions</span></a>
                                      </li>
                                      <li>
                                        <a href="/users/settings"><i class="si si-settings"></i><span class="sidebar-mini-hide">Settings</span></a>
                                      </li>
                                      <li class="divider"></li>
                                      <li>
                                        <a href="/log-out"><i class="si si-logout"></i><span class="sidebar-mini-hide">Logout</span></a>
                                      </li>
                                    @elseif(Session::get('account_type')=='admin')
                                      <li>
                                        <a href="/admin/summary"><i class="si si-home"></i><span class="sidebar-mini-hide">Admin Dashboard</span></a>
                                      </li>
                                      <li>
                                        <a href="/admin/transactions"><i class="si si-equalizer"></i><span class="sidebar-mini-hide">Transactions</span></a>
                                      </li>
                                      <li>
                                        <a href="/admin/users"><i class="si si-users"></i><span class="sidebar-mini-hide">Users</span></a>
                                      </li>
                                      <li>
                                        <a href="/admin/reports"><i class="si si-layers"></i><span class="sidebar-mini-hide">Reports</span></a>
                                      </li>
                                      <li>
                                        <a href="/admin/currencies"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Configuration</span></a>
                                      </li>
                                      <li>
                                        <a href="/admin/settings"><i class="si si-settings"></i><span class="sidebar-mini-hide">Settings</span></a>
                                      </li>
                                      <li class="divider"></li>
                                      <li>
                                        <a href="/log-out"><i class="si si-logout"></i><span class="sidebar-mini-hide">Logout</span></a>
                                      </li>
                                    @endif
                                  @else
                                    <li class="{{(Request::is('login*')) ? 'active': '' }}">
                                      <a href="/login"><i class="si si-power"></i><span class="sidebar-mini-hide">Sign In</span></a>
                                    </li>
                                    <li class="{{(Request::is('register*')) ? 'active': '' }}">
                                      <a href="/register"><i class="si si-book-open"></i><span class="sidebar-mini-hide">Sign Up</span></a>
                                    </li>
                                    <li class="{{(Request::is('how-it-works')) ? 'active': '' }}">
                                      <a href="/how-it-works"><i class="si si-directions"></i><span class="sidebar-mini-hide">How it Works</span></a>
                                    </li>
                                    <li class="{{(Request::is('faqs')) ? 'active': '' }}">
                                      <a href="/faqs"><i class="si si-question"></i><span class="sidebar-mini-hide">FAQs</span></a>
                                    </li>
                                    <li class="{{(Request::is('about-us')) ? 'active': '' }}">
                                      <a href="/about-us"><i class="si si-globe"></i><span class="sidebar-mini-hide">About Us</span></a>
                                    </li>
                                    <li class="{{(Request::is('contact-us')) ? 'active': '' }}">
                                      <a href="/contact-us"><i class="si si-support"></i><span class="sidebar-mini-hide">Contact Support</span></a>
                                    </li>
                                  @endif  
                            </ul>
                        </div>
                        <!-- END Side Content -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="header-navbar" class="content-mini content-mini-full">
                <!-- Header Navigation Right -->
                @if(Session::get('user_id'))
                  @if(Session::get('account_type')=='user')
                  <ul class="nav-header pull-right">
                      <li class="{{(Request::is('users/*')) ? 'active': '' }}">
                          <div class="btn-group">
                              <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                                  <img src="/assets/img/logo10.png" alt="Avatar">
                                  <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-right">
                                  <li class="dropdown-header">Profile</li>
                                  <li>
                                      <a tabindex="-1" href="/users/summary">
                                          <i class="si si-user pull-right"></i>
                                          <span class="badge badge-success pull-right">1</span>Profile
                                      </a>
                                  </li>
                                  <li>
                                      <a tabindex="-1" href="/users/settings">
                                          <i class="si si-settings pull-right"></i>Settings
                                      </a>
                                  </li>
                                  <li class="divider"></li>
                                  <li class="dropdown-header">Actions</li>
                                  <li>
                                      <a tabindex="-1" href="/users/exchange-currencies">
                                          <i class="si si-link pull-right"></i>Exchange
                                      </a>
                                  </li>
                                  <li>
                                      <a tabindex="-1" href="/users/transactions">
                                          <i class="si si-equalizer pull-right"></i>Transactions
                                      </a>
                                  </li>
                                  <li>
                                      <a tabindex="-1" href="/log-out">
                                          <i class="si si-logout pull-right"></i>Logout
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                  </ul>
                  @elseif(Session::get('account_type')=='admin')
                  <ul class="nav-header pull-right">
                      <li class="{{(Request::is('admin/*') || Request::is('admin/')) ? 'active': '' }}">
                          <div class="btn-group">
                              <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                                  <img src="/assets/img/logo10.png" alt="Avatar">
                                  <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-right">
                                  <li class="dropdown-header">Profile</li>
                                  <li>
                                      <a tabindex="-1" href="/admin/summary">
                                          <i class="si si-user pull-right"></i>
                                          <span class="badge badge-success pull-right">1</span>Profile
                                      </a>
                                  </li>
                                  <li>
                                      <a tabindex="-1" href="/admin/settings">
                                          <i class="si si-settings pull-right"></i>Settings
                                      </a>
                                  </li>
                                  <li class="divider"></li>
                                  <li class="dropdown-header">Actions</li>
                                  <li>
                                      <a tabindex="-1" href="/admin/users">
                                          <i class="si si-users pull-right"></i>Users
                                      </a>
                                  </li>
                                  <li>
                                      <a tabindex="-1" href="/admin/transactions">
                                          <i class="si si-equalizer pull-right"></i>Transactions
                                      </a>
                                  </li>
                                  <li>
                                      <a tabindex="-1" href="/log-out">
                                          <i class="si si-logout pull-right"></i>Logout
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </li>
                  </ul>
                  @endif
                @endif
                <!-- END Header Navigation Right -->

                <!-- Header Navigation Left -->
                <ul class="nav-header pull-left">
                    <li class="hidden-md hidden-lg">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                            <i class="fa fa-navicon"></i>
                        </button>
                    </li>
                    <li class="hidden-xs hidden-sm">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                            <i class="fa fa-ellipsis-v"></i>
                        </button>
                    </li>
                    
                    <li class="visible-xs">
                        <!-- Toggle class helper (for .js-header-search below), functionality initialized in App() -> uiToggleClass() -->
                        <button class="btn btn-default" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </li>
                    <li class="js-header-search header-search">
                        <form class="form-horizontal" action="/users/search" method="post">
                            <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                                <input class="form-control" type="text" id="base-material-text" name="base-material-text" placeholder="Search nTradeX...">
                                <span class="input-group-addon"><i class="si si-magnifier"></i></span>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </li>
                </ul>
                <!-- END Header Navigation Left -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content content-narrow">
                    @yield('content')
                    <!-- END Main Content -->
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
                <div align="center"><img src="/assets/img/logostrip.png" width="50%" alt=""/></div></div>
                <div class="pull-right">
                  <a href="/privacy-policy">Privacy Policy</a> &nbsp; &nbsp; <a href="/terms-and-conditions">Terms of Service</a> &nbsp; &nbsp; <a href="/anti-money-policy">Anti-Money Laundering</a></span>
                </div>
                <div class="pull-left">
                    <a class="font-w600" href="http://goo.gl/6LF10W" target="_blank"> </a>{{date('Y')}}, &copy; Ntradex Inc, <span class="js-year-copy"></span>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->
        <script>
            jQuery(function () {
                // Init page helpers (CountTo plugin)
                App.initHelpers('appear-countTo');
            });
        </script>
  </body>
</html>
