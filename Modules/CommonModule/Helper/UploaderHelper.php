<?php

namespace Modules\CommonModule\Helper;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

trait UploaderHelper
{

    public function ifExist($path){

        if ( ! file_exists( public_path($path) ) ){

            mkdir(public_path($path) , 0777 , true);

        }
    }

    /**
     * upload file through $request, Compress it.
     * to the server in public folder: /public/images/{categoryNameFolder}.
     * if_not_exist : create it with 775 permission.
     *
     * @param Request $request
     * @return void
     */
    public function upload($imageFromRequest, $imageFolder, $resize = false)
    {
        $fileName = time() . $imageFromRequest->getClientOriginalName();
        $path = 'images/' . $imageFolder;

        $this->ifExist($path);

        $location = public_path($path . '/' . $fileName);

        $image = Image::make($imageFromRequest);
        $image->save($location, 70);

        # Optional Resize.
        if ($resize == true) {
            $image->resize(600, 600);

            $path = 'images/' . $imageFolder. '/thumb' ;

            $newlocation = public_path($path . '/' . $fileName);

            $this->ifExist($path);

            $image->save($newlocation, 70);
        }


        return $fileName;
    }

    public function uploadFile($fileFromRequest,$fileFolder){

        $fileName = time().'.'.$fileFromRequest->getClientOriginalExtension();
        $location = public_path('files/'. $fileFolder . '/');
        $fileFromRequest->move($location, $fileName);

        return $fileName;

    }

    /**
     * Call upload() func to upload photo album.
     *
     * @param [type] $photos
     * @return void
     */
    public function uploadAlbum($photos, $folder = 'cars')
    {
        foreach ($photos as $album) {
            $imageName = $this->upload($album, $folder);
            $car_photos[] = $imageName;
        }
        return $car_photos;
    }
}
