<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Country;
use App\Models\Course;
use App\Models\HeroImage;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(){
        $courses = Course::latest()->get();
        $countries = Country::latest();
        $blogs = Blog::latest()->limit(3)->get();
        $testomonials = Testimonial::latest()->get();
        $header_image = HeroImage::latest()->first();
        return view('frontend.pages.index', compact(['courses', 'countries','blogs','testomonials','header_image']));
    }
}
