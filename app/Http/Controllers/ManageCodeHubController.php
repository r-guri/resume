<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\topheaders; 
use App\Models\maincount; 
use App\Models\commoncontent; 
use App\Models\about; 
use App\Models\choose; 
class ManageCodeHubController extends Controller
{
    public function topHeaderUpdate(Request $request){
        $data = $request->validate([
            'address' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'youtube' => 'required',
            'linkedin' => 'required'
        ]);
        try {
            $topheader = topheaders::find(1);
            $topheader->address = $data['address'];
            $topheader->email = $data['email'];
            $topheader->mobile = $data['mobile'];
            $topheader->facebook = $data['facebook'];
            $topheader->instagram = $data['instagram'];
            $topheader->twitter = $data['twitter'];
            $topheader->youtube = $data['youtube'];
            $topheader->linkedin = $data['linkedin'];
           $a= $topheader->save();
                if($a)
                {
                    return redirect('/topHeader')->with('success', 'Successfully Updated');       
                }
                else{
                    return redirect('/topHeader')->with('error', "I'm sorry !! try after sometime");
                }
        } catch (\Exception $e) {
            dd('Error: ' . $e->getMessage());
        }
    }
    public function mainCountUpdateAction(Request $request){
        $data = $request->validate([
            'first' => 'required',
            'second' => 'required',
            'third' => 'required',
            'firstValue' => 'required',
            'secondValue' => 'required',
            'thirdValue' => 'required'
           
        ]);
        try {

           
            $runMainCount = maincount::find(1);
            $runMainCount->happClientsTitle = $data['first'];
            $runMainCount->projectDoneTitle = $data['second'];
            $runMainCount->winAwardsTitle = $data['third'];
            $runMainCount->happyClientsValue = $data['firstValue'];
            $runMainCount->projectDoneValue = $data['secondValue'];
            $runMainCount->winAwardValue = $data['thirdValue'];
           
           $a= $runMainCount->save();
        //    dd($data);
                if($a)
                {
                    return redirect('/ViewCount')->with('success', 'Successfully Updated');       
                }
                else{
                    return redirect('/ViewCount')->with('error', "I'm sorry !! try after sometime");
                }
        } catch (\Exception $e) {
            dd('Error: ' . $e->getMessage());
        }
    }
    public function aboutUpdateAction(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'disctitle' => 'required'  
        ]);
        try { 
            $runAbout = about::find(1);
            $runAbout->aboutUsTitle = $data['title'];
            $runAbout->aboutSubTitle = $data['subtitle'];
            $runAbout->aboutDisc = $data['disctitle'];  
           $a= $runAbout->save();
        //    dd($data);
                if($a)
                {
                    return redirect('/ViewAbout')->with('success', 'Successfully Updated');       
                }
                else{
                    return redirect('/ViewAbout')->with('error', "I'm sorry !! try after sometime");
                }
        } catch (\Exception $e) {
            dd('Error: ' . $e->getMessage());
        }
    }
    public function chooseUpdateAction(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'disctitle' => 'required'  
        ]);
        try { 
            $runAbout = choose::find(1);
            $runAbout->aboutUsTitle = $data['title'];
            $runAbout->aboutSubTitle = $data['subtitle'];
            $runAbout->aboutDisc = $data['disctitle'];  
           $a= $runAbout->save();
        //    dd($data);
                if($a)
                {
                    return redirect('/ViewChoose')->with('success', 'Successfully Updated');       
                }
                else{
                    return redirect('/ViewChoose')->with('error', "I'm sorry !! try after sometime");
                }
        } catch (\Exception $e) {
            dd('Error: ' . $e->getMessage());
        }
    }

}
