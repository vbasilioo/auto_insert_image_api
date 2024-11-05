<?php

namespace App\Services\TheCat;

use App\Exceptions\ApiException;
use App\Models\Image;
use Illuminate\Support\Facades\Http;

class TheCatService{
    public function fetchOneCat(): array{
        $response = Http::theCat()->get('/search', [
            'limit' => 1,
        ]);

        if(!$response)
            throw new ApiException('Erro ao buscar uma imagem no The Cat API.');

        $image = $response->json()[0];

        $existsImage = Image::where('image_id', $image['id'])->first();

        if($existsImage)
            throw new ApiException('A imagem deste lindo gatinho já está cadastrada.');

        $newImage = Image::create([
            'image_id' => $image['id'],
            'url' => $image['url'],
        ]);

        return $newImage->toArray();
    }
}