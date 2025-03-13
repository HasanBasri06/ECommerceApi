<?php

namespace App\Http\Controllers;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ResponseTrait;
    public function __construct(
        private CategoryService $categoryService
    ) {
        $this->categoryService = $categoryService;
    }
    public function getCategories(Request $request)
    {
        $allCategoriesByActive = $this->categoryService->getAllByActive();

        return $this->response(
            ResponseEnum::SUCCESS->value,
            CategoryResource::collection($allCategoriesByActive),
            200,
            'Tüm kategoriler listelendi',
            []
        );
    }
}
