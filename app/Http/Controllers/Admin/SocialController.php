<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocialRequest;
use App\Http\Requests\UpdateSocialRequest;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
        $active = 'social';
        $social = Social::find(1);
        return view('admin.pages.settings.social', compact('active', 'social'));
    }

    public function create()
    {
        //
    }

    public function store(StoreSocialRequest $request)
    {
        $attributes = $request->validated();
        try{
          Social::create($attributes);
          $notification = array(
            'message' => 'Social setting added successfully.',
            'alert-type' => 'success'
          );
        } catch (\Throwable $th) {
          $notification = array(
            'message' => 'Problem adding social setting.',
            'alert-type' => 'error'
          );
        }
        return redirect()->route('social.index')->with($notification);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateSocialRequest $request, Social $social)
    {
      $attributes = $request->validated();
      try{
        $social->update($attributes);
        $notification = array(
          'message' => 'Social setting updated successfully.',
          'alert-type' => 'success'
        );
      } catch (\Throwable $th) {
        $notification = array(
          'message' => 'Problem updating social setting.',
          'alert-type' => 'error'
        );
      }
      
      return redirect()->route('social.index')->with($notification);
    }

    public function destroy($id)
    {
        //
    }
}
