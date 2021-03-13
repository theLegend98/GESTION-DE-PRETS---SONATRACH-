<!DOCTYPE html>
<html>
    <head>
        <title>Consultation Agents</title>
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
@include('layouts.sidebar_SYSADM')

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
            <h1>Liste des utlisateurs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Consultation des utilisateurs</li>
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
          <h3 class="card-title">Liste des utilisateurs SONATRACH </h3>

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

                      <th>Agents</th>
                      <th>Département</th>
                      <th>Pseudo</th>
                      <th style="width: 20%">
                        Rôle
                      </th>
                      <th style="width: 30%">
                        Email
                      </th>

                      <th style="width: 20%">
                        Action
                      </th>
                  </tr>
              </thead>
              <tbody>

                  @foreach ($Users as $user)

                  <tr>

                    <td>

                        {{$user->nom }}  {{$user->prenom}}
                        <button type="button" class="btn btn-default" data-toggle="modal" data-id="{{ json_encode($user) }}" data-target="#exampleModalLong">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                    <td>
                        @if($user->id_departement==1 )
                        Ressources humaines
                        @elseif($user->id_departement==2)
                        Juridique
                        @elseif($user->id_departement==3)
                        Administration générale
                        @elseif($user->id_departement==4)
                        Finance
                        @elseif($user->id_departement==5)
                        Informatique et système d'information
                        @elseif($user->id_departement==6)
                        Audit
                        @endif
                    </td>
                    <td>
                        {{$user->name }}
                    </td>
                    <td>
                        @if($user->type=="NORMAL" )
                        Agent simple
                        @elseif($user->type=="CHEFUNITE" )
                        Chef d'unité
                        @elseif($user->type=="ADMINISTRATEUR" )
                        Administrateur
                        @elseif($user->type=="COMMISSION" )
                        Financier
                        @elseif($user->type=="SYSADM" )
                        Administrateur systeme
                        @endif

                    </td>
                    <td>
                        {{ $user->email }}
                    </td>


                    <td class="project-actions text-center">


                        <a id="demande" type="button" class="btn  btn-info"  style="width: 120px;"  href="{{ route('User.edit',$user->id)}}"  >
                        <i class="fas fa-edit">
                        </i>
                        Modifier
                    </a>


                     <div class="dropdown-divider" style="visibility: hidden"></div>
                        <form role="form" action="{{ route('User.destroy', $user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                        <button  type="submit" class="btn btn-danger "  style="width: 120px;" onclick="return confirm('  Êtes-vous sûr de vouloir supprimer?')">
                            <i class="fas fa-times-circle">
                            </i>
                            Archiver
                        </button>
                         </form>


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
                <td>Prénom : </td>
                <td id="tdPrenom"></></td>
            </tr>
            <tr>
                <td>Date de naissance :</td>
                <td id="tdDDN"></></td>
            </tr>
            <tr>
                <td>N° téléphone :</td>
                <td id="tdTel"></></td>
            </tr>
            <tr>
                <td>Poste :</td>
                <td id="tdStat"></></td>
            </tr>

            <table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>

  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>





@include('layouts.script')

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


  });

</script>
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
