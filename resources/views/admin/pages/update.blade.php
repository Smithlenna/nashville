@extends('admin.layouts.master')
@section('content')
<div class="row">
  <div class="col-lg-12">
      <div class="row">
          <div class="col-sm-6 wrap-fpanel">
              <div class="panel panel-custom" data-collapsed="0">
                  <div class="panel-heading">
                      <div class="panel-title">
                          <strong>Update Profile</strong>
                      </div>
                  </div>
                  <div class="panel-body">
                      <form role="form" id="form" action="{{ route('users.update', \Auth::user()->id) }}" style="display: initial;" method="post" class="form-horizontal form-groups-bordered" enctype='multipart/form-data'>
                      <input name="_method" type="hidden" value="PATCH">
                      @csrf
                          <div class="form-group">
                              <label class="col-lg-4 control-label"><strong>Full Name</strong> <span class="text-danger">*</span></label>
                              <div class="col-lg-8">
                                  <input type="text" class="form-control" name="name" value="{{ $data->name }}" required="" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-4 control-label"><strong>Email</strong> <span class="text-danger">*</span></label>
                              <div class="col-lg-8">
                                  <input type="text" class="form-control" name="email" value="{{ $data->email }}" required="" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-4 control-label"><strong>Primary number</strong></label>
                              <div class="col-lg-8">
                                  <input type="text" class="form-control" name="primary_number" value="{{ $data->primary_number }}" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-4 control-label"><strong>Secondary number</strong></label>
                              <div class="col-lg-8">
                                  <input type="text" class="form-control" name="secondary_number" value="{{ $data->secondary_number }}" />
                              </div>
                          </div>

                          <div class="form-group">
                             <label class="col-lg-4 control-label"><strong>Image</strong><span class="text-danger">*</span></label>
                             <div class="col-lg-8">
                                 <div class="fileinput fileinput-new" data-provides="fileinput">
                                     <div class="fileinput-new thumbnail" style="width: 210px;">
                                     @php
                                     $image = "http://placehold.it/350x260";
                                     if(!empty($data->image)){
                                       $image = $data->image;
                                     }
                                     @endphp
                                         <input type="hidden" id="image">
                                         <img src="{{ $image }}" id="imageholder" alt="Please Connect Your Internet">
                                     </div>
                                     <div class="fileinput-preview fileinput-exists thumbnail" style="width: 210px;"></div>
                                     <div>
                                     <span class="btn btn-default btn-file">
                                         <span class="fileinput-new">
                                           <a href="{{ url('/vendor/filemanager/dialog.php?type=4&field_id=image&descending=1&sort_by=date&lang=undefined&akey=061e0de5b8d667cbb7548b551420eb821075e7a6') }}" class="btn iframe-btn btn-primary" type="button">
                                               <i class="fa fa-picture-o"></i> Choose
                                            </a>

                                             <input type="hidden" name="image" id="thumbnailimage" value="{{ $image }}">
                                             <span class="fileinput-exists">Change</span>
                                         </span>
                                         <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                     </span>
                                   </div>
                                   <input type="hidden" name="page" value="update_profile">

                                 </div>
                             </div>
                             <div class="col-lg-2">
                               @if ($errors->has('image'))
                               <span class="validation-errors text-danger">{{ $errors->first('image') }}</span>
                               @endif
                             </div>
                           </div>
                          <div class="form-group">
                              <label class="col-lg-4 control-label"></label>
                              <div class="col-lg-8">
                                  <button type="submit" class="btn btn-sm btn-primary">Update Profile</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
          <div class="col-sm-6 wrap-fpanel">
              <div class="panel panel-custom" data-collapsed="0">
                  <div class="panel-heading">
                      <div class="panel-title">
                          <strong>Change Password</strong>
                      </div>
                  </div>
                  <div class="panel-body">
                      <form role="form" data-parsley-validate="" novalidate="" action="{{ route('users.password') }}" method="post" class="form-horizontal form-groups-bordered">
                      <input name="_method" type="hidden" value="PATCH">
                        @csrf
                          <div class="form-group">
                              <label for="field-1" class="col-sm-4 control-label">Current Password<span class="required"> *</span></label>
                              <div class="col-sm-7">
                                  <input type="password" id="current_password" name="current_password" value="" class="form-control" placeholder="Enter your current Password" data-parsley-id="10"/>
                                  @if ($errors->has('current_password'))
                                  <span class="validation-errors text-danger">{{ $errors->first('current_password') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="field-1" class="col-sm-4 control-label">New Password<span class="required"> *</span></label>
                              <div class="col-sm-7">
                                  <input type="password" name="password" id="password" value="" class="form-control" placeholder="Enter Your New Password"/>
                                  @if ($errors->has('password'))
                                  <span class="validation-errors text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="field-1" class="col-sm-4 control-label">Confirm Password <span class="required"> *</span></label>
                              <div class="col-sm-7">
                                  <input type="password" id="confirm_password" name="confirm_password" value="" class="form-control" placeholder="Enter Your Confirm Password"/>
                                  @if ($errors->has('confirm_password'))
                                  <span class="validation-errors text-danger">{{ $errors->first('confirm_password') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-sm-offset-4 col-sm-5">
                                  <button id="old_password_button" type="submit" class="btn btn-primary">Change Password</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
