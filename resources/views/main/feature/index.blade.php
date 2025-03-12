@extends("admin.layouts.header")

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Feature ro'yxati</h2>
                <button type="button" class="btn btn-success btn-sm">
                    <a href="{{ route('featuremains.create') }}" class="text-white" style="text-decoration: none;">
                        <i class="ri-add-box-fill"></i> Feature qo'shish
                    </a>
                </button>
            </div><br>
    <table class="table datatable">
        <thead>

        <tr>
            <th>#</th>
            <th>Title</th>
            <th> Tavsif</th>
            <th>Amallar</th>
        </tr>

        </thead>
        <tbody>

        @foreach ($all_features as $item)
            <tr>
                <th scope="row">{{ ++$loop->index }}</th>
                <td>{{ $item->title_uz }}</td>
                <td>{{ $item->description_uz }}</td>


                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example" style="gap: 10px">
                        <!-- View Button -->
                        <a href="{{ route('featuremains.show', $item->id) }}">
                            <button type="button" class="btn btn-info btn-sm text-white">
                                <i class="ri-eye-fill"></i>
                            </button>
                        </a>

                        <!-- Edit Button -->
                        <a href="{{ route('featuremains.edit', $item->id) }}">
                            <button type="button" class="btn btn-warning btn-sm text-white">
                                <i class="ri-pencil-fill"></i>
                            </button>
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('featuremains.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bu Featureni oʻchirib tashlamoqchimisiz?');" style="display:inline-block;">
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
