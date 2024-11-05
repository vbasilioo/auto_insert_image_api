<?php

use App\Models\Image;
use App\Services\Image\ImageService;

$service = new ImageService();

describe('ImageService', function(){
    beforeEach(function () {
        $this->service = new ImageService();
    });

    it('Paginação das imagens.', function() {
        Image::factory()->count(10)->create();
        
        $data = $this->service->index(['per_page' => 5, 'page' => 1]);
    
        expect($data['total'])->toEqual(10);
        
        expect(count($data['data']))->toEqual(5);
    });
    
    
    it('Retorna uma lista vazia quando não há imagens.', function () {
        $data = $this->service->index(['per_page' => 5, 'page' => 1]);
    
        expect($data['total'])->toEqual(0);
    
        expect($data['data'])->toBeEmpty();
    });
});