<!DOCTYPE html>
<html>
    <head>
        <title>Demande Pret</title>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

        @include('layouts.master')

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->

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
        {{ session('status') }}
    </div>
    @endif
    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Les Demandes de Prêts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Consultation</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Demande de Prêt</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
            <tr >
                <th>Identifiant</th>
                <th style="width: 20%">
                    Type de prêt
                </th>
                <th style="width: 30%">
                    Date
                </th>
                <th>
                    Avancement
                </th>

                <th style="width: 20%" class="text-center">
                    Action
                </th>
            </tr>
              </thead>
              <tbody>

                  @foreach ($demandes as $demande)
                  <tr onclick="showStepper({{ $demande->id }})">

                    <td>
                        2020SONADM{{  $demande->id}}
                    </td>

                    <td>
                        {{ $demande->type }}
                    </td>
                    <td>
                        {{ $demande->created_at }}
                    </td>
                    <td class="project_progress">
                     <!--   <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-volumenow="47" aria-volumemin="0" aria-volumemax="100" style="width: 47%">
                            </div>
                        </div>
                        <small>
                            47% Complete
                        </small>-->
                        @if($demande->statut=="Refusé")
                        Refusée
                        @elseif($demande->statut=="En attente" && $demande->valid_fin==1)
                        Acceptée
                        @else
                        En attente
                        @endif
                    </td>

                    <td class="project-actions text-right">
                        @if ( $demande->valid_cu == 0 && $demande->valid_fin == 0 && $demande->statut == "En attente")
                        <a class="btn btn-info btn-sm" href="{{ route('demande.edit',$demande->id) }}" style="width: 120px;">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Modifier
                        </a>
                        <div class="dropdown-divider" style="visibility: hidden"></div>
                        <form action="{{ route('demande.destroy', $demande->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('êtes-vous sûr de vouloir supprimer?')" type="submit" style="width: 120px;">
                                <i class="fas fa-trash"> </i>
                                Annuler
                            </button>
                          </form>
                        @else
                        <a class="btn btn-info btn-sm" href="{{ route('demande.edit',$demande->id) }}" style="width: 120px;pointer-events: none;cursor: not-allowed; " disabled>
                            <i class="fas fa-pencil-alt">
                            </i>
                            Modifier
                        </a>
                        <div class="dropdown-divider" style="visibility: hidden"></div>
                        <form action="{{ route('demande.destroy', $demande->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('êtes-vous sûr de vouloir annuler?')" type="submit" style="width: 120px;" disabled>
                                <i class="fas fa-trash"> </i>
                                Annuler
                            </button>
                          </form>
                        @endif
                    </td>
                </tr>
                  @endforeach


              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
    </div>

