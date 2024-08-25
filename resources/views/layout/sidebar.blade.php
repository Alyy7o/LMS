<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
       <!-- Header Menu Area Start Here -->
        <div class="navbar navbar-expand-md header-menu-one bg-light">
            <div class="nav-bar-header-one">
                <div class="header-logo">
                    <a href="{{url('index')}}">
                        <img src="{{asset('assets/img/logo.png')}}" alt="logo">
                    </a>
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
               <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse" data-target="#mobile-navbar" aria-expanded="false">
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
                    <li class="navbar-item dropdown header-admin">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="admin-title">
                                <h5 class="item-title">{{ auth()->user()->name }}</h5>
                                <span>{{ auth()->user()->role }}</span>
                            </div>
                            <div class="admin-img">
                                <img src="{{asset('assets/img/figure/admin.jpg')}}" alt="Admin">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">Steven Zone</h6>
                            </div>
                            <div class="item-content">
                                <ul class="settings-list">
                                    <li><a href="#"><i class="flaticon-user"></i>My Profile</a></li>
                                    <li><a href="#"><i class="flaticon-list"></i>Task</a></li>
                                    <li><a href="#"><i class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i>Message</a></li>
                                    <li><a href="#"><i class="flaticon-gear-loading"></i>Account Settings</a></li>
                                    <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="flaticon-turn-off"></i>LOGOUT</a></li>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="navbar-item dropdown header-message">
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
                    </li>
                    <li class="navbar-item dropdown header-notification">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
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
                     <li class="navbar-item dropdown header-language">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" 
                        data-toggle="dropdown" aria-expanded="false"><i class="fas fa-globe-americas"></i>EN</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">English</a>
                            <a class="dropdown-item" href="#">Spanish</a>
                            <a class="dropdown-item" href="#">Franchis</a>
                            <a class="dropdown-item" href="#">Chiness</a>
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
                             <a href="{{url('index')}}"><img src="{{asset('img/logo1.png')}}" alt="logo"></a>
                         </div>
                    </div>

                     <div class="sidebar-menu-content">
                         <ul class="nav nav-sidebar-menu sidebar-toggle-view">

                            
                    @if (Auth::user()->role === 'super_admin')

                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                                <ul class="nav sub-group-menu">
                                    <li class="nav-item">
                                        <a href="{{url('index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Admin</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-dashboard"></i><span>Owner</span></a>
                                <ul class="nav sub-group-menu">
                                    <li class="nav-item">
                                        <a href="{{url('all_owner')}}" class="nav-link"><i class="fas fa-angle-right"></i>Owner List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('add_owner')}}" class="nav-link"><i
                                                class="fas fa-angle-right"></i>Owner Form</a>
                                    </li>
                                   
                                </ul>
                            </li>
                    @endif

                    @if (Auth::user()->role === 'owner')

                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                                <ul class="nav sub-group-menu">
                                    <li class="nav-item">
                                        <a href="{{url('indexx')}}" class="nav-link"><i
                                                class="fas fa-angle-right"></i>Admin</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('student')}}" class="nav-link"><i
                                                class="fas fa-angle-right"></i>Students</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('parent')}}" class="nav-link"><i
                                                class="fas fa-angle-right"></i>Parents</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('teacher')}}" class="nav-link"><i
                                                class="fas fa-angle-right"></i>Teachers</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i
                                        class="flaticon-multiple-users-silhouette"></i><span>Admins</span></a>
                                <ul class="nav sub-group-menu">
                                    <li class="nav-item">
                                        <a href="{{url('all_admin')}}" class="nav-link"><i class="fas fa-angle-right"></i>
                                            All Admins</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('add_admin')}}" class="nav-link"><i class="fas fa-angle-right"></i>
                                            Admins Form</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            
                    @endif 

                             {{-- Admin --}}

                    @if (Auth::user()->role === 'admin')

                             <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                                <ul class="nav sub-group-menu">
                                    <li class="nav-item">
                                        <a href="{{url('student')}}" class="nav-link"><i
                                                class="fas fa-angle-right"></i>Students</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('parent')}}" class="nav-link"><i
                                                class="fas fa-angle-right"></i>Parents</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('teacher')}}" class="nav-link"><i
                                                class="fas fa-angle-right"></i>Teachers</a>
                                    </li>
                                </ul>
                            </li>

                            
                    @endif 

                            {{-- Owner And Admin --}}

                    @if (Auth::user()->role === 'owner' || Auth::user()->role === 'admin')

                                {{-- teacher --}}
                             <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i
                                        class="flaticon-multiple-users-silhouette"></i><span>Teachers</span></a>
                                <ul class="nav sub-group-menu">
                                    <li class="nav-item">
                                        <a href="{{url('all_teachers')}}" class="nav-link"><i class="fas fa-angle-right"></i>All
                                            Teachers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('add_teacher')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add
                                            Teacher</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('teacher_payment')}}" class="nav-link"><i
                                                class="fas fa-angle-right"></i>Payment</a>
                                    </li>
                                </ul>
                            </li>
                                 {{-- student --}}
                             <li class="nav-item sidebar-nav-item">
                                 <a href="#" class="nav-link"><i class="flaticon-classmates"></i><span>Students</span></a>
                                 <ul class="nav sub-group-menu">
                                     <li class="nav-item">
                                         <a href="{{url('all_students')}}" class="nav-link"><i class="fas fa-angle-right"></i>All
                                             Students</a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="{{url('add_students')}}" class="nav-link"><i
                                                 class="fas fa-angle-right"></i>Admission Form</a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="{{url('student_promotion')}}" class="nav-link"><i
                                                 class="fas fa-angle-right"></i>Student Promotion</a>
                                     </li>
                                 </ul>
                             </li>
                                    {{-- Parent --}}
                             <li class="nav-item sidebar-nav-item">
                                 <a href="#" class="nav-link"><i class="flaticon-couple"></i><span>Parents</span></a>
                                 <ul class="nav sub-group-menu">
                                     <li class="nav-item">
                                         <a href="{{url('all_parents')}}" class="nav-link"><i class="fas fa-angle-right"></i>All
                                             Parents</a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="{{url('add_parent')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add
                                             Parent</a>
                                     </li>
                                 </ul>
                             </li>
                             <li class="nav-item sidebar-nav-item">
                                 <a href="#" class="nav-link"><i class="flaticon-books"></i><span>Library</span></a>
                                 <ul class="nav sub-group-menu">
                                     <li class="nav-item">
                                         <a href="{{url('all_books')}}" class="nav-link"><i class="fas fa-angle-right"></i>All
                                             Book</a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="{{url('add_book')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add New
                                             Book</a>
                                     </li>
                                 </ul>
                             </li>
                             <li class="nav-item sidebar-nav-item">
                                 <a href="#" class="nav-link"><i class="flaticon-technological"></i><span>Acconunt</span></a>
                                 <ul class="nav sub-group-menu">
                                     <li class="nav-item">
                                         <a href="{{url('all_fees')}}" class="nav-link"><i class="fas fa-angle-right"></i>All Fees
                                             Collection</a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="{{url('all_expense')}}" class="nav-link"><i
                                                 class="fas fa-angle-right"></i>Expenses</a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="{{url('add_expense')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add
                                             Expenses</a>
                                     </li>
                                 </ul>
                             </li>
                             <li class="nav-item sidebar-nav-item">
                                 <a href="#" class="nav-link"><i
                                         class="flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i><span>Class</span></a>
                                 <ul class="nav sub-group-menu">
                                     <li class="nav-item">
                                         <a href="{{url('all_classes')}}" class="nav-link"><i class="fas fa-angle-right"></i>All
                                             Classes</a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="{{url('add_class')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add New
                                             Class</a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="{{url('add_section')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add New
                                             Section</a>
                                     </li>
                                 </ul>
                             </li>
                             <li class="nav-item">
                                 <a href="{{url('all_subjects')}}" class="nav-link"><i
                                         class="flaticon-open-book"></i><span>Subject</span></a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{url('class_routine')}}" class="nav-link"><i class="flaticon-calendar"></i><span>Class
                                         Routine</span></a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{url('student_attendence')}}" class="nav-link"><i
                                         class="flaticon-checklist"></i><span>Attendence</span></a>
                             </li>
                             <li class="nav-item sidebar-nav-item">
                                 <a href="#" class="nav-link"><i class="flaticon-shopping-list"></i><span>Exam</span></a>
                                 <ul class="nav sub-group-menu">
                                     <li class="nav-item">
                                         <a href="{{url('exam_schedule')}}" class="nav-link"><i class="fas fa-angle-right"></i>Exam
                                             Schedule</a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="{{url('exam_grade')}}" class="nav-link"><i class="fas fa-angle-right"></i>Exam
                                             Grades</a>
                                     </li>
                                 </ul>
                             </li>
                             <li class="nav-item">
                                 <a href="{{url('transport')}}" class="nav-link"><i
                                         class="flaticon-bus-side-view"></i><span>Transport</span></a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{url('hostel')}}" class="nav-link"><i class="flaticon-bed"></i><span>Hostel</span></a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{url('notice')}}" class="nav-link"><i
                                         class="flaticon-script"></i><span>Notice</span></a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{url('message')}}" class="nav-link"><i
                                         class="flaticon-chat"></i><span>Messeage</span></a>
                             </li>

                    @endif

                             
                         </ul>
                     </div>
                 </div>
                 <!-- Sidebar Area End Here -->
            </aside>