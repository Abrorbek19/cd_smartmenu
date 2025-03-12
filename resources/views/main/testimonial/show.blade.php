@extends("admin.layouts.header")

@section('content')

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Batafsil</h2>
            </div><br>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Ismi:</strong></div>
                    <div class="col-md-8">{{ $show->fullname }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Ta'rif (uz):</strong></div>
                    <div class="col-md-8">{{ $show->description_uz }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Ta'rif (ru):</strong></div>
                    <div class="col-md-8">{{ $show->description_ru}}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Ta'rif (en):</strong></div>
                    <div class="col-md-8">{{$show->description_en }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Rol (uz):</strong></div>
                    <div class="col-md-8">{{ $show->role_user_uz }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Rol (ru):</strong></div>
                    <div class="col-md-8">{{ $show->role_user_ru }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Rol (en):</strong></div>
                    <div class="col-md-8">{{ $show->role_user_en }} </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Star:</strong></div>
                    <div class="col-md-8">{{ $show->star }} </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Restaran nomi:</strong></div>
                    <div class="col-md-8">{{ $show->restaurant['name'] }} </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Rasmi:</strong></div>
                    <div class="col-md-8">
                        @if($show->image)
                            <img src="{{ asset('/storage/testimonial/'. $show->image) }}" alt="Meal Image" width="200px">
                        @else
                            <p>Rasm mavjud emas</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('testimonial.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Ortga</a>
                <a href="{{ route('testimonial.edit', $show->id) }}" class="btn btn-warning"><i class="ri-pencil-fill"></i>Tahrirlash</a>
                <form action="{{ route('testimonial.destroy', $show->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Haqiqatan ham bu taomni oʻchirib tashlamoqchimisiz?');"><i class="ri-delete-bin-line"></i>O'chirish</button>
                </form>
            </div>
        </div>
    </div>

@endsection
