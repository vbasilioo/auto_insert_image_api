<?php

namespace App\Http\Controllers\TheCat;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\TheCat\IndexTheCatRequest;
use App\Services\TheCat\TheCatService;

class TheCatController extends Controller
{
    public function __construct(protected TheCatService $theCatService){}

    /**
     * Fetches a single cat image from The Cat API and returns it.
     *
     * @return \Illuminate\Http\JsonResponse Returns a JSON response with the fetched cat image data and a success message.
     * @throws \App\Exceptions\ApiException Throws an exception if there is an error fetching the cat image from The Cat API.
     */
    public function fetchOneCat(){
        try{
            $data = $this->theCatService->fetchOneCat();
            return ReturnApi::success($data, 'Um novo gatinho foi inserido na galeria.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao buscar um gatinho no The Cat API.', $ex->getCode() ?? 500);
        }
    }
}
