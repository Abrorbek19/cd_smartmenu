@extends("admin.layouts.header")

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>To'lovlar ro'yxati</h2>
                @role('admin')
                <button type="button" class="btn btn-success btn-sm">
                    <a href="{{ route('payments.create') }}" class="text-white" style="text-decoration: none;">
                        <i class="ri-add-box-fill"></i> To'lov qo'shish
                    </a>
                </button>
                @endrole
            </div><br>
    <table class="table datatable">
        <thead>

        <tr>
            <th>#</th>
            <th>Restoran</th>
            <th>Tarif</th>
            <th>To'lov miqdori</th>
            <th>Boshlanish sanasi</th>
            <th>Tugash sanasi</th>
            <th>Actions</th>
        </tr>

        </thead>
        <tbody>

        @foreach ($payments as $item)
            <tr>
                <th scope="row">{{ ++$loop->index }}</th>
                <td>{{ $item->restaurant->name }}</td>
                <td>{{ $item->tariff->name_uz }}</td>
                <td>{{$item->money }}</td>
                <td>{{ $item->start_date }}</td>
                <td>{{ $item->end_date }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example" style="gap: 10px">
                        <!-- View Button -->
                        <a href="{{ route('payments.show', $item->id) }}">
                            <button type="button" class="btn btn-info btn-sm text-white">
                                <i class="ri-eye-fill"></i>
                            </button>
                        </a>

                        <!-- Edit Button -->
                        @role('admin')
                        <a href="{{ route('payments.edit', $item->id) }}">
                            <button type="button" class="btn btn-warning btn-sm text-white">
                                <i class="ri-pencil-fill"></i>
                            </button>
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('payments.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bu to\'lovni oʻchirib tashlamoqchimisiz?');" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </form>
                        @endrole
                    </div>
                </td>
            </tr>
        @endforeach


        </tbody>
    </table>










@endsection
