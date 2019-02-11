<?php namespace Syscover\Forem\GraphQL\Services;

use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Models\Expedient;
use Syscover\Forem\Services\ExpedientService;

class ExpedientGraphQLService extends CoreGraphQLService
{
    public function __construct(Expedient $model, ExpedientService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
