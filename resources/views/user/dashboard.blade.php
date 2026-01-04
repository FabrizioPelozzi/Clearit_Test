<h1>User Dashboard</h1>

<p>Welcome, {{ auth()->user()->name }}</p>

<a href="{{ route('user.createticket') }}">
    Create Ticket
</a>

<br><br>

<a href="{{ route('user.mytickets') }}">
    Review Tickets
</a>

<br><br>

<h3>Notifications</h3>

<ul>
@foreach (auth()->user()->unreadNotifications as $notification)
    <li>
        {{ $notification->data['message'] }}
    </li>
@endforeach
</ul>
<br><br>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
