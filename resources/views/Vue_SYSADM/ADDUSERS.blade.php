<!DOCTYPE html>
<html>
    <head>
        <title>Ajouter Utilisateur</title>

        @include('layouts.master')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">




        <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">


  <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">s
    </head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
 @include('layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('layouts.sidebar_SYSADM')

@if(session()->has('message'))

    @if ( session()->get('message')== "Utilisateur Crée")
    <div id="msgsucces" class="swal2-container swal2-top-end " style="overflow-y: auto;">
        <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-toast swal2-icon-success swal2-show" tabindex="-1" role="alert" aria-live="polite" style="display: flex;">
            <div class="swal2-header">
                <ul class="swal2-progress-steps" style="display: none;">
                </ul>
                <div class="swal2-icon swal2-error" style="display: none;">
                </div>
                <div class="swal2-icon swal2-question" style="display: none;">
                </div>
                <div class="swal2-icon swal2-warning" style="display: none;">
                </div><div class="swal2-icon swal2-info" style="display: none;">
                </div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;">
                    <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);">
                    </div>
      <span class="swal2-success-line-tip">
          </span> <span class="swal2-success-line-long"></span>
      <div class="swal2-success-ring"></div>
      <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
      <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
      </div>
        <img class="swal2-image" style="display: none;">
        <h2 class="swal2-title" id="swal2-title" style="display: flex;">  &nbsp; {{ session()->get('message') }}</h2>
        <button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button>
    </div>
    <div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: none;">
    </div>
    <input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions" style="display: none;"><button type="button" class="swal2-confirm swal2-styled" aria-label="" style="display: none; border-left-color: rgb(0, 123, 255); border-right-color: rgb(0, 123, 255);">OK</button><button type="button" class="swal2-cancel swal2-styled" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>
    @else
    <div id="msgechec" class="swal2-container swal2-top-end " style="overflow-y: auto;">
        <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-toast swal2-icon-error swal2-show" tabindex="-1" role="alert" aria-live="polite" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;"><span class="swal2-x-mark">
        <span class="swal2-x-mark-line-left"></span>
        <span class="swal2-x-mark-line-right"></span>
      </span>
    </div>
    <div class="swal2-icon swal2-question" style="display: none;">
    </div><div class="swal2-icon swal2-warning" style="display: none;">
    </div><div class="swal2-icon swal2-info" style="display: none;">
    </div><div class="swal2-icon swal2-success" style="display: none;">
    </div><img class="swal2-image" style="display: none;">
    <h2 class="swal2-title" id="swal2-title" style="display: flex;">
        &nbsp; {{ session()->get('message') }}
    </h2>
    <button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button>
    </div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: none;"></div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions" style="display: none;"><button type="button" class="swal2-confirm swal2-styled" aria-label="" style="display: none; border-left-color: rgb(0, 123, 255); border-right-color: rgb(0, 123, 255);">OK</button><button type="button" class="swal2-cancel swal2-styled" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>
    @endif
@endif
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
            <h1 >Ajouter utilisateur</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil </a></li>
              <li class="breadcrumb-item active">Ajouter utilisateur</li>

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
                  <h3 class="card-title">Ajouter utilisateur</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('User.store') }}" method="POST">
                    @csrf
                  <div class="card-body">

                    <div class="form-group">
                        <label>Agent</label>
                        <select class="selectpicker form-control"  data-live-search="true" name="id_agent" data-live-search="true" required>
                            @foreach ($agents as $agent)
                            <option value="{{ $agent->id }}">{{ $agent->nom }} {{ $agent->prenom }}</option>
                            @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="nom">Pseudo</label>
                        <input type="text" class="form-control" id="nom" placeholder="Pseudo" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control"  name="type">
                          <option value="NORMAL">AGENT</option>
                          <option value="ADMINISTRATEUR">ADMINISTRATEUR</option>
                          <option value="CHEFUNITE">CHEF D'UNITE</option>
                          <option value="COMMISSION">FINANCIER</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="email" name="email"  required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password"  required>
                    </div>


                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" style="background-color: #ff8500;border-color:#ff8500">Ajouter</button>
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
<!-- Select2 -->
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src=".{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>

<script src="{{ asset('plugins/select2/js/select2.full.min.js)')}}"></script>

<script>
    $(document).ready(function () {
  setTimeout(function () {
      $('#msgsucces').fadeOut();
  }, 2000);
});

$(document).ready(function () {
  setTimeout(function () {
      $('#msgechec').fadeOut( "slow" );
  }, 2000);
});
</script>

<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
</script>
@include('layouts.script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/i18n/defaults-fr_FR.min.js" type="text/javascript"></script>







<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>

</body>
</html>
