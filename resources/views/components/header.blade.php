@if(Session::has('isAdmin'))
    <header>
        <div class="headerWrapper">
            <h1>Welcome Admin</h1>
            <a href="{{route('logout')}}" class="danger">Logout</a>
        </div>
    </header>
@else
    <br><br>
@endif