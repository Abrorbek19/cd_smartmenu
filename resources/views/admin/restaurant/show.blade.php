@extends("admin.layouts.header")

@section('content')

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Batafsil</h2>
            </div><br>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Restaran nomi:</strong></div>
                    <div class="col-md-8">{{ $restaurant->name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Telefon nomer:</strong></div>
                    <div class="col-md-8">{{ $restaurant->phone_number }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Addressi:</strong></div>
                    <div class="col-md-8">{{ $restaurant->address_uz }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Soliq:</strong></div>
                    <div class="col-md-8">{{ $restaurant->tax }}%</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Instagram:</strong></div>
                    <div class="col-md-8">
                        <a href="{{ $restaurant->instagram }}" target="_blank" rel="noopener noreferrer">{{ $restaurant->instagram }}</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>TikTok:</strong></div>
                    <div class="col-md-8">
                        <a href="{{ $restaurant->tiktok }}" target="_blank" rel="noopener noreferrer">{{ $restaurant->tiktok }}</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>YouTube:</strong></div>
                    <div class="col-md-8">
                        <a href="{{ $restaurant->youtube }}" target="_blank" rel="noopener noreferrer">{{ $restaurant->youtube }}</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Telegram:</strong></div>
                    <div class="col-md-8">
                        <a href="{{ $restaurant->telegram }}" target="_blank" rel="noopener noreferrer">{{ $restaurant->telegram }}</a>
                    </div>
                </div>

                <div class="row mb-3">
                        <div class="col-md-4"><strong>Ish soatlari:</strong></div>
                        <div class="col-md-8">{{ \Carbon\Carbon::parse($restaurant->work_time_start)->format('H:i') }} - {{ \Carbon\Carbon::parse($restaurant->work_time_end)->format('H:i') }}</div>
                    </div>

                    <div class="row mb-3">
                    <div class="col-md-4"><strong>Ish kunlari:</strong></div>
                    <div class="col-md-8">{{ $restaurant->start_work_day_uz }} - {{ $restaurant->end_work_day_uz }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong> Logo:</strong></div>
                    <div class="col-md-8"> @if($restaurant->logo)
                        <img src="{{ asset('restaurants/' . $restaurant->logo) }}" alt="Natija Rasm" width="200px" >
                    @else
                        <p>Rasm mavjud emas</p>
                    @endif
                 <br/>
                    </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('restaurants.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-warning"><i class="ri-pencil-fill"></i>Tahrirlash</a>
                <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bu restoranni oʻchirib tashlamoqchimisiz?');"><i class="ri-delete-bin-line"></i>O'chirish</button>
                </form>
            </div>
        </div>
    </div>

@endsection
