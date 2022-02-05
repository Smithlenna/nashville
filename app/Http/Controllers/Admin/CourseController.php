<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data =  Course::latest()->get();
        if($request->ajax()){
            return DataTables::of($data)
            ->addColumn('title', function ($row) {
                return $row['title'];
            })
            ->addColumn('image', function ($row) {
                return $row['image'];
            })
            ->addColumn('summary', function ($row) {
                return $row['summary'];
            })
            ->addColumn('status', function ($row) {
                return $row['status'];
            })
            ->addColumn('created_at', function ($row) {
                return date('d-m-Y', strtotime($row['created_at']));
            })
            ->addColumn('action', function ($row) {
                $btn = '<div class="d-flex">';
                $btn .= view('admin.partials.editBtn', ['route' => route('courses.edit', $row['id'])])->render();
                $btn .= view('admin.partials.deleteBtn', ['route' => route('courses.destroy', $row['id'])])->render();
                $btn .= '</div>';
                return $btn;
            })
            ->rawColumns(['title','created_at' ,'image','status','summary','action'])
            ->make(true);
        }
        return view('admin.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        $data = $request->validated();
        // try{
            if ($request->hasFile('image')) {
                $image_name = uploadImage($request->image, 'courses');
                if ($image_name) {
                    $data['image'] = $image_name;
                }
            }
            $course = Course::create($data);
            $notification = array(
                'message' => 'course created successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('courses.index')->with($notification);
        // } catch (\Throwable $th) {
        //     $notification = array(
        //         'message' => 'Problem while creating course.',
        //         'alert-type' => 'error'
        //     );
        //     return redirect()->back()->with($notification);
        // }

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
    public function edit(Course $course)
    {
        return view('admin.courses.form',['data'=>$course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $data = $request->validated();
        try{
            if ($request->hasFile('image')) {
                $image_name = uploadImage($request->image, 'coursess');
                if ($image_name) {
                    $data['image'] = $image_name;
                }
            }
            $course->update($data);
            $notification = array(
                'message' => 'course updated successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('courses.index')->with($notification);
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Problem while updating course.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        if($course){
            $notification = array(
                'message' => 'course deleted successfully.',
                'alert-type' => 'success'
            );    
        return redirect()->route('courses.index')->with($notification);
    }
}
}
