<?php

namespace App\Http\Controllers\Backend;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seo;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function SiteSetting()
    {
        $setting = SiteSetting::find(1);
        return view('backend.setting.setting_update', compact('setting'));
    }



    public function SiteSettingUpdate(Request $request, $id)
    {
        if ($request->file('logo')) {

            $sitesetting = SiteSetting::findOrFail($id);

            $sitesetting->logo;
            // $filename = null;
            if (isset($request->logo)) {
                $image = $request->file('logo');
                $filename = time().'.'.$request->file('logo')->getClientOriginalName();
                // .'.'.$request->file('logo')->getClientOriginalExtension();
                Storage::putFileAs('public/logo', $request->file('logo'), $filename);
                // echo 
                $destinationPath =  storage_path('app/public/logo');
                // exit;
                $img = Image::make($image->path());
                $img->resize(600, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$filename);

                //remove old image
                if($sitesetting->logo){
                    $old_filename = public_path("storage\logo\\" . $sitesetting->logo);
                    if (file_exists($old_filename) != false) {
                        unlink($old_filename);
                    }
                }

                $sitesetting->logo = $filename;
            }

            $sitesetting->phone_one = $request->input('phone_one');
            $sitesetting->phone_two = $request->input('phone_two');
            $sitesetting->email = $request->input('email');
            $sitesetting->company_name = $request->input('company_name');
            $sitesetting->company_address = $request->input('company_address');
            $sitesetting->facebook = $request->input('facebook');
            $sitesetting->twitter = $request->input('twitter');
            $sitesetting->linkedin = $request->input('linkedin');
            $sitesetting->youtube = $request->input('youtube');
        
            $sitesetting->update();
            if ($sitesetting) {
                $notification = array(
                    'message' => 'Setting Updated With Image Successfully',
                    'alert-type' => 'info'
                );
                return redirect()->back()->with($notification);
            } else {
                return redirect()->back()->with('fail', 'Brand Updated Failed');
            }

        }else {

            $sitesetting = SiteSetting::findOrFail($id);

            $sitesetting->phone_one = $request->input('phone_one');
            $sitesetting->phone_two = $request->input('phone_two');
            $sitesetting->email = $request->input('email');
            $sitesetting->company_name = $request->input('company_name');
            $sitesetting->company_address = $request->input('company_address');
            $sitesetting->facebook = $request->input('facebook');
            $sitesetting->twitter = $request->input('twitter');
            $sitesetting->linkedin = $request->input('linkedin');
            $sitesetting->youtube = $request->input('youtube');
        
            $sitesetting->update();
            if ($sitesetting) {
                $notification = array(
                    'message' => 'Setting Updated Successfully',
                    'alert-type' => 'info'
                );
                return redirect()->back()->with($notification);
            }
        }
    }




    public function SeoSetting()
    {
        $seo = Seo::find(1);
        return view('backend.setting.seo_update', compact('seo'));
    }



    public function SeoSettingUpdate(Request $request, $id)
    {
        $seo = Seo::findOrFail($id);

        $seo->meta_title = $request->input('meta_title');
        $seo->meta_author = $request->input('meta_author');
        $seo->meta_keyword = $request->input('meta_keyword');
        $seo->meta_description = $request->input('meta_description');
        $seo->google_analytics = $request->input('google_analytics');
    
        $seo->update();
        if ($seo) {
            $notification = array(
                'message' => 'Seo Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
    }


}
