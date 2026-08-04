<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <title>View Rooms</title>
</head>

<body>

    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="mb-0">All Rooms</h3>
                    </div>

                    <div class="card-body">

                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif

                        <div class="table-responsive">

                            <table class="table table-bordered table-hover align-middle text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Room Title</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>WiFi</th>
                                        <th>Room Type</th>
                                        <th width="180">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @forelse($rooms as $room)

                                    <tr>
                                        <td>{{ $room->id }}</td>

                                        <td>{{ $room->room_title }}</td>

                                        <td>
                                            <img src="{{ asset('room/'.$room->image) }}"
                                                width="120"
                                                height="80"
                                                style="object-fit:cover;border-radius:8px;">
                                        </td>

                                        <td style="max-width:300px;">
                                            {{ Str::limit($room->description,100) }}
                                        </td>

                                        <td>
                                            ₹{{ $room->price }}
                                        </td>

                                        <td>
                                            @if($room->wifi == 'yes')
                                            <span class="badge bg-success text-light">Yes</span>
                                            @else
                                            <span class="badge bg-danger text-light">No</span>
                                            @endif
                                        </td>

                                        <td>
                                            <span class="badge bg-info text-light">
                                                {{ $room->room_type }}
                                            </span>
                                        </td>


<td>
   <a href="{{ url('room_edit/'.$room->id) }}" class="btn btn-warning btn-sm">
    Edit
</a>
                                   <a href="{{ url('room_delete/'.$room->id) }}"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Are you sure you want to delete this room?')">
    Delete
</a>

                                        </td>


                                    </tr>

                                    @empty

                                    <tr>
                                        <td colspan="8">
                                            No Rooms Found.
                                        </td>
                                    </tr>

                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('admin.footer')

</body>

</html>