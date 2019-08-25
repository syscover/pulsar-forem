<?php namespace Syscover\Forem\GraphQL\Services;

use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Models\Course;
use Syscover\Forem\Services\CourseService;

class CourseGraphQLService extends CoreGraphQLService
{
    public function __construct(Course $model, CourseService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
