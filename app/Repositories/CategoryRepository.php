<?php

namespace App\Repositories;

use App\DTO\CategorySearchParams;
use App\Models\Category;

class CategoryRepository
{
    public function search(CategorySearchParams $params)
    {
        return Category::query()
            ->when($params->getName(), function ($query, $name){
                return $query->where('name', 'like', '%'.$name.'%');
            })
            ->paginate($params->getLimit());
    }
}