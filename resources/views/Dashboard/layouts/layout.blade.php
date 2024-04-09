<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.2
 * @link http://coreui.io
 * Copyright (c) 2016 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
 <!DOCTYPE html>
<html lang="IR-fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{$settings->translate(app()->getlocale())->content}}">
    <meta name="keyword" content="{{$settings->translate(app()->getlocale())->title}}">
    <link rel="shortcut icon" href="{{asset($settings->favicon)}}">
    <title>{{$settings->translate(app()->getlocale())->title}}</title>
    <!-- Icons -->
    <link href="{{asset('assets')}}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{asset('assets')}}/dest/style.css" rel="stylesheet">
    <link herf="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<!-- BODY options, add following classes to body to change options
		1. 'compact-nav'     	  - Switch sidebar to minified version (width 50px)
		2. 'sidebar-nav'		  - Navigation on the left
			2.1. 'sidebar-off-canvas'	- Off-Canvas
				2.1.1 'sidebar-off-canvas-push'	- Off-Canvas which move content
				2.1.2 'sidebar-off-canvas-with-shadow'	- Add shadow to body elements
		3. 'fixed-nav'			  - Fixed navigation
		4. 'navbar-fixed'		  - Fixed navbar
	-->

<body class="navbar-fixed sidebar-nav fixed-nav">


    <header class="navbar">

    
        <div class="container-fluid">
        <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button" >&#9776;</button>
            
            <a class="navbar-brand" href="#" style="background-image:url({{asset($settings->logo)}});"></a>
            <ul class="nav navbar-nav hidden-md-down">
                <li class="nav-item">
                    <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                </li>

               
            </ul>

            
            <ul class="nav navbar-nav pull-left hidden-md-down">
            
              @if(isset(auth()->user()->id))
              <li>{{auth()->user()->name}}({{(auth()->user()->status)}})<li>
              @endif
                
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="hidden-md-down">{{__('words.setting')}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <i class="dropdown-item ">{{__('words.settings')}}</i>
                        <!-- <a class="dropdown-item" href="#"><i class="fa fa-user"></i> {{__('words.profile')}}</a> -->
                        <a class="dropdown-item" href="{{route('dashboard.users.edit',auth()->user())}}"><i class="fa fa-wrench"></i> {{__('words.user_setting')}}</a>
                        <!--<a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span class="tag tag-default">42</span></a>-->
                        <div class="divider"></div>
                        
                          
                           
                                    <a class="dropdown-item" href=""
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('words.Logout') }}
                                    </a>

                                    <form id="logout-form" action="" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                

                       
                    </div>
                </li>
                <li class="nav-item">

            <ul class="nav navbar-nav pull-left hidden-md-down">
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="hidden-md-down">{{LaravelLocalization::getCurrentLocaleNative()}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                   
                     @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                     
                         <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                               {{ $properties['native'] }}
                         </a>
                     
                     @endforeach
                    
                   </div>
               </ul>
                    
                </li>
            </li>
            </ul>

            
        </div>
    </header>

   

   
    @include('dashboard.layouts.sidebar')


    <!-- Main content -->
    <main class="main">



       
 <!-- Breadcrumb -->
       
        
        <!--/.container-fluid-->

     

       @yield('content')
    </main>

    <aside class="aside-menu">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                
                <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab"><i class="icon-list"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><i class="icon-speech"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#settings" role="tab"><i class="icon-settings"></i></a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            
            <div class="tab-pane p-a-1" id="settings" role="tabpanel">
                
        </div>
    </aside>

    @include('dashboard.layouts.footer')
    <!-- Bootstrap and necessary plugins -->
    <script src="{{asset('assets')}}/js/libs/jquery.min.js"></script>
    <script src="{{asset('assets')}}/js/libs/tether.min.js"></script>
    <script src="{{asset('assets')}}/js/libs/bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/js/libs/pace.min.js"></script>

    <!-- Plugins and scripts required by all views -->
    <script src="{{asset('assets')}}/js/libs/Chart.min.js"></script>

    <!-- CoreUI main scripts -->

    <script src="{{asset('assets')}}/js/app.js"></script>

    <!-- Plugins and scripts required by this views -->
    <!-- Custom scripts required by this view -->
    <script src="{{asset('assets')}}/js/views/main.js"></script>

    <!-- Grunt watch plugin -->
    <script src="{{asset('assets')}}/localhost:35729/livereload.js"></script>

    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script>
       /*$(document).ready(function(){
          $('#table_id').DataTable({
            processing: true,
          });
        });*/
        // var alleditors = document.querySelectorAll('#editor');
        // for(var i=0; i < alleditors ; ++i){
        //     classicEditor
        //     .create(alleditors[i],{
        //         aligment:{
        //             options:['left','right','center','justify']
        //         },
        //     });
        // }
        // $(document).ready(function(){
        //     $('.js-example-basic-multiple').select2();
        // })
    </script>
     <script>
                      var alleditors = document.querySelectorAll('#editor');
                      for(var i =0 ; i < alleditors.length; ++i){  
                        ClassicEditor.create( alleditors[i]);
                                
                            }
                            $(document).ready(function(){
                                 $('.js-example-basic-multiple').select2();
                             })
                </script>

    @stack('javascripts')
</body>

</html>
