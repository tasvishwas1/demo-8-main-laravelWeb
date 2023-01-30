<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use SpacesAPI\Spaces;

class ImageUploadHelper
{
    public static function imageUpload( $files ): string
    {
        $image_path = date('Y') . '/' . date('m');
        if (!File::exists(public_path() . "/" . $image_path)) {
            File::makeDirectory(public_path() . "/" . $image_path, 0777, true);
        }
        $extension = $files->getClientOriginalExtension();
        $destination_path = public_path() . '/' . $image_path;
        $file_name = uniqid() . '.' . $extension;
        $files->move($destination_path, $file_name);
        return $image_path . '/' . $file_name;
    }

//    public static function s3imageUpload( $files ): string
//    {
//        $spaces = new Spaces('KDFEEFEVA5L3GV2T224R', 'USSqi4q55j4NG7n8PnRVYqBjc68rpmWjfOBb7451FMk');
//        $spaces = $spaces->space('orderfy-space-bucket');
//        $image_path = date('Y') . '/' . date('m');
//        if (!File::exists(public_path() . "/" . $image_path)) {
//            File::makeDirectory(public_path() . "/" . $image_path, 0777, true);
//        }
//        $extension = $files->getClientOriginalExtension();
//        $destination_path = public_path() . '/' . $image_path;
//        $file_name = uniqid() . '.' . $extension;
//        $uploadImage = $spaces->uploadFile($files, $image_path . '/' . $file_name);
//        $spaces->file($image_path . '/' . $file_name)->makePublic();
//        return $uploadImage->getURL();
//    }

    public static function logoUpload( $files ): string
    {
        $image_path = 'branding/img/' . date('Y') . '/' . date('m');
        if (!File::exists(public_path() . "/" . $image_path)) {
            File::makeDirectory(public_path() . "/" . $image_path, 0777, true);
        }
        $extension = $files->getClientOriginalExtension();
        $destination_path = public_path() . '/' . $image_path;
        $file_name = uniqid() . '.' . $extension;
        $files->move($destination_path, $file_name);
        return $image_path . '/' . $file_name;
    }

}
