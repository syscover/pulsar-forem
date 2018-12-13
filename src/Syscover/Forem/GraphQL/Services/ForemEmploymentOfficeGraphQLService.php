<?php namespace Syscover\Forem\GraphQL\Services;

use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Services\EmploymentOfficeService;
use Syscover\Forem\Models\EmploymentOffice;

class ForemEmploymentOfficeGraphQLService extends CoreGraphQLService
{
    protected $modelClassName = EmploymentOffice::class;
    protected $serviceClassName = EmploymentOfficeService::class;
}