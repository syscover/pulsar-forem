<?php namespace Syscover\Forem\GraphQL\Services;

use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Models\Profile;
use Syscover\Forem\Services\ProfileService;

class ProfileGraphQLService extends CoreGraphQLService
{
    public function __construct(Profile $model, ProfileService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
