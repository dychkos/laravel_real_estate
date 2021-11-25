<?php


if(!function_exists('upload_image')){
    function upload_image($files,$path)
    {
        $images = array();

        foreach($files as $file){
            $image_name = md5(rand(1000,10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $uploade_path = "uploads/".$path."/";
            $image_url = $uploade_path.$image_full_name;
            $file->move($uploade_path,$image_full_name);
            array_push($images,["filename" => $image_url]);
        }

        return $images;
    }
}
