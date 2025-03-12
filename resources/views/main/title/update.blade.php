@extends('admin.layouts.header')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h2>Tahrirlash</h2>
            </div><br>
            <form class="row g-3" action="{{ route('titlemains.update', $titlemain->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-sm-4">
                    <label for="inputNanme4" class="form-label">Sarlavha (uz)</label>
                        <textarea class="form-control" style="height: 150px;" id="summernote1" name="title_uz">{{ old('title_uz', $titlemain->title_uz) }}</textarea>
                    @error('title_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="inputNanme4" class="form-label">Sarlavha (ru)</label>
                        <textarea class="form-control" style="height: 150px;" id="summernote2" name="title_ru">{{ old('title_ru', $titlemain->title_ru) }}</textarea>
                    @error('title_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="inputNanme4" class="form-label">Sarlavha (en)</label>
                        <textarea class="form-control" style="height: 150px;" id="summernote3" name="title_en">{{ old('title_en', $titlemain->title_en) }}</textarea>
                    @error('title_en')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-4">
                    <label for="inputNanme4" class="form-label">Tavsif (uz)</label>
                    <textarea class="form-control" style="height: 150px;" id="summernote4" name="description_uz">{{ old('description_uz', $titlemain->description_uz) }}</textarea>
                    @error('description_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="inputNanme4" class="form-label">Tavsif (ru)</label>
                    <textarea class="form-control" style="height: 150px;" id="summernote5" name="description_ru">{{ old('description_ru', $titlemain->description_ru) }}</textarea>
                    @error('description_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="inputNanme4" class="form-label">Tavsif (en)</label>
                    <textarea class="form-control" style="height: 150px;" id="summernote6" name="description_en">{{ old('description_en', $titlemain->description_en) }}</textarea>
                    @error('description_en')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
{{--                <div class="col-sm-4">--}}
{{--                    <div class="form-floating">--}}
{{--                        <textarea class="form-control" style="height: 150px;" id="floatingDescriptionUz" name="description_uz">{{ old('description_uz', $titlemain->description_uz) }}</textarea>--}}
{{--                        <label for="floatingDescriptionUz">Tavsif (uz)</label>--}}
{{--                    </div>--}}
{{--                    @error('description_uz')--}}
{{--                    <div class="text-danger">{{ $message }}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="col-sm-4">--}}
{{--                    <div class="form-floating">--}}
{{--                        <textarea class="form-control" style="height: 150px;" id="floatingDescriptionRu" name="description_ru">{{ old('description_ru', $titlemain->description_ru) }}</textarea>--}}
{{--                        <label for="floatingDescriptionRu">Tavsif (ru)</label>--}}
{{--                    </div>--}}
{{--                    @error('description_ru')--}}
{{--                    <div class="text-danger">{{ $message }}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="col-sm-4">--}}
{{--                    <div class="form-floating">--}}
{{--                        <textarea class="form-control" style="height: 150px;" id="floatingDescriptionEn" name="description_en">{{ old('description_en', $titlemain->description_en) }}</textarea>--}}
{{--                        <label for="floatingDescriptionEn">Tavsif (en)</label>--}}
{{--                    </div>--}}
{{--                    @error('description_en')--}}
{{--                    <div class="text-danger">{{ $message }}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}


                <div class="col-sm-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="position" value="{{ old('position', $titlemain->position) }}">
                        <label for="floatingName">Position</label>
                    </div>
                    @error('position')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="text-center">
                    <a href="{{ route('titlemains.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                    <button type="submit" class="btn btn-primary"><i class="ri-pencil-fill"></i>Tahrirlash</button>
                </div>
            </form>
        </div>
    </div>
@endsection
