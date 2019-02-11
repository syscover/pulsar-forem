<?php namespace Syscover\Forem\GraphQL\Services;

use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Services\CategoryService;
use Syscover\Forem\Models\Category;

class CategoryGraphQLService extends CoreGraphQLService
{
    protected $model = Category::class;
    protected $service = CategoryService::class;
}
