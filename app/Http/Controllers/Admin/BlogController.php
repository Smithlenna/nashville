<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data =  Blog::latest()->get();
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
            ->addColumn('created_at', function ($row) {
                return date('d-m-Y', strtotime($row['created_at']));
            })
            ->addColumn('action', function ($row) {
                $btn = '<div class="d-flex">';
                $btn .= view('admin.partials.editBtn', ['route' => route('blogs.edit', $row['id'])])->render();
                $btn .= view('admin.partials.deleteBtn', ['route' => route('blogs.destroy', $row['id'])])->render();
                $btn .= '</div>';
                return $btn;
            })
            ->rawColumns(['title','created_at' ,'image', 'summary','action'])
            ->make(true);
        }
        return view('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();
        try{
            if ($request->hasFile('image')) {
                $image_name = uploadImage($request->image, 'blogss');
                if ($image_name) {
                    $data['image'] = $image_name;
                }
            }
            $blog = Blog::create($data);
            $notification = array(
                'message' => 'Blog created successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('blogs.index')->with($notification);
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Problem while creating blog.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.form',['data'=>$blog]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request,  Blog $blog)
    {
        $data = $request->validated();
        try{
            if ($request->hasFile('image')) {
                $image_name = uploadImage($request->image, 'blogss');
                if ($image_name) {
                    $data['image'] = $image_name;
                }
            }
            $blog->update($data);
            $notification = array(
                'message' => 'blog updated successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('blogs.index')->with($notification);
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Problem while updating blog.',
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
    public function destroy(Blog $blog)
    {
        $blog->delete();
        if($blog){
            $notification = array(
                'message' => 'blog deleted successfully.',
                'alert-type' => 'success'
            );    
        return redirect()->route('blogs.index')->with($notification);
    }
    }
}
