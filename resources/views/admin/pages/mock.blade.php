@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="@if($active_tab == 'manage') active @endif"><a href="#manage" data-toggle="tab">All Mock Tests</a></li>
                  <li class="@if($active_tab == 'create') active @endif"><a href="#create" data-toggle="tab">New Mock Test</a></li>
               </ul>
               <div class="tab-content bg-white">
                  <div class="tab-pane @if($active_tab == 'manage') active @endif" id="manage">
                     <div class="table-responsive">
                        <table id="datatable_action" class="display">
                           <thead>
                            <tr>
                                <th>Test</th>
                                <th>Module</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @if(!empty($all_mock)) @foreach($all_mock as $mockList)
                          <tr>                            
                              <td>{{ $mockList->TestData->title }}</td>
                              <td>{{ ucwords($mockList->module) }}</td>
                              <td>{{ ucfirst($mockList->status) }}</td>
                              <td>
                              <a href="{{ route('mock.edit', $mockList->id) }}" class="btn btn-primary btn-xs pull-left">
                                  <i class="fa fa-pencil-square-o"></i>
                              </a>
                              <a class="pull-left" onclick="return confirm('Are you sure you want to delete this speaker?')">
                                  <form method="POST" action="{{ route('mock.destroy', $mockList->id) }}" accept-charset="UTF-8">
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
                    {{ Form::open(['url'=>route('mock.update', @$data->id), 'class'=>'form-horizontal', 'id'=>'blog_add', 'files'=>true,'method'=>'patch']) }}
                @else
                    <form action="{{ route('mock.store') }}" class="form-horizontal" method="POST"> @endif
                    @csrf
                    <div class="row">
                        <div class="panel-body">
                            <div class="card-block">                                
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Test Volume</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="test_id" class="form-control">                                            
                                            @if(!empty($all_test))
                                            @foreach($all_test as $key => $test_list)
                                            <option value="{{ $test_list->id }}" @if(@$data->test_id == $test_list->id) selected @endif>{{ $test_list->title }}</option>
                                            @endforeach                                                
                                            @endif
                                        </select>
                                        @if ($errors->has('test_id'))
                                        <span class="validation-errors text-danger">{{ $errors->first('test_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Module</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="module" class="form-control" id="module">
                                            <option selected disabled>--Select Test Module--</option>
                                            <option value="listening" @if(@$data->module == 'listening') selected @endif>Listening</option>
                                            <option value="academic reading" @if(@$data->module == 'academic reading') selected @endif>Academic Reading</option>
                                            <option value="general training reading" @if(@$data->module == 'general training reading') selected @endif>General Training Reading</option>
                                            <option value="academic writing" @if(@$data->module == 'academic writing') selected @endif>Academic Writing</option>
                                            <option value="general training writing" @if(@$data->module == 'general training writing') selected @endif>General Training Writing</option>
                                            <option value="speaking" @if(@$data->module == 'speaking') selected @endif>Speaking</option>
                                        </select>
                                        @if ($errors->has('module'))
                                        <span class="validation-errors text-danger">{{ $errors->first('module') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row reading">
                                    <label class="col-lg-2 control-label"><strong>Passages</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control editor" name="passage" id="" cols="30" rows="10">{!! old('passage', @$data->passage->passage) !!}</textarea>
                                        @if ($errors->has('passage'))
                                        <span class="validation-errors text-danger">{{ $errors->first('passage') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Questions</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control editor" name="question" id="" cols="30" rows="10">{!! old('question', @$data->question) !!}</textarea>
                                        @if ($errors->has('question'))
                                        <span class="validation-errors text-danger">{{ $errors->first('question') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Answer</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control editor" name="answer" id="" cols="30" rows="10">{!! old('answer', @$data->answer) !!}</textarea>
                                        @if ($errors->has('answer'))
                                        <span class="validation-errors text-danger">{{ $errors->first('answer') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Status</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="status" class="form-control" id="status">
                                            <option value="">--Select Status--</option>
                                            <option value="active" @if(@$data->status == 'active') selected @endif>Active</option>
                                            <option value="inactive" @if(@$data->status == 'inactive') selected @endif>Inactive</option>
                                        </select>
                                        @if ($errors->has('status'))
                                        <span class="validation-errors text-danger">{{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
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
@section('scripts')
<script>
    var data_module = "{{ @$data->module }}";
    if(data_module == 'academic reading' || data_module == 'general training reading'){
        $('.reading').slideDown();
    } else {
        $('.reading').slideUp();
    }
    $('#module').on('change', function(){
        let module = $(this).val();
        if(module == 'academic reading' || module == 'general training reading'){
            $('.reading').slideDown();
        } else {
            $('.reading').slideUp();
        }
    });
</script>
@endsection