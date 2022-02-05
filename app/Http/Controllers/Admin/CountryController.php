<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $data =  Country::latest()->get();
        if($request->ajax()){
            return DataTables::of($data)
            ->addColumn('name', function ($row) {
                return $row['name'];
            })
            ->addColumn('image', function ($row) {
                return $row['image'];
            })
            ->addColumn('flag', function ($row) {
                return $row['flag'];
            })
            ->addColumn('cover', function ($row) {
                return $row['cover'];
            })
            ->addColumn('status', function ($row) {
                return $row['status'];
            })
            ->addColumn('created_at', function ($row) {
                return date('d-m-Y', strtotime($row['created_at']));
            })
            ->addColumn('action', function ($row) {
                $btn = '<div class="d-flex">';
                $btn .= view('admin.partials.editBtn', ['route' => route('countries.edit', $row['id'])])->render();
                $btn .= view('admin.partials.deleteBtn', ['route' => route('countries.destroy', $row['id'])])->render();
                $btn .= '</div>';
                return $btn;
            })
            ->rawColumns(['name', 'image', 'cover', 'flag', 'status', 'created_at', 'action'])
            ->make(true);
        }
        return view('admin.pages.countries.countries');
    }

    public function create()
    {
        return view('admin.pages.countries.add_country');
    }

    public function store(StoreCountryRequest $request)
    {
        $attributes = $request->validated();
        try{
            if ($request->hasFile('image')) {
                $image_name = uploadImage($request->image, 'countries');
                $flag_name = uploadImage($request->image, 'countries');
                $cover_name = uploadImage($request->image, 'countries');
                if ($image_name && $flag_name && $cover_name) {
                    $data['image'] = $image_name;
                    $data['flag'] = $flag_name;
                    $data['cover'] = $cover_name;
                }
            }
            Country::create($attributes);
            $notification = array(
                'message' => 'Country created successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('countries.index')->with($notification);
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Problem while creating country.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Country $country)
    {
        return view('admin.pages.countries.add_country', compact('country'));
    }

    public function update(UpdateCountryRequest $request, Country $country)
    {
        $attributes = $request->validated();
        try{
            $country->update($attributes);
            $notification = array(
                'message' => 'Country updated successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('countries.index')->with($notification);
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Problem while updating country.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function destroy(Country $country)
    {
        $country->delete();
        $notification = array(
            'message' => 'Country deleted successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('countries.index')->with($notification);
    }
}
