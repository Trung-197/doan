@extends('auth.admin.layouts.template')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Create Intern</h3>
                </div>
            </div>
            <div class="x_content">
                <form class="" action="" method="post" novalidate>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Name<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" name="name" required="required" />
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Birthday<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" class='date' type="date" name="date" required='required'>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Gender<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6" style="display: flex; margin-top: 8px">
                            <div class="radio">
                                <label>
                                    <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios"> Male
                                </label>
                            </div>
                            <div class="radio ml-5">
                                <label>
                                    <input type="radio" value="option2" id="optionsRadios2" name="optionsRadios"> Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Address<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" name="address" required="required" />
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Email<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" name="email" required="required" />
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Telephone<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="tel" class='tel' name="phone" required='required' data-validate-length-range="8,20" />
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Image<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="file"  name="image" required='required' />
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Intern time<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" class='time' type="date" name="intern_time" required='required'>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">End time<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" class='time' type="date" name="end_time" required='required'>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Main Language</label>
                        <div class="col-md-6 col-sm-6">
                            <select id="selectSkill"
                                    name="selectSkill"
                                    ng-model="selectSkill"
                                    multiple required>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Other Language</label>
                        <div class="col-md-6 col-sm-6">
                            <select id="selectSkill"
                                    name="selectSkill"
                                    ng-model="selectSkill"
                                    multiple required>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Note<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <textarea required="required" name='message'></textarea>
                        </div>
                    </div>
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
