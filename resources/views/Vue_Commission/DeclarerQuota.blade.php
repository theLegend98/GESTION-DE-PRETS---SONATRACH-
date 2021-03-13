<!DOCTYPE html>
<html>
    <head>
       <title>Home</title>
       <link rel="stylesheet" href="{{ asset('https://unpkg.com/materialize-stepper@3.1.0/dist/css/mstepper.min.css') }}">

       @include('layouts.master')

    </head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
 @include('layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('layouts.sidebar_Commission')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Defintion Quota</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
              <li class="breadcrumb-item active">Definition quota</li>

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
              <!-- general form elements -->
              <div class="card card-primary" >
                  <div class="card-header" style="background-color: #6c757d">
                    <h3 class="card-title">Définir quota</h3>

                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" action="/defineQuota" method="POST" enctype="multipart/form-data">
                      @csrf
                    <div class="card-body">
                      <!-- select -->
                      <div class="form-group">
                          <label for="quotaSocial">Quota Social</label>
                          <input type="number" class="form-control" id="quotaSocial" name="quotaSocial" placeholder="Social">
                      </div>
                      <div class="form-group">
                        <label for="quotaVehicule">Quota Vehicule</label>
                        <input type="number" class="form-control" id="quotaVehicule" name="quotaVehicule" placeholder="Vehicule">
                    </div>
                    <div class="form-group">
                        <label for="quotaConstruction">Quota Construction</label>
                        <input type="number" class="form-control" id="quotaConstruction" name="quotaConstruction" placeholder="Construction">
                    </div>
                    <div class="form-group">
                        <label for="quotaAchatlogement">Quota Achat logement</label>
                        <input type="number" class="form-control" id="quotaAchatlogement" name="quotaAchatlogement" placeholder="Achat logement">
                    </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" style="background-color: #ff8500;border-color:#ff8500">Envoyer</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->

            </div>


          </div>




@include('layouts.script')
<script src="https://unpkg.com/materialize-stepper@3.1.0/dist/js/mstepper.min.js">
</script>


</body>
</html>
