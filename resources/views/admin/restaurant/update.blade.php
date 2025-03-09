@extends("admin.layouts.header")

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h2>Tahrirlash</h2>
            </div><br>
            <form class="row g-3" action="{{ route('restaurants.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-12">
                    <div class="form-floating">
                        <select class="form-control" id="floatingStatus" name="status">
                            <option value="0" {{ old('status', $restaurant->status) == 0 ? 'selected' : '' }}>Aktiv emas</option>
                            <option value="1" {{ old('status', $restaurant->status) == 1 ? 'selected' : '' }}>Aktiv</option>
                        </select>
                        <label for="floatingStatus">Status</label>
                    </div>
                    @error('status')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="name" value="{{ old('name', $restaurant->name) }}">
                        <label for="floatingName">Restaran nomi</label>
                    </div>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="phone_number" value="{{ old('name', $restaurant->phone_number) }}">
                        <label for="floatingName">Telefon nomer</label>
                    </div>
                    @error('phone_number')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="tax" value="{{ old('tax', $restaurant->tax) }}">
                        <label for="floatingName">Soliq(%)</label>
                    </div>
                    @error('tax')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="address_uz" value="{{ old('address_uz', $restaurant->address_uz) }}">
                        <label for="floatingName">Address(uz)</label>
                    </div>
                    @error('address_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="address_ru" value="{{ old('address_ru', $restaurant->address_ru) }}">
                        <label for="floatingName">Address(ru)</label>
                    </div>
                    @error('address_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="address_en" value="{{ old('address_en', $restaurant->address_en) }}">
                        <label for="floatingName">Address(en)</label>
                    </div>
                    @error('address_en')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="instagram" value="{{ old('instagram', $restaurant->instagram) }}">
                        <label for="floatingName">Instagram</label>
                    </div>
                    @error('instagram')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="youtube" value="{{ old('youtube', $restaurant->youtube) }}">
                        <label for="floatingName">You Tube</label>
                    </div>
                    @error('youtube')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>



                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="tiktok" value="{{ old('tiktok', $restaurant->tiktok) }}">
                        <label for="floatingName">TikTok</label>
                    </div>
                    @error('tiktok')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="telegram" value="{{ old('telegram', $restaurant->telegram) }}">
                        <label for="floatingName">Telegram</label>
                    </div>
                    @error('telegram')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                @php
                    $days = [
                        'Mon' => ['uz' => 'Du', 'ru' => 'Пн', 'en' => 'Mon'],
                        'Tue' => ['uz' => 'Se', 'ru' => 'Вт', 'en' => 'Tue'],
                        'Wed' => ['uz' => 'Cho', 'ru' => 'Ср', 'en' => 'Wed'],
                        'Thu' => ['uz' => 'Pay', 'ru' => 'Чт', 'en' => 'Thu'],
                        'Fri' => ['uz' => 'Ju', 'ru' => 'Пт', 'en' => 'Fri'],
                        'Sat' => ['uz' => 'Shan', 'ru' => 'Сб', 'en' => 'Sat'],
                        'Sun' => ['uz' => 'Yak', 'ru' => 'Вс', 'en' => 'Sun'],
                    ];
                @endphp

                <div class="col-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Kategoriya" name="start_work_day_uz">
                            <option value="" disabled>Tanlang...</option>
                            @foreach($days as $key => $day)
                                <option value="{{ $day['uz'] }}" {{ old('start_work_day_uz', $restaurant->start_work_day_uz) == $day['uz'] ? 'selected' : '' }}>{{ $day['uz'] }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Ish boshlash kuni(uz)</label>
                    </div>
                    @error('start_work_day_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Kategoriya" name="end_work_day_uz">
                            <option value="" disabled>Tanlang...</option>
                            @foreach($days as $key => $day)
                                <option value="{{ $day['uz'] }}" {{ old('end_work_day_uz', $restaurant->end_work_day_uz) == $day['uz'] ? 'selected' : '' }}>{{ $day['uz'] }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Ish tugash kuni(uz)</label>
                    </div>
                    @error('end_work_day_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Kategoriya" name="start_work_day_ru">
                            <option value="" disabled>Tanlang...</option>
                            @foreach($days as $key => $day)
                                <option value="{{ $day['ru'] }}" {{ old('start_work_day_ru', $restaurant->start_work_day_ru) == $day['ru'] ? 'selected' : '' }}>{{ $day['ru'] }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Ish boshlash kuni(ru)</label>
                    </div>
                    @error('start_work_day_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Kategoriya" name="end_work_day_ru">
                            <option value="" disabled>Tanlang...</option>
                            @foreach($days as $key => $day)
                                <option value="{{ $day['ru'] }}" {{ old('end_work_day_ru', $restaurant->end_work_day_ru) == $day['ru'] ? 'selected' : '' }}>{{ $day['ru'] }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Ish tugash kuni(ru)</label>
                    </div>
                    @error('end_work_day_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Kategoriya" name="start_work_day_en">
                            <option value="" disabled>Tanlang...</option>
                            @foreach($days as $key => $day)
                                <option value="{{ $day['en'] }}" {{ old('start_work_day_en', $restaurant->start_work_day_en) == $day['en'] ? 'selected' : '' }}>{{ $day['en'] }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Ish boshlash kuni(en)</label>
                    </div>
                    @error('start_work_day_en')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Kategoriya" name="end_work_day_en">
                            <option value="" disabled>Tanlang...</option>
                            @foreach($days as $key => $day)
                                <option value="{{ $day['en'] }}" {{ old('end_work_day_en', $restaurant->end_work_day_en) == $day['en'] ? 'selected' : '' }}>{{ $day['en'] }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Ish tugash kuni(en)</label>
                    </div>
                    @error('end_work_day_en')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <div class="form-floating">
                        <input type="time" class="form-control" id="floatingName" name="work_time_start" value="{{ old('work_time_start', $restaurant->work_time_start) }}">
                        <label for="floatingName">Ish boshlash soati</label>
                    </div>
                    @error('work_time_start')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <div class="form-floating">
                        <input type="time" class="form-control" id="floatingName" name="work_time_end" value="{{ old('work_time_end', $restaurant->work_time_end) }}">
                        <label for="floatingName">Ish tugash soati</label>
                    </div>
                    @error('work_time_end')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="file" class="form-control" id="photoInput" name="logo" accept="image/*" onchange="previewImage(event)">
                        <label for="photoInput">Rasmi</label>
                    </div>
                    <br><br>

                    <div class="row">
                        @if($restaurant->logo)
                            <div class="col-md-6">
                                <p>Joriy logo:</p>
                                <img src="{{ asset('restaurants/' . $restaurant->logo) }}" alt=" Logo" width="200px" class="img-thumbnail mt-1">
                            </div>
                        @endif

                        <!-- Preview image element -->
                        <div class="col-md-6" id="imagePreviewContainer" style="display: none;">
                            <p>Yangi logoni oldindan ko'rish:</p>
                            <img id="imagePreview" alt="Image Preview" width="200px" class="img-thumbnail mt-1">
                        </div>
                    </div>

                    @error('logo')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <a href="{{ route('restaurants.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
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
            </form>
        </div>
    </div>
@endsection
