@extends('admin.layouts.master')
@section('content')
<div class="row">
  <div class="col-lg-12">
     <style type="text/css">
        .datepicker {
        z-index: 1151 !important;
        }
        .mt-sm {
        font-size: 14px;
        }
        .close-btn {
        font-weight: 100;
        position: absolute;
        right: 10px;
        top: -10px;
        display: none;
        }
        .close-btn i {
        font-weight: 100;
        color: #89a59e;
        }
        .report:hover .close-btn {
        display: block;
        }
        .mt-lg:hover .close-btn {
        display: block;
        }
     </style>
     <div class="dashboard">
        <!--        ******** transactions ************** -->
        <div id="report_menu" class="row">
           <div class="col-sm-4 report" id="1">
              <strong data-toggle="tooltip" data-placement="top" style="cursor:pointer" class="close-btn" title="Inactive" data-fade-out-on-success="#1" data-act="ajax-request" data-action-url="https://ultimate.codexcube.com/admin/settings/save_dashboard/1/0"><i class='fa fa-times-circle'></i></strong>
              <div class="panel report_menu">
                 <div class="row row-table row-flush">
                    <div class="col-xs-6 bb br">
                       <div class="row row-table row-flush">
                          <div class="col-xs-2 text-center text-info">
                             <em class="fa fa-plus fa-2x"></em>
                          </div>
                          <div class="col-xs-10">
                             <div class="text-center">
                                <h4 class="mt-sm mb0">INR 0,00                                                    </h4>
                                <p class="mb0 text-muted">Income Today</p>
                                <small><a href="https://ultimate.codexcube.com/admin/transactions/deposit"
                                   class="mt0 mb0">More info <i
                                   class="fa fa-arrow-circle-right"></i></a></small>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="col-xs-6 bb">
                       <div class="row row-table row-flush">
                          <div class="col-xs-2 text-center text-danger">
                             <em class="fa fa-minus fa-2x"></em>
                          </div>
                          <div class="col-xs-10">
                             <div class="text-center">
                                <h4 class="mt-sm mb0"> INR 0,00</h4>
                                <p class="mb0 text-muted">Expense Today</p>
                                <small><a href="https://ultimate.codexcube.com/admin/transactions/expense"
                                   class=" small-box-footer">More info                                                            <i
                                   class="fa fa-arrow-circle-right"></i></a></small>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="row row-table row-flush">
                    <div class="col-xs-6 br">
                       <div class="row row-table row-flush">
                          <div class="col-xs-2 text-center text-info">
                             <em class="fa fa-plus fa-2x"></em>
                          </div>
                          <div class="col-xs-10">
                             <div class="text-center">
                                <h4 class="mt-sm mb0">INR 3.281,00</h4>
                                <p class="mb0 text-muted">Total Income</p>
                                <small><a href="https://ultimate.codexcube.com/admin/transactions/deposit"
                                   class="mt0 mb0">More info <i
                                   class="fa fa-arrow-circle-right"></i></a></small>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="col-xs-6">
                       <div class="row row-table row-flush">
                          <div class="col-xs-2 text-center text-danger">
                             <em class="fa fa-minus fa-2x"></em>
                          </div>
                          <div class="col-xs-10">
                             <div class="text-center">
                                <h4 class="mt-sm mb0"> INR 1.319.878,76</h4>
                                <p class="mb0 text-muted">Total Expense</p>
                                <small><a href="https://ultimate.codexcube.com/admin/transactions/expense"
                                   class="small-box-footer">More info                                                            <i
                                   class="fa fa-arrow-circle-right"></i></a></small>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <!--        ******** Sales ************** -->
           <div class="col-sm-4 report" id="2">
              <strong data-toggle="tooltip" data-placement="top" style="cursor:pointer" class="close-btn" title="Inactive" data-fade-out-on-success="#2" data-act="ajax-request" data-action-url="https://ultimate.codexcube.com/admin/settings/save_dashboard/2/0"><i class='fa fa-times-circle'></i></strong>
              <div class="panel report_menu">
                 <div class="row row-table row-flush">
                    <div class="col-xs-6 bb br">
                       <div class="row row-table row-flush">
                          <div class="col-xs-2 text-center ">
                             <em class="fa fa-shopping-cart fa-2x"></em>
                          </div>
                          <div class="col-xs-10">
                             <div class="text-center">
                                <h4 class="mt-sm mb0">INR 0,00</h4>
                                <p class="mb0 text-muted">Invoice Today</p>
                                <small><a href="https://ultimate.codexcube.com/admin/invoice/manage_invoice"
                                   class="mt0 mb0">More info <i
                                   class="fa fa-arrow-circle-right"></i></a></small>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="col-xs-6 bb">
                       <div class="row row-table row-flush">
                          <div class="col-xs-2 text-center text-purple">
                             <em class="fa fa-money fa-2x"></em>
                          </div>
                          <div class="col-xs-10">
                             <div class="text-center">
                                <h4 class="mt-sm mb0"> INR 0,00</h4>
                                <p class="mb0 text-muted">Payment Today</p>
                                <small><a href="https://ultimate.codexcube.com/admin/invoice/all_payments"
                                   class=" small-box-footer">More info                                                            <i
                                   class="fa fa-arrow-circle-right"></i></a></small>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="row row-table row-flush">
                    <div class="col-xs-6 br">
                       <div class="row row-table row-flush">
                          <div class="col-xs-2 text-center text-purple">
                             <em class="fa fa-money fa-2x"></em>
                          </div>
                          <div class="col-xs-10">
                             <div class="text-center">
                                <h4 class="mt-sm mb0">INR 3.226,00</h4>
                                <p class="mb0 text-muted">Paid Amount</p>
                                <small><a href="https://ultimate.codexcube.com/admin/invoice/all_payments"
                                   class="mt0 mb0">More info <i
                                   class="fa fa-arrow-circle-right"></i></a></small>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="col-xs-6">
                       <div class="row row-table row-flush">
                          <div class="col-xs-2 text-center text-danger">
                             <em class="fa fa-usd fa-2x"></em>
                          </div>
                          <div class="col-xs-10">
                             <div class="text-center">
                                <h4 class="mt-sm mb0"> INR 4.028,62</h4>
                                <p class="mb0 text-muted">Due Amount</p>
                                <small><a href="https://ultimate.codexcube.com/admin/invoice/manage_invoice"
                                   class="small-box-footer">More info                                                            <i
                                   class="fa fa-arrow-circle-right"></i></a></small>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <!--        ******** Ticket ************** -->
           <div class="col-sm-4 report" id="3">
              <strong data-toggle="tooltip" data-placement="top" style="cursor:pointer" class="close-btn" title="Inactive" data-fade-out-on-success="#3" data-act="ajax-request" data-action-url="https://ultimate.codexcube.com/admin/settings/save_dashboard/3/0"><i class='fa fa-times-circle'></i></strong>
              <div class="panel report_menu">
                 <div class="row row-table row-flush">
                    <div class="col-xs-6 bb br">
                       <div class="row row-table row-flush">
                          <div class="col-xs-2 text-center text-danger">
                             <em class="fa fa-tasks fa-2x"></em>
                          </div>
                          <div class="col-xs-10">
                             <div class="text-center">
                                <h4 class="mt-sm mb0">3</h4>
                                <p class="mb0 text-muted">In Progress Task</p>
                                <small><a href="https://ultimate.codexcube.com/admin/tasks/all_task"
                                   class="mt0 mb0">More info <i
                                   class="fa fa-arrow-circle-right"></i></a></small>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="col-xs-6 bb">
                       <div class="row row-table row-flush">
                          <div class="col-xs-2 text-center text-danger">
                             <em class="fa fa-ticket fa-2x"></em>
                          </div>
                          <div class="col-xs-10">
                             <div class="text-center">
                                <h4 class="mt-sm mb0"> 2</h4>
                                <p class="mb0 text-muted">Open Tickets</p>
                                <small><a href="https://ultimate.codexcube.com/admin/tickets"
                                   class=" small-box-footer">More info                                                            <i
                                   class="fa fa-arrow-circle-right"></i></a></small>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="row row-table row-flush">
                    <div class="col-xs-6 br">
                       <div class="row row-table row-flush">
                          <div class="col-xs-2 text-center text-danger">
                             <em class="fa fa-bug fa-2x"></em>
                          </div>
                          <div class="col-xs-10">
                             <div class="text-center">
                                <h4 class="mt-sm mb0">0</h4>
                                <p class="mb0 text-muted">In Progress Bugs</p>
                                <small><a href="https://ultimate.codexcube.com/admin/bugs"
                                   class="mt0 mb0">More info <i
                                   class="fa fa-arrow-circle-right"></i></a></small>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="col-xs-6">
                       <div class="row row-table row-flush">
                          <div class="col-xs-2 text-center text-danger">
                             <em class="fa fa-folder-open-o fa-2x"></em>
                          </div>
                          <div class="col-xs-10">
                             <div class="text-center">
                                <h4 class="mt-sm mb0">0</h4>
                                <p class="mb0 text-muted">In Progress Projects</p>
                                <small><a href="https://ultimate.codexcube.com/admin/projects"
                                   class="small-box-footer">More info                                                            <i
                                   class="fa fa-arrow-circle-right"></i></a></small>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <div class="clearfix visible-sm-block "></div>
        <div id="menu" class="row">
           
           <style type="text/css">
              .dragger {
              background: url(../admin/img/dragger.png) 0px 11px no-repeat;
              cursor: pointer;
              }
              .table > tbody > tr > td {
              vertical-align: initial;
              }
           </style>

           <div class="col-md-6 mt-lg" id="19">
              <strong data-toggle="tooltip" data-placement="top" style="cursor:pointer" class="close-btn" title="Inactive" data-fade-out-on-success="#19" data-act="ajax-request" data-action-url="https://ultimate.codexcube.com/admin/settings/save_dashboard/19/0"><i class='fa fa-times-circle'></i></strong>
              <section class="panel panel-custom menu" style="height: 437px;overflow-y: scroll;">
                 <header class="panel-heading">
                    <h3 class="panel-title">Recently Posts</h3>
                 </header>
                 <div class="panel-body inv-slim-scroll">
                    <div class="list-group bg-white">
                       <a href="https://ultimate.codexcube.com/admin/invoice/manage_invoice/payments_details/22"
                          class="list-group-item">
                       INV-2020-Mar-31-0022                                            -
                       <small
                          class="text-muted">$ 2.100,00                                                <span
                          class="label label-dark pull-right">-</span>
                       </small>
                       </a>
                       <a href="https://ultimate.codexcube.com/admin/invoice/manage_invoice/payments_details/19"
                          class="list-group-item">
                       INV-2019-Sep-19-0019                                            -
                       <small
                          class="text-muted">$ 100,00                                                <span
                          class="label label-dark pull-right">-</span>
                       </small>
                       </a>
                       <a href="https://ultimate.codexcube.com/admin/invoice/manage_invoice/payments_details/16"
                          class="list-group-item">
                       INV0016                                            -
                       <small
                          class="text-muted">$ 342,00                                                <span
                          class="label label-dark pull-right">-</span>
                       </small>
                       </a>
                       <a href="https://ultimate.codexcube.com/admin/invoice/manage_invoice/payments_details/15"
                          class="list-group-item">
                       INV0015                                            -
                       <small
                          class="text-muted">$ 684,00                                                <span
                          class="label label-dark pull-right">-</span>
                       </small>
                       </a>
                    </div>
                 </div>
                 <div class="panel-footer">
                    <small>Total Receipts: <strong>
                    USD 2.200,00, INR 1.026,00                                </strong></small>
                 </div>
              </section>
           </div>
           <style type="text/css">
              .dragger {
              background: url(../admin/img/dragger.png) 0px 11px no-repeat;
              cursor: pointer;
              }
              .table > tbody > tr > td {
              vertical-align: initial;
              }
           </style>

           <div class="col-md-6 mt-lg" id="18">
              <strong data-toggle="tooltip" data-placement="top" style="cursor:pointer" class="close-btn" title="Inactive" data-fade-out-on-success="#18" data-act="ajax-request" data-action-url="https://ultimate.codexcube.com/admin/settings/save_dashboard/18/0"><i class='fa fa-times-circle'></i></strong>
              <div class="panel panel-custom menu" style="height: 437px;">
                 <header class="panel-heading">
                    <h3 class="panel-title">Recent Testimonials</h3>
                 </header>
                 <div class="panel-body">
                    <p class="text-center">
                    <form role="form" id="form" action="https://ultimate.codexcube.com/admin/dashboard" method="post"
                       class="form-horizontal form-groups-bordered hidden-xs">
                       <div class="form-group">
                          <label class="col-sm-3 control-label">Select Year                                        <span
                             class="required">*</span></label>
                          <div class="col-sm-5">
                             <div class="input-group">
                                <input type="text" name="year" value="2020" class="form-control years"><span class="input-group-addon"><a
                                   href="#"><i
                                   class="fa fa-calendar"></i></a></span>
                             </div>
                          </div>
                          <button type="submit" data-toggle="tooltip" data-placement="top" title="Search"
                             class="btn btn-custom"><i class="fa fa-search"></i></button>
                       </div>
                    </form>
                    </p>
                    <!--End select input year -->
                    <div class="chart-responsive">
                       <!--Sales Chart Canvas -->
                       <canvas id="buyers" style="height:40vh; width: 100%;" class="chart-responsive"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                 </div>
                 <!-- ./box-body -->
              </div>
           </div>
        </div>
     </div>
  </div>
</div>
@endsection
