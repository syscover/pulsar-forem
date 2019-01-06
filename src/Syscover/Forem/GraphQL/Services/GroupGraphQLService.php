<?php namespace Syscover\Forem\GraphQL\Services;

use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Models\Group;
use Syscover\Forem\Services\GroupService;

class GroupGraphQLService extends CoreGraphQLService
{
    protected $modelClassName = Group::class;
    protected $serviceClassName = GroupService::class;
}