@extends("admin.layouts.header")

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h2>Taom qo'shish</h2>
            </div><br>
            <form class="row g-3" action="{{ route('meals.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Kategoriya" name="category_id">
                            <option value="" disabled>Kategoriya</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name_uz }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Kategoriya</label>
                    </div>
                    @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="name_uz" value="{{ old('name_uz') }} ">
                        <label for="floatingName">Nomi(uz)</label>
                    </div>
                    @error('name_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="name_ru" value="{{ old('name_ru') }} ">
                        <label for="floatingName">Nomi(ru)</label>
                    </div>
                    @error('name_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="name_en" value="{{ old('name_en') }} ">
                        <label for="floatingName">Nomi(en)</label>
                    </div>
                    @error('name_en')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                    <textarea class="form-control"  name="description_uz" id="floatingTextarea" style="height: 100px;"> {{ old('description_uz') }}</textarea>
                    <label for="floatingTextarea">Qisqa ma'lumot(uz)</label>
                </div>
                    @error('description_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <textarea class="form-control"  name="description_ru" id="floatingTextarea" style="height: 100px;"> {{ old('description_ru') }}</textarea>
                        <label for="floatingTextarea">Qisqa ma'lumot(ru)</label>
                    </div>
                    @error('description_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <textarea class="form-control"  name="description_en" id="floatingTextarea" style="height: 100px;"> {{ old('description_en') }}</textarea>
                        <label for="floatingTextarea">Qisqa ma'lumot(en)</label>
                    </div>
                    @error('description_en')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="price"
                               value="{{ old('price', isset($item) ? number_format($item->price, 0, ',', ' ') : '') }}"
                               oninput="formatPrice(this)">
                        <label for="floatingName">Narxi(so'm)</label>
                    </div>
                    @error('price')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <script>
                    function formatPrice(input) {
                        // Remove non-digit characters
                        let value = input.value.replace(/\D/g, '');

                        // Format the number with spaces every three digits
                        input.value = new Intl.NumberFormat('ru-RU').format(value);
                    }
                </script>



                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="weight" value="{{ old('weight') }} ">
                        <label for="floatingName">Og'irligi(gramm)</label>
                    </div>
                    @error('weight')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="time" value="{{ old('time') }} ">
                        <label for="floatingName">Tayyorlanish vaqti(minut)</label>
                    </div>
                    @error('time')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="file" class="form-control" id="floatingName" name="photo" onchange="previewImage(event)">
                        <label for="floatingName">Rasmi</label>
                    </div>
                    @error('photo')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- Image preview section -->
                    <div class="mt-2" id="imagePreviewContainer" style="display: none;">
                        <strong>Rasm oldindan ko'rish:</strong>
                        <img id="imagePreview" src="" alt="Image Preview" width="200px" class="img-thumbnail mt-1">
                    </div>
                </div>

                <script>
                    function previewImage(event) {
                        const file = event.target.files[0];
                        const previewContainer = document.getElementById('imagePreviewContainer');
                        const imagePreview = document.getElementById('imagePreview');

                        if (file) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                imagePreview.src = e.target.result;
                                previewContainer.style.display = 'block';
                            };

                            reader.readAsDataURL(file);
                        } else {
                            previewContainer.style.display = 'none';
                        }
                    }
                </script>


                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> <i class="ri-add-box-fill"></i>Qo'shish</button>
                    <a href="{{ route('meals.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
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
                    previewContainer.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none';
            }
        }
    </script>

@endsection
