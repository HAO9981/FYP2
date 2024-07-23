@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">Table Information</div>
                <div class="card-body" style="height: 610px;">
                    <p><strong>Table Number:</strong> {{ $table->number }}</p>
                    <p><strong>Table Type:</strong> {{ $table->type }}</p>
                    <p><strong>Table Price (per hour):</strong> RM {{ $table->price }}</p>
                    <img src="{{ asset('images/' . $table->image) }}" alt="Table Image" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">Reservation</div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('reservations.store') }}">
                        @csrf
                        <input type="hidden" name="table_id" value="{{ $table->id }}">
                        <input type="hidden" name="date" id="date" value="{{ $date }}">

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ auth()->user()->name ?? '' }}" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ auth()->user()->email ?? '' }}" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{ auth()->user()->contactNum ?? '' }}" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="start_time">Start Time</label>
                            <select class="form-control" id="start_time" name="start_time" required>
                                <!-- Options will be populated by JavaScript -->
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="end_time">End Time</label>
                            <select class="form-control" id="end_time" name="end_time" required>
                                <!-- Options will be populated by JavaScript -->
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit Reservation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const startTimeInput = document.getElementById('start_time');
    const endTimeInput = document.getElementById('end_time');
    const dateInput = document.getElementById('date');

    function generateTimeOptions(startHour, endHour, stepMinutes) {
        const timeOptions = [];
        let currentTime = new Date();
        currentTime.setHours(startHour, 0, 0, 0);

        const endTime = new Date();
        endTime.setHours(endHour, 0, 0, 0);

        while (currentTime < endTime) {
            timeOptions.push(currentTime.toISOString().substr(11, 5));
            currentTime.setMinutes(currentTime.getMinutes() + stepMinutes);
        }

        return timeOptions;
    }

    function fetchAvailableTimes(date) {
        fetch(`/api/available-times?table_id={{ $table->id }}&date=${date}`)
            .then(response => response.json())
            .then(data => {
                const allTimes = generateTimeOptions(18, 28, 30); // 10 AM to 8 PM
                const bookedTimes = data.booked_times || [];

                const availableStartTimes = allTimes.filter(time => 
                    !bookedTimes.some(booked => 
                        time >= booked.start_time && time < booked.end_time
                    )
                );

                setTimeOptions(startTimeInput, availableStartTimes);

                updateEndTimeOptions();

                startTimeInput.addEventListener('change', updateEndTimeOptions);

                function updateEndTimeOptions() {
                    const selectedStartTime = startTimeInput.value;
                    if (!selectedStartTime) {
                        setTimeOptions(endTimeInput, []);
                        return;
                    }

                    const availableEndTimes = allTimes.filter(time => 
                        !bookedTimes.some(booked => 
                            time > booked.start_time && time <= booked.end_time
                        ) && time > selectedStartTime
                    );

                    setTimeOptions(endTimeInput, availableEndTimes);
                }
            })
            .catch(error => {
                console.error('Error fetching available times:', error);
            });
    }

    function setTimeOptions(input, options) {
        input.innerHTML = '';
        options.forEach(option => {
            let optionElement = document.createElement('option');
            optionElement.value = option;
            optionElement.text = option;
            input.appendChild(optionElement);
        });
    }

    fetchAvailableTimes('{{ $date }}');

    dateInput.addEventListener('change', function () {
        fetchAvailableTimes(this.value);
    });
});
</script>
@endsection
