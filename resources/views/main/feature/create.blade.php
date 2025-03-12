@extends("admin.layouts.header")

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h2>Feature qo'shish</h2>
            </div><br>
            <form class="row g-3" action="{{ route('featuremains.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="title_uz" value="{{ old('title_uz') }} ">
                        <label for="floatingName">Title(uz)</label>
                    </div>
                    @error('title_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="title_ru" value="{{ old('title_ru') }} ">
                        <label for="floatingName">Title(ru)</label>
                    </div>
                    @error('title_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="title_en" value="{{ old('title_en') }} ">
                        <label for="floatingName">Title(en)</label>
                    </div>
                    @error('title_en')
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
                <div class="col-12">
                    <div class="form-floating">
                        <input type="file" class="form-control" id="floatingName" name="icon" onchange="previewImage(event)">
                        <label for="floatingName">Icon</label>
                    </div>
                    @error('icon')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- Image preview section -->
                    <div class="mt-2" id="imagePreviewContainer" style="display: none;">
                        <strong>Rasm oldindan ko'rish:</strong>
                        <img id="imagePreview" src="" alt="Image Preview" width="200px" class="img-thumbnail mt-1">
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('featuremains.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
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
