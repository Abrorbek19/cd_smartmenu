
@extends("admin.layouts.header")

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Ta'riflar ro'yxati</h2>
                <button type="button" class="btn btn-success btn-sm">
                    <a href="{{ route('tariffs.create') }}" class="text-white" style="text-decoration: none;">
                        <i class="ri-add-box-fill"></i> Tarif qo'shish
                    </a>
                </button>
            </div><br>
            <table class="table datatable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nomi</th>
                    <th>Narxi</th>
                    <th>Kuni</th>
                    <th>Amallar</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tariffs as $item)
                    <tr>
                        <th scope="row">{{ ++$loop->index }}</th>
                        <td>{{ $item->name_uz }}</td>
                        <td>{{ $item->price}}</td>
                        <td>{{ $item->days }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example" style="gap: 10px">
                                <!-- View Button -->
                                <a href="{{ route('tariffs.show', $item->id) }}">
                                    <button type="button" class="btn btn-info btn-sm text-white">
                                        <i class="ri-eye-fill"></i>
                                    </button>
                                </a>

                                <!-- Edit Button -->
                                <a href="{{ route('tariffs.edit', $item->id) }}">
                                    <button type="button" class="btn btn-warning btn-sm text-white">
                                        <i class="ri-pencil-fill"></i>
                                    </button>
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('tariffs.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bu tarifni oʻchirib tashlamoqchimisiz?');" style="display:inline-block;">
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
        </div>
    </div>
@endsection
