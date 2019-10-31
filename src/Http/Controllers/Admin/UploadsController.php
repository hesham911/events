<?php

namespace S3geeks\Events\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use S3geeks\Events\Models\uploads;
use Illuminate\Support\Facades\File;

class UploadsController extends Controller
{
    /**
     * @return mixed
     */
    public function dropzone(Request $request)
    {
        $input = $request->all();

        $rules = array(
            'file' => 'image|mimes:png,jpg,jpeg,bmp',
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails())
        {
            return Response::make($validation->errors()->first(), 400);
        }
        $input = $request->file('file');
        $extension = $request->file->getClientOriginalExtension();

        $directory = public_path('upload');
        $filename = time() . '-' . rand() . '.' . $extension;
        $filesize =$request->file('file')->getSize();

        $upload = new uploads();
        $input->move($directory,$filename);
        $upload_success =  $upload->create([
            'name' => $filename,
            'size' => $filesize,
            'type' => 0,
        ]);
        if( $upload_success ) {

            return Response::json([
                'id'=> $upload_success->id,
                'success' => true,
            ], 200);
        } else {
            return Response::json('error', 400);
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function deleteDropzone(Request $request)
    {
        if($request->ajax()) {
            $photo = uploads::findOrFail($request['id']); //Get image by id or desired parameters

            //Delete file record from DB
            $path = public_path('upload').'/'.$photo->name;
            $path = str_replace('\\', '/', $path);
            if(File::exists($path)) {
                $photo->delete();
                File::delete($path);
            }

            return response('Photo deleted', 200); //return success
        }
        return response('Photo unDeleted', 400); //return success
    }

    public function delete(Request $request)
    {
        uploads::findOrFail($request->id)->delete();
    }
}
