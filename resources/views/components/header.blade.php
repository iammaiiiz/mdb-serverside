@if(Session::has('isAdmin'))
    <header>
        <h1>Welcome Admin</h1>
        <a href="{{route('logout')}}" class="danger">Logout</a>
    </header>
@else
    <br><br>
@endif