<?php

namespace App\Http\Controllers;
use Storage;
use App\Logic\Image\ImageRepository;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    protected $image;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->image = $imageRepository;
    }

    public function getUpload($model,$id)
    {   

        return view('pages.upload', compact('id', 'model'));
        
    }

    public function getUpload3($model,$id)
    {

        return view('pages.upload3', compact('id', 'model'));
    }

    public function postUpload(Request $request)
    {
        $photo = $request->all();
        $response = $this->image->upload($photo,$request->model,$request->id);
        return $response;

    }

    public function deleteUpload()
    {

        $filename = Input::get('id');

        if(!$filename)
        {
            return 0;
        }

        $response = $this->image->delete( $filename );

        return $response;
    }

    public function deleteImage($id)
    {

        $filename = $id;

       // return $filename;

        if(!$filename)
        {
            return 0;
        }

        $response = $this->image->custom_delete( $filename );

        return redirect()->back();
    }

    /**
     * Part 2 - Display already uploaded images in Dropzone
     */

    public function getServerImagesPage($model,$id)
    {
        return view('pages.upload-2', compact('id', 'model'));
    }

    public function getServerImages($model,$id)
    {
        $images = Image::where('model',$model)->where('model_id',$id)->get(['original_name', 'filename']);

        $imageAnswer = [];

        foreach ($images as $image) {
            $imageAnswer[] = [
                'original' => $image->original_name,
                'server' => $image->filename,
                'size' => File::size(public_path('/images/full_size/' . $image->filename))
            ];
        }

        return response()->json([
            'images' => $imageAnswer
        ]);
    }
}
