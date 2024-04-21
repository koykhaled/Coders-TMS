<?php
namespace App\Http\Controllers;

trait UploadImageTrait
{
    public function uploadImage($request, $input = "photo", $data, $folder_name)
    {
        try {
            if ($request->has($input)) {
                $file = $request->file($input);
                $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
                $path = 'photo/' . $folder_name;
                $file_full_name = asset($path . $file_name);
                $file->move($path, $file_name);
                $data->$input = $file_full_name;
                $data->save();
                return true;
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}