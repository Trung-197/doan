
@extends('auth.admin.layouts.template')

@section('content')
    <div class="right_col" role="main">
        <div class="card-header">
            <h3 class="card-title">Thêm mới loại sản phẩm</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Tên loại sản phẩm:</label>
                    <input type="text" class="form-control rounded-0" name="name" placeholder="Tên...">
                    @if($errors->has('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif
                    <br>
                    <label for="parent_name">Tên cha:</label>
                    <select class="custom-select rounded-0" name="parent_name">
                        <option value="0">--Chọn tên loại sản phẩm--</option>
                        {!! $htmlOption !!}
                    </select>
                    <button type="submit" class="btn btn-outline-success mt-3">Ok</button>
                </div>
            </form>
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
