@extends('admin.layouts.header')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Tahrirlash</h2>
        </div>
        <div class="card-body">
            <!-- Form -->
            <form class="row g-3" action="{{ route('payments.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Restaurant Selection -->
                <div class="col-md-6">
                    <label for="restaurant_id" class="form-label">Restoran:</label>
                    <select class="form-control" id="restaurant_id" name="restaurant_id">
                        @foreach($restaurants as $restaurant)
                            <option value="{{ $restaurant->id }}" {{ $payment->restaurant_id == $restaurant->id ? 'selected' : '' }}>
                                {{ $restaurant->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('restaurant_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tariff Selection -->
                <div class="col-md-6">
                    <label for="tariff_id" class="form-label">Tarif:</label>
                    <select class="form-control" id="tariff_id" name="tariff_id">
                        @foreach($tariffs as $tariff)
                            <option value="{{ $tariff->id }}" {{ $payment->tariff_id == $tariff->id ? 'selected' : '' }}>
                                {{ $tariff->name_uz }}
                            </option>
                        @endforeach
                    </select>
                    @error('tariff_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="floatingName" name="start_date" value="{{ old('start_date', $payment->start_date) }}">
                        <label for="floatingName">Boshlanish sanasi</label>
                    </div>
                    @error('start_date')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="floatingName" name="end_date" value="{{ old('end_date', $payment->end_date) }}">
                        <label for="floatingName">Tugash sanasi</label>
                    </div>
                    @error('end_date')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="money" value="{{ old('money', $payment->money) }}">
                        <label for="floatingName">To'lov miqdori</label>
                    </div>
                    @error('name_en')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="file" class="form-control" id="photoInput" name="payment_photo" accept="image/*" onchange="previewImage(event)">
                        <label for="photoInput">To'lov rasmi:</label>
                    </div>
                    <br><br>

                    <div class="row">
                        @if($payment->payment_photo)
                            <div class="col-md-6">
                                <p> Joriy to'lov rasmi:</p>
                                <img src="{{ asset('payments/' . $payment->payment_photo) }}" alt="Meal Photo" width="200px" class="img-thumbnail mt-1">
                            </div>
                        @endif

                        <!-- Preview image element -->
                        <div class="col-md-6" id="imagePreviewContainer" style="display: none;">
                            <p>Yangi to'lov rasmini oldindan ko'rish:</p>
                            <img id="imagePreview" alt="Image Preview" width="200px" class="img-thumbnail mt-1">
                        </div>
                    </div>
                    @error('payment_photo')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Submit Button -->
                <div class="col-12">
                    <div class="text-center">
                        <a href="{{ route('payments.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                        <button type="submit" class="btn btn-primary"><i class="ri-pencil-fill"></i>Tahrirlash</button>
                    </div>
                    <script>
                        function previewImage(event) {
                            const file = event.target.files[0];
                            const previewContainer = document.getElementById('imagePreviewContainer');
                            const imagePreview = document.getElementById('imagePreview');

                            if (file) {
                                const reader = new FileReader();

                                reader.onload = function(e) {
                                    imagePreview.src = e.target.result; // Set the image preview source
                                    previewContainer.style.display = 'block'; // Show the preview container
                                };

                                reader.readAsDataURL(file); // Read the file as a data URL
                            } else {
                                previewContainer.style.display = 'none'; // Hide the preview if no file selected
                            }
                        }
                    </script>
                </div>
            </form>
        </div>
    </div>
@endsection
