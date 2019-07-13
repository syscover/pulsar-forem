<?php namespace Syscover\Forem\GraphQL\Services;

use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Models\Trainer;
use Syscover\Forem\Services\TrainerService;

class TrainerGraphQLService extends CoreGraphQLService
{
    public function __construct(Trainer $model, TrainerService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
