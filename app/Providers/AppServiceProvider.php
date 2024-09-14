<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\topheaders;
use App\Models\navbars;
use App\Models\testimonials;
use App\Models\commoncontent;
use App\Models\maincount;
use App\Models\about;
use App\Models\choose;
use App\Models\FormStep;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }
    public function boot(): void
    {
       
        //global data for topheader
        $topHeaderData=topheaders::all();
        $topHeaderData = json_decode($topHeaderData)[0];
        View::share('topHeaderData', $topHeaderData);
        //////////////////////////////////
        //   navbar 
        $navbarData=navbars::all()->toArray();
        View::share('navbarData', $navbarData);
        /////////////////////////
        $testimonialData=testimonials::all()->toArray();
        View::share('testimonialData', $testimonialData);

        $chooseDataArray=choose::all()->toArray();
        View::share('chooseDataArray', $chooseDataArray);

        $commonDataArray=commoncontent::all()->toArray();
        View::share('commonDataArray', $commonDataArray);

        $mainCountData=maincount::all();
        $mainCountData = json_decode($mainCountData)[0];
        View::share('mainCountData', $mainCountData);

        $aboutData=about::all();
        $aboutData = json_decode($aboutData)[0];
        View::share('aboutData', $aboutData);

        $chooseData=choose::all();
        $chooseData = json_decode($chooseData)[0];
        View::share('chooseData', $chooseData);
        ////////////////////////////////
        $commonData=commoncontent::all();
        $commonData = json_decode($commonData)[0];
          View::share('commonData', $commonData);

     
    }
}
