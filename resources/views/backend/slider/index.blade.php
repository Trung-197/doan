
@extends('auth.admin.layouts.template')

@section('content')
    <div class="right_col" role="main">
        <div class="card-header">
            <h3 class="card-title row w-100">
                <div class="col-6">
                    <p class="mb-0">Danh sách slider</p>
                </div>
                <div class="col-6">
                    <a class="btn btn-outline-success btn-sm float-right" href="{{route('slider.create')}}">Thêm mới</a>
                </div>
            </h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10%">#</th>
                    <th style="width: 30%">Tên slider</th>
                    <th style="width: 30%">Mô tả</th>
                    <th style="width: 20%">Ảnh</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sliders as $slider)
                    <td>{{$slider->id}}</td>
                    <td>{{$slider->name}}</td>
                    <td>{{$slider->description}}</td>
                    <td><img src="./sliders/{{$slider->image_path}}" height="60px"  width="60px" alt=""></td>
                    <td>
                        <span class="badge bg-warning" style="cursor: pointer">
                            <a href="{{route('slider.edit',['id' => $slider->id])}}">Sửa</a>
                        </span>
                        <span class="badge bg-danger" style="cursor: pointer">
                          <a onclick="del({{ $slider->id }})">Xoá</a>
                            <form id="form-{{ $slider->id }}" class="d-none" action="{{ route('slider.delete', $slider->id) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </span>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                {{ $sliders->links() }}
            </ul>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function del(id) {
            document.getElementById('form-'+id).submit();
        }
    </script>
@endpush





