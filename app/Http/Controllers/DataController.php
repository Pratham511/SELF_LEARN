<?php

namespace App\Http\Controllers;

use File;
use Hash;
use Image;
use Carbon\Carbon;
use App\Models\Datas;
use Illuminate\Http\Request;
// use Intervention\Image\Exception\NotReadableException;

class DataController extends Controller
{
    public function index(Request $request){

        if($request->ajax()){
            $records = Datas::get();
        }else{
            $records = Datas::get();
        }
        return view('welcome',compact('records'));

    }

    public function store(Request $request){

        if($request->ajax()){

            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
            $validator = \Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }
            if($files = $request->file('image')){
                $imageUpload = Image::make($files);
                $originalPath = public_path('image/');
                $originalFileName = str_replace(' ', '', $files->getClientOriginalName());
                $imageName = time().$originalFileName;
                $imageUpload->save($originalPath.time().$originalFileName);
            }

            $data = Datas::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'image'=> $imageName
            ]);

            return response()->json(['data' => $data]);
        }

    }

    public function delete($id){
        $record = Datas::find($id);
        $public_path = public_path("image/{$record->image}");

        // dd($public_path);
        if(File::exists($public_path)){
            unlink($public_path);
        }

        $data = $record->delete();

        return response()->json(['data' => $data]);
    }

    public function edit(Request $request,$id){
        // dd($request->all());
        if($request->ajax()){

            if($files = $request->file('edit_image')){
                $imageUpload = Image::make($files);
                $originalPath = public_path('image/');
                $originalFileName = str_replace(' ', '', $files->getClientOriginalName());
                $imageName = time().$originalFileName;
                $imageUpload->save($originalPath.time().$originalFileName);
            }

            $updateData =  Datas::find($id);
            $updateData->name = !empty($request->edit_name) ? $request->edit_name : '';
            $updateData->email = !empty($request->edit_email) ? $request->edit_email : '';
            $updateData->image = !empty($imageName) ? $imageName : '';

            $updateData->update();
            // dd($updateData);

            return response()->json(['data' => $updateData]);
        }
    }

    public function deleteMultipleRecords(Request $request){

        $ids = explode(',',$request->ids);
        $images = explode(',',$request->images);
        // dd($images);

        $multiple_records =  Datas::whereIn('id',$ids);

        foreach($images as $image){

            $image = parse_url($image);
            $image_path = $image['path'];
            $public_path = public_path($image_path);

            if(File::exists($public_path)){
                unlink($public_path);
            }
        }

        $data = $multiple_records->delete();

        return response()->json(['data' => $data]);
    }
}
