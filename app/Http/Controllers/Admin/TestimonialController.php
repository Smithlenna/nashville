<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data =  Testimonial::latest()->get();
        if($request->ajax()){
            return DataTables::of($data)
            ->addColumn('name', function ($row) {
                return $row['name'];
            })
            ->addColumn('position', function ($row) {
                return $row['position'];
            })
            ->addColumn('image', function ($row) {
                $image = $row['image'];
                return "<img src='$image'>";
            })
            ->addColumn('status', function ($row) {
                return $row['status'];
            })
            ->addColumn('created_at', function ($row) {
                return date('d-m-Y', strtotime($row['created_at']));
            })
            ->addColumn('action', function ($row) {
                $btn = '<div class="d-flex">';
                $btn .= view('admin.partials.editBtn', ['route' => route('testimonials.edit', $row['id'])])->render();
                $btn .= view('admin.partials.deleteBtn', ['route' => route('testimonials.destroy', $row['id'])])->render();
                $btn .= '</div>';
                return $btn;
            })
            ->rawColumns(['name', 'position', 'image', 'status', 'created_at', 'action'])
            ->make(true);
        }
        return view('admin.pages.testimonials.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.testimonials.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonialRequest $request)
    {
        $attributes = $request->validated();
        try{
            if ($request->hasFile('image')) {
                $image_name = uploadImage($request->image, 'testimonials');
                if ($image_name) {
                    $attributes['image'] = $image_name;
                }
            }
            Testimonial::create($attributes);
            $notification = array(
            'message' => 'Testimonial added successfully.',
            'alert-type' => 'success'
            );
        } catch (\Throwable $th) {
            $notification = array(
            'message' => 'Problem adding testimonial.',
            'alert-type' => 'error'
            );
        }
        return redirect()->route('testimonials.index')->with($notification);
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
    public function edit(Testimonial $testimonial)
    {
        return view('admin.pages.testimonials.form', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $attributes = $request->validated();
        try{
            if ($request->hasFile('image')) {
                $image_name = uploadImage($request->image, 'testimonials');
                if ($image_name) {
                    $attributes['image'] = $image_name;
                }
            }
            $testimonial->update($attributes);
            $notification = array(
                'message' => 'Testimonial updated successfully.',
                'alert-type' => 'success'
            );
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Problem updating testimonial.',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('testimonials.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        try{
            $testimonial->delete();
            $notification = array(
                'message' => 'Testimonial deleted successfully.',
                'alert-type' => 'success'
            );
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Problem deleting testimonials.',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('testimonials.index')->with($notification);
    }
}
