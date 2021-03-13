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
            <h1>Liste des Agents</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Consultation des agents</li>
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
          <h3 class="card-title">Liste des agents SONATRACH </h3>

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

                      <th>Nom</th>
                      <th style="width: 20%">
                          Prénom
                      </th>
                      <th style="width: 30%">
                          Date de naissance
                      </th>
                      <th>
                          Téléphone
                      </th>
                      <th>
                        Département
                    </th>
                    <th>
                        Poste
                    </th>
                      <th style="width: 20%">
                        Action
                      </th>
                  </tr>
              </thead>
              <tbody>

                  @foreach ($agents as $agent)

                  <tr>

                    <td>

                        {{$agent->nom}}
                    </td>
                    <td>
                        {{$agent->prenom}}

                    </td>
                    <td>
                        {{$agent->ddn}}
                    </td>
                    <td>
                        {{$agent->tel}}
                    </td>
                    <td>
                        @if($agent->id_departement==1 )
                        Ressources humaines
                        @elseif($agent->id_departement==2)
                        Juridique
                        @elseif($agent->id_departement==3)
                        Administration générale
                        @elseif($agent->id_departement==4)
                        Finance
                        @elseif($agent->id_departement==5)
                        Informatique et système d'information
                        @elseif($agent->id_departement==6)
                        Audit
                        @endif

                    </td>

                    <td>
                        {{$agent->statut}}
                    </td>


                    <td class="project-actions text-center">


                        <a id="demande" type="button" class="btn  btn-info"  style="width: 120px;"  href="{{ route('Agent.edit',$agent->id)}}"  >
                        <i class="fas fa-edit">
                        </i>
                        Modifier
                    </a>


                     <div class="dropdown-divider" style="visibility: hidden"></div>
                        <form role="form" action="{{ route('Agent.destroy', $agent->id)}}" method="POST">
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
  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->
  @include('layouts.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
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
