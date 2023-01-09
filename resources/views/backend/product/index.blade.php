
@extends('auth.admin.layouts.template')
@section('content')
    <div class="right_col" role="main">
        <div class="card-header">
            <h3 class="card-title row w-100">
                <div class="col-4">
                    <p class="mb-0">Danh sách sản phẩm</p>
                </div>
                <div class="col-5">
                    <form action="" method="get">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <input style="height: 28px" type="text"
                                       placeholder="Tìm kiếm ID hoặc tên sản phẩm" id="keyword" class="form-control"
                                       name="keyword">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-3">
                    <a class="btn btn-outline-success btn-sm float-right" href="{{route('product.create')}}">Thêm mới</a>
                </div>
            </h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10%">#</th>
                    <th style="width: 30%">Tên sản phẩm</th>
                    <th style="width: 10%">Giá</th>
                    <th style="width: 15%">Ảnh</th>
                    <th style="width: 20%">Loại sản phẩm</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody id="listProduct">
                @foreach($products as $product)
                    <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{number_format($product->price)}}</td>
                    <td><img src="/products/{{$product->feature_image_path}}" height="60px"  width="60px" alt=""></td>
                    <td>{{$product->category->name ?? null}}</td>

                    <td>
                        <span class="badge bg-warning" style="cursor: pointer">
                            <a href="{{ route('product.edit',['id' => $product->id]) }}">Sửa</a>
                        </span>
                        <span class="badge bg-danger" style="cursor: pointer">
                            <a onclick="del({{ $product->id }})">Xoá</a>
                            <form id="form-{{ $product->id }}" class="d-none" action="{{ route('product.delete', $product->id) }}" method="post">
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
                {{ $products->links() }}
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){
            $(document).on('keyup','#keyword',function()
            {
                var keyword = $(this).val();
                $.ajax({
                    type:"get",
                    url:"{{route('product.search-product')}}",
                    data: {keyword:keyword},
                    dataType:"json",
                    success:function (response){
                        console.log(response);
                        $('#listProduct').html(response)
                    }
                })
            });
        });
    </script>
@endpush


