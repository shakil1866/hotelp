<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('home.css')
</head>

<body class="main-layout">

    <div class="loader_bg">
        <div class="loader">
            <img src="images/loading.gif" alt="">
        </div>
    </div>

    <header>
        @include('home.header')
    </header>

    <section class="py-5">
        <div class="container">
           <!-- Display the "Already Booked" Error -->
@if(session('error'))
    <div class="alert alert-danger" style="color: red; padding: 10px; border: 1px solid red; margin-bottom: 15px;">
        {{ session('error') }}
    </div>
@endif

<!-- Display the Success Message -->
@if(session('success'))
    <div class="alert alert-success" style="color: green; padding: 10px; border: 1px solid green; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif

<!-- Display Form Validation Errors (e.g., missing name, past dates) -->
@if($errors->any())
    <div class="alert alert-danger" style="color: red; padding: 10px; border: 1px solid red; margin-bottom: 15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="row">


                <!-- Room Image -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <img src="{{ asset('room/'.$room->image) }}"
                        class="img-fluid rounded shadow w-100"
                        alt="{{ $room->room_title }}"
                        style="height:450px; object-fit:cover;">
                </div>

                <!-- Room Details -->
                <div class="col-lg-6 col-md-12">

                    <h2 class="mb-3">{{ $room->room_title }}</h2>

                    <h3 class="text-danger mb-4">
                        ₹{{ $room->price }} <small>/ Night</small>
                    </h3>

                    <p class="mb-4">
                        {{ $room->description }}
                    </p>

                    <table class="table table-bordered">
                        <tr>
                            <th width="40%">Room Type</th>
                            <td>{{ $room->room_type }}</td>
                        </tr>

                        <tr>
                            <th>WiFi</th>
                            <td>
                                @if($room->wifi == 'yes')
                                <span class="badge bg-success">Available</span>
                                @else
                                <span class="badge bg-danger">Not Available</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Price</th>
                            <td>₹{{ $room->price }} / Night</td>
                        </tr>
                    </table>

                    <a href="/" class="btn btn-secondary mt-3">
                        ← Back
                    </a>
                    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#bookingModal">
                        Book Now
                    </button>
                </div>

            </div>

        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <form action="{{ route('book_room') }}" method="POST">
                    @csrf

                    <input type="hidden" name="room_id" value="{{ $room->id }}">

                    <div class="modal-header">
                        <h5 class="modal-title">Book Room</h5>

                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Check-in Date</label>
                            <input type="date"
                                id="start_date"
                                name="start_date"
                                class="form-control"
                                min="{{ date('Y-m-d') }}"
                                required>

                            @error('start_date')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label>Check-out Date</label>
                            <input type="date"
                                id="end_date"
                                name="end_date"
                                class="form-control"
                                required>

                            @error('end_date')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            Confirm Booking
                        </button>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
    @include('home.footer')
    <script>
        document.getElementById('start_date').addEventListener('change', function() {

            let checkIn = this.value;

            let checkOut = document.getElementById('end_date');

            // Check-out cannot be before check-in
            checkOut.min = checkIn;

            // Clear invalid check-out date
            if (checkOut.value < checkIn) {
                checkOut.value = "";
            }

        });
    </script>
</body>

</html>