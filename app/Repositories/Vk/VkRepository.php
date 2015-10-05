<?php

namespace App\Repositories\Vk;

class VkRepository implements VkRepositoryInterface
{


    private $VK_APP_ID;
    private $VK_APP_KEY;
    private $VK_APP_TOKEN;
    private $vk;

    function __construct()
    {
        $this->VK_APP_ID = env('VK_APP_ID');
        $this->VK_APP_KEY = env('VK_APP_KEY');
        $this->VK_APP_TOKEN = env('VK_APP_TOKEN');

        $this->vk = new \VK\VK($this->VK_APP_ID, $this->VK_APP_KEY, $this->VK_APP_TOKEN);
    }


    /**
     * Возвращает информацию об аудиозаписях.
     * @param $audioId
     * @return mixed
     */
    public function getAudioById($audioId){
        $audioData = $this->vk->api('audio.getById', array(
            'audios' => $audioId,
        ));

        return $audioData;
    }
}