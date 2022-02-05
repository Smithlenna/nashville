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
                           <!-- Start Form -->
                           <div class="col-lg-12">
                              @if ($social == null)
                              <form role="form" id="form" action="{{ route('social.store') }}" method="post" class="form-horizontal" enctype='multipart/form-data'>
                              @else
                              <form role="form" id="form" action="{{ route('social.update', $social->id) }}" method="post" class="form-horizontal" enctype='multipart/form-data'>
                              <input name="_method" type="hidden" value="PATCH">
                              @endif                             
                                @csrf
                                 <section class="panel panel-custom">
                                    <header class="panel-heading">Social Settings</header>
                                    <div class="panel-body">
                                       <input type="hidden" name="settings" value="general">
                                       <input type="hidden" name="languages" value=",german">
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Facebook <span
                                             class="text-danger">*</span></label>
                                          <div class="col-lg-7">
                                             <input type="text" name="facebook" class="form-control" placeholder="e.g placeholder_facebook.com" value="{{ @$social->facebook }}" required>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Twitter <span
                                             class="text-danger">*</span></label>
                                          <div class="col-lg-7">
                                             <input type="text" name="twitter" class="form-control" placeholder="e.g placeholder_twitter.com" value="{{ @$social->twitter }}" required>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Instagram <span
                                             class="text-danger">*</span></label>
                                          <div class="col-lg-7">
                                             <input type="text" name="instagram" class="form-control" value="{{ @$social->instagram }}" placeholder="e.g placeholder_instagram.com" required>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Linkedin <span
                                             class="text-danger">*</span></label>
                                          <div class="col-lg-7">
                                             <input type="text" name="linkedin" class="form-control" value="{{ @$social->linkedin }}" placeholder="e.g placeholder_linkedin.com" required>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">YouTube <span
                                             class="text-danger">*</span></label>
                                          <div class="col-lg-7">
                                             <input type="text" name="youtube" class="form-control" value="{{ @$social->youtube }}" placeholder="e.g placeholder_youtube.com" required>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">TikTok <span
                                             class="text-danger">*</span></label>
                                          <div class="col-lg-7">
                                             <input type="text" name="tiktok" class="form-control" value="{{ @$social->tiktok }}" placeholder="e.g placeholder_tiktok.com" required>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-lg-3"></label>
                                       <div class="col-lg-7" style="margin-left:8px">
                                          <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                                       </div>
                                    </div>
                                 </section>
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
