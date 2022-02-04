@extends('admin.layouts.master')
@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Site sensitive data
                                        </h5>
                                        <div class="card-header-right">
                                            <i class="icofont icofont-rounded-down"></i>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        @if(!empty(@$website_data))
                                            {{ Form::open(['url'=>route('website.update', @$website_data->id), 'class'=>'form', 'id'=>'blog_add', 'files'=>true,'method'=>'patch']) }}
                                        @else
                                        <form action="{{ route('website.store') }}" method="POST">
                                            @endif
                                            @csrf
                                            <div class="form-group">
                                                <label>Admin Email</label>
                                                <input type="email" name="email" value="{{ @$website_data->email }}" class="form-control" required="">
                                                <span class="hint">All notifications regarding the website will be sent to this email.</span>
                                            </div>
                                            <div class="form-group">
                                                <label>Primary number</label>
                                                <input type="text" name="phone" value="{{ @$website_data->phone }}" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" name="location" rows="2" value="{{ @$website_data->location }}" class="form-control" required="" style="resize: none">
                                            </div>
                                            <div class="form-group">
                                                <label>Map Info</label>
                                                <textarea type="text" name="map" rows="3" class="form-control" required="" style="resize: none">{{ @$website_data->map }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Website Logo</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="row" style="width:100%;margin-left: 2px">
                                            <span class="input-group-btn">
                                                <a href="{{ url('/vendor/filemanager/dialog.php?type=4&field_id=thumbnail&descending=1&sort_by=date&lang=undefined&akey=061e0de5b8d667cbb7548b551420eb821075e7a6') }}" class="btn iframe-btn btn-primary" type="button">
                                                    <i class="ti-image"></i> Choose
                                                </a>
                                            </span>
                                                    <input id="thumbnail" class="form-control" value="{{ @@$website_data->logo }}" type="text" name="logo" style="width: 79%">
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                @if(!empty(@$website_data->logo))
                                                    <img id="holder" src="{{ @@$website_data->logo }}" class="img-responsive img-thumbnail" style="margin-top:15px;max-height:240px">
                                                @else
                                                    <img id="holder" class="img-responsive img-thumbnail" style="margin-top:15px;max-height:240px;">
                                                @endif
                                            </div>
                                            <input class="btn btn-primary pull-right btn-add-task waves-effect waves-light m-t-10" type="submit" value="Save" style="margin-bottom: 10px">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Social Media
                                        </h5>
                                        <div class="card-header-right">
                                            <i class="icofont icofont-rounded-down"></i>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        @if(!empty($social_media))
                                            {{ Form::open(['url'=>route('social.update', $social_media->id), 'class'=>'form', 'id'=>'blog_add', 'files'=>true,'method'=>'patch']) }}
                                        @else
                                        <form action="{{ route('social.store') }}" method="POST">
                                            @endif
                                            @csrf
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="url" name="facebook" value="{{ @$social_media->facebook }}" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="url" name="twitter" value="{{ @$social_media->twitter }}" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <input type="url" name="instagram" value="{{ @$social_media->instagram }}" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Linkedin</label>
                                                <input type="url" name="linkedin" value="{{ @$social_media->linkedin }}" class="form-control" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Youtube</label>
                                                <input type="url" name="youtube" value="{{ @$social_media->youtube }}" class="form-control" required="">
                                                <span class="hint">Creating profile on almost all social media platform is highly recommended!</span>
                                            </div>
                                            <br>
                                            <input class="btn btn-primary pull-right btn-add-task waves-effect waves-light m-t-10" type="submit" value="Save" style="margin-bottom:10px"> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection