<h1>Agent Dashboard</h1>

<p>Welcome, {{ auth()->user()->name }}</p>

<a href="{{ route('agent.ticketsreview') }}">
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

