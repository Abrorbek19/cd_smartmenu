@extends("admin.layouts.header")

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Restaranlar ro'yxati</h2>
                <button type="button" class="btn btn-success btn-sm">
                    <a href="{{ route('restaurants.create') }}" class="text-white" style="text-decoration: none;">
                        <i class="ri-add-box-fill"></i> Restaran qo'shish
                    </a>
                </button>
            </div><br>
    <table class="table datatable">
        <thead>

        <tr>
            <th>#</th>
            <th>Nomi</th>
            <th>Manzil</th>
            <th> Status</th>
            <th>Amallar</th>
        </tr>

        </thead>
        <tbody>

        @foreach ($all_restaurant as $item)
            <tr>
                <th scope="row">{{ ++$loop->index }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->address_uz }}</td>
                <td>{{ $item->status == 1 ? 'Aktiv' : 'Aktiv emas' }}</td>

                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example" style="gap: 10px">
                        <!-- View Button -->
                        <a href="{{ route('restaurants.show', $item->id) }}">
                            <button type="button" class="btn btn-info btn-sm text-white">
                                <i class="ri-eye-fill"></i>
                            </button>
                        </a>

                        <!-- Edit Button -->
                        <a href="{{ route('restaurants.edit', $item->id) }}">
                            <button type="button" class="btn btn-warning btn-sm text-white">
                                <i class="ri-pencil-fill"></i>
                            </button>
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('restaurants.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this restaurant?');" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach


        </tbody>
    </table>










@endsection
