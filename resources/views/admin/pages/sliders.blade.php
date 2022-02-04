@extends('admin.layouts.master') 
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Sliders</h4>
                                    <span>Slider on the homepage</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <a class="text-white" href="{{ route('sliders.create') }}"><button class="btn btn-primary">Add slider</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Sliders</h5>
                                    <div class="card-header-right">
                                        <i class="icofont icofont-rounded-down"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="basic-col-reorder" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="basic-col-reorder_info">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Status</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($allSlider)) @foreach($allSlider as $slidersLists)
                                                <tr>
                                                    <td>{{ $slidersLists->title }}</td>
                                                    <td>{{ $slidersLists->status }}</td>
                                                    <td><img src="{{ $slidersLists->image }}" alt="" width="100"></td>
                                                    <td>
                                                        <a href="{{ route('sliders.edit', $slidersLists->id) }}" class="btn btn-primary btn-sm pull-left" style="margin-right: 5px">
                                                            <span class="icofont icofont-ui-edit"></span>
                                                        </a>
                                                        <a class="pull-left" onclick="return confirm('Are you sure you want to delete this slider?')">
                                                                    <form method="POST" action="{{ route('sliders.destroy', $slidersLists->id) }}" accept-charset="UTF-8">
                                                                        <input name="_method" type="hidden" value="DELETE">
                                                                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                                                        <button class="btn btn-danger btn-sm" type="submit"><span class="icofont icofont-ui-delete"></span></button>
                                                                    </form>
                                                                </a>
                                                    </td>
                                                </tr>
                                                @endforeach @endif
                                            </tbody>
                                        </table>
                                    </div>
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