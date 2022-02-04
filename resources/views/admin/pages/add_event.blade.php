@extends('admin.layouts.master')
@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="page-body">
                            @if(!empty($data))
                            {{ Form::open(['url'=>route('events.update', @$data->id), 'class'=>'form', 'id'=>'blog_add', 'files'=>true,'method'=>'patch']) }}
                        @else
                            <form action="{{ route('events.store') }}" method="post"> @endif
                            @csrf
                            <div class="row">
                                <div class="col-xl-8 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Add Event</h5>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                                    <li><i class="feather icon-trash-2 close-card"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="name" value="{{ @$data->name }}" id="name" placeholder="Enter headline for the slider">
                                                    <span class="messages"></span>
                                                    <input type="hidden" class="form-control" id="slug" value="{{ @$data->slug }}" name="slug">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <textarea class="form-control editor" name="description" id="" cols="30" rows="10">{{ @$data->description }}</textarea>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Event Details</h5>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                                    <li><i class="feather icon-trash-2 close-card"></i></li>
                                                </ul>
                                            </div>
                                            <div class="card-block"> <br>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control" id="event_date" value="{{ @$data->event_date }}" name="event_date" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="time" class="form-control" id="event_time" value="{{ @$data->event_time }}" name="event_time" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="event_location" value="{{ @$data->event_location }}" name="event_location" placeholder="Event Location">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="event_map" value="{{ @$data->event_map }}" name="event_map" placeholder="Event map embed code">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-12">
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
                                                    <div class="col-sm-12">
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
                                                    <span class="input-group-btn" style="margin-left:15px">
                                                        <a href="{{ url('/vendor/filemanager/dialog.php?type=4&field_id=thumbnail&descending=1&sort_by=date&lang=undefined&akey=061e0de5b8d667cbb7548b551420eb821075e7a6') }}" class="btn iframe-btn btn-primary" type="button">
                                                            <i class="ti-image"></i> Choose
                                                        </a>
                                                    </span>
                                                    <input id="thumbnail" class="form-control" value="{{ @$data->image }}" type="text" name="image" style="width: 61%">
                                                </div>

                                                <div class="input-group">
                                                    @if(!empty($data->image))
                                                        <img id="holder" src="{{ @$data->image }}" class="img-responsive img-thumbnail" style="margin-top:15px;max-height:240px;">
                                                    @else
                                                        <img id="holder" class="img-responsive img-thumbnail" style="margin-top:15px;max-height:240px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h5>PUBLISH</h5>
                                            <div class="card-block">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <button name="status" value="active" class="btn" style="background: #404e67; color: #fff">Publish</button>
                                                        <button name="status" value="inactive" class="btn btn-danger">Draft</button>
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
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
@endsection
@section('scripts')
<script>
    $("#name").keyup(function (){
        let Slug = $('#name').val();
        document.getElementById("slug").value = convertToSlug(Slug);
    });
</script>
@endsection
