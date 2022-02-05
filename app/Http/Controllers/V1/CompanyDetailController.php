<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
      $rules = $this->company_detail->getRules();
      $request->validate($rules);
      $data = $request->all();
      $data['company_name'] = $request->company_name;
      $data['company_registration'] = $request->company_registration;
      $data['vat'] = $request->vat;
      $data['contact_person'] = $request->contact_person;
      $data['company_address'] = $request->company_address;
      $data['map'] = $request->map;
      $data['country_id'] = $request->country_id;
      $data['city'] = $request->city;
      $data['zip_code'] = $request->zip_code;
      $data['primary_number'] = $request->primary_number;
      $data['secondary_number'] = $request->secondary_number;
      $data['email'] = $request->email;
      $data['website'] = $request->website;
      $this->company_detail->fill($data);
      $status = $this->company_detail->save();
      if($status){
        $notification = array(
          'message' => 'Company detail added successfully.',
          'alert-type' => 'success'
        );
      } else {
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
    public function update(Request $request, $id)
    {
      $this->company_detail = $this->company_detail->find($id);
      if(!$this->company_detail) {
        $notification = array(
          'message' => 'Theme not found!',
          'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
      }
      $rules = $this->company_detail->getRules('update');
      $request->validate($rules);
      $data = $request->all();
      $this->company_detail->fill($data);
      $status = $this->company_detail->save();
      if($status){
        $notification = array(
          'message' => 'Company detail updated successfully.',
          'alert-type' => 'success'
        );
      } else {
        $notification = array(
          'message' => 'Problem updating company detail.',
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
