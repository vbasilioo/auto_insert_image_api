<?php

namespace App\Services\Image;

use App\Models\Image;

class ImageService {
    public function index(array $data): array{
        return Image::paginate($data['per_page'], ['*'], 'page', $data['page'])->toArray();
    }
}
