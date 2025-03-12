@extends("admin.layouts.header")

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h2>Tahrirlash</h2>
            </div><br>
            <form class="row g-3" action="{{ route('testimonial.update',$testimonial->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="fullname" value="{{ old('fullname',$testimonial->fullname) }} ">
                        <label for="floatingName">Fullname</label>
                    </div>
                    @error('fullname')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <textarea class="form-control"  name="description_uz" id="floatingTextarea" style="height: 150px;"> {{ old('description_uz',$testimonial->description_uz) }}</textarea>
                        <label for="floatingTextarea">Fikr (uz)</label>
                    </div>
                    @error('description_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <textarea class="form-control"  name="description_ru" id="floatingTextarea" style="height: 150px;"> {{ old('description_ru',$testimonial->description_ru) }}</textarea>
                        <label for="floatingTextarea">Fikr (ru)</label>
                    </div>
                    @error('description_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <textarea class="form-control"  name="description_en" id="floatingTextarea" style="height: 150px;"> {{ old('description_en',$testimonial->description_en) }}</textarea>
                        <label for="floatingTextarea">Fikr (en)</label>
                    </div>
                    @error('description_en')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="role_user_uz" value="{{ old('role_user_uz',$testimonial->role_user_uz) }} ">
                        <label for="floatingName">User Type (uz)</label>
                    </div>
                    @error('role_user_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="role_user_ru" value="{{ old('role_user_ru',$testimonial->role_user_ru) }} ">
                        <label for="floatingName">User Type (ru)</label>
                    </div>
                    @error('role_user_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="role_user_en" value="{{ old('role_user_en',$testimonial->role_user_en) }} ">
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
                            <option value="1" {{ $testimonial->star == 1 ? 'selected' : '' }}> 1 </option>
                            <option value="2" {{ $testimonial->star == 2 ? 'selected' : '' }}> 2 </option>
                            <option value="3" {{ $testimonial->star == 3 ? 'selected' : '' }}> 3 </option>
                            <option value="4" {{ $testimonial->star == 4 ? 'selected' : '' }}> 4 </option>
                            <option value="5" {{ $testimonial->star == 5 ? 'selected' : '' }}> 5 </option>
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
                                <option value="{{ $restaran->id }}" {{ old('restaran_id',$testimonial->restaran_id) == $restaran->id ? 'selected' : '' }}>{{ $restaran->name }}</option>
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
                    <div class="row">
                        @if($testimonial->image)
                            <div class="col-md-6">
                                <p>Joriy rasm:</p>
                                <img src="{{ asset('/storage/testimonial/' . $testimonial->image) }}" alt="Meal Photo" width="200px" class="img-thumbnail mt-1">
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

                <div class="text-center">
                    <a href="{{ route('testimonial.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                    <button type="submit" class="btn btn-primary"><i class="ri-pencil-fill"></i>Tahrirlash</button>
                </div>
            </form>

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
