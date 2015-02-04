<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <title>Kampuzz - Welcome to Kampuzz.com </title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/font-awesome.css') }}
    {{ HTML::style('css/style.css'); }}
    {{ HTML::style('css/shop.css') }}
    {{ HTML::style('css/prettyphoto.css') }}
    {{ HTML::style('css/color-switcher.css') }}

    {{ HTML::style('css/widget.css') }}
    {{ HTML::style('js/vendor/mediaelement/mediaelementplayer.min.css') }}
    {{ HTML::style('js/vendor/mediaelement/wp-mediaelement.css') }}
    {{ HTML::style('css/responsive.css') }}
    {{ HTML::script('js/vendor/jquery/jquery-2.0.3.min.js') }}
    {{ HTML::script('js/vendor/jquery/jquery-migrate.min.js') }}
    {{ HTML::script('js/vendor/revslider/rs-plugin/js/jquery.themepunch.plugins.min.js') }}
    {{ HTML::script('js/vendor/revslider/rs-plugin/js/jquery.themepunch.revolution.min.js') }}
</head>
<body>
    <div id="fb-root"></div>
<script>
function getCookie(c_name)
     {
        var c_value = document.cookie;
        var c_start = c_value.indexOf(" " + c_name + "=");
            if (c_start == -1)
               { 
               c_start = c_value.indexOf(c_name + "="); 
               }
            if (c_start == -1)
               {
               c_value = null; 
               }
           else { 
               c_start = c_value.indexOf("=", c_start) + 1;
               var c_end = c_value.indexOf(";", c_start);
           if (c_end == -1) { c_end = c_value.length;}c_value = unescape(c_value.substring(c_start,c_end)); 
                } 
      return c_value;
       }
// This is the function using which we may store information in Browser Cookie
function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    }
    else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1771027263122867',
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

  FB.Event.subscribe('auth.authResponseChange', function(response) {
    // Here we specify what we do with the response anytime this event occurs. 
    if (response.status === 'connected') {
      getUserInfo();
    } else if (response.status === 'not_authorized') {
      FB.login();
    } else {
      FB.login();
    }
  });
  };

  // Load the SDK asynchronously
  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));

  // Here we run a very simple test of the Graph API after login is successful. 
  // This testAPI() function is only called in those cases. 
  function getUserInfo() { 
 
    FB.api('/me', function(response) {
    
         if (response.email){
        
         createCookie('email', response.email, 7) ;
         createCookie('first_name', response.first_name, 7) ;
         createCookie('last_name', response.last_name, 7) ;
           createCookie('gender', response.gender, 7) ;
           createCookie('birthday', response.birthday, 7) ;
         // redirect to Step 1 of CV Builder
          var fname = getCookie('first_name');
           var lname = getCookie('last_name');
           var email = getCookie('email');
         alert("Welcome "+fname+" "+lname+" Your mail id :-"+email);
         }

    });
  }
  function FBLogin()
  {
    FB.login(function(response) {
    if (response.authResponse) {
        getUserInfo();
    } else {
        // The person cancelled the login dialog
        alert('User cancelled login or did not fully authorize.'); 
    }
},{scope: 'email'});  
  }
