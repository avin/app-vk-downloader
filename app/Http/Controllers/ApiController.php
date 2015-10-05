<?php namespace App\Http\Controllers;

use App\Repositories\Vk\VkRepositoryInterface;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ApiController extends BaseController
{

    /**
     * Generates result response object
     *
     * @param mixed  $data
     * @param string $message
     *
     * @return array
     */
    private function makeResult($data, $message)
    {
        $result = array();
        $result['flag'] = true;
        $result['message'] = $message;
        $result['data'] = $data;
        return $result;
    }

    /**
     * Generates error response object
     *
     * @param int    $errorCode
     * @param string $message
     * @param mixed  $data
     *
     * @return array
     */
    private function makeError($errorCode, $message, $data = array())
    {
        $error = array();
        $error['flag'] = false;
        $error['message'] = $message;
        $error['code'] = $errorCode;
        if(!empty($data))
            $error['data'] = $data;
        return $error;
    }

    /**
     * Получить информацю об аудио файле по ID
     * @param Request $request
     * @param VkRepositoryInterface $vkRepository
     * @return array
     */
    public function getAudioData(Request $request, VkRepositoryInterface $vkRepository){

        $audioId = $request->input('audioId');
        if (! $audioId){
            return $this->makeError(0, 'audioId param is empty');
        }

        $audioData = $vkRepository->getAudioById($audioId);
        if (array_get($audioData, 'response')){
            return $this->makeResult($audioData, 'success');
        }

        return $this->makeError(1, 'invalid data');
    }
}
