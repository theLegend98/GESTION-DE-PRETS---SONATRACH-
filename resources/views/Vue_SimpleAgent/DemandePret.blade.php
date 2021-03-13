<!DOCTYPE html>
<html>
    <head>
        <title>Demande Pret</title>

        @include('layouts.master')
        <style>
            #cover-spin {
                position:fixed;
                width:100%;
                left:0;right:0;top:0;bottom:0;
                background-color: rgba(255,255,255,0.7);
                z-index:9999;
                display:none;
            }

            @-webkit-keyframes spin {
                from {-webkit-transform:rotate(0deg);}
                to {-webkit-transform:rotate(360deg);}
            }

            @keyframes spin {
                from {transform:rotate(0deg);}
                to {transform:rotate(360deg);}
            }

            #cover-spin::after {
                content:'';
                display:block;
                position:absolute;
                left:48%;top:40%;
                width:40px;height:40px;
                border-style:solid;
                border-color:black;
                border-top-color:transparent;
                border-width: 4px;
                border-radius:50%;
                -webkit-animation: spin .8s linear infinite;
                animation: spin .8s linear infinite;
            }
        </style>

    </head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
 @include('layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('layouts.sidebar_SimpleAgent')
<div id="cover-spin"></div>

@if(session()->has('message'))

    @if ( session()->get('message')== " Votre demande a bien été envoyé")
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
            <h1 >Ajouter une Demande</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil </a></li>
              <li class="breadcrumb-item active">Demande</li>

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
                  <h3 class="card-title">Faire une demande de prêt</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('demande.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <!-- select -->
                    <div class="form-group">
                        <label>Type de prêt</label>
                        <select class="form-control" name="type">
                          <option value="SOCIAL">Social</option>
                          <option value="VEHICULE">Vehicule</option>
                          <option value="ACHAT LOGEMENT">Achat Logement</option>
                          <option value="CONSTRUCTION">Construction</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Documents</label><br>
                        <small> * Veuillez entrer les documents nécessaires pour la demande de prêt.</small>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="document" id="exampleInputFile" accept=".pdf,.doc"  onchange="$('#cover-spin').show( function() {
                                // Animation complete.

                                setTimeout(function () {
                                    $('#cover-spin').hide();
                                    $('#infoupload').show();
                                    if($('#exampleInputFile').get(0).files[0]!=null){  $('#infoupload').show();}else { $('#infoupload').hide();}

                                },$('#exampleInputFile').get(0).files[0]!=null ? $('#exampleInputFile').get(0).files[0].size/500 : 0);

                                 })">
                            <label class="custom-file-label" for="exampleInputFile">Choisir un fichier</label>
                          </div>


                        </div>
                        <div id="infoupload" style="color:rebeccapurple;display:none" >Le fichier a été chargé</div>
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

@include('layouts.script')
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
    </script>


</body>

</html>
