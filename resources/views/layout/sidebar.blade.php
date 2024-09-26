<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
        <!-- Header Menu Area Start Here -->
        <div class="navbar navbar-expand-md header-menu-one bg-light">
            <div class="nav-bar-header-one">
                <div class="header-logo">
                    {{-- <a href="{{ url('index') }}">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
                    </a> --}}
                </div>
                <div class="toggle-button sidebar-toggle">
                    <button type="button" class="item-link">
                        <span class="btn-icon-wrap">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="d-md-none mobile-nav-bar">
                <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse"
                    data-target="#mobile-navbar" aria-expanded="false">
                    <i class="far fa-arrow-alt-circle-down"></i>
                </button>
                <button type="button" class="navbar-toggler sidebar-toggle-mobile">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
                <ul class="navbar-nav">
                    <li class="navbar-item header-search-bar">
                        <div class="input-group stylish-input-group">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="flaticon-search" aria-hidden="true"></span>
                                </button>
                            </span>
                            <input type="text" class="form-control" placeholder="Find Something . . .">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    
                    {{-- <li class="navbar-item dropdown header-message">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="far fa-envelope"></i>
                            <div class="item-title d-md-none text-16 mg-l-10">Message</div>
                            <span>5</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">05 Message</h6>
                            </div>
                            <div class="item-content">
                                <div class="media">
                                    <div class="item-img bg-skyblue author-online">
                                        <img src="img/figure/student11.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name">Maria Zaman</span>
                                                <span class="item-time">18:30</span>
                                            </a>
                                        </div>
                                        <p>What is the reason of buy this item.
                                            Is it usefull for me.....</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="item-img bg-yellow author-online">
                                        <img src="img/figure/student12.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name">Benny Roy</span>
                                                <span class="item-time">10:35</span>
                                            </a>
                                        </div>
                                        <p>What is the reason of buy this item.
                                            Is it usefull for me.....</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="item-img bg-pink">
                                        <img src="img/figure/student13.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name">Steven</span>
                                                <span class="item-time">02:35</span>
                                            </a>
                                        </div>
                                        <p>What is the reason of buy this item.
                                            Is it usefull for me.....</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="item-img bg-violet-blue">
                                        <img src="img/figure/student11.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name">Joshep Joe</span>
                                                <span class="item-time">12:35</span>
                                            </a>
                                        </div>
                                        <p>What is the reason of buy this item.
                                            Is it usefull for me.....</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li> --}}
                    <li class="navbar-item dropdown header-notification">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class="far fa-bell"></i>
                            <div class="item-title d-md-none text-16 mg-l-10">Notification</div>
                            <span>8</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">03 Notifiacations</h6>
                            </div>
                            <div class="item-content">
                                <div class="media">
                                    <div class="item-icon bg-skyblue">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="post-title">Complete Today Task</div>
                                        <span>1 Mins ago</span>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="item-icon bg-orange">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="post-title">Director Metting</div>
                                        <span>20 Mins ago</span>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="item-icon bg-violet-blue">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="post-title">Update Password</div>
                                        <span>45 Mins ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- <li class="navbar-item dropdown header-language">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-expanded="false"><i class="fas fa-globe-americas"></i>EN</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">English</a>
                            <a class="dropdown-item" href="#">Spanish</a>
                            <a class="dropdown-item" href="#">Franchis</a>
                            <a class="dropdown-item" href="#">Chiness</a>
                        </div>
                    </li> --}}
                    <li class="navbar-item dropdown header-admin">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="admin-title">
                                <h5 class="item-title">{{ auth()->user()->name }}</h5>
                                <span>{{ auth()->user()->role }}</span>
                            </div>
                            <div class="admin-img">
                                <img src="{{ asset('assets/img/figure/admin.jpg') }}" alt="Admin">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">{{ auth()->user()->name }}</h6>
                            </div>
                            <div class="item-content">
                                <ul class="settings-list">
                                    {{-- <li><a href="#"><i class="flaticon-user"></i>My Profile</a></li> --}}
                                    {{-- <li><a href="#"><i class="flaticon-list"></i>Task</a></li> --}}
                                    {{-- <li><a href="#"><i
                                                class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i>Message</a>
                                    </li> --}}
                                    {{-- <li><a href="#"><i class="flaticon-gear-loading"></i>Account Settings</a></li> --}}
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i
                                                class="flaticon-turn-off"></i>LOGOUT</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one ">
            <aside>
                <!-- Sidebar Area Start Here -->
                <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
                    <div class="mobile-sidebar-header d-md-none ">
                        <div class="header-logo">
                            <a href="{{ url('index') }}"><img src="{{ asset('img/logo1.png') }}" alt="logo"></a>
                        </div>
                    </div>

                    <div class="sidebar-menu-content">
                        <ul class="nav nav-sidebar-menu sidebar-toggle-view">


                            @if (Auth::user()->role === 'super_admin')

                                <li class="nav-item">
                                    <a href="{{ url('super_admin/dashboard') }}" class="nav-link"><i
                                            class="flaticon-dashboard"></i><span>Dashboard</span></a>
                                </li>

                                {{-- Owner --}}
                                <li class="nav-item">
                                    <a href="{{ url('all_owner') }}" class="nav-link"><i
                                            class="flaticon-multiple-users-silhouette"></i><span>Owners</span></a>
                                </li>
                            @endif

                            @if (Auth::user()->role === 'owner')

                            <li class="nav-item">
                                <a href="{{ url('owner_dashboard') }}" class="nav-link"><i
                                        class="flaticon-dashboard"></i><span>Dashboard</span></a>
                            </li>

                                <li class="nav-item">
                                    <a href="{{ url('edit_owner', Auth::user()->id) }}" class="nav-link"><i
                                            class="fas fa-user-tie"></i><span>Edit Owner</span></a>
                                </li>

                                {{-- Admin --}}
                                <li class="nav-item">
                                    <a href="{{ url('all_admin') }}" class="nav-link"><i
                                            class="fas fa-user-shield"></i><span>Admins</span></a>
                                </li>
                            @endif

                            {{-- Admin Role --}}

                            @if (Auth::user()->role === 'admin')

                            <li class="nav-item">
                                <a href="{{ url('admin_dashboard') }}" class="nav-link"><i
                                        class="flaticon-dashboard"></i><span>Dashboard</span></a>
                            </li>

                            @endif

                            {{-- Owner And Admin Role --}}

                            @if (Auth::user()->role === 'owner' || Auth::user()->role === 'admin')
                                {{-- teacher --}}
                                <li class="nav-item">
                                    <a href="{{ url('all_teachers') }}" class="nav-link"><i
                                            class="flaticon-multiple-users-silhouette"></i><span>Teachers</span></a>
                                </li>

                                {{-- student --}}
                                <li class="nav-item">
                                    <a href="{{ url('all_students') }}" class="nav-link"><i
                                            class="flaticon-classmates"></i><span>Students</span></a>
                                </li>

                                {{-- Parent --}}
                                <li class="nav-item">
                                    <a href="{{ url('all_parents') }}" class="nav-link"><i
                                            class="flaticon-couple"></i><span>Parents</span></a>
                                </li>

                                {{-- Books --}}
                                {{-- <li class="nav-item sidebar-nav-item">
                                    <a href="#" class="nav-link"><i
                                            class="flaticon-books"></i><span>Library</span></a>
                                    <ul class="nav sub-group-menu">
                                        <li class="nav-item">
                                            <a href="{{ url('all_books') }}" class="nav-link"><i
                                                    class="fas fa-angle-right"></i>All
                                                Book</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('add_book') }}" class="nav-link"><i
                                                    class="fas fa-angle-right"></i>Add New
                                                Book</a>
                                        </li>
                                    </ul>
                                </li> --}}

                                {{-- Fees --}}
                                <li class="nav-item">
                                    <a href="{{ url('all_fees') }}" class="nav-link"><i
                                            class="flaticon-technological"></i>
                                            <span>All Fees Collection</span>
                                    </a>
                                </li>

                                {{-- Classes --}}
                                <li class="nav-item">
                                    <a href="{{ url('all_classes') }}" class="nav-link"><i
                                            class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i><span>Classes</span></a>
                                </li>

                                {{-- Sections --}}
                                <li class="nav-item">
                                    <a href="{{ url('add_section') }}" class="nav-link"><i
                                            class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i><span>Sections</span></a>
                                </li>

                                {{-- Subjects --}}
                                <li class="nav-item">
                                    <a href="{{ url('all_subjects') }}" class="nav-link"><i
                                            class="flaticon-open-book"></i><span>Subjects</span></a>
                                </li>

                                {{-- Class Routine --}}
                                {{-- <li class="nav-item">
                                    <a href="{{ url('class_routine') }}" class="nav-link"><i
                                            class="flaticon-calendar"></i><span>Class
                                            Routine</span></a>
                                </li> --}}

                                {{-- Transport --}}
                                {{-- <li class="nav-item">
                                    <a href="{{ url('transport') }}" class="nav-link"><i
                                            class="flaticon-bus-side-view"></i><span>Transport</span></a>
                                </li> --}}

                                {{-- Hostel --}}
                                {{-- <li class="nav-item">
                                    <a href="{{ url('hostel') }}" class="nav-link"><i
                                            class="flaticon-bed"></i><span>Hostel</span></a>
                                </li> --}}

                                {{-- Notice --}}
                                <li class="nav-item">
                                    <a href="{{ url('all_notices') }}" class="nav-link"><i
                                            class="flaticon-script"></i><span>Notice</span></a>
                                </li>

                                {{-- Message --}}
                                {{-- <li class="nav-item">
                                    <a href="{{ url('message') }}" class="nav-link"><i
                                            class="flaticon-chat"></i><span>Messeage</span></a>
                                </li> --}}


                            @endif


                            @if (Auth::user()->role === 'teacher')

                                <li class="nav-item">
                                    <a href="{{ url('teachers_dashboard') }}" class="nav-link"><i
                                            class="flaticon-dashboard"></i><span>Dashboard</span></a>
                                </li>

                                {{-- Teachers Profile --}}
                                <li class="nav-item">
                                    <a href="{{ url('profile_of_teacher', Auth::user()->id) }}" class="nav-link"><i
                                            class="fas fa-user-tie"></i><span>Profile</span></a>
                                </li>

                                {{-- student --}}
                                <li class="nav-item">
                                    <a href="{{ url('all_students_of_teacher', Auth::user()->id) }}"
                                        class="nav-link"><i class="flaticon-classmates"></i><span>Students</span></a>
                                </li>

                                {{-- Classes --}}
                                <li class="nav-item">
                                    <a href="{{ url('all_classes_of_teacher', Auth::user()->id) }}"
                                        class="nav-link"><i
                                            class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i><span>Classes</span></a>
                                </li>


                                {{-- Exam --}}
                                <li class="nav-item">
                                    <a href="{{ url('add_marks', Auth::user()->id) }}" class="nav-link"><i
                                            class="flaticon-shopping-list"></i><span>
                                            Exam Grading
                                        </span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ url('all_result', Auth::user()->id) }}" class="nav-link"><i
                                            class="fas fa-graduation-cap"></i><span>
                                            Result
                                        </span>
                                    </a>
                                </li>

                                
                                {{-- Attendance --}}
                                {{-- <li class="nav-item">
                                    <a href="{{ url('student_attendence', Auth::user()->id) }}" class="nav-link"><i
                                            class="flaticon-checklist"></i><span>Attendance</span></a>
                                </li> --}}
                            @endif


                            @if (Auth::user()->role === 'parent')
                                
                            {{-- Parent Welcome --}}
                            <li class="nav-item">
                                <a href="{{ url('parent_dashboard', Auth::user()->id) }}" class="nav-link"><i
                                        class="fas fa-user-tie"></i><span>Profile</span></a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('parent_child_data', Auth::user()->id) }}" class="nav-link"><i
                                        class="flaticon-classmates"></i><span>Children</span></a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('parent_child_result', Auth::user()->id) }}" class="nav-link"><i
                                        class="fas fa-graduation-cap"></i><span>Result</span></a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('parent_child_attendance', Auth::user()->id) }}" class="nav-link"><i
                                        class="flaticon-checklist"></i><span>Attendance</span></a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{ url('parent_child_fees', Auth::user()->id) }}" class="nav-link"><i
                                        class="flaticon-technological"></i><span>Fee</span></a>
                            </li>

                            @endif
                        </ul>
                    </div>
                </div>
            </aside>
            <!-- Sidebar Area End Here -->
