<?php namespace App\Http\Controllers;

use App\Repositories\Vk\VkRepositoryInterface;
use Laravel\Lumen\Routing\Controller as BaseController;

class AudioController extends BaseController
{
    public function download($id){
        return view('front.download.index', []);
    }
}
