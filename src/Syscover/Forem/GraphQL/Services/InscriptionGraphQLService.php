<?php namespace Syscover\Forem\GraphQL\Services;

use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Models\Inscription;
use Syscover\Forem\Services\InscriptionService;
use Spatie\ArrayToXml\ArrayToXml;

class InscriptionGraphQLService extends CoreGraphQLService
{
    public function __construct(Inscription $model, InscriptionService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }

    public function export($root, array $args)
    {
        $incriptions = Inscription::where('group_id', $args['id'])
            ->where('exported', false)
            ->get();


        // group inscriptions each 10
        $n = (int)($incriptions->count() / 10);
        if (($incriptions->count() % 10) > 0) $n++;
        $inscriptionsGroups = $incriptions->split($n);


        foreach ($inscriptionsGroups as $inscriptionsGroup)
        {
            // crear XML
        }




        // spatie/array-to-xml
        // create files
        // create zip
        // donwload zip

        return [1, 2, 3];
    }
}
