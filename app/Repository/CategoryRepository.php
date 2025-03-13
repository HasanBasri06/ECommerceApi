<?php 

namespace App\Repository;

use App\Models\CategoryModel;
use Illuminate\Contracts\Database\Eloquent\Builder;

class CategoryRepository implements ICategoryRepository {
    public function __construct(
        private CategoryModel $categoryModel
    ) {
        $this->categoryModel = $categoryModel;
    }

    public function getAll(): Builder
    {
        return $this->categoryModel->query();
    }
}