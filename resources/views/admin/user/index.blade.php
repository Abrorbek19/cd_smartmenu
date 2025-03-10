@extends("admin.layouts.header")

@section('content')
    <table class="table datatable">
        <thead>
        <button type="button" class="btn btn-success btn-sm">
            <a href="{{ route('users.create') }}" class="text-white" style="text-decoration: none;">
                <i class="ri-add-box-fill"></i> Foydalanuvchi qo'shish
            </a>
        </button>
        <tr>
            <th>#</th>
            <th>Ismi</th>
            <th>Telefon nomer</th>
            <th>Username</th>
            <th>Amallar</th>
        </tr>

        </thead>
        <tbody>

        @foreach ($user as $item)
            <tr>
                <th scope="row">{{ ++$loop->index }}</th>
                <td>{{ $item->firstname }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->username }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example" style="gap: 10px">
                        <!-- View Button -->
                        <a href="{{ route('users.show', $item->id) }}">
                            <button type="button" class="btn btn-info btn-sm text-white">
                                <i class="ri-eye-fill"></i>
                            </button>
                        </a>

                        <!-- Edit Button -->
                        <a href="{{ route('users.edit', $item->id) }}">
                            <button type="button" class="btn btn-warning btn-sm text-white">
                                <i class="ri-pencil-fill"></i>
                            </button>
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('users.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this restaurant?');" style="display:inline-block;">
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
