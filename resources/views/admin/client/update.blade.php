@extends("admin.layouts.header")

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <h2> Tahrirlash</h2>
            </div> <br>
            <form class="row g-3" action="{{ route('clients.update', $client->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Kategoriya" name="user_id">
                            <option value="" disabled>Select a category</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}"{{ old('user_id', $client->user_id) == $user->id ? 'selected' : '' }}>{{ $user->username }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Username</label>
                    </div>
                    @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Kategoriya" name="restaurant_id">
                            <option value="" disabled>Select a category</option>
                            @foreach($restaurants as $restaurant)
                                <option value="{{ $restaurant->id }}"{{ old('restaurant_id', $client->restaurant_id) == $restaurant->id ? 'selected' : '' }}>{{ $restaurant->name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Restaran</label>
                    </div>
                    @error('restaurant_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <a href="{{ route('clients.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                    <button type="submit" class="btn btn-primary"><i class="ri-pencil-fill"></i>Tahrirlash</button>
                </div>
            </form>
        </div>
    </div>
@endsection
