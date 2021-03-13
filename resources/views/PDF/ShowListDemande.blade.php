
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des demandes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <small style="text-align: center"><h3>Septembre 2020<h3></small>
    <br>
      <h2 style="text-align: center">Liste des demande de prêt acceptées</h2>
      <br><br>
    <table class="table table-bordered">
    <thead>
      <tr >
        <td>Identifiant</td>
        <td>Agent</td>
        <td>Type de prêt</td>
        <td>Date d'acceptation</td>
      </tr>
      </thead>
      <tbody>

      {{ $data }}

    @foreach($data as $customer)
      <tr>
        <td>2020SONAPR{{ $customer->id }}</td>
        <td>@foreach ($use as $user)
                @if($user->id==$customer->id_users)
                    @foreach ($age as $agent)
                        @if($agent->id==$user->id_agent)
                            {{ $agent->nom }} {{ $agent->prenom }}
                        @endif
                    @endforeach
                @endif
             @endforeach
        </td>
        <td>{{ $customer->type }}</td>
        <td>{{ $customer->created_at }}</td>


      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