<!-- Vertical Steppers -->
<div class="row mt-1">
    <div class="col-md-12">

      <!-- Stepers Wrapper -->
       @foreach ($demandes as $demande)
      <ul id="step-{{ $demande->id }}" style="display:none" class="stepper stepper-vertical">
        <h3>{{ $demande->type }}</h3>

        <!-- First Step -->
        <li class="completed" >
          <a href="#!">
            <span class="circle" style="background-color:#90EE90 !important" ><i class="fas fa-check"></i></span>
            <span class="label">Création de la demande</span>
          </a>
          <div class="step-content grey lighten-3">
            <p>Votre demande a été Envoyée avec succés</p>
          </div>
        </li>

        <!-- Second Step -->

        @if($demande->valid_cu==1 && $demande->statut=='Refusé' && $demande->valid_cl==0)
        <li class="warning">

          <!--Section Title -->
          <a href="#!">
            <span class="circle"><i class="fas fa-exclamation"></i></span>
            <span class="label">Validée par le chef unité</span>
          </a>
          <!-- Section Description -->
          <div class="step-content grey lighten-3">

            <p>Votre demande a été refusée en raison de :  @foreach(Auth::user()->notifications as $notification)
                @if($notification->data['type']==$demande->type && $notification->data['sender']=="CHEFUNITE")
                <strong>{{ $notification->data['motif'] }}</strong>
                @endif
              @endforeach
             </p>
          </div>
        </li>
        @elseif($demande->valid_cu==0)
        <li class="completed" >
          <a href="#!">
            <span class="circle"  >2</span>
            <span class="label">Validée par le chef unité</span>
          </a>
          <div class="step-content grey lighten-3">
            <p>Votre demande devra être traitée par le chef d'unité </p>
          </div>
        </li>
        @elseif($demande->valid_cu==1 && $demande->statut=='En attente')
         <li class="completed" >
          <a href="#!">
            <span class="circle" style="background-color:#90EE90 !important" ><i class="fas fa-check"></i></span>
            <span class="label">Validée par le chef unité</span>
          </a>
          <div class="step-content grey lighten-3">
            <p>Votre demande a été acceptée par le chef d'unité</p>
          </div>
        </li>

        @endif

        <!-- Third Step -->
        @if($demande->valid_cu==0 || ($demande->valid_cu==1 && $demande->statut=='Refusé' ) )
        <li >
          <a href="#!">
            <span class="circle">3</span>
            <span class="label">Classée par l'administrateur</span>
          </a>

        </li>
        @elseif($demande->valid_cl==1 && $demande->statut=='Refusé')
         <li class="warning">

          <!--Section Title -->
          <a href="#!">
            <span class="circle"><i class="fas fa-exclamation"></i></span>
            <span class="label">Classée par l'administrateur</span>
          </a>
          <!-- Section Description -->
          <div class="step-content grey lighten-3">
            <p>Votre demande a été refusée en raison de :  @foreach(Auth::user()->notifications as $notification)
                @if($notification->data['type']==$demande->type && $notification->data['sender']=="ADMINISTRATEUR")
                <strong>{{ $notification->data['motif'] }}</strong>
                @endif
              @endforeach</p>
          </div>
        </li>
        @elseif($demande->valid_cl==0 && $demande->valid_cu==1)
        <li class="completed" >
          <a href="#!">
            <span class="circle"  >2</span>
            <span class="label">Classée par l'administrateur</span>
          </a>
          <div class="step-content grey lighten-3">
            <p>Votre demande devra être traitée par l'administrateur </p>
          </div>
        </li>
        @elseif($demande->valid_cl==1 && $demande->statut=='En attente')
        <li class="completed" >
          <a href="#!">
            <span class="circle" style="background-color:#90EE90 !important" ><i class="fas fa-check"></i></span>
            <span class="label">Classée par l'administrateur</span>
          </a>
          <div class="step-content grey lighten-3">
            <p>Votre demande a été classée par l'administrateur </p>
          </div>
        </li>
        @endif

        <!-- Fourth Step -->
        @if($demande->valid_cl==0)
        <li>
         <a href="#!">
            <span class="circle">4</span>
            <span class="label">Acceptation de la demande</span>
          </a>
          </li>

        @elseif($demande->valid_cl==1 && $demande->statut=='En attente' && $demande->valid_fin==0)
         <li class="completed" >
          <a href="#!">
            <span class="circle"  >4</span>
            <span class="label">Acceptation de la demande</span>

          </a>
          <div class="step-content grey lighten-3">
            <p>Votre demande est en cours de traitement </p>
        </div>
        </li>
        @elseif($demande->valid_fin==1 )
        <li class="completed" >
          <a href="#!">
            <span class="circle" style="background-color:#90EE90 !important" ><i class="fas fa-check"></i></span>
            <span class="label">Votre demande de prêt est acceptée</span>
          </a>
          <div class="step-content grey lighten-3">
            <p>Veuillez consulter vos prêts </p>
        </div>
        </li>
        @endif


      </ul>
      <!-- /.Stepers Wrapper -->
       @endforeach

    </div>
  </div>

  <!-- Steppers Navigation -->

  <!-- /.Vertical Steppers -->

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <!-- JQuery -->
  <script>
      function showStepper(id) {
        var stp=document.querySelectorAll('*[id^="step-"]'),i;
        for (i = 0; i < stp.length; ++i) {
            stp[i].style.display = "none";
        }
        document.getElementById("step-"+id).style.display = "block";
    }
  </script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>




@include('layouts.script')

</body>
</html>
