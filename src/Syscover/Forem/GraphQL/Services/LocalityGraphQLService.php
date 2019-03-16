<?php namespace Syscover\Forem\GraphQL\Services;

use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Models\Locality;
use Syscover\Forem\Services\LocalityService;

class LocalityGraphQLService extends CoreGraphQLService
{
    public function __construct(Locality $model, LocalityService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
