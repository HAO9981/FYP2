<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            font-size: 14px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .list-group {
            list-style-type: none;
            padding: 0;
        }
        .list-group-item {
            margin-bottom: 10px;
        }
        .list-group-item strong {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reservation Invoice</h1>

        <ul class="list-group">
            <li class="list-group-item"><strong>Reservation ID:</strong> {{ $reservation->id }}</li>
            <li class="list-group-item"><strong>Table Number:</strong> {{ $reservation->table->number }}</li>
            <li class="list-group-item"><strong>Name:</strong> {{ $reservation->name }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $reservation->email }}</li>
            <li class="list-group-item"><strong>Phone:</strong> {{ $reservation->phone }}</li>
            <li class="list-group-item"><strong>Reserve Date:</strong> {{ $reservation->date }}</li>
            <li class="list-group-item"><strong>Start Time:</strong> {{ $reservation->start_time }}</li>
            <li class="list-group-item"><strong>End Time:</strong> {{ $reservation->end_time }}</li>
            <li class="list-group-item"><strong>Total Price:</strong> RM {{ number_format($reservation->total_price, 2) }}</li>
        </ul>
    </div>
</body>
</html>
