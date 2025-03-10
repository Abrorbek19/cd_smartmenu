@extends("admin.layouts.header")

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h2> Foydalanuvchi qo'shish</h2>
            </div> <br>


            <!-- Vertical Form -->
            <form class="row g-3" action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="col-sm-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="firstname" value="{{ old('firstname') }} ">
                        <label for="floatingName">Ism</label>
                    </div>
                    @error('firstname')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="lastname" value="{{ old('lastname') }} ">
                        <label for="floatingName">Familiya</label>
                    </div>
                    @error('lastname')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="phone" value="{{ old('phone') }} ">
                        <label for="floatingName">Telefon nomer</label>
                    </div>
                    @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="username" value="{{ old('username') }} ">
                        <label for="floatingName">Username</label>
                    </div>
                    @error('username')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="password" value="{{ old('password') }} ">
                        <label for="floatingName">Password</label>
                    </div>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                    <button type="submit" class="btn btn-primary"><i class="ri-add-box-fill"></i>Qo'shish</button>
                </div>
            </form><!-- Vertical Form -->
        </div>
    </div>
@endsection
