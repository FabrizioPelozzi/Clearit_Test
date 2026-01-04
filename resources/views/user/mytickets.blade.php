<h1>My Tickets in Progress</h1>

@foreach ($tickets as $ticket)
    <hr>
    <h3>{{ $ticket->name }}</h3>

    <ul>
        @foreach ($ticket->documents as $doc)
            <li>{{ $doc->title }}</li>
        @endforeach
    </ul>

    @if ($ticket->status === 'in_progress')
        <form method="POST" action="{{ route('ticket.document.store', $ticket) }}">
            @csrf
        
            <input type="text" name="title" placeholder="Title">
        
            <textarea name="content" placeholder="Add information"></textarea>
        
            <button type="submit">Send</button>
        </form>

    @endif

@endforeach
