@php use App\Enums\Status; @endphp

<style>
    /* Taom qo'shish button styling */
    .add-meal-btn {
        padding: 8px 12px;
        font-size: 1.2rem;
        font-weight: bold;
        background-color: #28a745;
        border: none;
        border-radius: 5px;
        color: white;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s ease;
    }

    .add-meal-btn:hover {
        background-color: #218838;
        color: white;
    }

    /* h3 styling */
    .section-title {
        font-size: 1.5rem;
        font-weight: bold;
        margin: 20px 0 10px;
    }

    .section-title.green {
        color: green;
    }

    .section-title.red {
        color: red;
    }

    /* Dashboard card styling */
    .dashboard-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 350px; /* Make cards smaller */
    }

    .card-image {
        /*width: 100%;*/
        display: block;
        margin: 0 auto;
        height: 150px; /* Reduce image height */
        object-fit: cover;
    }

    .card-detail {
        padding: 10px; /* Adjust padding */
    }

    .card-time {
        color: #888;
        font-size: 0.9rem;
    }

    .btn-group .btn {
        margin-right: 5px;
    }
</style>


@extends("admin.layouts.header")

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Taomlar ro'yxati</h2>
                <button type="button" class="add-meal-btn mb-3">
                    <a href="{{ route('meals.create') }}" class="text-white" style="text-decoration: none;">
                        <i class="ri-add-box-fill"></i> Taom qo'shish
                    </a>
                </button>
            </div>
            <br>

            <div class="container">
                @foreach ($groupedMeals as $category => $meals)
                    <h3 class="section-title text-uppercase">{{ $category }}</h3>
                    <hr style="border-top: 2px solid #000000; margin: 5px 0;">

                    <!-- Active Meals -->
                    <h4 class="section-title green">Aktiv taomlar</h4>
                    <div class="row">
                        @foreach ($meals->where('status', Status::ACTIVE->value) as $meal)
                            <div class="col-md-4">
                                <div class="dashboard-card">
                                    <img class="card-image" src="{{ asset('/storage/meals/'. $meal->photo) }}"
                                         alt="{{ $meal->name_uz }}">
                                    <div class="card-detail">
                                        <h4>{{ $meal->name_uz }} <span>{{ $meal->price }} so'm</span></h4>
                                        <p>{{ $meal->description_uz ?? '' }}</p>
                                        <div class="d-flex justify-content-between">
                                            <p class="card-time"><i class="fas fa-clock"></i> {{ $meal->time }} min</p>
                                            <p class="card-time"><i
                                                    class="fas fa-balance-scale"></i> {{ $meal->weight ?? 'N/A' }}</p>
                                        </div>

                                        <div class="btn-group" style="margin-top: 10px;">
                                            <a href="{{ route('meals.show', $meal->id) }}">
                                                <button type="button" class="btn btn-info btn-sm text-white">
                                                    <i class="ri-eye-fill"></i> View
                                                </button>
                                            </a>
                                            <a href="{{ route('meals.edit', $meal->id) }}">
                                                <button type="button" class="btn btn-warning btn-sm text-white">
                                                    <i class="ri-pencil-fill"></i> Edit
                                                </button>
                                            </a>
                                            <form action="{{ route('meals.destroy', $meal->id) }}" method="POST"
                                                  onsubmit="return confirm('Bu taomni oʻchirib tashlamoqchimisiz?');"
                                                  style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="ri-delete-bin-line"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <!-- Inactive Meals -->
                    <h4 class="section-title red">Aktiv emas taomlar</h4>
                    <div class="row">
                        @foreach ($meals->where('status', Status::INACTIVE->value) as $meal)
                            <div class="col-md-4">
                                <div class="dashboard-card">
                                    <img class="card-image" src="{{ asset('/storage/meals/'. $meal->photo) }}"
                                         alt="{{ $meal->name_uz }}">
                                    <div class="card-detail">
                                        <h4>{{ $meal->name_uz }} <span>{{ $meal->price }} so'm</span></h4>
                                        <p>{{ $meal->description_uz ?? '' }}</p>
                                        <div class="d-flex justify-content-between">
                                            <p class="card-time"><i class="fas fa-clock"></i> {{ $meal->time }} min</p>
                                            <p class="card-time"><i
                                                    class="fas fa-balance-scale"></i> {{ $meal->weight ?? 'N/A' }}</p>
                                        </div>
                                        <div class="btn-group" style="margin-top: 10px;">
                                            <a href="{{ route('meals.show', $meal->id) }}">
                                                <button type="button" class="btn btn-info btn-sm text-white">
                                                    <i class="ri-eye-fill"></i> View
                                                </button>
                                            </a>
                                            <a href="{{ route('meals.edit', $meal->id) }}">
                                                <button type="button" class="btn btn-warning btn-sm text-white">
                                                    <i class="ri-pencil-fill"></i> Edit
                                                </button>
                                            </a>
                                            <form action="{{ route('meals.destroy', $meal->id) }}" method="POST"
                                                  onsubmit="return confirm('Bu taomni oʻchirib tashlamoqchimisiz?');"
                                                  style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="ri-delete-bin-line"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
