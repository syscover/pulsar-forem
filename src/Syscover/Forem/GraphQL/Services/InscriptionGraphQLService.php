<?php namespace Syscover\Forem\GraphQL\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Forem\Models\Group;
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
        $group          = Group::find($args['id']);
        $incriptions    = Inscription::where('group_id', $args['id'])
            ->where('exported', false)
            ->get();

        // group inscriptions each 10
        $n = (int)($incriptions->count() / 10);
        if (($incriptions->count() % 10) > 0) $n++;
        $inscriptionGroups = $incriptions->split($n);

        $files = [];
        foreach ($inscriptionGroups as $inscriptionGroup)
        {
            $export = [
                'lista_solicitudes_inscripcion' => []
            ];
            foreach ($inscriptionGroup as $inscription)
            {
                $export['lista_solicitudes_inscripcion'][] = [
                    'solicitud_inscripcion' => [
                        'expediente_grupo'      => $inscription->code,
                        'tiene_registro_clm'    => $inscription->has_registry ? 1 : 0,
                    ]
                ];
            }

            $xml = ArrayToXml::convert($export, ['rootElementName' => 'documento']);

            $filename = $group->id . '--' . Str::uuid() . '.xml';
            $files[] = $filename;
            Storage::disk('local')->put('public/forem/export/' . $filename, $xml);
        }


        // Create zip file
        $zipFile = $group->id . '--' . Str::uuid() . '.zip';
        $pathZipFile = storage_path('app/public/forem/export/' . $zipFile);

        $zip = new \ZipArchive();

        if ($zip->open($pathZipFile, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true)
        {
            foreach ($files as $file)
            {
                if (file_exists(storage_path('app/public/forem/export/' . $file)))
                {
                    info(storage_path('app/public/forem/export/' . $file));
                    $zip->addFile(storage_path('app/public/forem/export/' . $file), $file);
                }

            }
            $zip->close();
        }

        // set like exported

        // delete xml

        return $zipFile;
    }
}
