@extends("admin.layouts.header")

@section('content')

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Batafsil</h2>
            </div><br>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Nomi(uz):</strong></div>
                    <div class="col-md-8">{{ $meal->name_uz }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Nomi(ru):</strong></div>
                    <div class="col-md-8">{{ $meal->name_ru }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Nomi(en):</strong></div>
                    <div class="col-md-8">{{ $meal->name_en }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Tavsif(uz):</strong></div>
                    <div class="col-md-8">{{ $meal->description_uz }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Tavsif(ru):</strong></div>
                    <div class="col-md-8">{{ $meal->description_ru }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Tavsif(en):</strong></div>
                    <div class="col-md-8">{{ $meal->description_en }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Narxi:</strong></div>
                    <div class="col-md-8">{{ $meal->price }} UZS</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Og'irligi:</strong></div>
                    <div class="col-md-8">{{ $meal->weight }} gramm</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Tayyorlanish vaqti:</strong></div>
                    <div class="col-md-8">{{ $meal->time }} minut</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Statusi:</strong></div>
                    <div class="col-md-8">{{ $meal->status == 1 ? 'Aktiv' : 'Aktiv emas' }} </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Rasmi:</strong></div>
                    <div class="col-md-8">
                        @if($meal->photo)
                            <img src="{{ asset('/storage/meals/'. $meal->photo) }}" alt="Meal Image" width="200px">
                        @else
                            <p>Rasm mavjud emas</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('meals.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                <a href="{{ route('meals.edit', $meal->id) }}" class="btn btn-warning"><i class="ri-pencil-fill"></i>Tahrirlash</a>
                <form action="{{ route('meals.destroy', $meal->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Haqiqatan ham bu taomni oʻchirib tashlamoqchimisiz?');"><i class="ri-delete-bin-line"></i>O'chirish</button>
                </form>
            </div>
        </div>
    </div>

@endsection
