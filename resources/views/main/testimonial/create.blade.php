@extends("admin.layouts.header")

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h2>Fikr qo'shish</h2>
            </div><br>
            <form class="row g-3" action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="fullname" value="{{ old('fullname') }} ">
                        <label for="floatingName">Fullname</label>
                    </div>
                    @error('fullname')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                    <textarea class="form-control"  name="description_uz" id="floatingTextarea" style="height: 150px;"> {{ old('description_uz') }}</textarea>
                    <label for="floatingTextarea">Fikr (uz)</label>
                </div>
                    @error('description_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <textarea class="form-control"  name="description_ru" id="floatingTextarea" style="height: 150px;"> {{ old('description_ru') }}</textarea>
                        <label for="floatingTextarea">Fikr (ru)</label>
                    </div>
                    @error('description_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <textarea class="form-control"  name="description_en" id="floatingTextarea" style="height: 150px;"> {{ old('description_en') }}</textarea>
                        <label for="floatingTextarea">Fikr (en)</label>
                    </div>
                    @error('description_en')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="role_user_uz" value="{{ old('role_user_uz') }} ">
                        <label for="floatingName">User Type (uz)</label>
                    </div>
                    @error('role_user_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="role_user_ru" value="{{ old('role_user_ru') }} ">
                        <label for="floatingName">User Type (ru)</label>
                    </div>
                    @error('role_user_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="role_user_en" value="{{ old('role_user_en') }} ">
                        <label for="floatingName">User Type (en)</label>
                    </div>
                    @error('role_user_en')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Kategoriya" name="star">
                            <option value="" disabled>--Tanglang</option>
                            <option value="1" > 1 </option>
                            <option value="2" > 2 </option>
                            <option value="3" > 3 </option>
                            <option value="4" > 4 </option>
                            <option value="5" > 5 </option>
                        </select>
                        <label for="floatingSelect">Star</label>
                    </div>
                    @error('star')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Kategoriya" name="restaran_id">
                            <option value="" disabled>--Tanglang--</option>
                            @foreach($restarans as $restaran)
                                <option value="{{ $restaran->id }}" {{ old('restaran_id') == $restaran->id ? 'selected' : '' }}>{{ $restaran->name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Restaranlar</label>
                    </div>
                    @error('restaran_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-floating">
                        <input type="file" class="form-control" id="floatingName" name="image" onchange="previewImage(event)">
                        <label for="floatingName">Image</label>
                    </div>
                    @error('image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- Image preview section -->
                    <div class="mt-2" id="imagePreviewContainer" style="display: none;">
                        <strong>Rasm oldindan ko'rish:</strong>
                        <img id="imagePreview" src="" alt="Image Preview" width="200px" class="img-thumbnail mt-1">
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('testimonial.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
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
                    previewContainer.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none';
            }
        }
    </script>

@endsection
