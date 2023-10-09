
@extends('auth.admin.layouts.template')

@section('content')
    <div class="right_col" role="main">
        <div class="card-header">
            <h3 class="card-title row w-100">
                <div class="col-6">
                    <p class="mb-0">Danh sách đơn hàng</p>
                </div>
                <div class="col-5">
                    <form action="" method="get">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <input style="height: 28px" type="text"
                                       placeholder="Tìm kiếm ID hoặc tên khách hàng" id="keyword" class="form-control"
                                       name="keyword">
                            </div>
                        </div>
                    </form>
                </div>
            </h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10%">#</th>
                    <th style="width: 20%">Khách hàng</th>
                    <th style="width: 15%">Số điện thoại</th>
                    <th style="width: 15%">Email</th>
                    <th style="width: 20%">Thời gian đặt hàng</th>
                    <th style="width: 20%">Thao tác</th>

                </tr>
                </thead>
                <tbody id="listProduct">
                @foreach($customers as $customer)
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->created_at}}</td>
                    <td>
                        <span class="badge bg-warning" style="cursor: pointer">
                            <a href="/customers/view/{{$customer->id}}">Xem</a>
                        </span>
                        <span class="badge bg-danger" style="cursor: pointer">
                          <a onclick="del({{ $customer->id }})">Xoá</a>
                            <form id="form-{{ $customer->id }}" class="d-none" action="{{ route('carts.delete', $customer->id) }}" method="post">
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
                {{ $customers->links() }}
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
                    url:"{{route('search-order')}}",
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





