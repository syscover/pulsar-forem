<?php namespace Syscover\Forem\GraphQL\Services;

use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Services\EmploymentOfficeService;
use Syscover\Forem\Models\EmploymentOffice;

class EmploymentOfficeGraphQLService extends CoreGraphQLService
{
    public function __construct(EmploymentOffice $model, EmploymentOfficeService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
