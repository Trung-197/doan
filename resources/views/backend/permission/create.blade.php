
@extends('auth.admin.layouts.template')

@section('content')
    <div class="right_col" role="main">
        <div class="card-header">
            <h3 class="card-title">Thêm mới quyền</h3>
        </div>
        <div class="card-body">
            <form action="{{route('permissions.store')}}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="parent_name">Chức năng:</label>
                        <select class="custom-select rounded-0" name="module_parent">
                            <option value="">--Chọn chức năng--</option>
                            @foreach(config('permissions.table_module') as $module)
                                <option value="{{$module}}">{{$module}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                                @foreach(config('permissions.module_childrent') as $moduleChidrent)
                                    <div class="col-md-3">
                                        <label for="">
                                            <input type="checkbox" name="module_childrent[]" value="{{ $moduleChidrent }}">
                                            {{ $moduleChidrent }}
                                        </label>
                                    </div>
                                @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-success mt-3">OK</button>
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

