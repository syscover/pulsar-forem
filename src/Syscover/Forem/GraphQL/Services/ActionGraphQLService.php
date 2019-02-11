<?php namespace Syscover\Forem\GraphQL\Services;

use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Models\Action;
use Syscover\Forem\Services\ActionService;

class ActionGraphQLService extends CoreGraphQLService
{
    public function __construct(Action $model, ActionService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
