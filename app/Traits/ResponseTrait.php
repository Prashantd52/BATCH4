<?php
namespace App\Traits;

use Illuminate\Http\Request;

trait ResponseTrait
{

    public function upload_file($file,$path)
    {
        $extension=$file->getClientOriginalExtension();
        $fileName=time().'.'.$extension;

        $file->move(public_path($path),$fileName);
        // $file->store($path);

        $finalpath=$path.'/'.$fileName;
        return $finalpath;  
    }
}