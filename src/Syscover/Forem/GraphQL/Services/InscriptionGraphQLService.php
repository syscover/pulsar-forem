<?php namespace Syscover\Forem\GraphQL\Services;

use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Models\Inscription;
use Syscover\Forem\Services\InscriptionService;

class InscriptionGraphQLService extends CoreGraphQLService
{
    public function __construct(Inscription $model, InscriptionService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
