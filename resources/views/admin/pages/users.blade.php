@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs">
                  <li class="@if($active_tab == 'manage') active @endif"><a href="#manage" data-toggle="tab">Students</a></li>
                  <li class="@if($active_tab == 'create') active @endif"><a href="#create" data-toggle="tab">New Student</a></li>
               </ul>
               <div class="tab-content bg-white">
                <div class="tab-pane @if($active_tab == 'manage') active @endif" id="manage">
                    <div class="table-responsive">
                       <table id="datatable_action" class="display">
                          <thead>
                           <tr>
                               <th>Name</th>
                               <th>Email</th>
                               <th>Primary Number</th>
                               <th>Secondary Number</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                         @if(!empty($all_users)) @foreach($all_users as $list)
                         <tr>
                             <td>{{ $list->name }}</td>
                             <td>{{ $list->email }}</td>
                             <td>{{ $list->primary_number }}</td>
                             <td>{{ $list->secondary_number }}</td>
                             <td>
                             <a href="{{ route('users.edit', $list->id) }}" class="btn btn-primary btn-xs pull-left">
                                 <i class="fa fa-pencil-square-o"></i>
                             </a>
                             <a class="pull-left" onclick="return confirm('Are you sure you want to delete this user?')">
                                 <form method="POST" action="{{ route('users.destroy', $list->id) }}" accept-charset="UTF-8">
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
                    <form role="form" id="form" action="{{ route('users.update', $data->id)}}" method="post" class="form-horizontal" enctype='multipart/form-data'>
                    <input name="_method" type="hidden" value="PATCH">
                    @else
                    <form role="form" id="form" action="{{ route('users.store')}}" method="post" class="form-horizontal" enctype='multipart/form-data'>
                      @endif
                          @csrf
                           <div class="form-group">
                              <label class="col-sm-2 control-label"><strong>Full Name </strong><span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                                 <input type="text" class="input-sm form-control" value="{{ @$data->name }}@if(!isset($data) && empty($data->name)){{ old('name') }}@endif" placeholder="e.g Enter your  Full Name" name="name" required="">
                                 @if ($errors->has('name'))
                                 <span class="validation-errors text-danger">{{ $errors->first('name') }}</span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-sm-2 control-label"><strong>Email </strong><span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                                 <input type="email" id="check_email_addrees" placeholder="e.g user_placeholder_email" name="email" value="{{ @$data->email }}@if(!isset($data) && empty($data->email)){{ old('email') }}@endif" class="input-sm form-control" required="">
                                 @if ($errors->has('email'))
                               <span class="validation-errors text-danger">{{ $errors->first('email') }}</span>
                               @endif
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-sm-2 control-label"><strong>Password </strong><span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                                 <input type="password" id="new_password" placeholder="Password" name="password" class="input-sm form-control" @if(!isset($data)) required @endif>
                                 @if ($errors->has('password'))
                               <span class="validation-errors text-danger">{{ $errors->first('password') }}</span>
                               @endif
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="col-sm-2 control-label"><strong>Primary Number </strong></label>
                              <div class="col-sm-9">
                                 <input type="text" class="input-sm form-control" value="{{ @$data->primary_number }}@if(!isset($data) && empty($data->primary_number)){{ old('primary_number') }}@endif" name="primary_number" placeholder="e.g user_placeholder_phone">
                                 @if ($errors->has('primary_number'))
                                 <span class="validation-errors text-danger">{{ $errors->first('primary_number') }}</span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-sm-2 control-label"><strong>Secnndary Number </strong></label>
                              <div class="col-sm-9">
                                 <input type="text" class="input-sm form-control" value="{{ @$data->secondary_number }}@if(!isset($data) && empty($data->secondary_number)){{ old('secondary_number') }}@endif" name="secondary_number" placeholder="e.g user_placeholder_mobile">
                                 @if ($errors->has('secondary_number'))
                                 <span class="validation-errors text-danger">{{ $errors->first('secondary_number') }}</span>
                                 @endif
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-sm-2 control-label"></label>
                              <div class="col-sm-9">
                                 <button type="submit" class="btn btn-sm btn-primary">Create User</button>
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
@endsection
