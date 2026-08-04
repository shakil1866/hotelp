<!DOCTYPE html>
<html>
  <head> 

  <base href="/public">
       @include('admin.css')
  </head>
  <body>
 @include('admin.header')
    @include('admin.sidebar')

        <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                                    <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="card shadow">

                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0">
                                <i class="fa fa-edit"></i> Edit Room
                            </h3>
                        </div>

                        <div class="card-body">

                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('room.update',$room->id) }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="row">

                                    <!-- Room Title -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Room Title</label>

                                        <input type="text"
                                               name="room_title"
                                               class="form-control"
                                               value="{{ $room->room_title }}"
                                               required>
                                    </div>

                                    <!-- Price -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Price</label>

                                        <input type="number"
                                               name="price"
                                               class="form-control"
                                               value="{{ $room->price }}"
                                               required>
                                    </div>

                                    <!-- Room Type -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Room Type</label>

                                        <select name="room_type" class="form-control">

                                            <option value="Single" {{ $room->room_type=='Single'?'selected':'' }}>Single</option>

                                            <option value="Double" {{ $room->room_type=='Double'?'selected':'' }}>Double</option>

                                            <option value="Deluxe" {{ $room->room_type=='Deluxe'?'selected':'' }}>Deluxe</option>

                                            <option value="Suite" {{ $room->room_type=='Suite'?'selected':'' }}>Suite</option>

                                            <option value="Family" {{ $room->room_type=='Family'?'selected':'' }}>Family</option>

                                        </select>
                                    </div>

                                    <!-- Wifi -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">WiFi</label>

                                        <select name="wifi" class="form-control">

                                            <option value="yes" {{ $room->wifi=='yes'?'selected':'' }}>Yes</option>

                                            <option value="no" {{ $room->wifi=='no'?'selected':'' }}>No</option>

                                        </select>
                                    </div>

                                    <!-- Description -->
                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-bold">Description</label>

                                        <textarea name="description"
                                                  rows="5"
                                                  class="form-control">{{ $room->description }}</textarea>
                                    </div>

                                    <!-- Current Image -->
                                    <div class="col-md-6 mb-4">

                                        <label class="form-label fw-bold">
                                            Current Image
                                        </label>

                                        <div class="border rounded p-2 text-center">

                                            <img src="{{ asset('room/'.$room->image) }}"
                                                 class="img-fluid rounded"
                                                 style="max-height:220px;object-fit:cover;">

                                        </div>

                                    </div>

                                    <!-- Upload New Image -->
                                    <div class="col-md-6 mb-4">

                                        <label class="form-label fw-bold">
                                            Upload New Image
                                        </label>

                                        <input type="file"
                                               name="image"
                                               class="form-control">

                                    </div>

                                    <!-- Buttons -->
                                    <div class="col-12 text-end">

                                        <button class="btn btn-success px-4">
                                            <i class="fa fa-save"></i>
                                            Update Room
                                        </button>

                                        <a href="{{ url('view_room') }}"
                                           class="btn btn-secondary">
                                            Cancel
                                        </a>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
            </div>
        </div>
        </div>
        
     <base href="/public">
 @include('admin.footer')
  </body>
</html>