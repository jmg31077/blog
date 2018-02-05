<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard fa-fw"></i> 
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">
                   <i class="fa fa-newspaper-o" aria-hidden="true"></i> Noticias<span class="fa arrow"></span>
                </a>
                
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('noticias.index') }}"><i class="fa fa-file-text-o" aria-hidden="true"></i> Todas</a>
                    </li>
                    <li>
                        <a href="{{ route('noticias.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Criar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-tag" aria-hidden="true"></i> Categorias<span class="fa arrow"></span>
                </a>
                
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('categorias.index') }}"><i class="fa fa-tags" aria-hidden="true"></i> Todas</a>
                    </li>
                    <li>
                        <a href="{{ route('categorias.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Criar</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{ route('usuarios.index') }}">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    Usuarios
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->