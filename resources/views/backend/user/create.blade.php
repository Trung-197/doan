
@extends('auth.admin.layouts.template')

@section('content')
    <div class="right_col" role="main">
        <div class="card-header">
            <h3 class="card-title">Thêm mới</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Tên người dùng:</label>
                    <input type="text" class="form-control rounded-0" name="name" placeholder="Tên người dùng..." value="{{old('name')}}">
                    @if($errors->has('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <div class="form-group">
                <label for="name">Email:</label>
                    <input type="text" class="form-control rounded-0" name="email" placeholder="Email..." value="{{old('email')}}">
                    @if($errors->has('email'))
                        <p class="text-danger">{{$errors->first('email')}}</p>
                    @endif
                </div>
                <div class="form-group">
                <label for="name">Mật khẩu:</label>
                    <input type="password" class="form-control rounded-0" name="password" placeholder="Mật khẩu..." value="{{old('password')}}">
                    @if($errors->has('password'))
                        <p class="text-danger">{{$errors->first('password')}}</p>
                    @endif
                </div>
                <div class="form-group">
                <label for="name">Vai trò:</label>
                    <select name="role_id[]" class="form-control select2_init" multiple>
                        @foreach($roles as  $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>

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





