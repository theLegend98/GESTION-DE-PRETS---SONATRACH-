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
@include('layouts.sidebar_Administrateur')

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
            <h1 class="m-0 text-dark">Profil</h1>
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
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start flex-column">
                                <div class="image-container" style="margin-bottom: 10%">
                                    <img src="storage/avatars/{{ Auth::user()->avatar }}" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                    <div class="middle">
                                        <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Changer" />
                                        <form action="/profile" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" style="display: none;" id="profilePicture" name="avatar" accept="image/png, image/jpeg" />
                                    </div>

                                </div>
                                <div class="userData ml-1">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold; text-align: center"><a href="javascript:void(0);">{{ Auth::user()->name }}</a></h2>
                                    <h6 class="d-block" style="text-align: center"> {{ $agent->statut }}</h6>
                                    <h6 class="d-block" style="text-align: center"> {{ $agent->nomdep }}</h6>
                                </div>
                                <div class="ml-4">
                                      <input type="submit" class="btn btn-primary d-none" id="btnAccept" value="Confirmer" />
                                    </form>
                                    <br><br>
                                      <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Annuler" />

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Information</a>
                                    </li>

                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">


                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Nom & Prenom</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{ $agent->nom }} {{ $agent->prenom }}
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Poste</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{ $agent->statut }}
                                            </div>
                                        </div>
                                        <hr/>

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Date de naissance</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{ $agent->ddn }}
                                            </div>
                                        </div>
                                        <hr />


                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Département</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                              @if($agent->nomdep=="RHU" )
                                              Ressources humaines
                                              @elseif($agent->nomdep=="JUR")
                                              Juridique
                                              @elseif($agent->nomdep=="DAG")
                                              Administration générale
                                              @elseif($agent->nomdep=="FIN")
                                              Finance
                                              @elseif($agent->nomdep=="PLS")
                                              Informatique et système d'information
                                              @elseif($agent->nomdep=="AUD")
                                              Audit
                                              @endif
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                              {{ $agent->email}}
                                            </div>
                                        </div>

                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">N°TELEPHONE</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                {{ $agent->tel }} <button  type="button"  data-toggle="modal"  data-target="#normalModal">   <i class="fas fa-edit" ></i></button>
                                            </div>
                                        </div>

                                        <hr />

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="normalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Modifier N°TELEPHONE</h5>

                                </div>
                                <div class="modal-body">
                                    <form id="formtel" role="form" action="{{ route('Agent.editTel',$agent->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">N°TELEPHONE:</label>
                                            <textarea class="form-control" id="message-text" name="tel" pattern="[0]{1}[0-9]{9}"></textarea>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-info">Modifier</button>
                                        </div>
                                </form>
                              </div>
                            </div>
                          </div>


                    </div>

                </div>
            </div>
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
                $('#btnAccept').removeClass('d-none');
                // $('#imgProfile').attr('src', '');
            });
            $('#btnDiscard').on('click', function () {
                // if ($('#btnDiscard').hasClass('d-none')) {
                $('#btnChangePicture').removeClass('changing');
                $('#btnChangePicture').attr('value', 'Changer');
                $('#btnDiscard').addClass('d-none');
                $('#btnAccept').addClass('d-none');
                $('#imgProfile').attr('src', $imgSrc);
                $('#profilePicture').val('');
                // }
            });
        });
</script>

</body>
</html>
