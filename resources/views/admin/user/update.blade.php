@extends("admin.layouts.header")

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h2> Tahrirlash</h2>
            </div> <br>
            <form class="row g-3" action="{{ route('update-password', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="col-sm-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="username" value="{{ old('username', $user->username) }}">
                        <label for="floatingName">Username</label>
                    </div>
                    @error('username')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="password">
                        <label for="floatingName">Parol (joriy saqlash uchun bo'sh qoldiring)</label>
                    </div>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                    <button type="submit" class="btn btn-primary"><i class="ri-pencil-fill"></i>Tahrirlash</button>
                </div>
            </form>
        </div>
    </div>
@endsection
