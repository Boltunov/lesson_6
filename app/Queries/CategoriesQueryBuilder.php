<?php
declare(strict_types=1);

namespace App\Queries;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoriesQueryBuilder extends QueryBuilder
{

    public function getModel(): Builder
    {
        return Category::query();
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->getModel()->with('news')->paginate(10);
    }
}
