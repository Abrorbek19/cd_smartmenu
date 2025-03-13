@extends("admin.layouts.header")

@section('content')

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Batafsil</h2>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Restaran:</strong></div>
                    <div class="col-md-8">{{ $payment->restaurant->name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Tarif:</strong></div>
                    <div class="col-md-8">{{ $payment->tariff->name_uz }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>To'lov miqdori:</strong></div>
                    <div class="col-md-8">{{$payment->money }} UZS</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Boshlanish sanasi:</strong></div>
                    <div class="col-md-8">{{ $payment->start_date }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Tugash sanasi:</strong></div>
                    <div class="col-md-8">{{ $payment->end_date }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>To'lov rasmi:</strong></div>
                    <div class="col-md-8">
                        @if($payment->payment_photo)
                            <img src="{{ asset('payments/' . $payment->payment_photo) }}" alt="Payment Photo" width="200px">
                        @else
                            <p>To'lov miqdori mavjud emas</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('payments.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                @role('admin')
                <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning"> <i class="ri-pencil-fill"></i>Tahrirlash</a>
                <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Haqiqatan ham bu toʻlovni oʻchirib tashlamoqchimisiz?');"><i class="ri-delete-bin-line"></i>O'chirish</button>
                </form>
                @endrole
            </div>
        </div>
    </div>

@endsection
