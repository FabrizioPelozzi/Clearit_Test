<h1>Tickets Review</h1>

@foreach ($tickets as $ticket)
    <hr>
    <p><strong>{{ $ticket->name }}</strong></p>
    <p>User: {{ $ticket->user->name }}</p>
    <p>Status: {{ $ticket->status }}</p>

    @foreach ($ticket->documents as $doc)
    <div style="border: 1px solid;">
        <p>Title: {{ $doc->title }}</p>
        <p>Content: {{ $doc->content }}</p>
    </div>
    @endforeach

    <form method="POST" action="{{ route('agent.ticket.status', $ticket) }}">
        @csrf
        <select name="status">
            <option value="new">New</option>
            <option value="in_progress">In progress</option>
            <option value="completed">Completed</option>
        </select>
        <button type="submit">Update</button>
    </form>
@endforeach

