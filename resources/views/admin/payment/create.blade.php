@extends('admin.layouts.header')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h2>To'lov qo'shish</h2>
            </div><br>

            <form class="row g-3" action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Kategoriya" name="restaurant_id">
                            <option selected>Default</option>--}}
                            @foreach($restaurants as $restaurant)
                                <option value="{{ $restaurant->id }}" {{ old('restaurant_id') == $restaurant->id ? 'selected' : '' }}>{{ $restaurant->name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Restoran</label>
                    </div>
                    @error('restaurant_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Kategoriya" name="tariff_id">
                            <option selected>Default</option>--}}
                            @foreach($tariffs as $tariff)
                                <option value="{{ $tariff->id }}" {{ old('tariff_id') == $tariff->id ? 'selected' : '' }}>{{ $tariff->name_uz }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Tarif</label>
                    </div>
                    @error('tariff_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="floatingName" name="start_date" value="{{ old('start_date') }} ">
                        <label for="floatingName">Boshlanish sanasi:</label>
                    </div>
                    @error('start_date')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="floatingName" name="end_date" value="{{ old('end_date') }} ">
                        <label for="floatingName">Tugash sanasi:</label>
                    </div>
                    @error('end_date')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
{{--                <div class="col-md-6">--}}
{{--                    <div class="form-floating">--}}
{{--                        <input type="text" class="form-control" id="floatingName" name="money" value="{{ old('money') }} " oninput="this.value = this.value.replace(/\s/g, '')">--}}
{{--                        <label for="floatingName">To'lov miqdori:</label>--}}
{{--                    </div>--}}
{{--                    @error('money')--}}
{{--                    <div class="text-danger">{{ $message }}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="money"
                               value="{{ old('money', isset($item) ? number_format((float) $item->money, 0, ',', ' ') : '') }}"
                               oninput="formatPrice(this)">
                        <label for="floatingName">To'lov miqdori:</label>
                    </div>
                    @error('money')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <script>
                    function formatPrice(input) {
                        // Remove non-digit characters to work with pure numbers
                        let value = input.value.replace(/\D/g, '');

                        // Format the number with spaces every three digits for readability
                        input.value = new Intl.NumberFormat('ru-RU').format(value);
                    }
                </script>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="file" class="form-control" id="paymentPhotoInput" name="payment_photo" accept="image/*" onchange="previewPaymentPhoto(event)">
                        <label for="paymentPhotoInput">To'lov rasmi</label>
                    </div>
                    @error('payment_photo')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- Preview image container -->
                    <div id="paymentImagePreviewContainer" style="display: none; margin-top: 10px">
                        <p>Yangi to'lov rasmi oldindan ko'rish:</p>
                        <img id="paymentImagePreview" alt="Payment Photo Preview" width="200px" class="img-thumbnail mt-1">
                    </div>
                </div>

                <script>
                    function previewPaymentPhoto(event) {
                        const file = event.target.files[0];
                        const previewContainer = document.getElementById('paymentImagePreviewContainer');
                        const imagePreview = document.getElementById('paymentImagePreview');

                        if (file) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                imagePreview.src = e.target.result; // Set the image source to the file content
                                previewContainer.style.display = 'block'; // Show the preview container
                            };

                            reader.readAsDataURL(file); // Read the file as a data URL
                        } else {
                            previewContainer.style.display = 'none'; // Hide the preview container if no file
                        }
                    }
                </script>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> <i class="ri-add-box-fill"></i>Qo'shish</button>
                    <a href="{{ route('payments.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>
                        Ortga</a>
                </div>
            </form>
        </div>
    </div>
@endsection
