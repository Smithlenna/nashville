<link rel="stylesheet" href="/admin/css/awesomplete.css">
<script src="/admin/js/awesomplete.min.js"></script>    <!-- sidebar-->
<style>
   .menu-border-transparent {
   border-color: transparent !important;
   height: 40px;
   color: #a9a3a3;
   background-color: rgba(255, 255, 255, .1);
   /*width: 100%;*/
   }
   input[type="search"]::-webkit-search-cancel-button {
   -webkit-appearance: searchfield-cancel-button;
   }
   .inner-addon {
   position: relative;
   }
   .left-addon .fa {
   left: 0px;
   }
   .inner-addon .fa {
   position: absolute;
   pointer-events: none;
   padding: 13px;
   }
   .left-addon input {
   padding-left: 30px;
   }
</style>
<aside class="aside">
   <!-- START Sidebar (left)-->
   <div class="aside-inner">
      <nav data-sidebar-anyclick-close="" class="sidebar ">
         <!-- START sidebar nav-->
         <ul class="nav">
            <!-- START user info-->
            <li class="has-user-block">
               <a href="/admin/users/{{ Auth::user()->id }}">
                  <div id="user-block" class="block">
                     <div class="item user-block">
                        <!-- User picture-->
                        <div class="user-block-picture">
                           <div class="user-block-status">
                              <img src="{{ \Auth::user()->image }}" alt="Avatar" width="60"
                                 height="60"
                                 class="img-thumbnail img-circle">
                              <div class="circle circle-success circle-lg"></div>
                           </div>
                        </div>
                        <!-- Name and Job-->
                        <div class="user-block-info">
                           <span class="user-block-name">{{ \Auth::user()->name }}</span>
                           <span class="user-block-role"></i> Online</span>
                        </div>
                     </div>
                  </div>
               </a>
            </li>
         </ul>
         <!-- END user info-->
         <div class="inner-addon left-addon" style="width: 95%">
            <i class="fa fa-search"></i>
            <input type="search" id="s-menu" class="form-control menu-border-transparent" placeholder="Search in menu..."/>
         </div>
         <br/>
         <ul class='nav s-menu '>
            <li class='active' >
               <a  title='Dashboard' href="{{ url(\Auth::user()->role.'/dashboard') }}">
               <em class='fa fa-dashboard'></em><span>Dashboard</span></a>
            </li>
            <li class='sub-menu '>
               <a data-toggle='collapse' href='#news'> <em class='fa fa-newspaper-o'></em><span>Posts</span></a>
               <ul id=news class='nav s-menu sidebar-subnav collapse'>
                  <li class="sidebar-subnav-header">Posts
                  </li>
                  <li class='' >
                     <a  title='Add Post' href="">
                     <em class='fa fa-plus'></em><span>Add New</span></a>
                  </li>
                  <li class='' >
                     <a  title='All posts' href="">
                     <em class='icon-list'></em><span>All Posts</span></a>
                  </li>
                  <li class='' >
                     <a  title='Categories' href="">
                     <em class='fa fa-sitemap'></em><span>Category</span></a>
                  </li>
               </ul>
            </li>
            <li class='sub-menu '>
               <a data-toggle='collapse' href='#countries'> <em class='fa fa-newspaper-o'></em><span>Countries</span></a>
               <ul id=countries class='nav s-menu sidebar-subnav collapse'>
                  <li class="sidebar-subnav-header">Countries
                  </li>
                  <li class='' >
                     <a  title='Add Post' href="{{ route('countries.create') }}">
                     <em class='fa fa-plus'></em><span>Add Country</span></a>
                  </li>
                  <li class='' >
                     <a  title='All posts' href="{{ route('countries.index') }}">
                     <em class='icon-list'></em><span>All Countries</span></a>
                  </li>                  
               </ul>
            </li>
            <li class='sub-menu '>
               <a data-toggle='collapse' href='#course'> <em class='fa fa-book'></em><span>Courses</span></a>
               <ul id=course class='nav s-menu sidebar-subnav collapse'>
                  <li class="sidebar-subnav-header">Courses
                  </li>
                  <li class='' >
                     <a  title='Add Course' href="">
                     <em class='fa fa-plus'></em><span>Add New</span></a>
                  </li>
                  <li class='' >
                     <a  title='Courses' href="">
                     <em class='icon-list'></em><span>All Courses</span></a>
                  </li>
               </ul>
            </li>
            
            
            <li class='sub-menu '>
               <a data-toggle='collapse' href='#testimonials'> <em class='fa fa-users'></em><span>Testimonials</span></a>
               <ul id=testimonials class='nav s-menu sidebar-subnav collapse'>
                  <li class="sidebar-subnav-header">Testimonials
                  </li>
                  <li class='' >
                     <a  title='Add Testimonial' href="">
                     <em class='fa fa-plus'></em><span>Add New</span></a>
                  </li>
                  <li class='' >
                     <a  title='Testimonials' href="">
                     <em class='icon-list'></em><span>All Testimonials</span></a>
                  </li>
               </ul>
            </li>

            
            <li class="">
              <a title="File Upload" href="           <em class="fa fa-cog"></em><span>Setting</span></a>
            </li>
         </ul>


         <!-- END sidebar nav-->
      </nav>
   </div>
   <!-- END Sidebar (left)-->
</aside>
<!-- offsidebar-->
<style type="text/css">
   .offsidebar {
   background-color: #1e1e2d
   }
</style>
<aside class="offsidebar hide">
   <!-- START Off Sidebar (right)-->
   <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" style="background:none;" id="control-sidebar-home-tab">
         <h2 style="color: #EFF3F4;font-weight: 100;text-align: center;">{{ date('l', strtotime(date('Y-m-d'))) }} <br/>{{ date('jS F', strtotime(date('Y-m-d'))) }}, {{ date('Y') }}</h2>
         <div id="idCalculadora"></div>
      </div>
      <!-- /.tab-pane -->
   </div>
   <!-- END Off Sidebar (right)-->
</aside>
<link rel="stylesheet" href="/admin/css/SimpleCalculadorajQuery.css">
<script src="/admin/js/SimpleCalculadorajQuery.js"></script>
<script>
   $("#idCalculadora").Calculadora({'EtiquetaBorrar': 'Clear', TituloHTML: ''});
</script>    <!-- Main section-->
<!-- Page content-->
<section>
  <div class="content-wrapper">
     <div class="content-heading">
        <a class='text-muted' href='/admin/dashboard'>{{ ucfirst(Request::segment('2')) }}</a>
        <div class="pull-right">
           <small class="text-sm">
           &nbsp; {{ date('l jS F', strtotime(date('Y-m-d'))) }} - {{ date('Y') }}, &nbsp;Time &nbsp;<span id="txt"></span></small>
        </div>
     </div>
