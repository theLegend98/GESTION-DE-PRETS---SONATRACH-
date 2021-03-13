<!DOCTYPE html>
<html>
    <head>
        <title>Historique</title>

        @include('layouts.master')

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
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
            <h1>Historique demandes de Prêts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Consultation historique</li>
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
          <h3 class="card-title">Historique des demandes de prêts</h3>

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
            <tr >
                <th>Identifiant</th>
                <th style="width: 20%">
                    Type de prêt
                </th>
                <th style="width: 30%">
                    Date
                </th>
                <th>
                    État
                </th>


            </tr>
              </thead>
              <tbody>
                  <tr>
                    <td>
                        2019SONADM10
                    </td>

                    <td>
                       SOCIAL
                    </td>
                    <td>
                        2019-09-07 19:56:41
                    </td>
                    <td class="project_progress">

                        Refusée
                    </td>

                  </tr>
                  <tr>
                    <td>
                        2019SONADM11
                    </td>

                    <td>
                        ACHAT LOGEMENT
                    </td>
                    <td>
                        2019-09-06 18:53:23
                    </td>
                    <td class="project_progress">

                        Refusée
                    </td>

                  </tr>

                  @foreach ($demandes as $demande)
                  <tr >
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

                        {{ $demande->statut }}
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->




@include('layouts.script')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
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

</body>
</html>
