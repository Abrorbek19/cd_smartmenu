@extends("admin.layouts.header")

@section('content')

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Batafsil</h2>
            </div><br>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Title(uz):</strong></div>
                    <div class="col-md-8">{{ $featuremain->title_uz }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Title(ru):</strong></div>
                    <div class="col-md-8">{{ $featuremain->title_ru }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Title(en):</strong></div>
                    <div class="col-md-8">{{ $featuremain->title_en }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Tavsif(uz):</strong></div>
                    <div class="col-md-8">{{ $featuremain->description_uz }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Tavsif(ru):</strong></div>
                    <div class="col-md-8">{{ $featuremain->description_ru }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Tavsif(en):</strong></div>
                    <div class="col-md-8">{{ $featuremain->description_en }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Rasmi:</strong></div>
                    <div class="col-md-8">
                        @if($featuremain->icon)
                            <img src="{{ asset('/featuremains/'. $featuremain->icon) }}" alt="Meal Image" width="200px">
                        @else
                            <p>Rasm mavjud emas</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('featuremains.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                <a href="{{ route('featuremains.edit', $featuremain->id) }}" class="btn btn-warning"><i class="ri-pencil-fill"></i>Tahrirlash</a>
                <form action="{{ route('featuremains.destroy', $featuremain->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Haqiqatan ham bu Featureni oʻchirib tashlamoqchimisiz?');"><i class="ri-delete-bin-line"></i>O'chirish</button>
                </form>
            </div>
        </div>
    </div>

@endsection
