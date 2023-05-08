<!DOCTYPE html>
<html lang="{{ locale() }}">
<head>
    <base href="{{ url('/') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title> @yield('title') - {{ setting('site_name') }}</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' /> --}}
	

	<!-- Fonts and icons -->
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
    
    @foreach ($assets->allCss() as $css)
        <link media="all" type="text/css" rel="stylesheet" href="{{ v($css) }}">
    @endforeach

	@include('admin::include.general')
    
    <style>
      .logo-img {
  height: 40px; /* set the height */
  width: auto; /* set the width to auto for responsiveness */
  max-width: 100%; /* set the maximum width */
}
.bg-light {
    background-color: #0c77e3!important;
}
.navbar[class*=bg-] .btn-toggle {
    background: hsla(0,0%,7%,.25)!important;
    color: #f8f9fa!important;
}
/* media (min-width: 768px) */
.ml-md-auto, .mx-md-auto {
    margin-left: 80%!important;
}
    </style>
</head>
<body data-background-color="{{ setting('theme_background_color','bg1')  }}">
	<div class="wrapper sidebar_minimize">
        <!-- Main Header -->
        <header class="main-header">
       
            <div class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
                        <img src="/images/SRA-LOGO.jpg" alt="{{ setting('site_name') }}" class="logo-img">
                        {{-- <span class="ml-2">{{ setting('site_name') }}</span> --}}
                    </a>
                    <!-- <a href="{{ route('admin.dashboard.index') }}" class="logo">
                        @if (is_null(get_site_logo()))
                            <h2 class="navbar-brand title">Slum Rehabilitation Authority , Auto-Annexure - II</h2>
                        @else
                            <img src="{{ get_site_logo() }}" alt="{{ setting('site_name') }}" class="navbar-brand">
                        @endif
                    </a>  -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarContent">
                        <!-- Navigation Menu -->
                        @include('admin::include.header',['fullwidth'=>false])
                        <!-- End Navigation Menu -->
            
     
                    </div>
                </div>
            </div>
        </header>
        
		    <!-- End Main Header -->

            <!-- Sidebar -->
             @include('admin::include.sidebar')
             <!-- End Sidebar -->
		
    
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                    <div class="page-header">
                        @yield('page-header')
                    </div>
                    <div class="row">
                        @include('admin::include.notification')
                    </div>
                    
                     @yield('content')
                    
                </div>
			</div>
             
			<footer class="footer">
				<div class="container-fluid">
                    @include('admin::include.footer')	
				</div>
			</footer>
		</div>
		@stack('more-actions')
	</div>
	
    @foreach($assets->allJs() as $js)
        <script src="{{ v($js) }}"></script>
    @endforeach
    
    @if(setting('custom_js',null,0)!='')
    <script>
        {!! setting('custom_js',null,0) !!}
    </script>
    @endif
    
    @stack('scripts')
    
</body>
</html>
