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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @if(!empty($all_test)) @foreach($all_test as $mockList)
                          <tr>
                              <td>{{ $mockList->NclexTestData->title }}</td>
                              <td>
                              <a href="{{ route('nclex_mock.edit', $mockList->id) }}" class="btn btn-primary btn-xs pull-left" style="margin-top:2px">
                                  <i class="fa fa-pencil-square-o"></i>
                              </a>
                              <a class="" onclick="return confirm('Are you sure you want to delete this NCLEX mock test?')">
                                  <form method="POST" action="{{ route('nclex_mock.destroy', $mockList->id) }}" accept-charset="UTF-8">
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
                    {{ Form::open(['url'=>route('nclex_mock.update', @$data->id), 'class'=>'form-horizontal', 'id'=>'blog_add', 'files'=>true,'method'=>'patch']) }}
                @else
                    <form action="{{ route('nclex_mock.store') }}" class="form-horizontal" method="POST"> @endif
                    @csrf
                    <div class="row">
                        <div class="panel-body">
                            <div class="card-block">
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Test Volume</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="nclex_test_id" class="form-control">
                                            @if(!empty($all_mock))
                                            @foreach($all_mock as $key => $test_list)
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
                                    <label class="col-lg-2 control-label"><strong>Questions</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control editor" name="question" id="" cols="30" rows="10">{!! old('question', @$data->question) !!}</textarea>
                                        @if ($errors->has('question'))
                                        <span class="validation-errors text-danger">{{ $errors->first('question') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Explanation</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control editor" name="explaination" id="" cols="30" rows="10">{!! old('explaination', @$data->explaination) !!}</textarea>
                                        @if ($errors->has('explaination'))
                                        <span class="validation-errors text-danger">{{ $errors->first('explaination') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong>Answer Key</strong><span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control editor" name="answer" id="" cols="30" rows="10">{!! old('answer', @$data->answer) !!}</textarea>
                                        @if ($errors->has('answer'))
                                        <span class="validation-errors text-danger">{{ $errors->first('answer') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><strong></strong></label>
                                    <div class="col-sm-10">
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
    if(data_module == 'listening'){
        $('.listening').slideDown();
    } else {
        $('.listening').slideUp();
    }
    $('#module').on('change', function(){
        let module = $(this).val();
        if(module == 'academic reading' || module == 'general training reading'){
            $('.reading').slideDown();
        } else {
            $('.reading').slideUp();
        }
        if(module == 'listening'){
            $('.listening').slideDown();
        } else {
            $('.listening').slideUp();
        }
    });
</script>
@endsection
