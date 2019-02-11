<?php namespace Syscover\Forem\GraphQL\Services;

use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Services\EmploymentOfficeService;
use Syscover\Forem\Models\EmploymentOffice;

class EmploymentOfficeGraphQLService extends CoreGraphQLService
{
    protected $model = EmploymentOffice::class;
    protected $service = EmploymentOfficeService::class;
}
