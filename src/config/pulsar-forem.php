<?php

return [

    //******************************************************************************************************************
    //***   FOCO
    //******************************************************************************************************************
    'driving_licenses' => [
        (object)['id' => 1, 'name' => 'AM'],
        (object)['id' => 2, 'name' => 'A1'],
        (object)['id' => 3, 'name' => 'A2'],
        (object)['id' => 4, 'name' => 'A'],
        (object)['id' => 5, 'name' => 'B'],
        (object)['id' => 6, 'name' => 'BTP'],
        (object)['id' => 7, 'name' => 'B+E'],
        (object)['id' => 8, 'name' => 'C1'],
        (object)['id' => 9, 'name' => 'C1+E'],
        (object)['id' => 10, 'name' => 'C'],
        (object)['id' => 11, 'name' => 'C+E'],
        (object)['id' => 12, 'name' => 'D1'],
        (object)['id' => 13, 'name' => 'D1+E'],
        (object)['id' => 13, 'name' => 'D'],
        (object)['id' => 14, 'name' => 'D+E'],
    ],
    'modalities' => [
        (object)['id' => 1, 'name' => 'Modalidad I',    'code' => 'FPTO',   'inscription_type' => 3],
        (object)['id' => 2, 'name' => 'Modalidad II',   'code' => 'FPTD',   'inscription_type' => 4],
        (object)['id' => 3, 'name' => 'Modalidad III',  'code' => 'FPCI',   'inscription_type' => 5],
        (object)['id' => 4, 'name' => 'Modalidad IV',   'code' => 'FPDR',   'inscription_type' => 6],
        (object)['id' => 5, 'name' => 'Modalidad V',    'code' => 'FPFP',   'inscription_type' => null],
        (object)['id' => 6, 'name' => 'Modalidad VI',   'code' => 'FPPE',   'inscription_type' => null],
    ],
    'type_road' => [
        (object)['id' => 1,     'code' => 'AD',   'name' => 'Aldea'],
        (object)['id' => 2,     'code' => 'AL',   'name' => 'Alameda'],
        (object)['id' => 3,     'code' => 'AP',   'name' => 'Apartamento'],
        (object)['id' => 4,     'code' => 'AV',   'name' => 'Avenida'],
        (object)['id' => 5,     'code' => 'BA',   'name' => 'Bajada'],
        (object)['id' => 6,     'code' => 'BL',   'name' => 'Bloque'],
        (object)['id' => 7,     'code' => 'BO',   'name' => 'Barrio'],
        (object)['id' => 8,     'code' => 'CA',   'name' => 'Calleja'],
        (object)['id' => 9,     'code' => 'CC',   'name' => 'Centro comercial'],
        (object)['id' => 10,    'code' => 'CH',   'name' => 'Chalet'],
        (object)['id' => 11,    'code' => 'CJ',   'name' => 'Callejón'],
        (object)['id' => 12,    'code' => 'CL',   'name' => 'Calle'],
        (object)['id' => 13,    'code' => 'CM',   'name' => 'Camino'],
        (object)['id' => 14,    'code' => 'CO',   'name' => 'Colonia'],
        (object)['id' => 15,    'code' => 'CR',   'name' => 'Carretera'],
        (object)['id' => 16,    'code' => 'CS',   'name' => 'Caserío'],
        (object)['id' => 17,    'code' => 'CT',   'name' => 'Cuesta'],
        (object)['id' => 18,    'code' => 'ED',   'name' => 'Edificio'],
    ],

    //******************************************************************************************************************
    //***   FOREM
    //******************************************************************************************************************
    'targets' => [
        (object)['id' => 1, 'name' => 'Desempleado'],
        (object)['id' => 2, 'name' => 'Empleado']
    ],
    'types' => [
        (object)['id' => 1, 'name' => 'Certificados de profesionalidad'],
        (object)['id' => 2, 'name' => 'Formacion no subvencionada'],
        (object)['id' => 3, 'name' => 'Formacion subvencionada'],
        (object)['id' => 4, 'name' => 'Oposiciones'],
    ],
    'assists' => [
        (object)['id' => 1, 'name' => 'Presencial'],
        (object)['id' => 2, 'name' => 'Teleformación'],
        (object)['id' => 3, 'name' => 'Mixta'],
    ],
    'genders' => [
        (object)['id' => 1, 'name' => 'Varón'],
        (object)['id' => 2, 'name' => 'Mujer'],
    ],
    'work_situations' => [
        (object)['id' => 1, 'name' => 'Desempleado/a'],
        (object)['id' => 2, 'name' => 'Trabajador/a área pública'],
        (object)['id' => 3, 'name' => 'Trabajador/a ERE (Expediente de Regulación de Empleo)'],
        (object)['id' => 4, 'name' => 'Trabajador/a no PYME (Más de 250 trabajadores)'],
        (object)['id' => 5, 'name' => 'Trabajador/a PYME (Menos de 250 trabajadores)'],
    ],
    'unemployed_situations' => [
        (object)['id' => 1, 'name' => 'Otros no parados'],
        (object)['id' => 2, 'name' => 'Demandante del primer empleo'],
        (object)['id' => 3, 'name' => 'En paro sin prestación de subsidio'],
        (object)['id' => 4, 'name' => 'Percibe prestación por desempleo'],
        (object)['id' => 5, 'name' => 'Percibe subsidio por desempleo'],
    ],
    'availabilities' => [
        (object)['id' => 1, 'name' => 'Albacete'],
        (object)['id' => 2, 'name' => 'Castilla la Mancha'],
        (object)['id' => 3, 'name' => 'Ciudad Real'],
        (object)['id' => 4, 'name' => 'Cuenca'],
        (object)['id' => 5, 'name' => 'Formación Online'],
        (object)['id' => 6, 'name' => 'Guadalajara'],
        (object)['id' => 7, 'name' => 'Toledo'],
    ],
    'expertises' => [
        (object)['id' => 1, 'name' => '3 Años trabajando o más'],
        (object)['id' => 2, 'name' => 'De 1 a 3 años trabajados'],
        (object)['id' => 3, 'name' => 'Menos de 1 año tarbajado'],
        (object)['id' => 4, 'name' => 'Ninguna']
    ],
    'trainings' => [
        (object)['id' => 1, 'name' => 'Ninguna'],
        (object)['id' => 2, 'name' => 'De 1 a 100 horas'],
        (object)['id' => 3, 'name' => 'De 100 a 300 horas'],
        (object)['id' => 4, 'name' => '300 horas o más']
    ],
    'profiles' => [
        (object)['id' => 1, 'name' => 'Formador/a'],
        (object)['id' => 2, 'name' => 'Proyectos'],
    ],
];