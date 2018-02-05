<ul class="nav navbar-nav navbar-top-links navbar-right">
    <!-- /.dropdown -->
    @if (Auth::guest())
        <li><a href="{{ url('/login') }}">Login</a></li>
        <li><a href="{{ url('/register') }}">Register</a></li>
    @else
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                {{ Auth::user()->name }} 
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="{{ route('usuarios.edit', Auth::user()->id) }}"><i class="fa fa-user fa-fw"></i> Meus dados</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-fw"></i> 
                        Sair
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    @endif
</ul>