<?php namespace Syscover\Forem\GraphQL\Services;

use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Models\Province;
use Syscover\Forem\Services\ProvinceService;

class ProvinceGraphQLService extends CoreGraphQLService
{
    public function __construct(Province $model, ProvinceService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
