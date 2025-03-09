@extends("admin.layouts.header")

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Mijozlar ro'yxati</h2>
                <button type="button" class="btn btn-success btn-sm">
                    <a href="{{ route('clients.create') }}" class="text-white" style="text-decoration: none;">
                        <i class="ri-add-box-fill"></i> Klient qo'shish
                    </a>
                </button>
            </div><br>
    <table class="table datatable">
        <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Restaran</th>
            <th>Amallar</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($clients as $item)
            <tr>
                <th scope="row">{{ ++$loop->index }}</th>
                <td>{{ $item->user->username }}</td>
                <td>{{ $item->restaurant->name }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example" style="gap: 10px">
                        <!-- View Button -->
                        <a href="{{ route('clients.show', $item->id) }}">
                            <button type="button" class="btn btn-info btn-sm text-white">
                                <i class="ri-eye-fill"></i>
                            </button>
                        </a>

                        <!-- Edit Button -->
                        <a href="{{ route('clients.edit', $item->id) }}">
                            <button type="button" class="btn btn-warning btn-sm text-white">
                                <i class="ri-pencil-fill"></i>
                            </button>
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('clients.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this restaurant?');" style="display:inline-block;">
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
