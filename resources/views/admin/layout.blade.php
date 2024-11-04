<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 May 2024 05:15:42 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AdminLTE 3 | Dashboard</title>
    @livewireStyles

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="../../../code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css')}}">

    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min2167.css?v=3.2.0')}}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css')}}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
   
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

              

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago
                                    </p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago
                                    </p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true"
                        href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>


     <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #343a40;">
        <a href="{{ route('student.dashboard') }}" class="brand-link d-flex justify-content-center align-items-center p-3">
            <span class="brand-text font-weight-bold text-center" style="font-size: 1.5rem; color: #ffffff;">LearnLync</span>
        </a>
        <div class="sidebar">

        <!-- User Panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
            <div class="info">
                <a href="#" class="d-block text-white font-weight-bold" style="font-size: 1.1em;">
                    @if(Auth::guard('admin')->check())
                      Auth By:  {{ Auth::guard('admin')->user()->name }}
                    @else
                        Guest
                    @endif
                </a>
            </div>
        </div>


        <!-- Sidebar Navigation -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard Link -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active" style="background-color: #495057;">
                       
                    </a>
                    
                </li>

                <!-- Academic Year Links -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th text-info"></i>
                        <p>Dashboard <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.profile') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                    </ul>
                </li>
             
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt text-primary"></i>
                        <p>Academic Year <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('academic-year.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Year</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('academic-year.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Years</p>
                            </a>
                        </li>
                    </ul>
                </li>
  <!-- Classes Links -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher text-secondary"></i>
                        <p>Classes <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('class.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Class</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('class.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Classes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <!-- Subjects Links -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book text-success"></i>
                        <p>Subjects <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('subject.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Subject</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('subject.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Subjects</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tasks text-primary"></i>
                        <p>Assign Subject <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('assign.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Assign to Class</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('assign.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Assignments</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tasks text-primary"></i>
                        <p>Assign Teachers <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('assign-teacher.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Assign to Class & Subject</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('assign.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Assignments</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Announcements Links -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bullhorn text-danger"></i>
                        <p>Announcements <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('announcement.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Announcement</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('announcement.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Announcements</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Students Links -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate text-warning"></i>
                        <p>Students <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('student.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Student</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('student.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Students</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher text-info"></i>
                        <p>Teachers <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('teacher.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Teacher</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('teacher.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Teachers</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign text-warning"></i>
                        <p>Services <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('fee-head.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Fee</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('fee-head.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Fees</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('fee-structure.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Fee Structure</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('fee-structure.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Fee Structures</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- Assign Subject Links -->
    
                <!-- Logout -->
                <li class="nav-item mt-4">
                    <a href="{{ route('admin.logout') }}" class="nav-link" style="background-color: #dc3545; color: #fff;">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

        

       @yield('content')

    <aside class="control-sidebar control-sidebar-dark">

    </aside>

    </div>


    <script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js')}}"></script>

    <script src="{{ asset('admin/plugins/sparklines/sparkline.js')}}"></script>

    <script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

    <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>

    <script src="{{ asset('admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>

    <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>

    <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

    <script src="{{ asset('admin/dist/js/adminlte2167.js?v=3.2.0')}}"></script>

    <script src="{{ asset('admin/dist/js/demo.js')}}"></script>

    <script src="{{ asset('admin/dist/js/pages/dashboard.js')}}"></script>
    @livewireScripts
</body>

<!-- Mirrored from adminlte.io/themes/v3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 May 2024 05:16:08 GMT -->

</html>
