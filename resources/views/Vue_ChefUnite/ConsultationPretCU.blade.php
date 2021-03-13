<!DOCTYPE html>
<html>
    <head>
        <title>Consultation Pret</title>
        @include('layouts.master')
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    </head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
 @include('layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('layouts.sidebar_ChefUnite')

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
            <h1>Liste des demandes de Prêts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Consultation des demandes</li>
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
          <h3 class="card-title">Liste des demandes de Prêts au niveau du département {{  $depart->nom }} </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body ">
          <table id="example1" class="table table-bordered table-striped">
              <thead>
                  <tr>
                    <th>Identifiant</th>
                      <th>User</th>
                      <th style="width: 20%">
                          Type de demande
                      </th>
                      <th style="width: 30%">
                          Date
                      </th>
                      <th>
                          Documents
                      </th>
                      <th style="width: 20%">
                        Action
                      </th>
                  </tr>
              </thead>
              <tbody>

                  @foreach ($demandes as $demande)
                  <div class="modal fade" id="exampleModal_{{ $demande->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Motif de rejet</h5>

                        </div>
                        <div class="modal-body">
                            <form id="formmotif" role="form" action="{{ route('demande.setRefusCU',$demande->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Motif</label>
                                    <select class="form-control" name="motif">
                                        <option value="Documents faux/falsifié">Document faux/falsifié</option>
                                        <option value="Documents illisibles">Document illisible</option>

                                        <option value="Dossier incomplet">Dossier incomplet</option>
                                        <option value="Votre situation de justifie pas votre demande">Situation ne justifie pas la demande</option>
                                        <option value="Vous etes sanctionner par l'entreprise">Sanctionner par l'entreprise</option>

                                    </select>
                                </div>
                              <!--  <div class="form-group">
                                    <label for="message-text" class="col-form-label">Motif:</label>
                                    <textarea class="form-control" id="message-text" name="motif"></textarea>
                                </div>-->
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-danger">Confirmer</button>
                                </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <tr>

                    <td>
                        2020SONADM{{$demande->id}}
                    </td>
                    <td>
                            @foreach ($usersAgent as $user)
                                @if($demande->id_users===$user->id)
                                    {{ $user->nom }}

                                    {{ $user->prenom }}
                                    &nbsp;
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-id="{{ json_encode($user) }}" data-target="#exampleModalLong">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                @endif
                             @endforeach

                    </td>
                    <td>
                        {{ $demande->type }}
                    </td>
                    <td>
                        {{ $demande->created_at }}
                    </td>
                    <td>
                        <a href="{{ $demande->documents}}" class="btn " target="_blank"  >
                            <i class="fas fa-file-alt"></i>
                        </a>
                    </td>


                    <td class="project-actions text-center">
                      @if($demande->valid_cu==0)


                        <button id="demande" type="button" class="btn  btn-danger"  style="width: 120px;"  data-toggle="modal" data-target="#exampleModal_{{ $demande->id }}" >
                        <i class="fas fa-times-circle">
                        </i>
                        Refuser
                     </button>


                     <div class="dropdown-divider" style="visibility: hidden"></div>
                        <form role="form" action="{{ route('demande.setValidCU',$demande->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                        <button  type="submit" class="btn btn-success "  style="width: 120px;" onclick="return confirm('êtes-vous sûr?')">
                            <i class="fas fa-check">
                            </i>
                            Accepter
                        </button>
                         </form>
                        @else
                        Déja traitée
                        (<strong>
                            @if($demande->statut=='En attente')
                            Acceptée
                            @else
                            Refusée
                            @endif
                        </strong>
                            )
                        @endif

                    </td>
                </tr>
                  @endforeach


              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->
  @include('layouts.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Information de l'utilisateur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <table style="border: 0px solid #CCC;
            border-collapse: collapse;">
            <tr>
                <td>Nom :</td>
                <td id="tdnom"></td>
            </tr>
            <tr>
                <td>Prenom : </td>
                <td id="tdPrenom"></></td>
            </tr>
            <tr>
                <td>Date de naissance :</td>
                <td id="tdDDN"></></td>
            </tr>
            <tr>
                <td>N° telephone :</td>
                <td id="tdTel"></></td>
            </tr>
            <tr>
                <td>Poste :</td>
                <td id="tdStat"></></td>
            </tr>


            <table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

        </div>
      </div>
    </div>
  </div>



@include('layouts.script')


<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- page script -->
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        "language": {
              "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/French.json"
          }
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <script>
      $(document).on("click", ".btn.btn-default", function () {
     var myBookId = $(this).data('id');

     $(".modal-body #tdnom").empty();
   $(".modal-body #tdnom").append( myBookId.nom );
   $(".modal-body #tdPrenom").empty();
   $(".modal-body #tdPrenom").append( myBookId.prenom );
   $(".modal-body #tdDDN").empty();
   $(".modal-body #tdDDN").append( myBookId.ddn );
   $(".modal-body #tdTel").empty();
   $(".modal-body #tdTel").append( myBookId.tel );
   $(".modal-body #tdStat").empty();
   $(".modal-body #tdStat").append( myBookId.statut);
   $(".modal-body #tdSalaire").empty();
   $(".modal-body #tdSalaire").append( myBookId.salaire);

    });

  </script>


  <script>
    function writeMotif() {
      var txt;
      var motif = prompt("Entrer le motif du rejet:", "");
      if (motif != null && motif != "") {

         txt = motif ;
      }
      document.getElementById("motif").value = txt;
    }
    </script>

</body>
</html>
