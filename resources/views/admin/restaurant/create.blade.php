@extends("admin.layouts.header")

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h2> Restaran qo'shish</h2>
            </div><br>
            <form class="row g-3" action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="name" value="{{ old('name') }} ">
                        <label for="floatingName">Restaran nomi</label>
                    </div>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="phone_number" value="{{ old('phone_number') }} ">
                        <label for="floatingName">Telefon nomer</label>
                    </div>
                    @error('phone_number')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingName" name="tax" value="{{ old('tax') }} ">
                        <label for="floatingName">Soliq(%)</label>
                    </div>
                    @error('tax')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="address_uz" value="{{ old('address_uz') }} ">
                        <label for="floatingName">Adsress(uz)</label>
                    </div>
                    @error('address_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="address_ru" value="{{ old('address_ru') }} ">
                        <label for="floatingName">Adsress(ru)</label>
                    </div>
                    @error('address_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="address_en" value="{{ old('address_en') }} ">
                        <label for="floatingName">Adsress(en)</label>
                    </div>
                    @error('address_en')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="instagram" value="{{ old('instagram') }} ">
                        <label for="floatingName">Instagram</label>
                    </div>
                    @error('instagram')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="youtube" value="{{ old('youtube') }} ">
                        <label for="floatingName">You Tube</label>
                    </div>
                    @error('youtube')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>



                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="tiktok" value="{{ old('tiktok') }} ">
                        <label for="floatingName">TikTok</label>
                    </div>
                    @error('tiktok')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="telegram" value="{{ old('telegram') }} ">
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
                        'Wed' => ['uz' => 'Chor', 'ru' => 'Ср', 'en' => 'Wed'],
                        'Thu' => ['uz' => 'Pay', 'ru' => 'Чт', 'en' => 'Thu'],
                        'Fri' => ['uz' => 'Jum', 'ru' => 'Пт', 'en' => 'Fri'],
                        'Sat' => ['uz' => 'Shan', 'ru' => 'Сб', 'en' => 'Sat'],
                        'Sun' => ['uz' => 'Yak', 'ru' => 'Вс', 'en' => 'Sun'],
                    ];
                @endphp

                <div class="col-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Kategoriya" name="start_work_day_uz">
                            <option value="" disabled>Tanlang...</option>
                            @foreach($days as $key => $day)
                                <option value="{{ $day['uz'] }}" {{ old('start_work_day_uz') == $day['uz'] ? 'selected' : '' }}>{{ $day['uz'] }}</option>
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
                                <option value="{{ $day['uz'] }}" {{ old('end_work_day_uz') == $day['uz'] ? 'selected' : '' }}>{{ $day['uz'] }}</option>
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
                                <option value="{{ $day['ru'] }}" {{ old('start_work_day_ru') == $day['ru'] ? 'selected' : '' }}>{{ $day['ru'] }}</option>
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
                                <option value="{{ $day['ru'] }}" {{ old('end_work_day_ru') == $day['ru'] ? 'selected' : '' }}>{{ $day['ru'] }}</option>
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
                                <option value="{{ $day['en'] }}" {{ old('start_work_day_en') == $day['en'] ? 'selected' : '' }}>{{ $day['en'] }}</option>
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
                                <option value="{{ $day['en'] }}" {{ old('end_work_day_en') == $day['en'] ? 'selected' : '' }}>{{ $day['en'] }}</option>
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
                        <input type="time" class="form-control" id="floatingName" name="work_time_start" value="{{ old('work_time_start') }} ">
                        <label for="floatingName">Ish boshlash soati</label>
                    </div>
                        @error('work_time_start')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                <div class="col-6">
                    <div class="form-floating">
                        <input type="time" class="form-control" id="floatingName" name="work_time_end" value="{{ old('work_time_end') }} ">
                        <label for="floatingName">Ish tugash soati</label>
                    </div>
                        @error('work_time_end')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="file" class="form-control" id="floatingName" name="logo" onchange="previewImage(event)" accept="image/*">
                        <label for="floatingName">Logo</label>
                    </div><br>
                    @error('logo')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- Preview image container -->
                    <div id="imagePreviewContainer" style="display: none; margin-top: 10px">
                        <p>Logoni oldindan ko'rish:</p>
                        <img id="imagePreview" alt="Image Preview" width="200px" class="img-thumbnail mt-1">
                    </div>
                </div>




                <div class="text-center">
                    <a href="{{ route('restaurants.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga </a>
                    <button type="submit" class="btn btn-primary"><i class="ri-add-box-fill"></i>Qo'shish</button>
                </div>

            </form>

        </div>
    </div>
    {{--    rasmni preview qilish uchun script--}}

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('imagePreviewContainer');
            const imagePreview = document.getElementById('imagePreview');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    previewContainer.style.display = 'block'; // Show the preview container
                };

                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none'; // Hide the preview container if no file
            }
        }
    </script>

@endsection
