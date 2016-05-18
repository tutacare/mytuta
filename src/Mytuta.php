<?php

namespace Tuta\Mytuta;

use Intervention\Image\Facades\Image;
use Storage, File;

class Mytuta {
  public function uploadImage($image, $path, $width, $height)
  {
    $name_of_image = uniqid('TUTAIMG', true) . str_random(5) . '.' . $image->getClientOriginalExtension();
    Storage::put($path.'/'.$name_of_image,  File::get($image));
    $img = Image::make(storage_path('app/'.$path.'/' . $name_of_image));
    $img->resize($width, $height, function ($constraint) {
      $constraint->aspectRatio();
    });
    $img->save();
    return $name_of_image;
  }

  public function uploadImageEdit($image, $path, $image_edit, $width, $height)
  {
    $name_of_image = uniqid('TUTAIMG', true) . str_random(5) . '.' . $image->getClientOriginalExtension();
    Storage::delete($path.'/'.$image_edit);
    Storage::put($path.'/'.$name_of_image,  File::get($image));
    $img = Image::make(storage_path('app/'.$path.'/' . $name_of_image));
    $img->resize($width, $height, function ($constraint) {
      $constraint->aspectRatio();
    });
    $img->save();
    return $name_of_image;
  }

  public function uploadFile($file, $path)
  {
    $file_name = uniqid('TUTAFILE', true) . str_random(5) . '.' . $file->getClientOriginalExtension();
    Storage::put($path.'/'.$file_name, File::get($file));
    return [
        'name' => $file_name,
        'size' => $file->getClientSize(),
        'mime' => $file->getClientMimeType()
    ];
  }

  public function readFile($file, $path)
  {
    $file_result = Storage::get($path . '/' . $file);
    $mimetype = Storage::mimeType($path . '/' . $file);
    return response($file_result, 200)->header('Content-Type', $mimetype);
  }
}
