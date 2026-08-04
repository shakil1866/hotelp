<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <title>Create Room</title>
</head>

<body>

    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Create Room</h3>
                    </div>

                    <div class="card-body">

                        <form action="{{ url('add_room') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <!-- Room Title -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Room Title</label>
                                    <input type="text"
                                           name="room_title"
                                           class="form-control"
                                           placeholder="Enter Room Title"
                                           required>
                                </div>

                                <!-- Room Type -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Room Type</label>
                                    <select name="room_type" class="form-control">
                                        <option value="">Select Room Type</option>
                                        <option value="Single">Single</option>
                                        <option value="Double">Double</option>
                                        <option value="Deluxe">Deluxe</option>
                                        <option value="Suite">Suite</option>
                                        <option value="Family">Family</option>
                                    </select>
                                </div>

                                <!-- Price -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Price (Per Night)</label>
                                    <input type="number"
                                           name="price"
                                           class="form-control"
                                           placeholder="Enter Price"
                                           required>
                                </div>

                                <!-- WiFi -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">WiFi</label>
                                    <select name="wifi" class="form-control">
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>

                                <!-- Image -->
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Room Image</label>
                                    <input type="file"
                                           name="image"
                                           class="form-control"
                                           accept="image/*">
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description"
                                              rows="5"
                                              class="form-control"
                                              placeholder="Enter Room Description"></textarea>
                                </div>

                                <!-- Button -->
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary px-4">
                                        Save Room
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('admin.footer')


    @if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif

@if($errors->any())
<script>
    alert("{{ $errors->first() }}");
</script>
@endif
</body>

</html>