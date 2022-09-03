        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            {{-- style="background-color:#FCB918;" --}}
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Super admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if (Auth::user()->image == ' ')
                            <img src="{{ asset('images/man.png') }}" class="img-circle elevation-2" alt="User Image">
                        @else
                            <img style="border-radius: 50%;" src="{{ asset('upload/' . Auth::user()->image . '') }}"
                                class="img-circle elevation-2" alt="User Image">
                        @endif
                    </div>
                    <div class="info">
                        <a href="{{ route('user.show', [Auth::user()->id]) }}"
                            class="d-block">{{ Auth::user()->name }}</a>
                        <a class="d-block" href="{{ route('logout') }}">
                            <i class="nav-icon fas fa-sign-out-alt text-danger"> Se déconnecter</i>
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <i class="nav-icon far fa-user-circle "></i>
                                <p>Gestion des utilisateurs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact.index') }}" class="nav-link">
                                <i class="nav-icon fa fa-envelope" aria-hidden="true"></i>
                                <p>Messages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.index') }}" class="nav-link">
                                <i class="nav-icon fa fa-archive" aria-hidden="true"></i>
                                <p>Projets</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
