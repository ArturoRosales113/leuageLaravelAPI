<?php

namespace App\Http\Traits;
use Illuminate\Support\Str;
use File;


trait ImageManagerTrait {

    public function createIcon($iconFile)
    {
        $file_name = $random = Str::random(40) . '.' . $iconFile->getClientOriginalExtension();
        $iconFile->move('img/icons/', $file_name);
        $img_path = 'img/icons/' . $file_name;

        return $img_path;
    }

    public function createImage($imageFile)
    {
        $file_name = $random = Str::random(40) . '.' . $imageFile->getClientOriginalExtension();
        $imageFile->move('img/images/', $file_name);
        $img_path = 'img/images/' . $file_name;

        return $img_path;
    }

    public function createPDF($pdfFile)
    {
        $file_name = $random = Str::random(40) . '.' . $pdfFile->getClientOriginalExtension();
        $pdfFile->move('pdf/', $file_name);
        $pdf_path = 'pdf/' . $file_name;

        return $pdf_path;
    }

    public function deleteAsset($filePath)
    {
        $filename = public_path($filePath);
        File::delete($filename);
    }

}