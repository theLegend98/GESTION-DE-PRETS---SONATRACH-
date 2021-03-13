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
@include('layouts.sidebar_SimpleAgent')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vos Prêts </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Vos Prêts</li>
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
          <h3 class="card-title">Vos Prêts</h3>

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
                      <th style="width: 20%">
                          Type de prêt
                      </th>

                      <th style="width: 30%">
                        Date d'acceptation
                      </th>
                      <th>
                          Somme totale
                      </th>
                      <th>
                          Frais mensuel
                      </th>
                      <th>
                        Somme payée
                    </th>
                    <th>
                        Somme Restante
                    </th>
                    <th>
                        Tranche
                    </th>

                  </tr>
              </thead>
              <tbody>
                  @foreach($prets as $pret)

                      <tr>
                          <td>
                            2020SONAPR{{  $pret->id}}
                          </td>

                          <td>
                            {{ $pret->type }}
                          </td>

                          <td>
                             {{ $pret->created_at }}
                          </td>
                          <td>
                            {{ $pret->somme_totale }} DA
                          </td>
                          <td>
                            {{ $pret->frais_mensuel }} DA
                          </td>

                          <td>
                           {{ $pret->frais_mensuel*$pret->duré }} DA
                          </td>
                          <td>
                            {{ $pret->somme_totale-($pret->frais_mensuel*$pret->duré) }} DA
                          </td>
                          <td>
                            Tranche n° {{ $pret->duré }}
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



</body>
</html>
