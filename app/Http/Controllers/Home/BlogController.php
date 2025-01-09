<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blog;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function HomeBlog()
    {

        $blogs = Blog::latest()->paginate(9);
        return view('frontend.blog_page', compact('blogs'));
    } //End Method

    public function AllBlog()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('admin.blogs.blogs_all', compact('blogs'));
    } // End Method

    public function AddBlog()
    {

        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.blogs_add', compact('categories'));
    } // End Method

    public function StoreBlog(Request $request)
    {

        $validateData = $request->validate([
            'blog_title' => 'required',
            'blog_image' => 'required',
            'blog_description' => 'required',
        ]);


        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

        // create image manager with desired driver
        $manager = new ImageManager(new Driver());


        // read image from file system
        $image2 = $manager->read($image);

        $image2->scale(width: 730);



        $blog_id = Blog::insertGetId([

            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'blog_image' => '',
            'created_at' => now(),

        ]);


        $path = public_path('upload/blogs/' . $blog_id . '/');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        $image2->save('upload/blogs/' . $blog_id . '/' . $name_gen);
        $save_url = 'upload/blogs/' . $blog_id . '/' . $name_gen;

        Blog::findOrFail($blog_id)->update([
            'blog_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Blog Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);
    } // End Method

    public function EditBlog($id)
    {

        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.blogs_edit', compact('blogs', 'categories'));
    } // End Method

    public function UpdateBlog(Request $request)
    {

        $blog_id = $request->id;



        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

            // create image manager with desired driver
            $manager = new ImageManager(new Driver());


            // read image from file system
            $image2 = $manager->read($image);

            // resize image proportionally to 300px width
            $image2->scale(width: 730);

            $image2->save('upload/blogs/' . $blog_id . '/' . $name_gen);
            $save_url = 'upload/blogs/' . $blog_id . '/' . $name_gen;


            $homeheader_old_photo = Blog::findOrFail($blog_id);
            $img = $homeheader_old_photo->blog_image;
            if (file_exists($img)) {
                unlink($img);
            }

            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,

            ]);
            $notification = array(
                'message' => 'Blog Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.blog')->with($notification);
        } else {

            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,

            ]);

            $notification = array(
                'message' => 'Blog Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.blog')->with($notification);
        } // end Else

    } // End Method



    public function DeleteBlog($id)
    {

        $blogs = Blog::findOrFail($id);

        $path = public_path('upload/blogs/' . $id . '/');
        if (file_exists($path)) {
            File::deleteDirectory($path);
        }

        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 




    public function BlogDetails($id)
    {
        $allblogs = Blog::latest()->limit(3)->get();
        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('frontend.blog.blog_details', compact('blogs', 'allblogs', 'categories'));
    } // End Method 

    public function CategoryBlog($id)
    {

        $blogpost = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->paginate(9);
        $categoryname = BlogCategory::findOrFail($id);
        return view('frontend.cat_blog_details', compact('blogpost', 'categoryname'));
    } // End Method 
}
