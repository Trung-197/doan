
@extends('auth.admin.layouts.template')

@section('content')
    <div class="right_col" role="main">
        <div class="card-header">
            <h3 class="card-title">Thêm sản phẩm</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Tên sản phẩm:</label>
                    <input type="text" class="form-control rounded-0" name="name" placeholder="Tên sản phẩm..." value="{{old('name')}}">
                    @if($errors->has('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Giá tiền:</label>
                    <input type="text" class="form-control rounded-0" name="price" placeholder="Giá tiền..." value="{{old('price')}}">
                    @if($errors->has('price'))
                        <p class="text-danger">{{$errors->first('price')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Ảnh sản phẩm:</label>
                    <input type="file" multiple class="form-control-file rounded-0" name="feature_image_path" placeholder="Ảnh sản phẩm...">
                    @if($errors->has('feature_image_path'))
                        <p class="text-danger">{{$errors->first('feature_image_path')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="parent_name">Loại sản phẩm:</label>
                    <select class="custom-select rounded-0" name="category_id">
                        <option value="0">--Chọn loại sản phẩm--</option>
                        {!! $htmlOption !!}
                    </select>
                    @if($errors->has('category_id'))
                        <p class="text-danger">{{$errors->first('category_id')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Số lượng:</label>
                    <input type="text" class="form-control rounded-0" name="quantity" placeholder="Số lượng..." value="{{old('quantity')}}">
                    @if($errors->has('quantity'))
                        <p class="text-danger">{{$errors->first('quantity')}}</p>
                    @endif
                </div>
                    {{--                    <label for="parent_name">Tags:</label>--}}
                    {{--                    <select class="form-control tags_select_choose" name="tags[]" multiple="multiple">--}}

                    {{--                    </select>--}}
                <div class="form-group">
                    <label for="name">Nội dung:</label>
                    <textarea class="form-control tinymce_editor_init" rows="3" name="contents">{{old('contents')}}</textarea>
                    @if($errors->has('contents'))
                        <p class="text-danger">{{$errors->first('contents')}}</p>
                    @endif
                </div>
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

