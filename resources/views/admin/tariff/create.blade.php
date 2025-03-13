@extends('admin.layouts.header')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h2>Tarif qo'shish</h2>
            </div><br>
            <form class="row g-3" action="{{ route('tariffs.store') }}" method="POST">
                @csrf

                <div class="col-sm-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="name_uz" value="{{ old('name_uz') }} ">
                        <label for="floatingName">Nomi(uz)</label>
                    </div>
                    @error('name_uz')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="name_ru" value="{{ old('name_ru') }} ">
                        <label for="floatingName">Nomi(ru)</label>
                    </div>
                    @error('name_ru')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="name_en" value="{{ old('name_en') }} ">
                        <label for="floatingName">Nomi(en)</label>
                    </div>
                    @error('name_en')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

{{--                <div class="col-sm-6">--}}
{{--                    <div class="form-floating">--}}
{{--                        <input type="text" class="form-control" id="floatingName" name="price" value="{{ old('price') }} ">--}}
{{--                        <label for="floatingName">Narxi</label>--}}
{{--                    </div>--}}
{{--                    @error('price')--}}
{{--                    <div class="text-danger">{{ $message }}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}
                <div class="col-sm-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="price"
                               value="{{ old('price', isset($item) ? number_format((float) $item->price, 0, ',', ' ') : '') }}"
                               oninput="formatPrice(this)">
                        <label for="floatingName">Narxi</label>
                    </div>
                    @error('price')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <script>
                    function formatPrice(input) {
                        // Remove non-digit characters to work with pure numbers
                        let value = input.value.replace(/\D/g, '');

                        // Format the number with spaces every three digits for readability
                        input.value = new Intl.NumberFormat('ru-RU').format(value);
                    }
                </script>
                <div class="col-sm-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingName" name="days" value="{{ old('days') }} ">
                        <label for="floatingName">Kuni</label>
                    </div>
                    @error('days')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <a href="{{ route('tariffs.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                    <button type="submit" class="btn btn-primary"><i class="ri-add-box-fill"></i>Qo'shish</button>
                </div>
            </form><!-- Vertical Form -->
        </div>
    </div>
@endsection
