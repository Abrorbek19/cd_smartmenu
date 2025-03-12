


@extends("admin.layouts.header")

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Sarlavha ro'yxati</h2>
                <button type="button" class="btn btn-success btn-sm">
                    <a href="{{ route('titlemains.create') }}" class="text-white" style="text-decoration: none;">
                        <i class="ri-add-box-fill"></i> Sarlavha qo'shish
                    </a>
                </button>
            </div><br>
            <table class="table datatable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
{{--                    <th>Tavsif</th>--}}
                    <th>Position</th>
                    <th>Amallar</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($titlemains as $item)
                    <tr>
                        <th scope="row">{{ ++$loop->index }}</th>
                        <td>{{ $item->title_uz }}</td>
{{--                        <td>{{ $item->description_uz }}</td>--}}
                        <td>{{ $item->position }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example" style="gap: 10px">
                                <!-- View Button -->
                                <a href="{{ route('titlemains.show', $item->id) }}">
                                    <button type="button" class="btn btn-info btn-sm text-white">
                                        <i class="ri-eye-fill"></i>
                                    </button>
                                </a>
                                <!-- Edit Button -->
                                <a href="{{ route('titlemains.edit', $item->id) }}">
                                    <button type="button" class="btn btn-warning btn-sm text-white">
                                        <i class="ri-pencil-fill"></i>
                                    </button>
                                </a>
                                <!-- Delete Button -->
                                <form action="{{ route('titlemains.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bu kategoriyani oʻchirib tashlamoqchimisiz?');" style="display:inline-block;">
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


{{--@extends('admin.layouts.header')--}}

{{--@section('content')--}}
{{--    <div class="card">--}}
{{--        <div class="card-body">--}}
{{--            <h5 class="card-title">Sarlavha</h5>--}}
{{--            <button type="button" class="btn btn-success btn-sm">--}}
{{--                <a href="{{ route('titlemains.create') }}" class="text-white" style="text-decoration: none;">--}}
{{--                    <i class="ri-add-box-fill"></i> Sarlavha qo'shish--}}
{{--                </a>--}}
{{--            </button>--}}
{{--            <!-- Tariff Table -->--}}
{{--            <table class="table">--}}
{{--                <thead>--}}
{{--                <tr class="row">--}}
{{--                    <th class="col-1">#</th>--}}
{{--                    <th class="col-3">Title</th>--}}
{{--                    <th class="col-4">Tavsif</th>--}}
{{--                    <th class="col-2">Position</th>--}}
{{--                    <th class="col-2">Amallar</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach ($titlemains as $item)--}}
{{--                    <tr class="row">--}}
{{--                        <th class="col-1" scope="row">{{ ++$loop->index }}</th>--}}
{{--                        <td class="col-3">{{ $item->title_uz }}</td>--}}
{{--                        <td class="col-4">{{ $item->description_uz }}</td>--}}
{{--                        <td class="col-2">{{ $item->position }}</td>--}}
{{--                        <td class="col-2">--}}
{{--                            <div class="btn-group" role="group" aria-label="Basic mixed styles example" style="gap: 10px">--}}
{{--                                <!-- View Button -->--}}
{{--                                <a href="{{ route('titlemains.show', $item->id) }}">--}}
{{--                                    <button type="button" class="btn btn-info btn-sm text-white">--}}
{{--                                        <i class="ri-eye-fill"></i>--}}
{{--                                    </button>--}}
{{--                                </a>--}}

{{--                                <!-- Edit Button -->--}}
{{--                                <a href="{{ route('titlemains.edit', $item->id) }}">--}}
{{--                                    <button type="button" class="btn btn-warning btn-sm text-white">--}}
{{--                                        <i class="ri-pencil-fill"></i>--}}
{{--                                    </button>--}}
{{--                                </a>--}}

{{--                                <!-- Delete Button -->--}}
{{--                                <form action="{{ route('titlemains.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bu sarlavhani oʻchirib tashlamoqchimisiz?');" style="display:inline-block;">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button type="submit" class="btn btn-danger btn-sm">--}}
{{--                                        <i class="ri-delete-bin-line"></i>--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
