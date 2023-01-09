@extends('auth.admin.layouts.template')

@section('content')

<div class="right_col" role="main">
    <div class="card-header">
        <h3 class="card-title row w-100">
            <div class="col-6">
                <p class="mt-4">Thông tin chi tiết đơn hàng</p>
            </div>
        </h3>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped">
            <div class="customer mt-3">
                <ul>
                    <li>Tên khách hàng: <strong>{{ $customer->name }}</strong></li>
                    <li>Số điện thoại: <strong>{{ $customer->phone }}</strong></li>
                    <li>Địa chỉ: <strong>{{ $customer->address }}</strong></li>
                    <li>Email: <strong>{{ $customer->email }}</strong></li>
                    <li>Ghi chú: <strong>Không có ghi chú</strong></li>
                    <li>Hình thức thanh toán: <strong>Thanh toán khi nhận hàng</strong></li>
                </ul>
            </div>
            </thead>
            <tbody>
            <div class="carts">
                @php $total = 0; @endphp
                <table class="table">
                    <tbody>
                    <tr class="table_head">
                        <th class="column-1">Ảnh</th>
                        <th class="column-2">Tên sản phẩm</th>
                        <th class="column-3">Giá tiền</th>
                        <th class="column-4">Số lượng</th>
                        <th class="column-5">Tổng tiền</th>
                    </tr>

                    @foreach($carts as $key => $cart)
                        @php
                            $price = $cart->price * $cart->pty;
                            $total += $price;
                        @endphp
                        <tr>
                            <td class="column-1">
                                <div class="how-itemcart1">
                                    <img src="/products/{{ $cart->product->feature_image_path }}" alt="IMG" style="width: 100px">
                                </div>
                            </td>
                            <td class="column-2">{{ $cart->product->name }}</td>
                            <td class="column-3">{{ number_format($cart->price) }}</td>
                            <td class="column-4">{{ $cart->pty }}</td>
                            <td class="column-5">{{ number_format($price)}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-right">Tổng Tiền</td>
                        <td>{{ number_format($total)}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            </tbody>
        </table>
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
