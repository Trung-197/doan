
@extends('auth.admin.layouts.template')

@section('content')
    <div class="right_col" role="main">
        <div class="card-header">
            <h3 class="card-title">Chỉnh sửa slider</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('slider.update',['id'=>$slider->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Tên slider:</label>
                    <input type="text" class="form-control rounded-0" name="name" placeholder="Tên slider..." value="{{$slider->name}}">
                    @if($errors->has('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <div class="form-group">
                <label for="name">Mô tả:</label>
                    <input type="text" class="form-control rounded-0" name="description" placeholder="Mô tả..." value="{{$slider->description}}">
                    @if($errors->has('description'))
                        <p class="text-danger">{{$errors->first('description')}}</p>
                    @endif
                </div>
                <div class="form-group">
                <label>Ảnh:</label>
                    <input type="file" class="form-control file" name="image_path">
                    <input type="hidden" name="image_path" value="{{$slider->image_path}}">
                    <br>
                    <img src="/sliders/{{$slider->image_path}}" height="100px" width="100px">

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





