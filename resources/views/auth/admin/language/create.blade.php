@extends('auth.admin.layouts.template')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Create Language</h3>
                </div>
            </div>
            <div class="x_content">
                <form class="" action="" method="post" novalidate>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Language<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" name="name" required="required" />
                        </div>
                    </div>
{{--                    <div class="field item form-group">--}}
{{--                        <label class="col-form-label col-md-3 col-sm-3 label-align">Name<span class="required">*</span></label>--}}
{{--                        <div class="col-md-6 col-sm-6">--}}
{{--                            <input class="form-control" name="name" required="required" />--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="ln_solid">
                        <div class="form-group">
                            <div class="col-md-6 offset-md-3">
                                <button type='submit' class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div><br />
        </div>
    </div>
@endsection
