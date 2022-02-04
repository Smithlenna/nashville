@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="@if($active_tab == 'manage') active @endif"><a href="#manage" data-toggle="tab">All Speaker</a></li>
                  <li class="@if($active_tab == 'create') active @endif"><a href="#create" data-toggle="tab">New Speaker</a></li>
               </ul>
               <div class="tab-content bg-white">
                  <div class="tab-pane @if($active_tab == 'manage') active @endif" id="manage">
                     <div class="table-responsive">
                        <table id="datatable_action" class="display">
                           <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Facebook</th>
                                <th>Twitter</th>
                                <th>Linkedin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @if(!empty($all_speakers)) @foreach($all_speakers as $speakersLists)
                          <tr>
                              <td><img src="{{ $speakersLists->image }}" class="img-circle" style="width: 36px;"></td>
                              <td>{{ $speakersLists->name }}</td>
                              <td>{{ $speakersLists->facebook }}</td>
                              <td>{{ $speakersLists->twitter }}</td>
                              <td>{{ $speakersLists->linkedin }}</td>
                              <td>
                              <a href="{{ route('speakers.edit', $speakersLists->id) }}" class="btn btn-primary btn-xs pull-left">
                                  <i class="fa fa-pencil-square-o"></i>
                              </a>
                              <a class="pull-left" onclick="return confirm('Are you sure you want to delete this speaker?')">
                                  <form method="POST" action="{{ route('speakers.destroy', $speakersLists->id) }}" accept-charset="UTF-8">
                                      <input name="_method" type="hidden" value="DELETE">
                                      <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                      <button data-toggle="tooltip" data-placement="top" style="background:transparent;border:0" title="Delete" ><i class="btn btn-xs btn-danger fa fa-trash-o"></i></button>
                                  </form>
                              </a>
                              </td>
                          </tr>
                          @endforeach
                          @endif
                      </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="tab-pane @if($active_tab == 'create') active @endif" id="create">
                    @if(!empty($data))
                    {{ Form::open(['url'=>route('speakers.update', @$data->id), 'class'=>'form-horizontal', 'id'=>'blog_add', 'files'=>true,'method'=>'patch']) }}
                @else
                    <form action="{{ route('speakers.store') }}" class="form-horizontal" method="POST"> @endif
                    @csrf
                    <div class="row">
                        <div class="panel-body">
                            <div class="card-block">
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Title</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" value="{{ @$data->name }}" id="name" placeholder="Name of the Speaker">
                                        @if ($errors->has('name'))
                                        <span class="validation-errors text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                        <input type="hidden" class="form-control" name="slug" value="{{ @$data->slug }}" id="slug">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Intro</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control editor" name="intro" id="" cols="30" rows="10">{{ @$data->intro }}</textarea>
                                        @if ($errors->has('intro'))
                                        <span class="validation-errors text-danger">{{ $errors->first('intro') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Facebook URL</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="facebook" value="{{ @$data->facebook }}" id="facebook" placeholder="Facebook URL">
                                        @if ($errors->has('facebook'))
                                        <span class="validation-errors text-danger">{{ $errors->first('facebook') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Twitter URL</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="twitter" value="{{ @$data->twitter }}" id="twitter" placeholder="Twitter URL">
                                        @if ($errors->has('twitter'))
                                        <span class="validation-errors text-danger">{{ $errors->first('twitter') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Linkedin URL</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="linkedin" value="{{ @$data->linkedin }}" id="linkedin" placeholder="LinkedIn URL">
                                        @if ($errors->has('linkedin'))
                                        <span class="validation-errors text-danger">{{ $errors->first('linkedin') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Website URL</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="website" value="{{ @$data->website }}" id="website" placeholder="Website URL">
                                        @if ($errors->has('website'))
                                        <span class="validation-errors text-danger">{{ $errors->first('website') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-lg-2 control-label"><strong>Profile Image</strong><span class="text-danger">*</span></label>
                                    <div class="col-lg-3">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 210px;">
                                            @php
                                            $image = "http://placehold.it/350x260";
                                            if(!empty($data->image)){
                                              $image = $data->image;
                                            }
                                            @endphp
                                                <input type="hidden" id="thumbnail">
                                                <img src="{{ $image }}" id="thumbnailholder" alt="Please Connect Your Internet">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="width: 210px;"></div>
                                            <div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">
                                                  <a href="{{ url('/vendor/filemanager/dialog.php?type=4&field_id=thumbnail&descending=1&sort_by=date&lang=undefined&akey=061e0de5b8d667cbb7548b551420eb821075e7a6') }}" class="btn iframe-btn btn-primary" type="button">
                                                      <i class="fa fa-picture-o"></i> Choose
                                                   </a>
                                                    <!-- <input type="file" name="image" value="upload" data-buttontext="Choose File" id="myImg" data-parsley-id="26"> -->
                                                    <input type="hidden" name="image" id="thumbnailthumbnail" value="{{ @$data->image }}">
                                                    <span class="fileinput-exists">Change</span>
                                                </span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </span>
                                          </div>
                                          <div id="valid_msg" style="color: #e11221"></div>
                                        </div>
                                    </div>
                                    @if ($errors->has('image'))
                                    <div class="col-lg-3">
                                      <span class="validation-errors text-danger">{{ $errors->first('image') }}</span>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group row text-right">
                                    <div class="col-sm-12">
                                        <button class="btn" style="background: #404e67; color: #fff">Publish</button>
                                        <button class="btn btn-danger">Draft</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
