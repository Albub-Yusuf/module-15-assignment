<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 


class PostController extends Controller
{
    function __construct(){
        $this->middleware('log');
   }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Post List';
        $data['posts'] = Post::orderBy('id','DESC')->get();
        return view('post.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Create Post';
        return view('post.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $title = $request->title;
        $author = $request->author;
        $details = $request->description;
        $featured_image = '';
        
        //File Upload product
        if($request->hasFile('featured_image')){
            $file = $request->file('featured_image');
            $file->move('assets/img/posts/',$file->getClientOriginalName());
            $featured_image = 'assets/img/posts/'.$file->getClientOriginalName();
        }

            Post::create([
                'title'=> $title,
                'author' => $author,
                'description' => $details,
                'featured_image' => $featured_image
            ]);


       return redirect('/Post')->with('message','Post Created Successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $data['postInfo'] = Post::where('id',$id)->first();  
        return view('post.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = 'Post Edit';
        $data['postInfo'] = Post::where('id',$id)->first();  
        return view('post.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $title = $request->title;
        $author = $request->author;
        $details = $request->description;
        $featured_image = '';
      

         //File Upload
        
         
             if($request->hasFile('featured_image')){
                 $file = $request->file('featured_image');
                 $file->move('assets/img/posts/',$file->getClientOriginalName());
                 File::delete($request->file);
                 $featured_image = 'assets/img/posts/'.$file->getClientOriginalName();
             }

            
 
         
         if($featured_image != NULL){
             Post::where('id',$id)->update([
                'featured_image'=>$featured_image
             ]);
         }

      

         if($featured_image === ""){
            $featured_image = $request->image_address;
            Post::where('id',$id)->update([
                'featured_image'=>$featured_image
             ]);
            
         }


         Post::where('id',$id)->update([
                    'title'=> $title,
                    'author' => $author,
                    'description' => $details,
                   
            ]);


       return redirect('/Post')->with('message','post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::where('id',$id)->delete();
        return redirect('/Post')->with('message','Post deleted successfully!');
    }
}
