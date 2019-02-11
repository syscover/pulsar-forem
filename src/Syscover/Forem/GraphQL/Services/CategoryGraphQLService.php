<?php namespace Syscover\Forem\GraphQL\Services;

use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Services\CategoryService;
use Syscover\Forem\Models\Category;

class CategoryGraphQLService extends CoreGraphQLService
{
    public function __construct(Category $model, CategoryService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
