<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>


        <link rel="stylesheet" href="{{ asset('https://unpkg.com/materialize-stepper@3.1.0/dist/css/mstepper.min.css') }}">

        <style>

            .navbar-sona {
             background-color: #fd7e14;
        }
            .image-container {
            position: relative;
        }

        .imag {
            opacity: 1;
            display: block;
            width: 100%;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;
        }

        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .image-container:hover .image {
            opacity: 0.3;
        }

        .image-container:hover .middle {
            opacity: 1;
        }
        </style>
        @include('layouts.master')




    </head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
 @include('layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('layouts.sidebar_SimpleAgent')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        @if(session('status')=="passwords.reset")
        Mot de passe modifié
        @endif
    </div>
    @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark" >Bienvenue <Strong style="text-transform: capitalize;">{{ Auth::user()->name }}</strong></h1>
            <h5 class="m-0 text-dark" style="padding: 30px 0 0 0;">APPLICATION GESTION DE PRÊTS - SONATRACH</h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>


            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-md-12">
            <div class="card card-primary" >
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active" >
                    <img class="d-block w-100" src="{{ asset('dist/img/sona-2.jpg') }}" style="height: 400px" alt="First slide">
                  </div>
                  <div class="carousel-item" >
                    <img class="d-block w-100" src="{{ asset('dist/img/sonatrach_siege.png') }}"  style="height: 400px" alt="Second slide">
                  </div>
                  <div class="carousel-item" >
                    <img class="d-block w-100" src="{{ asset('dist/img/right-1-2.jpg') }}" style="height: 400px" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
              <div class="info-box" style="height: 100px">
                <span class="info-box-icon "><img src="{{ asset('dist/img/sonatrach-logo.png') }}"  style="height: 90px; width:90px"/></span>

                <div class="info-box-content">
                  <span class="info-box-text"><strong>Sonatrach</strong></span>
                  <a href="https://sonatrach.com/" target="_blank"><span class="info-box-number">Visiter le site officiel ></span></a>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-6 col-sm-6 col-12">
              <div class="info-box" style="height: 100px">
                <span class="info-box-icon "><img src="{{ asset('dist/img/esi-sba.svg.png') }}" style="height: 80px; width:70px"/></span>

                <div class="info-box-content">
                  <span class="info-box-text"><strong>Esi-Sba</strong></span>
                  <a href="http://www.esi-sba.dz/fr/" target="_blank"><span class="info-box-number">Visiter le site officiel ></span></a>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>


            </div>
            <!-- /.col -->
          </div>




@include('layouts.script')
<script src="https://unpkg.com/materialize-stepper@3.1.0/dist/js/mstepper.min.js">
</script>
<script>
    $(document).ready(function () {
            $imgSrc = $('#imgProfile').attr('src');
            function readURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#imgProfile').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $('#btnChangePicture').on('click', function () {
                // document.getElementById('profilePicture').click();
                if (!$('#btnChangePicture').hasClass('changing')) {
                    $('#profilePicture').click();
                }
                else {
                    // change
                }
            });
            $('#profilePicture').on('change', function () {
                readURL(this);
                $('#btnChangePicture').addClass('changing');
                $('#btnChangePicture').attr('value', 'Confirmer');
                $('#btnDiscard').removeClass('d-none');
                // $('#imgProfile').attr('src', '');
            });
            $('#btnDiscard').on('click', function () {
                // if ($('#btnDiscard').hasClass('d-none')) {
                $('#btnChangePicture').removeClass('changing');
                $('#btnChangePicture').attr('value', 'Changer');
                $('#btnDiscard').addClass('d-none');
                $('#imgProfile').attr('src', $imgSrc);
                $('#profilePicture').val('');
                // }
            });
        });
</script>

</body>
</html>
