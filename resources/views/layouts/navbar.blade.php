<nav class="main-header navbar navbar-expand navbar-dark  navbar-sona" style="background-color: #6c757d">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Accueil</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"></a>
      </li>
    </ul>

    <!-- SEARCH FORM
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#"  >
          <i class="far fa-bell"></i>
          @if(auth()->user()->unreadNotifications->count()!=0)
          <span class="badge badge-primary navbar-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{ auth()->user()->unreadNotifications->count() }} Nouvelles notifications</span>

          @foreach (Auth::user()->unreadNotifications as $notification)
          @if($notification->read_at==null)
         <div class="dropdown-divider"></div>
         <a href="{{ url('ConsultationPret') }}"  class="dropdown-item"  style="background-color: rgb(177, 250, 250)" >
            <span class="badge badge-info right">1</span>
            <i class="fas fa-envelope mr-2"></i>  Votre demande  {{ $notification->data['type']  }} <br> a été @if($notification->data['sender']=="CHEFUNITE") @if ($notification->data['etat']=="En attente") acceptée @else réfusée @endif par  le chef d'unité @elseif($notification->data['sender']=="ADMINISTRATEUR") @if ($notification->data['etat']=="En attente") classée @else réfusée @endif par  l'administrateur @ENDIF

            <span class="float-right text-muted text-sm">{{$notification->created_at}}</span>


          </a>
          @endif
          @endforeach
          @foreach (Auth::user()->readNotifications->take(4) as $notification)

            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" >
                <i class="fas fa-envelope mr-2"></i>  Votre demande  {{ $notification->data['type']  }} <br> a été  @if ($notification->data['etat']=="En attente") accepté @else réfusé @endif par le chef d'unité
                <span class="float-right text-muted text-sm">{{$notification->created_at}}</span>
            </a>

          @endforeach
          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item dropdown-footer"> All Notifications</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item " href="{{ url('change-password') }} ">
                          <i class="fas fa-edit" ></i>
                          Modifier mot de passe
         </a>
            <a class="dropdown-item " href="{{ route('logout') }} "
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                             <i class="fas fa-sign-out-alt" ></i>
                             déconnexion
            </a>


            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>

    </ul>
  </nav>
