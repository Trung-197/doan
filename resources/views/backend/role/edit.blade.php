
@extends('auth.admin.layouts.template')

@section('content')
    <div class="right_col" role="main">
        <div class="card-header">
            <h3 class="card-title">Chỉnh sửa vai trò</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('roles.update',['id'=>$role->id]) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Tên vai trò:</label>
                    <input type="text" class="form-control rounded-0" name="name" placeholder="Tên vai trò..." value="{{ $role->name }}" required>
                    @if($errors->has('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <div class="form-group">
                <label for="name">Mô tả:</label>
                    <textarea  class="form-control rounded-0" name="display_name" placeholder="Mô tả..." required>{{$role->display_name}}</textarea>
                    @if($errors->has('description'))
                        <p class="text-danger">{{$errors->first('description')}}</p>
                    @endif
                </div>
                    <br>
                <div class="form-group">
                <div class="row">
                        <div class="col-md-12">
                            <label>
                                <input type="checkbox" class="checkall">
                                Chọn tất cả
                            </label>
                        </div>
                        @foreach($permissionParents as $permissionParent)
                            <div class="card bg-white mb-3 col-md-12" style="width: 100%; color: black">
                                <div class="card-header bg-primary">
                                    <label>
                                        <input type="checkbox" name="" value="" class="checkbox_wrapper">
                                    </label>

                                    Module {{$permissionParent->name}}

                                </div>
                                <div class="row">
                                    @foreach($permissionParent->permissionsChidrent as $permissionsChidrentItem)
                                        <div class="card-body">
                                                <label>
                                                    <input class="checkbox_childrent" type="checkbox" name="permission_id[]" {{ $permissionsChecked->contains('id',$permissionsChidrentItem->id) ? 'checked': '' }} value="{{$permissionsChidrentItem->id}}">
                                                </label>
                                                {{$permissionsChidrentItem->name}}

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-outline-success">OK</button>
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




