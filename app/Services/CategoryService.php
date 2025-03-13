<?php 

namespace App\Services;

use App\Enums\StatusEnum;
use App\Repository\ICategoryRepository;

class CategoryService {
    public function __construct(
        private ICategoryRepository $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllByActive() {
        return $this
            ->categoryRepository
            ->getAll()
            ->where('status', StatusEnum::ACTIVE->value)
            ->get();
    }
}