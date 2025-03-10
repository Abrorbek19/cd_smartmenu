@extends("admin.layouts.header")

@section('content')

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Batafsil</h2>
            </div><br>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Ism:</strong></div>
                    <div class="col-md-8">{{ $user->firstname }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Familiya:</strong></div>
                    <div class="col-md-8">{{ $user->lastname }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Username:</strong></div>
                    <div class="col-md-8">{{ $user->username }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Telefon nomeri:</strong></div>
                    <div class="col-md-8">{{ $user->phone }}</div>
                </div>
{{--                <div class="row mb-3">--}}
{{--                    <div class="col-md-4"><strong>Password:</strong></div>--}}
{{--                    <div class="col-md-8">{{ $user->password}}</div>--}}
{{--                </div>--}}
            </div>
            <div class="card-footer">
                <a href="{{ route('users.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="ri-pencil-fill"></i>Tahrirlash</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bu foydalanuvchini oʻchirib tashlamoqchimisiz?');"><i class="ri-delete-bin-line"></i>O'chirish</button>
                </form>
            </div>
        </div>
    </div>

@endsection
