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
                              <form role="form" id="form" action="" method="post" class="form-horizontal" enctype='multipart/form-data'>
                              <input name="_method" type="hidden" value="PATCH">
                                @csrf
                                 <section class="panel panel-custom">
                                    <header class="panel-heading  ">Company Details</header>
                                    <div class="panel-body">
                                       <input type="hidden" name="settings" value="general">
                                       <input type="hidden" name="languages" value=",german">
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Company Name <span
                                             class="text-danger">*</span></label>
                                          <div class="col-lg-7">
                                             <input type="text" name="company_name" class="form-control"
                                                value="{{ @$data->company_name }}{{ old('company_name') }}" required>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Company Registration <span
                                             class="text-danger">*</span></label>
                                          <div class="col-lg-7">
                                             <input type="text" name="company_registration" class="form-control"
                                                value="{{ @$data->company_registration }}{{ old('company_registration') }}" required>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">VAT <span
                                             class="text-danger">*</span></label>
                                          <div class="col-lg-7">
                                             <input type="text" name="vat" class="form-control"
                                                value="{{ @$data->vat }}{{ old('vat') }}" required>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Contact Person </label>
                                          <div class="col-lg-7">
                                             <input type="text" class="form-control" value="{{ @$data->contact_person }}{{ old('contact_person') }}" name="contact_person">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Company Address <span
                                             class="text-danger">*</span></label>
                                          <div class="col-lg-7">
                                             <textarea class="form-control" name="company_address"
                                                required>{{ old('company_address', @$data->company_address) }}</textarea>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Map <span
                                             class="text-danger">*</span></label>
                                          <div class="col-lg-7">
                                             <textarea class="form-control" name="map"
                                                required>{{ old('map', @$data->map) }}</textarea>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">City</label>
                                          <div class="col-lg-7">
                                             <input type="text" class="form-control" value="{{ old('city', @$data->city) }}" name="city">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Zip Code </label>
                                          <div class="col-lg-7">
                                             <input type="text" class="form-control" value="{{ old('zip_code', @$data->zip_code) }}" name="zip_code">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Primary number</label>
                                          <div class="col-lg-7">
                                             <input type="text" class="form-control" value="{{ old('primary_number', @$data->primary_number) }}" name="primary_number">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Secondary number</label>
                                          <div class="col-lg-7">
                                             <input type="text" class="form-control" value="{{ old('secondary_number', @$data->secondary_number) }}" name="secondary_number">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Email</label>
                                          <div class="col-lg-7">
                                             <input type="text" class="form-control" value="{{ old('email', @$data->email) }}" name="email">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Website</label>
                                          <div class="col-lg-7">
                                             <input type="text" class="form-control" value="{{ old('website', @$data->website) }}" name="website">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-lg-3"></label>
                                       <div class="col-lg-7">
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
