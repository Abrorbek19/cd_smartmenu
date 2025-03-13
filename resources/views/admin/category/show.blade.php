@php use App\Enums\Status; @endphp
@extends('admin.layouts.header')

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header">
                <h2>Batafsil</h2>
            </div>
            <div class="card-body">
                <p><strong>Nomi(uz):</strong> {{ $category->name_uz }}</p>
                <p><strong>Nomi(ru):</strong> {{ $category->name_ru }}</p>
                <p><strong>Nomi(en):</strong> {{ $category->name_en }}</p>
                <p><strong>Statusi:</strong> {{ $category->status == Status::ACTIVE->value ? Status::ACTIVE->name : Status::INACTIVE->name }}
                </p>

            </div>

            <div class="card-footer">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning"><i
                        class="ri-pencil-fill"></i>Tahrirlash</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Bu kategoriyani oʻchirib tashlamoqchimisiz?');"><i
                            class="ri-delete-bin-line"></i>O'chirish
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
