@extends('admin.layouts.header')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2>Tahrirlash</h2>
        </div><br>
        <div class="card-body">
            <!-- Vertical Form -->
            <form class="row g-3" action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <div class="form-floating">
                        <select class="form-control" id="floatingStatus" name="status">
                            <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>Aktiv emas</option>
                            <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>Aktiv</option>
                        </select>
                        <label for="floatingStatus">Status</label>
                    </div>
                    @error('status')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="name_uz" value="{{ $category->name_uz }} ">
                        <label for="floatingName">Nomi(uz)</label>
                    </div>
                    @error('name_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="name_ru" value="{{ $category->name_ru }} ">
                        <label for="floatingName">Nomi(ru)</label>
                    </div>
                    @error('name_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="name_en" value="{{ $category->name_en }} ">
                        <label for="floatingName">Nomi(en)</label>
                    </div>
                    @error('name_en')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                    <button type="submit" class="btn btn-primary"><i class="ri-pencil-fill"></i>Tahrirlash</button>
                </div>
            </form><!-- Vertical Form -->
        </div>
    </div>
@endsection
