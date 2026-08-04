

<div class="our_room">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Our Rooms</h2>
                    <p>Explore our comfortable and luxurious rooms.</p>
                </div>
            </div>
        </div>

        <div class="row">

            @forelse($rooms as $room)

            <div class="col-md-4 col-sm-6 mb-4">
                <div id="serv_hover" class="room">

                    <div class="room_img">
                        <figure>
                            <img src="{{ asset('room/'.$room->image) }}"
                                 alt="{{ $room->room_title }}"
                                 style="height:250px;width:100%;object-fit:cover;">
                        </figure>
                    </div>

                    <div class="bed_room">
                        <h3>{{ $room->room_title }}</h3>

                        <p>{{ Str::limit($room->description,100) }}</p>

                        <h5 class="text-danger">
                            ₹{{ $room->price }}/Night
                        </h5>

                        <p>
                            <strong>Room Type:</strong> {{ $room->room_type }}
                        </p>

                        <p>
                            <strong>WiFi:</strong> {{ ucfirst($room->wifi) }}
                        </p>
                        <p>
                            <button style="padding:5px;" class="btn btn-primary" type="button" ><a href="{{ url('room_details/'.$room->id) }}" > room details</a> </button>
                        </p>
                    </div>

                </div>
            </div>

            @empty

            <div class="col-md-12 text-center">
                <h4>No Rooms Available</h4>
            </div>

            @endforelse

        </div>
    </div>
</div>