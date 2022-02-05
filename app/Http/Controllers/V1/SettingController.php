<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $data = Setting::find(1);
        $active = 'theme';
        return view('admin.pages.settings.theme', compact('data', 'active'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
      $rules = Setting::getRules();
      $request->validate($rules);
      $data = $request->all();
      $data['logo'] = $request->logo;
      $data['favicon'] = $request->favicon;
      $data['login_background'] = $request->login_background;
      Setting::fill($data);
      $status = Setting::save();
      if($status){
        $notification = array(
          'message' => 'Theme added successfully.',
          'alert-type' => 'success'
        );
      } else {
        $notification = array(
          'message' => 'Problem adding theme.',
          'alert-type' => 'error'
        );
      }
      return redirect()->route('theme.index')->with($notification);
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
      $this->theme = Setting::find($id);
      if(!$this->theme) {
        $notification = array(
          'message' => 'Theme not found!',
          'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
      }
      $rules = Setting::getRules('update');
      $request->validate($rules);
      $data = $request->all();
      Setting::fill($data);
      $status = Setting::save();
      if($status){
        $notification = array(
          'message' => 'Theme updated successfully.',
          'alert-type' => 'success'
        );
      } else {
        $notification = array(
          'message' => 'Problem updating theme.',
          'alert-type' => 'error'
        );
      }
      return redirect()->route('theme.index')->with($notification);
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
