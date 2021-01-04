<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image" href="/img/icon.jpg">
  <title>MusiCloud</title>
<!--

Template 2101 Insertion

http://www.tooplate.com/view/2101-insertion

-->
  <!-- load CSS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">        <!-- Google web font "Open Sans" -->
  <link rel="stylesheet" href="css/bootstrap.min.css">                                            <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/fontawesome-all.min.css">                                      <!-- Font awesome -->
  <link rel="stylesheet" href="css/tooplate-style.css">                                           <!-- Templatemo style -->

  <script>
    var renderPage = true;

    if (navigator.userAgent.indexOf('MSIE') !== -1
      || navigator.appVersion.indexOf('Trident/') > 0) {
      /* Microsoft Internet Explorer detected in. */
      alert("Please view this in a modern browser such as Chrome or Microsoft Edge.");
      renderPage = false;
    }
  </script>

</head>

<body>

  <!-- Loader -->
  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>

  <div class="tm-main">

    <div class="tm-welcome-section">
      <div class="container tm-navbar-container">
        <div class="row">
          <div class="col-xl-12">
            <nav class="navbar navbar-expand-sm">
              <ul class="navbar-nav ml-auto">
                  <style>
                      #logout:hover, #login:hover, #register:hover{
                        background-color: #A28BE7;
                        padding: 5px;
                        border-radius: 10px;
                      }

                  </style>
                <li class="nav-item active">
                    @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            {{Auth::user()->name}}
                            <a href="{{route('folder.index')}}" class="text-sm text-indigo-700 underline ml-3" id="logout" style="color: white">My Musics</a>
                            <a href="{{ route('logout') }}" class="text-sm text-indigo-700 underline ml-3" id="logout" style="color: white">Log Out</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-indigo-700 underline" id="login" style="color: white">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline" id="register" style="color: white">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>

      <div class="container text-center tm-welcome-container">
        <div class="tm-welcome">
          <i class="fas tm-fa-big fa-music tm-fa-mb-big"></i>
          <h1 class="text-uppercase mb-3 tm-site-name">MusiCloud</h1>
          <p class="tm-site-description">Store your Musics in a Full Availability</p>
        </div>
      </div>

    </div>

    <div class="container">

      <div class="row tm-albums-container grid">
        <div class="col-sm-6 col-12 col-md-6 col-lg-3 col-xl-3 tm-album-col">
          <figure class="effect-sadie">
            <img src="img/insertion-260x390-01.jpg" alt="Image" class="img-fluid">
            <figcaption>
              <h2>Jazz</h2>
              <p>Rollover text and description text goes here over mouse over...</p>
            </figcaption>
          </figure>
        </div>
        <div class="col-sm-6 col-12 col-md-6 col-lg-3 col-xl-3 tm-album-col">
          <figure class="effect-sadie">
            <img src="img/insertion-260x390-02.jpg" alt="Image" class="img-fluid">
            <figcaption>
              <h2>Rock</h2>
              <p>Maecenas iaculis et turpis et iaculis. Aenean at volutpat diam.</p>
            </figcaption>
          </figure>
        </div>
        <div class="col-sm-6 col-12 col-md-6 col-lg-3 col-xl-3 tm-album-col">
          <figure class="effect-sadie">
            <img src="img/insertion-260x390-03.jpg" alt="Image" class="img-fluid">
            <figcaption>
              <h2>Pop</h2>
              <p>Vivamus eget elit purus. Nullam consectetur porttitor elementum.</p>
            </figcaption>
          </figure>
        </div>
        <div class="col-sm-6 col-12 col-md-6 col-lg-3 col-xl-3 tm-album-col">
          <figure class="effect-sadie">
            <img src="img/insertion-260x390-04.jpg" alt="Image" class="img-fluid">
            <figcaption>
              <h2>Album Four</h2>
              <p>Praesent nec feugiat dolor, elementum mollis purus. Etiam faucibus.</p>
            </figcaption>
          </figure>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="tm-tag-line">
          <h2 class="tm-tag-line-title">Music is your powerful energy.</h2>
          </div>
        </div>
      </div>

      <footer class="row">
        <div class="col-xl-12">
          <p class="text-center p-4">Copyright &copy; <span class="tm-current-year">2021</span> MusiCloud

          - Design:  Tooplate</p>
        </div>
      </footer>
    </div> <!-- .container -->

  </div> <!-- .main -->

  <!-- load JS -->
  <script src="js/jquery-3.2.1.slim.min.js"></script> <!-- https://jquery.com/ -->
  <script>

    /* DOM is ready
    ------------------------------------------------*/
    $(function () {

      if (renderPage) {
        $('body').addClass('loaded');
      }

      $('.tm-current-year').text(new Date().getFullYear());  // Update year in copyright
    });

  </script>
</body>
</html>
