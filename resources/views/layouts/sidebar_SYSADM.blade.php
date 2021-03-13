<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('dist/img/sona.png') }}"  alt="AdminLTE Logo" class="brand-image "
           style="opacity: .8;width:40px;max-height:100%;height:35px;">
      <span class="brand-text font-weight-light"><strong>Gestion de Prêt</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-bottom:1px solid #e9ecef">
        <div class="image">
          <img src="http://127.0.0.1:8000/storage/avatars/{{ Auth::user()->avatar }}"  alt="User Image"  class="img-circle elevation-2" style="width: 40px;height:40px">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <strong> {{ Auth::user()->name }}</strong></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('SYSADM') }}" class="nav-link @if(Request::url() === 'http://127.0.0.1:8000/SYSADM'))
            active
      @endif">
                <i class="nav-icon fas fa-tachometer-alt"></i>

                  <p>
                    Accueil
                   <!-- <span class="right badge badge-danger">New</span>-->
                  </p>
                </a>
          </li>
          <li class="nav-item" style=" margin-bottom: 2.5%; margin-top:2.5%; ">
            <a href="{{ url('ProfilSYS') }}" class="nav-link @if(Request::url() === 'http://127.0.0.1:8000/ProfilSYS'))
            active
      @endif">
                <i class="nav-icon fas fas fa-user"></i>

                  <p>
                    Profil
                   <!-- <span class="right badge badge-danger">New</span>-->
                  </p>
                </a>
          </li>
          <li class="nav-item has-treeview"  style=" margin-bottom: 2.5%; margin-top:2.5%; ">
            <a href="#" class="nav-link @if(Request::url() === 'http://127.0.0.1:8000/AjouterAgent' ||  Request::url() === 'http://127.0.0.1:8000/ConsulterAgents')
            active
      @endif">
                <i class="nav-icon fas fa-users"></i>
              <p>
                Agents
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">




              <li class="nav-item ">
                <a href="{{ url('AjouterAgent') }}" @if(Request::url() === 'http://127.0.0.1:8000/AjouterAgent') style="background-color:rgba(255,255,255,.9) !important" @endif class="nav-link @if(Request::url() === 'http://127.0.0.1:8000/AjouterAgent' )
                active
          @endif" >
                  <i class="far fa-circle nav-icon" style=" margin-bottom: 2.5%; margin-top:2.5%; "></i>
                  <p>Ajouter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('ConsulterAgents') }}" @if(Request::url() === 'http://127.0.0.1:8000/ConsulterAgents') style="background-color:rgba(255,255,255,.9) !important" @endif class="nav-link @if(  Request::url() === 'http://127.0.0.1:8000/ConsulterAgents')
                active
          @endif" >
                  <i class="far fa-circle nav-icon" style=" margin-bottom: 2.5%; margin-top:2.5%; "></i>
                  <p>Consulter</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview" style=" margin-bottom: 2.5%; margin-top:2.5%; ">
            <a href="#" class="nav-link @if(Request::url() === 'http://127.0.0.1:8000/AjouterUser' ||  Request::url() === 'http://127.0.0.1:8000/ConsulterUsers')
            active
      @endif">
                <i class="nav-icon fas fa-users"></i>
              <p>
                Utilisateur
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >




              <li class="nav-item " style=" margin-bottom: 2.5%; margin-top:2.5%; ">
                <a href="{{ url('AjouterUser') }}" @if(Request::url() === 'http://127.0.0.1:8000/AjouterUser') style="background-color:rgba(255,255,255,.9) !important" @endif class="nav-link @if(Request::url() === 'http://127.0.0.1:8000/AjouterUser' )
                active
          @endif" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter</p>
                </a>
              </li>
              <li class="nav-item" style=" margin-bottom: 2.5%; margin-top:2.5%; ">
                <a href="{{ url('ConsulterUsers') }}" @if(Request::url() === 'http://127.0.0.1:8000/ConsulterUsers') style="background-color:rgba(255,255,255,.9) !important" @endif class="nav-link @if(  Request::url() === 'http://127.0.0.1:8000/ConsulterUsers')
                active
          @endif" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consulter</p>
                </a>
              </li>

            </ul>
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
