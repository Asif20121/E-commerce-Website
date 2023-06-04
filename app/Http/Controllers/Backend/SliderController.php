<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class SliderController extends Controller
{
    public function SliderView()
    {
        $data['sliders'] = Slider::latest()->get();
        $data['categories'] = Category::latest()->get();
        return view('backend.slider.slider_view')->with($data);
    }

    public function SliderStore(Request $request)
    {
        $request->validate([
            'slider_img' => 'required',
        ],[
            'slider_img.required' => 'Plz Select One Image',
        ]);

        $filename = null;
            if (isset($request->slider_img)) {
                $slider_img = $request->file('slider_img');
                $filename = time().'.'.$request->file('slider_img')->getClientOriginalExtension();
                // .'.'.$request->file('slider_img')->getClientOriginalExtension();
                Storage::putFileAs('public/slider', $request->file('slider_img'), $filename);
                // $destinationPath = public_path('slider_img_vision');
                $destinationPath =  storage_path('app/public/slider');
                // exit;
                $img = Image::make($slider_img->path());
                $img->resize(870, 370, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$filename);
            }

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img'   => $filename,
            'category_id'   =>  $request->category_id,
            'subcategory_id'   =>  $request->subcategory_id,
            'subsubcategory_id'   =>  $request->subsubcategory_id,
        ]);

        $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function SliderEdit($id)
    {
        $sliders = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('sliders'));
    }


    public function SliderUpdate(Request $request, $id)
    {
        
        $slider = Slider::find($id);

        $slider->slider_img;
        // $filename = null;
        if (isset($request->slider_img)) {
            $image = $request->file('slider_img');
            $filename = time().'.'.$request->file('slider_img')->getClientOriginalName();
            // .'.'.$request->file('slider_img')->getClientOriginalExtension();
            Storage::putFileAs('public/slider', $request->file('slider_img'), $filename);
            // echo 
            $destinationPath =  storage_path('app/public/slider');
            // exit;
            $img = Image::make($image->path());
            $img->resize(870, 370, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filename);

            //remove old image
            if($slider->slider_img){
                $old_filename = public_path("storage\slider\\" . $slider->slider_img);
                if (file_exists($old_filename) != false) {
                    unlink($old_filename);
                }
            }
            $slider->slider_img = $filename;

            $slider->title = $request->input('title');
            $slider->description = $request->input('description');
            // dd($news);
            $slider->update();

            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('manage-slider')->with($notification);

        }else{
            $slider->title = $request->input('title');
            $slider->description = $request->input('description');
            // dd($news);
            $slider->update();

            $notification = array(
                'message' => 'Slider Updated Without Image Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('manage-slider')->with($notification);
        }

    }



    public function SliderDelete($id)
    {
        $slider = Slider::findOrFail($id);
        $path = public_path("storage\slider\\" . $slider->slider_img );
        if (File::exists($path)) {
            File::delete($path);
        }
        $slider->delete();
        if ($slider) {
            $notification = array(
                'message' => 'Slider Deleted Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } else {
            return redirect()->back()->with('fail', 'Slider Deleted Failed');
        }
    }



    public function SliderInactive($id)
    {
        Slider::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Slider Inactive Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }



    public function SliderActive($id)
    {
        Slider::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Slider Active Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

}
