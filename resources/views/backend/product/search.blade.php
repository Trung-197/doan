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
