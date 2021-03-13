
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" >
      <img src="{{ asset('dist/img/sona.png') }}"  alt="AdminLTE Logo" class="brand-image "
           style="opacity: .8;width:40px;max-height:100%;height:35px;">
      <span class="brand-text font-weight-light"><strong>Gestion de Prêts</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-bottom:1px solid #e9ecef">
        <div class="image">
          <img src="http://127.0.0.1:8000/storage/avatars/{{ Auth::user()->avatar }}"  alt="User Image" class="img-circle elevation-2" style="width: 40px;height:40px">
        </div>
        <div class="info">
          <a href="#" class="d-block"><strong>  {{ Auth::user()->name }}</strong></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item" style=" margin-bottom: 2.5%; ">
            <a href="{{ url('NORMAL') }}" class="nav-link  @if(Request::url() === 'http://127.0.0.1:8000/NORMAL'))
                active " style="background-color: #ff8500;"
          @endif "  >

                <i class="nav-icon fas fa-tachometer-alt"></i>

                  <p>
                    Accueil
                   <!-- <span class="right badge badge-danger">New</span>-->
                  </p>
                </a>
          </li>
          <li class="nav-item" style=" margin-bottom: 2.5%; margin-top:2.5%; ">
            <a href="{{ url('ProfilAgent') }}" class="nav-link  @if(Request::url() === 'http://127.0.0.1:8000/ProfilAgent'))
                active
          @endif " >

                <i class="nav-icon fas fa-user"></i>

                  <p>
                    Profil
                   <!-- <span class="right badge badge-danger">New</span>-->
                  </p>
                </a>
          </li>
          <li class="nav-item has-treeview"  style=" margin-bottom: 2.5%; margin-top:2.5%; ">
            <a href="#" class="nav-link @if(Request::url() === 'http://127.0.0.1:8000/ConsultationPret' || Request::url() === 'http://127.0.0.1:8000/DemandePret' || Request::url() === 'http://127.0.0.1:8000/HistoriqueDemande')
            active
      @endif">
                <i class="nav-icon fas fa-address-book"></i>
              <p>


                Demande de Prêt
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"  style=" margin-bottom: 2.5%; margin-top:2.5%; ">
                <a href="{{ url('DemandePret') }}" @if(Request::url() === 'http://127.0.0.1:8000/DemandePret') style="background-color:rgba(255,255,255,.9) !important" @endif class="nav-link @if(Request::url() === 'http://127.0.0.1:8000/Information'))
                active
          @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Faite votre demande</p>
                </a>
              </li>




              <li class="nav-item"  style=" margin-bottom: 2.5%; margin-top:2.5%; ">
                <a href="{{ url('ConsultationPret') }}" @if(Request::url() === 'http://127.0.0.1:8000/ConsultationPret') style="background-color:rgba(255,255,255,.9) !important" @endif class="nav-link @if(Request::url() === 'http://127.0.0.1:8000/ConsultationPret'))
                active
          @endif" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Demandes en cours</p>
                </a>
              </li>
              <li class="nav-item"  style=" margin-bottom: 2.5%; margin-top:2.5%; ">
                <a href="{{ url('HistoriqueDemande') }}" @if(Request::url() === 'http://127.0.0.1:8000/HistoriqueDemande') style="background-color:rgba(255,255,255,.9) !important" @endif class="nav-link @if(Request::url() === 'http://127.0.0.1:8000/HistoriqueDemande'))
                active
          @endif" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Historique des demandes</p>
                </a>
              </li>


            </ul>
          </li>
          <li class="nav-item"  style=" margin-bottom: 10%; margin-top:2.5%; " >
            <a href="{{ url('ConsultationPretfin') }}" class="nav-link  @if(Request::url() === 'http://127.0.0.1:8000/ConsultationPretfin'))
                active
          @endif " >

                <i class="nav-icon fas fa-list-alt"></i>

                  <p>
                    Vos Prêts
                   <!-- <span class="right badge badge-danger">New</span>-->
                  </p>
                </a>
          </li>
          <div class="dropdown-divider"></div>
          <li class="nav-item"  style=" margin-bottom: 2.5%; margin-top:2.5%; ">
            <a href="https://sonatrach.com/presentation" target="_blank" class="nav-link  @if(Request::url() === ''))
                active
          @endif " >

                <i class="nav-icon fas fa-phone"></i>

                  <p>
                    Contact
                   <!-- <span class="right badge badge-danger">New</span>-->
                  </p>
                </a>
          </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
