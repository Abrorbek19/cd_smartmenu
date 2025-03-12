@extends("admin.layouts.header")
@section('star_css')
    <style>
        .star-rating {
            font-size: 24px;
            color: #f54747; /* To'ldirilgan yulduzlar rangi */
        }

        .star {
            color: #ccc; /* Bo'sh yulduzlar rangi */
        }

        .star.filled {
            color: #f54747; /* To'ldirilgan yulduzlar rangi */
        }

    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Testimionial ro'yxati</h2>
                <button type="button" class="btn btn-success btn-sm">
                    <a href="{{ route('testimonial.create') }}" class="text-white" style="text-decoration: none;">
                        <i class="ri-add-box-fill"></i> Mijoz fikrini qo'shish
                    </a>
                </button>
            </div><br>
    <table class="table datatable">
        <thead>
        <tr>
            <th>#</th>
            <th>Fullname</th>
            <th>Fikr</th>
            <th>Reyting</th>
            <th>Restaran</th>
            <th>Action</th>
        </tr>

        </thead>
        <tbody>

        @foreach ($all_testimonial as $item)
            <tr>
                <th scope="row">{{ ++$loop->index }}</th>
                <td>{{ $item->fullname }}</td>
                <td>{{ $item->description_uz }}</td>
                <td>
                    <div class="star-rating">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $item->star)
                                <span class="star filled">★</span> <!-- To'ldirilgan yulduz -->
                            @else
                                <span class="star">☆</span> <!-- Bo'sh yulduz -->
                            @endif
                        @endfor
                    </div>
                </td>
                <td>{{$item->restaurant['name']}}</td>

                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example" style="gap: 10px">
                        <!-- View Button -->
                        <a href="{{ route('testimonial.show', $item->id) }}">
                            <button type="button" class="btn btn-info btn-sm text-white">
                                <i class="ri-eye-fill"></i>
                            </button>
                        </a>

                        <!-- Edit Button -->
                        <a href="{{ route('testimonial.edit', $item->id) }}">
                            <button type="button" class="btn btn-warning btn-sm text-white">
                                <i class="ri-pencil-fill"></i>
                            </button>
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('testimonial.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bu Mijoz fikrini oʻchirib tashlamoqchimisiz?');" style="display:inline-block;">
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
