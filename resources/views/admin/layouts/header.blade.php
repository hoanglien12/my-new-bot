<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        
        <a class="navbar-brand" href="{{ route('indexAdmin') }}"><img class="" src="{{ asset('asset/uploads/2018/01/logo-1.png') }}" alt="" width="51" height="46" />Pets Store Admin</a>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li class="nav-item dropdown">
            <img src="{{ asset('asset/uploads/2018/01/av1.jpg') }}" alt="img" class="image-user">
            <span id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </span>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('editPass') }}">
                    {{ __('Change password') }}
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
