<?php

namespace App\Services;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use \App\Models\Post;
use File;

class PostService
{
    public function store(Request $request)
    {
        try{

            if($request->file('image')){
                $file           =  $request->file('image');
                $uplodedFile    =  $this->uploadImage($file);
                $imagePath      =  \config('self_learn.post_images_store_path').$uplodedFile;
            }

            $data = Post::create([
                'title'       => $request->title,
                'description' => $request->description,
                'image'       => $imagePath

            ]);

            return $data;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    function uploadImage($file){
        $uploadedFileEndPath  = \public_path(config('self_learn.post_images_store_path'));

        $uploadFileName = time()."_".str_replace(" ", "", trim($file->getClientOriginalName(), " "));

        // dump($uploadedFileEndPath);
        // dump($uploadFileName);

        try{
            $upload = $file->move($uploadedFileEndPath, $uploadFileName);
            // dd($upload);
        }catch(\Exception $e){
            \Log::error($e->getMessage());
        }

        return $uploadFileName;

        // dd($uploadDestination);
    }

}
?>
