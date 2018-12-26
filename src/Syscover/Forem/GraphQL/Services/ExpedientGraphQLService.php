<?php namespace Syscover\Forem\GraphQL\Services;

use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Models\Expedient;
use Syscover\Forem\Services\ExpedientService;

class ExpedientGraphQLService extends CoreGraphQLService
{
    protected $modelClassName = Expedient::class;
    protected $serviceClassName = ExpedientService::class;
}