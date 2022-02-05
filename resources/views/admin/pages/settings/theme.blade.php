@extends('admin.layouts.master')
@section('content')
<div class="row">
         <div class="col-lg-12">
            <div class="row">
               <div class="col-lg-12">
                  <div class="col-md-3">
                     @include('admin.partials.settings')
                  </div>
                  <section class="col-sm-9">
                     <div class="col-sm-8  ">
                     </div>
                     <section class="">
                        <div class="row">
                           <div class="col-lg-12">
                            @if ($setting == null)
                            <form role="form" id="form" action="{{ route('settings.store') }}" method="post" class="form-horizontal" enctype='multipart/form-data'>
                            @else
                            <form role="form" id="form" action="{{ route('settings.update', $setting->id) }}" method="post" class="form-horizontal" enctype='multipart/form-data'>
                            <input name="_method" type="hidden" value="PATCH">
                            @endif                             
                               @csrf
                               <div class="panel panel-custom">
                                   <header class="panel-heading ">Theme Settings</header>
                                   <div class="panel-body">
                                       
                                        <div class="form-group row">
                                          <label class="col-lg-3 control-label"><strong>Site Logo</strong><span class="text-danger">*</span></label>
                                            <div class="col-lg-3">
                                              <input type="file" name="logo" onchange="document.getElementById('logo_preview').src = window.URL.createObjectURL(this.files[0])">
                                              <img style="padding-top:5px" id="logo_preview" src="" width="100" height="100" />
                                            </div>
                                            @if ($errors->has('logo'))
                                            <div class="col-lg-3">
                                              <span class="validation-errors text-danger">{{ $errors->first('logo') }}</span>
                                            </div>
                                            @endif
                                        </div>

                                        <div class="form-group row">
                                          <label class="col-lg-3 control-label"><strong>Favicon</strong><span class="text-danger">*</span></label>
                                            <div class="col-lg-3">
                                              <input type="file" name="favicon" onchange="document.getElementById('favicon_preview').src = window.URL.createObjectURL(this.files[0])">
                                              <img style="padding-top:5px" id="favicon_preview" src="" width="100" height="100" />
                                            </div>
                                            @if ($errors->has('favicon'))
                                            <div class="col-lg-3">
                                              <span class="validation-errors text-danger">{{ $errors->first('favicon') }}</span>
                                            </div>
                                            @endif
                                        </div>
                                   </div>
                                   <!--- Sidebar Custom Color Start---->
                                   <div class="form-group">
                                       <label class="col-lg-3 control-label"></label>
                                       <div class="col-lg-4">
                                           <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                                       </div>
                                   </div>
                               </div>
                           </form>
                           </div>
                           <!-- End Form -->
                        </div>
                     </section>
                  </section>
               </div>
            </div>
         </div>
      </div>
@endsection
