
@extends('auth.admin.layouts.template')

@section('content')
    <div class="right_col" role="main">
        <div class="card-header">
            <h3 class="card-title">Sửa loại sản phẩm</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('category.update', $category->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Tên loại:</label>
                    <input type="text" class="form-control rounded-0" value="{{ $category->name }}" name="name" placeholder="Tên...">
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
