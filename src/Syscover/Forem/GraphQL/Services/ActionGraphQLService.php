<?php namespace Syscover\Forem\GraphQL\Services;

use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Models\Action;
use Syscover\Forem\Services\ActionService;

class ActionGraphQLService extends CoreGraphQLService
{
    protected $model = Action::class;
    protected $serviceClassName = ActionService::class;
}
