<h2>Dang nhap thanh cong</h2>

@if (isset($user))
    {{ 'User: ' . $user->name }}
    <br />
    {{ 'Email: ' . $user->email }}
@endif