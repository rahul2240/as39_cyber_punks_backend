<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Laravel</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ url('css/mdb.min.css')}}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{ url('css/style.min.css')}}" rel="stylesheet">
  <style type="text/css">
    html,
    body,
    .carousel {
      height: 60vh;
    }

    @media (max-width: 740px) {

      html,
      body,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background: #929FBA !important;
      }
    }

  </style>
</head>

<body>

  <header>

    <nav style="background-color: #929FBA;" class="navbar navbar-expand-lg navbar-dark scrolling-navbar">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="https://assets-bg.gem.gov.in/resources/images/gem-new-logo-v3.svg"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"
        aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/login">Login
          
        </a>
      </li>
    </ul>
  </div>
    </div>
  </nav>
    <!-- Navbar -->

  </header>

  <!--Main layout-->
  <main>



    <!--Carousel Wrapper-->
    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">

      <!--Indicators-->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-1z" data-slide-to="1"></li>
        <li data-target="#carousel-example-1z" data-slide-to="2"></li>
      </ol>
      <!--/.Indicators-->

      <!--Slides-->
      <div class="carousel-inner" role="listbox">

        <!--First slide-->
        <div class="carousel-item active">
          <div class="view" style="background-image: url('img/home1.png'); background-repeat: no-repeat; background-size: cover;">

            <!-- Mask & flexbox options-->
            <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

              
            </div>
            <!-- Mask & flexbox options-->

          </div>
        </div>
        <!--/First slide-->

        <!--Second slide-->
        <div class="carousel-item">
          <div class="view" style="background-image: url('img/home2.png'); background-repeat: no-repeat; background-size: cover;">

            <!-- Mask & flexbox options-->
            <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

             

            </div>
            <!-- Mask & flexbox options-->

          </div>
        </div>
        <!--/Second slide-->

        <!--Third slide-->
        <div class="carousel-item">
          <div class="view" style="background-image: url('img/home3.jpg'); background-repeat: no-repeat; background-size: cover;">

            <!-- Mask & flexbox options-->
            <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

            
            </div>
            <!-- Mask & flexbox options-->

          </div>
        </div>
        <!--/Third slide-->

      </div>
      <!--/.Slides-->

      <!--Controls-->
      <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <!--/.Controls-->

    </div>
    <!--/.Carousel Wrapper-->

    <div class="container">

      <!--Section: Main info-->
      <section class="mt-5 wow fadeIn">

        <!--Grid row-->
        <div class="row">

          <!--Grid column-->
          <div class="col-md-6 mb-4">

            <img src="{{ url('img/gem1.png') }}" class="img-fluid z-depth-1-half"
              alt="">

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 mb-4">

            <!-- Main heading -->
            <h3 class="h3 mb-3">Introduction to Government e Marketplace (GeM)</h3>
            <p>Hon'ble Prime Minister, based on recommendations of the Group of Secretaries, decided to set up a dedicated e market for different goods & services procured by Government Organisations / Departments / PSUs.
             </p>

            <hr>

            <p>
             Government e Marketplace (GeM), created in a record time of five months, facilitates online procurement of common use Goods & Services required by various Government Departments / Organisations / PSUs.
            </p>

           

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </section>
      <!--Section: Main info-->

      <hr class="my-5">

      <!--Section: Main features & Quick Start-->
      <section>

        <h3 class="h3 text-center mb-5">Initiatives</h3>

        <!--Grid row-->
        <div class="row wow fadeIn">

         <div class="col-md-6 mb-4">

            <!-- Jumbotron -->
<div class="jumbotron text-center">

  <!-- Title -->
  <h4 class="card-title h4 pb-2"><strong>World Environment Day</strong></h4>

  <!-- Card image -->
  <div class="view overlay my-4">
    <img src="{{ url('img/envir.png') }}" class="img-fluid" alt="">
    <a href="#">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>


  <p class="card-text">This initiative will urge governments, industry, communities and individuals to come together to explore renewable energy and green technologies in order to improve air quality in cities and regions across the world</p>

</div>
<!-- Jumbotron -->

          </div>

          <!--Grid column-->
          <div class="col-md-6 mb-4">

            <!-- Jumbotron -->
<div class="jumbotron text-center">

  <!-- Title -->
  <h4 class="card-title h4 pb-2"><strong>Poshan Abhiyaan</strong></h4>

  <!-- Card image -->
  <div class="view overlay my-4">
    <img src="{{ url('img/yoj.png') }}" class="img-fluid" alt="">
    <a href="#">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  
  <p class="card-text">Different ministries are converging to make the mission successful. By synergising frontline functionaries and volunteers, the Ministry of Women & Child Development is planning to reach 11 crore people and thereby convert the mission into Jan Andolan.</p>

 

</div>
<!-- Jumbotron -->
          </div>
          <!--/Grid column-->

        </div>
        <!--/Grid row-->

      </section>
      <!--Section: Main features & Quick Start-->

      <hr class="my-5">

      


    

    </div>
  </main>
  <!--Main layout-->

@include('includes.footer')
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="{{ url('js/jquery-3.4.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ url('js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ url('js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ url('js/mdb.min.js')}}"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>
</body>

</html>
