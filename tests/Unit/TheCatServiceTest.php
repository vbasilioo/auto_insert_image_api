<?php

use App\Models\Image;
use App\Services\TheCat\TheCatService;
use Illuminate\Support\Facades\Http;

describe('TheCatService', function() {
    beforeEach(function () {
        $this->service = new TheCatService();
    });

    it('Cadastra uma imagem única ao chamar o fetchOneCat.', function() {
        Http::fake([
            'thecatapi.com/*' => Http::response([
                ['id' => 'test_image_1', 'url' => 'http://example.com/cat1.jpg']
            ], 200)
        ]);
    
        $data = $this->service->fetchOneCat();
    
        expect($data)->toHaveKey('image_id', 'test_image_1');

        expect($data)->toHaveKey('url', 'http://example.com/cat1.jpg');
    });
    
    it('Cadastra a imagem no banco de dados ao chamar fetchOneCat.', function() {
        Http::fake([
            'thecatapi.com/*' => Http::response([
                ['id' => 'test_image_1', 'url' => 'http://example.com/cat1.jpg']
            ], 200)
        ]);
    
        $this->service->fetchOneCat();
    
        $savedImage = Image::where('image_id', 'test_image_1')->first();
    
        expect($savedImage)->not->toBeNull();
        
        expect($savedImage->url)->toEqual('http://example.com/cat1.jpg');
    });
    
});
