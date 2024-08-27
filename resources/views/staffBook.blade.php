@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">Table Information</div>
                <div class="card-body">
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

                    <form method="POST" action="{{ route('staffBookTable') }}" id="staffBookForm">
                        @csrf
                        <input type="hidden" name="table_id" value="{{ $table->id }}">
                        <input type="hidden" name="date" id="form_date" value="{{ $date }}">
                        <input type="hidden" name="start_time" id="form_start_time" value="{{ $startTime }}">

                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" id="date" name="date" class="form-control" value="{{ $date }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="start_time">Start Time:</label>
                            <input type="time" id="start_time" name="start_time" class="form-control" value="{{ $startTime }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="end_time">End Time</label>
                            <select class="form-control" id="end_time" name="end_time" required>
                                <!-- Options will be populated by JavaScript -->
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('staffTableDetail', ['date' => $date]) }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Submit Reservation</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for confirmation -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirm Reservation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to submit this reservation?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmSubmit">Confirm</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const endTimeInput = document.getElementById('end_time');
    const startTimeInput = document.getElementById('start_time');
    const dateInput = document.getElementById('date');
    const form = document.getElementById('staffBookForm');
    const startTime = "{{ $startTime }}";
    const tableId = "{{ $table->id }}";
    const date = "{{ $date }}";

    function generateTimeOptions(startHour, endHour, stepMinutes) {
        const timeOptions = [];
        let currentTime = new Date();
        currentTime.setHours(startHour, 0, 0, 0);

        const endTime = new Date();
        endTime.setHours(endHour, 0, 0, 0);

        while (currentTime <= endTime) {
            let hours = String(currentTime.getHours()).padStart(2, '0');
            let minutes = String(currentTime.getMinutes()).padStart(2, '0');
            timeOptions.push(`${hours}:${minutes}`);
            currentTime.setMinutes(currentTime.getMinutes() + stepMinutes);
        }

        return timeOptions;
    }

    function fetchAvailableTimes(date, startTime) {
        fetch(`/api/available-times?table_id=${tableId}&date=${date}&start_time=${startTime}`)
            .then(response => response.json())
            .then(data => {
                const allTimes = generateTimeOptions(10, 20, 30); // 10 AM to 8 PM
                const unavailableTimes = data.unavailable_times || [];

                const availableEndTimes = allTimes.filter(time => {
                    return time > startTime && !unavailableTimes.includes(time);
                });

                setTimeOptions(endTimeInput, availableEndTimes);
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

    function showConfirmModal() {
        const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
        confirmModal.show();
    }

    // Show the custom modal instead of default confirm
    form.onsubmit = function (event) {
        event.preventDefault(); // Prevent default form submission
        showConfirmModal();
    };

    document.getElementById('confirmSubmit').addEventListener('click', function () {
        form.submit(); // Submit the form when confirmed
    });

    fetchAvailableTimes(date, startTime);
});
</script>
@endsection
