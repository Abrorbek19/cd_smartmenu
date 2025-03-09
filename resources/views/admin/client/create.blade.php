

@extends("admin.layouts.header")

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h2> Klient qo'shish</h2>
            </div> <br>
            <form class="row g-3" action="{{ route('clients.store') }}" method="POST">
                @csrf
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Kategoriya" name="user_id">
                            <option selected>Default</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->username }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Foydalanuvchi</label>
                    </div>
                    @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Kategoriya" name="restaurant_id">
                            <option selected>Default</option>
                            @foreach($restaurants as $restaurant)
                                <option value="{{ $restaurant->id }}" {{ old('restaurant_id') == $restaurant->id ? 'selected' : '' }}>{{ $restaurant->name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Restaran</label>
                    </div>
                    @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <a href="{{ route('clients.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                    <button type="submit" class="btn btn-primary"><i class="ri-add-box-fill"></i>Qo'shish</button>
                </div>
            </form>
        </div>
    </div>
@endsection


