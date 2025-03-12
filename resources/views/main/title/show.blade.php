@extends('admin.layouts.header')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Batafsil</h2>
        </div><br>
        <div class="card-body">
            <div class="mb-3">
                <strong>Title(uz):</strong> {{ $titlemain->title_uz }}
            </div>
            <div class="mb-3">
                <strong>Title(ru):</strong> {{ $titlemain->title_ru }}
            </div>
            <div class="mb-3">
                <strong>Title(en):</strong> {{ $titlemain->title_en }}
            </div>
            <div class="mb-3">
                <strong>Tavsif(uz):</strong> {{ $titlemain->description_uz }}
            </div>
            <div class="mb-3">
                <strong>Tavsif(ru):</strong> {{ $titlemain->description_ru }}
            </div>
            <div class="mb-3">
                <strong>Tavsif(en):</strong> {{ $titlemain->description_en }}
            </div>
            <div class="mb-3">
                <strong>Position:</strong> {{ $titlemain->position }}
            </div>

            <div class="card-footer">
                <a href="{{ route('titlemains.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                <a href="{{ route('titlemains.edit', $titlemain->id) }}" class="btn btn-warning"><i class="ri-pencil-fill"></i>Tahrirlash</a>
                <form action="{{ route('titlemains.destroy', $titlemain->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Haqiqatan ham ushbu sarlavhani oʻchirib tashlamoqchimisiz?');"><i class="ri-delete-bin-line"></i>O'chirish</button>
                </form>
            </div>
        </div>
    </div>
@endsection
