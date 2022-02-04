@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="@if($active_tab == 'manage') active @endif"><a href="#manage" data-toggle="tab">All Dates</a></li>
                  <li class="@if($active_tab == 'create') active @endif"><a href="#create" data-toggle="tab">New Date</a></li>
                  
               </ul>
               <div class="tab-content bg-white">
                  <div class="tab-pane @if($active_tab == 'manage') active @endif" id="manage">
                     <div class="dt-responsive table-responsive">
                     <table id="datatable_action" class="table table-striped datatable_action table-bordered nowrap dataTable" role="grid" aria-describedby="basic-col-reorder_info">
                        <thead>
                            <tr>
                                <th>Country</th>
                                <th>Center</th>
                                <th>Module</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="check">
                            @if(!empty($all_test)) @foreach($all_test as $key => $testList)
                            <tr id="{{ $testList->id }}">
                                <input type="hidden" value="{{ $testList->id }}">                                
                                <td>{{ ucfirst(strtolower($testList->CountryData->name)) }}</td>
                                <td>{{ $testList->CenterData->name }}</td>
                                <td>{{ ucfirst($testList->test_module) }}</td>
                                <td>{{ ucfirst(str_replace('-',' ',$testList->type)) }}</td>
                                <td>{{ $testList->date }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs edit" value="{{ $testList->id }}" style="float: none;"><i class="fa fa-pencil-square-o"></i></button>
                                    <button type="button" class="btn-xs btn btn-danger table-delete" style="float: none;margin: 5px;" data-target="#sign-in-modal"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                            @endforeach @endif
                        </tbody>
                    </table>
                     </div>
                  </div>
                  <div class="tab-pane @if($active_tab == 'create') active @endif" id="create">
                  <form action="{{ route('test_dates.store') }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="row">                        
                        <div class="col-sm-12">
                            <div class="form-group">{{ $errors }}
                                <label class="col-sm-2 control-label"><strong>Country</strong> <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <select name="country_id" id="country_id" class="form-control">
                                        @if(!empty($all_countries))
                                        @foreach($all_countries as $countryList)
                                        <option value="{{$countryList->id}}" {{$countryList->name == 'NEPAL' ? 'selected' : 'disabled'}}>{{$countryList->name}}</option>
                                        @endforeach
                                        @endif
                                        @if($errors->has('country_id'))
                                        <span class='validation-errors text-danger'>{{ $errors->first('country_id') }}</span>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><strong>Center</strong> <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <select name="center_id" id="center_id" class="form-control">
                                        <option selected disabled>--Select Test Center--</option>
                                        @if(!empty($all_centers))
                                        @foreach($all_centers as $centerList)                                    
                                        <option value="{{$centerList->id}}" {{ (collect(old('center_id'))->contains($centerList->id)) ? 'selected':'' }} {{ @$data->center_id == $centerList->id ? 'selected' : '' }}>{{$centerList->name}}</option>
                                        @endforeach
                                        @endif
                                        @if($errors->has('center_id'))
                                        <span class='validation-errors text-danger'>{{ $errors->first('center_id') }}</span>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><strong>Test Module</strong> <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                <select name="test_module" id="module" class="form-control">
                                    <option selected disabled>--Select Test Module--</option>
                                    <option value="academic" @if(old('test_module') == 'academic') selected @endif>Academic</option>
                                    <option value="GT" @if(old('test_module') == 'GT') selected @endif>General Training (GT)</option>
                                    <option value="both" @if(old('test_module') == 'both') selected @endif>Both</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><strong>Type</strong> <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                <select name="type" id="module" class="form-control">
                                    <option selected disabled>--Select Type--</option>
                                    <option value="paper-based" @if(old('type') == 'paper-based') selected @endif>Paper-based</option>
                                    <option value="computer-delivered" @if(old('type') == 'computer-delivered') selected @endif>Computer-delivered</option>                                    
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><strong>Month</strong> <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" value="" name="month" id="month">                            
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><strong>DateTime</strong> <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{ old('date', @$data->date) }}" name="date" id="name" placeholder="Enter dates separated with comma(,)">                            
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <button name="status" value="publish" class="btn" style="background: #404e67; color: #fff">Add Date</button>
                                    <span class="messages"></span>
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
