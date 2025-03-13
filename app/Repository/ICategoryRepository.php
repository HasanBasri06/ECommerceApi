<?php 

namespace App\Repository;

use App\Models\CategoryModel;
use Illuminate\Contracts\Database\Eloquent\Builder;

interface ICategoryRepository {
    public function getAll(): Builder;
}