<?php

namespace App\AccessCounter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use App\AccessCounter\ImageWriters\TextSVGImageWriter;
use App\AccessCounter\Counters\Factory as CounterFactory;
use Storage;


class ShowController extends BaseController
{
    public function getCounter(Request $request)
    {
        $factory = new CounterFactory();
        $counterKey = $request->input('key', 'default');
        $counter = $factory->createCounter($counterKey, $request);
        $score = $counter->increase();
        $imageWidth = $request->input('w', null);
        $imageHeight = $request->input('h', null);
        $writer = new TextSVGImageWriter($imageWidth, $imageHeight);
        header("Content-Type: image/png");
        $image = imagecreate(150, 30);
        $back = imagecolorallocate($image, 0, 0, 0);
        $font = imagecolorallocate($image, 0, 255, 0);
        $txt = mb_convert_encoding(str_pad($score, 6, 0, STR_PAD_LEFT), "UTF-8");
        ImageTTFText ($image, 20, 0, 10, 28, $font, app_path('AccessCounter/font.ttf'),$txt);
        imagepng($image);
        imagedestroy($image);
    }
}