</script>
<!-- Wrapper Start -->
<div class="wrapper wrapper_boxed" id="wrappermain-pix">
    <!-- Header Start -->
    <header id="header" class="headermain fullwidth">
        <div id="loginheader" class="fullwidth" style="text-align: right;">
            <div class="container">
                <i class="fa fa-lock"></i> <a href="{{ URL::route('login') }}">Login</a> | <i class="fa fa-user"></i> <a href="#">Create
                    Account</a> | <i class="fa fa-briefcase"></i> <a href="#">Institution Login</a></div>
        </div>
        <!-- Main Header -->

        <div id="mainheader" class="fullwidth">
            <div class="container">

                <div id="logo" class="float-left">
                    <a href="{{ URL::route('home') }}"><img src="{{ URL::asset('images/logo.png') }}" width="122"
                                                            height="62" alt="Kampuzz.com"/></a>

                </div>
                <!-- Right Header -->

                <div id="rightheader" class="flaot-right">

                    <!-- SearcH Area -->

                    <form action="courses.php" id="searchform" method="post" role="search">

                        <div class="searcharea float-right">

                            <a href="#searchbox" class="btnsearch"><em class="fa fa-search"></em></a>

                            <div id="searchbox">

                                <input type="text" name="keyword" value="Search for:">
                                <button type="submit" class="bgcolr"><em class="fa fa-search"></em></button>

                            </div>

                        </div>

                    </form>

                    <!-- SearcH Area Close-->


                    <!-- Navigation  -->

                    <nav class="navigation float-right">
                        {{ ($menu); }}

                    </nav>
                    <!-- Navigation Close -->


                </div>

                <!-- Right Header Close -->


            </div>

        </div>

        <!-- Main Header Close -->

    </header>

    <!-- Header Close -->

    <script type="text/javascript">
        jQuery(document).ready(function () {
            cs_menu_sticky();
        });
    </script>
    @if(Route::currentRouteName()=='home')
        @include('includes.home-banner')
    @else
        @include('includes.breadcrumb')
    @endif

    <div class="clear"></div>

    <div class="clear"></div>
    <div id="main" role="main">
        <!-- Container Start -->
        <div class="container">
            @yield('content')
        </div>
    </div>
    <!-- Content Section End -->
    <div class="clear"></div>


    @yield('sponsors')


    <!-- Footer Widgets Start -->
    <div id="footer-widgets" class="fullwidth">
        <!-- Container Start -->
        <div class="container">
            <!-- Footer Widgets Start -->


            <div class="widget widget_categories">
                <header class="cs-heading-title"><h2 class="cs-section-title">Career Options</h2></header>
                @include('includes.widget_career_options')
            </div>
            <div class="widget widget_categories">
                <header class="cs-heading-title"><h2 class="cs-section-title">Study Abroad</h2></header>
                @include('includes.widget_abroad')
            </div>
            <div class="widget widget_categories">
                <header class="cs-heading-title"><h2 class="cs-section-title">Government Jobs</h2></header>
                 @include('includes.widget_article_cat')
                <!-- <ul>

                    <li class="cat-item"><a href="articles.php?id=1">Recruitments</a></li>
                    <li class="cat-item"><a href="articles.php?id=56">Results</a></li>
                    <li class="cat-item"><a href="articles.php?id=3">Banking</a></li>
                    <li class="cat-item"><a href="articles.php?id=5">Defence</a></li>
                    <li class="cat-item"><a href="articles.php?id=71">Law</a></li>
                    <li class="cat-item"><a href="articles.php?id=2">MBA Entrance</a></li>
                    <li class="cat-item"><a href="articles.php?id=55">Medical</a></li>
                    <li class="cat-item"><a href="articles.php?id=6">Railways</a></li>
                    <li class="cat-item"><a href="articles.php?id=7">Staff Selection Committee</a></li>
                    <li class="cat-item"><a href="articles.php?id=8">State PSC</a></li>
                    <li class="cat-item"><a href="articles.php?id=11">Technical</a></li>
                    <li class="cat-item"><a href="articles.php?id=10">UPSC</a></li>
                </ul> -->
            </div>

            <div class="widget widget-recent-blog">
                <header class="cs-heading-title"><h2 class="cs-section-title">Latest Blogs</h2></header>
                <!-- Recent Posts Start -->


                <!-- Upcoming Widget Start -->
 <article class="">


                    <figure><a class='fa fa-hover' href='choosing-the-paths-of-life/index.html'><img
                                    src="{{ URL::asset('uploads/2014/01/02-stat-fort-uni-150x150.jpg') }}" alt='' width='60'></a></figure>


                    <div class="text">

                        <h6><a class="colrhvr" href="choosing-the-paths-of-life/index.html">Choosing the paths of
                                life.</a></h6>

                        <time datetime="2013-08-22">August 22, 2013</time>

                    </div>


                </article>


                <!-- Upcoming Widget Start -->

                <article class="">


                    <figure><a class='fa fa-hover' href='whats-up-with-the-microbiologoy/index.html'><img
                                    src="{{ URL::asset('uploads/2014/01/03-stat-fort-uni-150x150.jpg') }}" alt='' width='60'></a></figure>


                    <div class="text">

                        <h6><a class="colrhvr" href="whats-up-with-the-microbiologoy/index.html">What’s up with the
                                Microbiol...</a></h6>

                        <time datetime="2013-08-22">August 22, 2013</time>

                    </div>


                </article>


                <!-- Upcoming Widget Start -->

                <article class="">


                    <figure><a class='fa fa-hover' href='stuyding-music-at-academy/index.html'><img
                                    src="{{ URL::asset('uploads/2014/01/04-stat-fort-uni-150x150.jpg') }}" alt='' width='60'></a></figure>


                    <div class="text">

                        <h6><a class="colrhvr" href="stuyding-music-at-academy/index.html">Stuyding music at
                                Academy.</a></h6>

                        <time datetime="2013-08-22">August 22, 2013</time>

                    </div>


                </article>



                <!-- Recent Posts End -->

            </div>
            <!-- Footer Widgets End -->
        </div>
        <!-- Container End -->
        <footer id="footer">
            <div class="container">
                <header>
                    <a href="{{ URL::route('home') }}">
                        <img src="{{ URL::asset('images/footer-logo.png') }}" alt="Kampuzz">
                    </a>
                </header>
                <p class="copright">
                    &copy; {{ date('Y') }} Kampuzz.com - All rights reserved<br>
                    <a href="http://www.netfunda.com">Powered by Netfunda Technologies</a>
                </p>
                <!-- Language Section Start -->

                <div class="language-sec">

                    <!-- Wp Language Start -->


                </div>

                <!-- Language Section End -->
                <a class="back-to-top bgcolrhvr" id="btngotop" href="#"><em class="fa fa-chevron-up"></em></a>
            </div>
        </footer>
    </div>
    <!-- Footer Start -->
    <div class="clear"></div>
</div>
<!-- Wrapper End -->

{{ HTML::style('css/flexslider.css') }}

{{ HTML::script('js/vendor/mediaelement/mediaelement-and-player.min.js') }}
{{ HTML::script('js/vendor/mediaelement/wp-mediaelement.js') }}
{{ HTML::script('js/vendor/bootstrap.min.js') }}
{{ HTML::script('js/vendor/modernizr.js') }}
{{ HTML::script('js/vendor/jquery.prettyphoto.js') }}
{{ HTML::script('js/vendor/functions.js') }}
{{ HTML::script('js/vendor/jquery-scrolltofixed.js') }}
{{ HTML::script('js/vendor/jquery/ui/core.min.js') }}
{{ HTML::script('js/vendor/jquery/ui/widget.min.js') }}
{{ HTML::script('js/vendor/jquery/ui/mouse.min.js') }}
{{ HTML::script('js/vendor/jquery/ui/draggable.min.js') }}
{{ HTML::script('js/vendor/jquery/ui/slider.min.js') }}
{{ HTML::script('js/vendor/jquery/jquery.ui.touch-punchc.js') }}
{{ HTML::script('js/vendor/jquery.flexslider-min.js') }}
{{ HTML::script('js/vendor/jquerycycle2.js') }}
{{ HTML::script('js/vendor/cycle2carousel.js') }}

<!-- Google Analytics JS Goes here -->
</body>
</html><!-- Columns End -->
