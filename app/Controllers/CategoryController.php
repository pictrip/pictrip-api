<?php

namespace App\Controllers;

use App\DTO\CategorySearchParams;
use App\Repositories\CategoryRepository;
use App\Requests\CategoryRequest;
use App\Resources\CategoryResource;

class CategoryController
{
    public function __invoke(CategoryRequest $request, CategoryRepository $repository)
    {
        $params = new CategorySearchParams($request->limit);

        if ($request->name) {
            $params->setName($request->name);
        }


        $categories = $repository->search($params);

        return CategoryResource::collection($categories);
    }
}