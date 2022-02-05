<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);
        $active = 'theme';
        return view('admin.pages.settings.theme', compact('setting', 'active'));
    }

    public function create()
    {

    }

    public function store(StoreSettingRequest $request)
    {
      $attributes = $request->validated();
      try{
        Setting::create($attributes);
        $notification = array(
          'message' => 'Setting added successfully.',
          'alert-type' => 'success'
        );
      } catch (\Throwable $th) {
        $notification = array(
          'message' => 'Problem adding Setting.',
          'alert-type' => 'error'
        );
      }
      return redirect()->route('settings.index')->with($notification);
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
    public function update(UpdateSettingRequest $request,Setting $setting)
    {
      $attributes = $request->validated();
      try{
        $setting->update($attributes);
        $notification = array(
          'message' => 'Setting updated successfully.',
          'alert-type' => 'success'
        );
      } catch (\Throwable $th) {
        $notification = array(
          'message' => 'Problem updating Setting.',
          'alert-type' => 'error'
        );
      }
      return redirect()->route('settings.index')->with($notification);
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
