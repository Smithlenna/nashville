<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyDetailRequest;
use App\Http\Requests\UpdateCompanyDetailRequest;
use App\Models\CompanyDetail;
use Illuminate\Http\Request;

class CompanyDetailController extends Controller
{
    public function index()
    {
        $active = 'company';
        $data = CompanyDetail::find(1);
        return view('admin.pages.settings.setting', compact('active', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyDetailRequest $request)
    {
      $attributes = $request->validated();
      try{
        CompanyDetail::create($attributes);
        $notification = array(
          'message' => 'Company detail added successfully.',
          'alert-type' => 'success'
        );
      } catch (\Throwable $th) {
        $notification = array(
          'message' => 'Problem adding company detail.',
          'alert-type' => 'error'
        );
      }
      return redirect()->route('company.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyDetailRequest $request, CompanyDetail $company_detail)
    {
      $attributes = $request->validated();
      try{
        $company_detail->update($attributes);
        $notification = array(
          'message' => 'Company detail updated successfully.',
          'alert-type' => 'success'
        );
      } catch (\Throwable $th) {
        $notification = array(
          'message' => 'Problem adding company detail.',
          'alert-type' => 'error'
        );
      }
      return redirect()->route('company.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
