@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="@if($active_tab == 'manage') active @endif"><a href="#manage" data-toggle="tab">All Events</a></li>
                  <li class="@if($active_tab == 'create') active @endif"><a href="#create" data-toggle="tab">New Event</a></li>
               </ul>
               <div class="tab-content bg-white">
                  <div class="tab-pane @if($active_tab == 'manage') active @endif" id="manage">
                     <div class="table-responsive">
                       <table id="datatable_action" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="basic-col-reorder_info">
                           <thead>
                               <tr>
                                   <th>Title</th>
                                   <th>Category</th>
                                   <th>Speaker</th>
                                   <th>Status</th>
                                   <th>Image</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @if(!empty($all_event)) @foreach($all_event as $eventsLists)
                               <tr>
                                   <td>{{ $eventsLists->name }}</td>
                                   <td>{{ $eventsLists->EventCategory->name }}</td>
                                   <td>{{ $eventsLists->Speaker->name }}</td>
                                   <td>{{ $eventsLists->status }}</td>
                                   <td><img src="{{ $eventsLists->image }}" alt="" width="100"></td>
                                   <td>
                                       <a href="{{ route('events.edit', $eventsLists->id) }}" class="btn btn-primary btn-xs pull-left">
                                           <i class="fa fa-pencil-square-o"></i>
                                       </a>
                                       <a class="pull-left" onclick="return confirm('Are you sure you want to delete this event?')">
                                           <form method="POST" action="{{ route('events.destroy', $eventsLists->id) }}" accept-charset="UTF-8">
                                               <input name="_method" type="hidden" value="DELETE">
                                               <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                               <button data-toggle="tooltip" data-placement="top" style="background:transparent;border:0" title="Delete" ><i class="btn btn-xs btn-danger fa fa-trash-o"></i></button>
                                           </form>
                                       </a>
                                   </td>
                               </tr>
                               @endforeach @endif
                           </tbody>
                       </table>
                     </div>
                  </div>
                  <div class="tab-pane @if($active_tab == 'create') active @endif" id="create">
                    @if(!empty($data))
                    {{ Form::open(['url'=>route('events.update', @$data->id), 'class'=>'form-horizontal', 'id'=>'blog_add', 'files'=>true,'method'=>'patch']) }}
                @else
                    <form action="{{ route('events.store') }}" method="post" class="form-horizontal"> @endif
                    @csrf
                    <div class="row">
                        <div class="col-xl-8 col-md-12">
                            <div class="form-group row">
                                <label class="col-lg-2 control-label"><strong>Event Name</strong><span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="{{ @$data->name }}" id="name" placeholder="Enter headline for the slider">
                                    <input type="hidden" class="form-control" id="slug" value="{{ @$data->slug }}" name="slug">
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-lg-2 control-label"><strong>Description</strong><span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control editor" name="description" id="" cols="30" rows="10">{{ @$data->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-lg-2 control-label"><strong>Event Date</strong><span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="event_date" value="{{ @$data->event_date }}" name="event_date" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label"><strong>Time</strong><span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="time" class="form-control" id="event_time" value="{{ @$data->event_time }}" name="event_time" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label"><strong>Location</strong><span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="event_location" value="{{ @$data->event_location }}" name="event_location" placeholder="Event Location">
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-lg-2 control-label"><strong>Link</strong><span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="event_map" value="{{ @$data->event_map }}" name="event_map" placeholder="Event map embed code">
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-lg-2 control-label"><strong>Speaker</strong><span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select name="speaker_id" id="" class="form-control">
                                        <option selected disabled>Select Speaker</option>
                                        @if(!empty($event_speakers))
                                            @foreach ($event_speakers as $EventSpeakerList)
                                                <option @if(@$data->speaker_id == $EventSpeakerList->id) selected @endif value="{{ $EventSpeakerList->id }}">{{ $EventSpeakerList->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-lg-2 control-label"><strong>Category</strong><span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select name="event_category_id" id="" class="form-control">
                                        <option selected disabled>Select Event Category</option>
                                        @if(!empty($event_category))
                                            @foreach ($event_category as $EventCategoryList)
                                                <option @if(@$data->event_category_id == $EventCategoryList->id) selected @endif value="{{ $EventCategoryList->id }}">{{ $EventCategoryList->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-lg-2 control-label"><strong>Image</strong><span class="text-danger">*</span></label>
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
                            <div class="form-group row">
                              <label class="col-lg-2 control-label"></label>
                                <div class="col-sm-10">
                                    <button name="status" value="active" class="btn" style="background: #404e67; color: #fff">Publish</button>
                                    <button name="status" value="inactive" class="btn btn-danger">Draft</button>
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
