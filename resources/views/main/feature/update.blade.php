@extends("admin.layouts.header")

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h2>Tahrirlash</h2>
            </div><br>
            <form class="row g-3" action="{{ route('featuremains.update', $featuremain->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="title_uz" value="{{ old('title_uz', $featuremain->title_uz) }}">
                        <label for="floatingName">Title(uz)</label>
                    </div>
                    @error('title_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="title_ru" value="{{ old('title_ru', $featuremain->title_ru) }}">
                        <label for="floatingName">Title(ru)</label>
                    </div>
                    @error('title_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="title_en" value="{{ old('title_en', $featuremain->title_en) }}">
                        <label for="floatingName">Title(en)</label>
                    </div>
                    @error('title_en')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <textarea class="form-control" id="floatingName" style="height: 100px;" name="description_uz">{{ old('description_uz', $featuremain->description_uz) }}</textarea>
                        <label for="floatingName">Tavsif(uz)</label>
                    </div>
                    @error('description_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <textarea class="form-control" id="floatingName" style="height: 100px;" name="description_ru">{{ old('description_ru', $featuremain->description_ru) }}</textarea>
                        <label for="floatingName">Tavsif(ru)</label>
                    </div>
                    @error('description_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <textarea class="form-control" id="floatingName" style="height: 100px;" name="description_en">{{ old('description_en', $featuremain->description_en) }}</textarea>
                        <label for="floatingName">Tavsif(en)</label>
                    </div>
                    @error('description_en')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-floating">
                        <input type="file" class="form-control" id="photoInput" name="icon" accept="image/*" onchange="previewImage(event)">
                        <label for="photoInput">Rasmi</label>
                    </div>
                    <br><br>

                    <div class="row">
                        @if($featuremain->icon)
                            <div class="col-md-6">
                                <p>Joriy rasm:</p>
                                <img src="{{ asset('/storage/featuremains/' . $featuremain->icon) }}" alt="Meal Photo" width="200px" class="img-thumbnail mt-1">
                            </div>
                        @endif

                        <!-- Preview image element -->
                        <div class="col-md-6" id="imagePreviewContainer" style="display: none;">
                            <p>Yangi rasmni oldindan ko'rish:</p>
                            <img id="imagePreview" alt="Image Preview" width="200px" class="img-thumbnail mt-1">
                        </div>
                    </div>
                    @error('photo')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>



                <!-- Submit button -->
                <div class="text-center">
                    <a href="{{ route('featuremains.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                    <button type="submit" class="btn btn-primary"><i class="ri-pencil-fill"></i>Tahrirlash</button>
                </div>
            </form>
            <!-- End Vertical Form -->


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
    </div>
@endsection
