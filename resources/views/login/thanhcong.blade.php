
@if (Auth::check())

    <h2>Dang nhap thanh cong</h2>

    @if (isset($user))
        {{ 'User: ' . $user->name }}
        <br />
        {{ 'Email: ' . $user->email }}
        <br />
        <a href="{{ url('logout') }}">Log out </a>
    @endif
@else
    <h2>Ban chua dang nhap</h2>
@endif