<h1>Create Ticket</h1>

<form method="POST" action="{{ route('user.ticket.store') }}">
    @csrf

    <input type="text" name="name" placeholder="Ticket name"><br><br>

    <select name="ticket_type">
        <option value="1">Type 1</option>
        <option value="2">Type 2</option>
        <option value="3">Type 3</option>
    </select><br><br>

    <select name="transport_mode">
        <option value="air">Air</option>
        <option value="land">Land</option>
        <option value="sea">Sea</option>
    </select><br><br>

    <input type="text" name="product" placeholder="Product"><br><br>
    <input type="text" name="origin_country" placeholder="Origin"><br><br>
    <input type="text" name="destination_country" placeholder="Destination"><br><br>

    <button type="submit">Create Ticket</button>
</form>
