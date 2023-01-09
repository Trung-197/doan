

@extends('auth.admin.layouts.template')

@section('content')
    <div class="right_col" role="main">
        <div class="card-header">
            <h3 class="card-title">Thêm mới slider</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('slider.store') }}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Tên slider:</label>
                    <input type="text" class="form-control rounded-0" name="name" placeholder="Tên slider..." value="{{old('name')}}">
                    @if($errors->has('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <div class="form-group">
                <label for="name">Mô tả:</label>
                    <input type="text" class="form-control rounded-0" name="description" placeholder="Mô tả..." value="{{old('description')}}">
                    @if($errors->has('description'))
                        <p class="text-danger">{{$errors->first('description')}}</p>
                    @endif
                </div>
                <div class="form-group">
                <label>Ảnh:</label>
                    <input type="file" class="form-control" name="image_path">
                </div>
                    <button type="submit" class="btn btn-outline-success mt-3">OK</button>
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





