<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Team;
use App\Models\Contact;
use App\Models\Feature;
use App\Models\Pricing;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\AboutModal;
use App\Models\SliderModal;
use App\Models\Testimonial;
use App\Models\VisitorModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
            $visitorIp = $_SERVER['REMOTE_ADDR'];
            date_default_timezone_set('Asia/Dhaka');
            $visitTime = date("Y-m-d H:i:sa");


            $sliders= SliderModal::where('status',1)->orderBy('id','desc')->take(3)->get();
            $abouts= json_decode(AboutModal::orderBy('id','desc')->take(1)->get() );
            $services = Service::where('status',1)->orderBy('id','ASC')->take(6)->get();
            $features = Feature::where('status',1)->orderBy('id','ASC')->take(6)->get();
            $portfolios =Portfolio::where('status',1)->orderBy('id','ASC')->get();
            $pricings = Pricing::where('status',1)->orderBy('id','ASC')->take(4)->get();
            $teams = Team::where('status',1)->orderBy('id','ASC')->take(4)->get();
            $testimonials = Testimonial::where('status',1)->orderBy('id','ASC')->take(4)->get();
            $blogs = Blog::where('status',1)->orderBy('id','ASC')->take(3)->get();
            $contacts = Contact::first();

            return view ('home',[
                "sliders"=>$sliders,
                "abouts"=>$abouts,
                "services"=>$services,
                "features"=>$features,
                "portfolios"=>$portfolios,
                "pricings"=>$pricings,
                "teams"=>$teams,
                "testimonials"=>$testimonials,
                "blogs"=>$blogs,
                "contacts"=>$contacts,
            ]);

    }

}

