@extends("admin.layouts.header")

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h2>Tahrirlash</h2>
            </div><br>
            <form class="row g-3" action="{{ route('meals.update', $meal->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Kategoriya" name="category_id">
                            <option value="" disabled>Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"{{ old('category_id', $meal->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name_uz }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Kategoriya</label>
                    </div>
                    @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelectStatus" aria-label="Status" name="status">
                            <option value="" disabled>Status</option>
                            <option value="1" {{ old('status', $meal->status) == 1 ? 'selected' : '' }}>Aktiv</option>
                            <option value="0" {{ old('status', $meal->status) == 0 ? 'selected' : '' }}>Aktiv emas</option>
                        </select>
                        <label for="floatingSelectStatus">Status</label>
                    </div>
                    @error('status')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="name_uz" value="{{ old('name_uz', $meal->name_uz) }}">
                        <label for="floatingName">Nomi(uz)</label>
                    </div>
                    @error('name_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="name_ru" value="{{ old('name_ru', $meal->name_ru) }}">
                        <label for="floatingName">Nomi(ru)</label>
                    </div>
                    @error('name_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="name_en" value="{{ old('name_en', $meal->name_en) }}">
                        <label for="floatingName">Nomi(en)</label>
                    </div>
                    @error('name_en')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>



                <div class="col-4">
                    <div class="form-floating">
                        <textarea class="form-control" id="floatingName" style="height: 100px;" name="description_uz">{{ old('description_uz', $meal->description_uz) }}</textarea>
                        <label for="floatingName">Tavsif(uz)</label>
                    </div>
                    @error('description_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <textarea class="form-control" id="floatingName" style="height: 100px;" name="description_ru">{{ old('description_ru', $meal->description_ru) }}</textarea>
                        <label for="floatingName">Tavsif(ru)</label>
                    </div>
                    @error('description_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <textarea class="form-control" id="floatingName" style="height: 100px;" name="description_en">{{ old('description_en', $meal->description_en) }}</textarea>
                        <label for="floatingName">Tavsif(en)</label>
                    </div>
                    @error('description_en')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="price" value="{{ old('price', $meal->price) }}">
                        <label for="floatingName">Narxi</label>
                    </div>
                    @error('price')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="weight" value="{{ old('weight', $meal->weight) }}">
                        <label for="floatingName">Og'irligi</label>
                    </div>
                    @error('weight')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="time" value="{{ old('time', $meal->time) }}">
                        <label for="floatingName">Tayyorlanish vaqti</label>
                    </div>
                    @error('time')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="file" class="form-control" id="photoInput" name="photo" accept="image/*" onchange="previewImage(event)">
                        <label for="photoInput">Rasmi</label>
                    </div>
                    <br><br>

                    <div class="row">
                        @if($meal->photo)
                            <div class="col-md-6">
                                <p>Joriy rasm:</p>
                                <img src="{{ asset('/storage/meals/' . $meal->photo) }}" alt="Meal Photo" width="200px" class="img-thumbnail mt-1">
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
                    <a href="{{ route('meals.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
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
