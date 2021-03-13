<!DOCTYPE html>
<html>
    <head>
        <title>Changer mot de passe</title>

        @include('layouts.master')


    </head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Navbar -->

 @include('layouts.navbar')

<!-- Main Sidebar Container -->
@if(Auth::user()->type=="NORMAL")
@include('layouts.sidebar_SimpleAgent')
@elseif(Auth::user()->type=="CHEFUNITE")
@include('layouts.sidebar_ChefUnite')
@elseif(Auth::user()->type=="ADMINISTRATEUR")
@include('layouts.sidebar_Administrateur')
@elseif(Auth::user()->type=="COMMISSION")
@include('layouts.sidebar_Commission')
@elseif(Auth::user()->type=="SYSADM")
@include('layouts.sidebar_SYSADM')
@endif



<div id="cover-spin"></div>


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
            <h1 >Modifier mot de passe</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">accueil </a></li>
              <li class="breadcrumb-item active">Changer mot de passe</li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary" >
                <div class="card-header" style="background-color: #6c757d">
                  <h3 class="card-title">Changer  mot de passe</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('change.password') }}" method="POST" >
                    <div style="margin-top: 10px;"></div>
                    @csrf

                    @foreach ($errors->all() as $error)


                        @if($error=="The current password is match with old password.")
                        <div class="alert alert-danger " role="alert" style="margin-left: 18px;margin-right:18px;">Mot passe actuel incorrect</div>
                        @elseif($error=="validation.required")
                        <div class="alert alert-danger " role="alert" style="margin-left: 18px;margin-right:18px;">Veuillez remplir tous les champs</div>
                        @elseif($error=="validation.same")
                        <div class="alert alert-danger " role="alert" style="margin-left: 18px;margin-right:18px;">Nouveau mot de passe erroné</div>
                        @endif
                    @endforeach
                    </span>
                  <div class="card-body">
                    <!-- select -->
                    <div class="form-group">
                        <label>Mot de passe actuel</label>
                        <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                    </div>

                    <div class="form-group">
                        <label>Nouveau Mot de passe</label>
                        <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                    </div>

                    <div class="form-group">
                        <label>Confirmer Nouveau Mot de passe</label>
                        <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
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
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">


        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>


@include('layouts.script')
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>



</body>

</html>
