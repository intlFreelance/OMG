<ul class="nav navbar-nav">
    @if(Auth::user()->hasRole('admin'))                    
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Access Control <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="{{ url('users') }}">Users</a></li>
            <!--li><a href="#roles">Roles</a></li>
            <li><a href="#permissions">Permissions</a></li-->
        </ul>
    </li>
    @endif
    @if(Auth::user()->hasRole(['admin','sales-rep']))
        <li><a href="{{ url('contacts') }}">Contacts</a></li>
        <li><a href="{{ url('contacts') }}">Accounts</a></li>
    @endif
</ul>