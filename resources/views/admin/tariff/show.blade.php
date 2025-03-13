@extends('admin.layouts.header')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Batafsil</h2>
        </div><br>
        <div class="card-body">
            <div class="mb-3">
                <strong>Nomi(uz):</strong> {{ $tariff->name_uz }}
            </div>
            <div class="mb-3">
                <strong>Nomi(ru):</strong> {{ $tariff->name_ru }}
            </div>
            <div class="mb-3">
                <strong>Nomi(en):</strong> {{ $tariff->name_en }}
            </div>
            <div class="mb-3">
                <strong>Narxi:</strong> {{ $tariff->price }} UZS
            </div>
            <div class="mb-3">
                <strong>Kun:</strong> {{ $tariff->days }}
            </div>
            <div class="card-footer">
                <a href="{{ route('tariffs.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                <a href="{{ route('tariffs.edit', $tariff->id) }}" class="btn btn-warning"><i class="ri-pencil-fill"></i>Tahrirlash</a>
                <form action="{{ route('tariffs.destroy', $tariff->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Haqiqatan ham ushbu tarifni oʻchirib tashlamoqchimisiz?');"><i class="ri-delete-bin-line"></i>O'chirish</button>
                </form>
            </div>
        </div>
    </div>
@endsection
