@extends('admin.layouts.header')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Batafsil</h2>
            </div><br>
            <div class="card-body">
                <p><strong>Username:</strong> {{ $client->user->username }}</p>
                <p><strong>Restaran:</strong> {{ $client->restaurant->name }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('clients.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning"><i class="ri-pencil-fill"></i>Tahrirlash</a>
                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bu klientni oʻchirib tashlamoqchimisiz?');"><i class="ri-delete-bin-line"></i>O'chirish</button>
                </form>
            </div>
        </div>
    </div>
@endsection
