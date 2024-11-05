<?php

namespace App\Http\Controllers\Images;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Image\IndexImageRequest;
use App\Http\Requests\Image\StoreImageRequest;
use App\Services\Image\ImageService;

class ImageController extends Controller
{
    public function __construct(protected ImageService $imageService){}

    /**
    * Retrieves a list of images based on the provided filters.
    *
    * @param IndexImageRequest $request The validated request containing the filters for the image list.
    *
    * @return \Illuminate\Http\JsonResponse The response containing the success status and message, along with the retrieved image data.
    *
    * @throws \App\Exceptions\ApiException If an error occurs while retrieving the image list.
    */
    public function index(IndexImageRequest $request){
        try{
            $data = $this->imageService->index($request->validated());
            return ReturnApi::success($data, 'Imagens listadas com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao listar as imagens.', $ex->getCode() ?? 500);
        }
    }
}
