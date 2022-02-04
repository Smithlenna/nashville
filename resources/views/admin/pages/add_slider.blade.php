@extends('admin.layouts.master')
@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        @if(!empty($data))
                        {{ Form::open(['url'=>route('sliders.update', $data->id), 'class'=>'form', 'id'=>'blog_add', 'files'=>true,'method'=>'patch']) }}
                    @else
                        <form action="{{ route('sliders.store') }}" method="post"> @endif
                            @csrf
                            <div class="row">
                                <div class="col-xl-8 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Sliders</h5>
                                            <span class="text-muted">For more details about usage, please refer <a href="https://www.amcharts.com/online-store/" target="_blank">amCharts</a> licences.</span>
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
                                                    <input type="text" class="form-control" value="{{ @$data->title }}" name="title" id="name" placeholder="Enter headline for the slider">
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <textarea class="form-control editor" name="excerpt" id="" cols="30" rows="10">{{ @$data->excerpt }}</textarea>
                                                    <span class="messages"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>PUBLISH</h5>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="feather icon-maximize full-card"></i></li>
                                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                                    <li><i class="feather icon-trash-2 close-card"></i></li>
                                                </ul>
                                            </div>
                                            <div class="card-block">
                                                <br>
                                                <div class="form-group row">
                                                    <button name="status" value="publish" class="btn" style="background: #404e67; color: #fff">Publish</button>
                                                    <button name="status" value="draft" class="btn btn-danger ml-2">Draft</button>
                                                    <span class="messages"></span>
                                                </div>
            
                                                <div class="form-group row">
                                                    <span class="input-group-btn">
                                                        <a href="{{ url('/vendor/filemanager/dialog.php?type=4&field_id=thumbnail&descending=1&sort_by=date&lang=undefined&akey=061e0de5b8d667cbb7548b551420eb821075e7a6') }}" class="btn iframe-btn btn-primary" type="button">
                                                            <i class="ti-image"></i> Choose
                                                        </a>
                                                    </span>
                                                    <input id="thumbnail" class="form-control" value="{{ @$data->image }}" type="text" name="image" style="width: 65%">
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