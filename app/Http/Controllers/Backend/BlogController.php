<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function BlogCategory()
    {
        $blogcategory = BlogPostCategory::latest()->get();
        return view('backend.blog.category.category_view', compact('blogcategory'));
    }



    public function BlogCategoryStore(Request $request)
    {
        $request->validate([
            'blog_category_name_en' => 'required|max:100',
            'blog_category_name_bn' => 'required|max:100',
        ],[
            'blog_category_name_en.required' => 'Input Blog Category English Name',
            'blog_category_name_bn.required' => 'Input Blog Category Bangla Name',
        ]);

        BlogPostCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_bn' => $request->blog_category_name_bn,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
            'blog_category_slug_bn' => str_replace(' ', '-', $request->blog_category_name_bn),
            'created_at' => Carbon::now(), 
        ]);

        $notification = array(
            'message' => 'Blog Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }



    public function BlogCategoryEdit($id)
    {
        $blogcategory = BlogPostCategory::findOrFail($id);
        return view('backend.blog.category.category_edit', compact('blogcategory'));
    }



    public function BlogCategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'blog_category_name_en' => 'required|max:100',
            'blog_category_name_bn' => 'required|max:100',
        ],[
            'blog_category_name_en.required' => 'Input Blog Category English Name',
            'blog_category_name_bn.required' => 'Input Blog Category Bangla Name',
        ]);

        BlogPostCategory::findOrFail($id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_bn' => $request->blog_category_name_bn,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
            'blog_category_slug_bn' => str_replace(' ', '-', $request->blog_category_name_bn),
            'created_at' => Carbon::now(), 
        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('blog.category')->with($notification);
    }



    public function BlogCategoryDelete($id)
    {
        $blogcategory = BlogPostCategory::findOrFail($id);
        $blogcategory->delete();
        if ($blogcategory) {
            $notification = array(
                'message' => 'Blog Category Deleted Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } else {
            return redirect()->back()->with('fail', 'Category Deleted Failed');
        }
    }






    //////////////////// Blog Post All Method //////////////////


    public function ListBlogPost()
    {
        $blogpost = BlogPost::with('category')->latest()->get();
        return view('backend.blog.post.post_list', compact('blogpost'));

    }



    public function AddBlogPost()
    {
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.post_add', compact('blogpost', 'blogcategory'));
    }



    public function BlogPostStore(Request $request)
    {
        $request->validate([
            'post_title_en' => 'required|max:100',
            'post_title_bn' => 'required|max:100',
            'post_image' => 'required',
        ],[
            'post_title_en.required' => 'Input Post Title English Name',
            'post_title_bn.required' => 'Input Post Title Bangla Name',
        ]);

        $filename = null;
            if (isset($request->post_image)) {
                $post_image = $request->file('post_image');
                $filename = time().'.'.$request->file('post_image')->getClientOriginalExtension();
                // .'.'.$request->file('post_image')->getClientOriginalExtension();
                Storage::putFileAs('public/post', $request->file('post_image'), $filename);
                // $destinationPath = public_path('post_image_vision');
                $destinationPath =  storage_path('app/public/post');
                // exit;
                // $manager = new Image(['driver' => 'imagick']);
                $img = Image::make($post_image->path());
                $img->resize(900, 600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$filename);
            }
            // $news->post_image = $filename;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_bn' => $request->post_title_bn,
            'post_slug_en' => strtolower(str_replace(' ', '-', $request->post_title_en)),
            'post_slug_bn' => str_replace(' ', '-', $request->post_title_bn),
            'post_image'   => $filename,
            'post_details_en' => $request->post_details_en,
            'post_details_bn' => $request->post_details_bn,
            'created_at'   => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Post Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('list.post')->with($notification);
    }


}
