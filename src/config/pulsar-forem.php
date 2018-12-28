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
        (object)['id' => 14, 'name' => 'D'],
        (object)['id' => 15, 'name' => 'D+E'],
    ],
    'modalities' => [
        (object)['id' => 1, 'name' => 'Modalidad I',    'code' => 'FPTO',   'inscription_type' => 3],
        (object)['id' => 2, 'name' => 'Modalidad II',   'code' => 'FPTD',   'inscription_type' => 4],
        (object)['id' => 3, 'name' => 'Modalidad III',  'code' => 'FPCI',   'inscription_type' => 5],
        (object)['id' => 4, 'name' => 'Modalidad IV',   'code' => 'FPDR',   'inscription_type' => 6],
        (object)['id' => 5, 'name' => 'Modalidad V',    'code' => 'FPFP',   'inscription_type' => null],
        (object)['id' => 6, 'name' => 'Modalidad VI',   'code' => 'FPPE',   'inscription_type' => null],
    ],
    'type_roads' => [
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
        (object)['id' => 19,    'code' => 'GL',   'name' => 'Glorieta'],
        (object)['id' => 20,    'code' => 'GR',   'name' => 'Grupo'],
        (object)['id' => 21,    'code' => 'LU',   'name' => 'Lugar'],
        (object)['id' => 22,    'code' => 'ME',   'name' => 'Mercado'],
        (object)['id' => 23,    'code' => 'MU',   'name' => 'Municipio'],
        (object)['id' => 24,    'code' => 'MZ',   'name' => 'Manzana'],
        (object)['id' => 25,    'code' => 'PA',   'name' => 'Paseo alto'],
        (object)['id' => 26,    'code' => 'PB',   'name' => 'Poblado'],
        (object)['id' => 27,    'code' => 'PG',   'name' => 'Poligono'],
        (object)['id' => 28,    'code' => 'PJ',   'name' => 'Pasaje'],
        (object)['id' => 29,    'code' => 'PQ',   'name' => 'Parque'],
        (object)['id' => 30,    'code' => 'PZ',   'name' => 'Plaza'],
        (object)['id' => 31,    'code' => 'PR',   'name' => 'Prolongación'],
        (object)['id' => 32,    'code' => 'PS',   'name' => 'Paseo'],
        (object)['id' => 33,    'code' => 'RB',   'name' => 'Rambla'],
        (object)['id' => 34,    'code' => 'RD',   'name' => 'Ronda'],
        (object)['id' => 35,    'code' => 'TR',   'name' => 'Travesía'],
        (object)['id' => 36,    'code' => 'UR',   'name' => 'Urbanización']
    ],
    'sectors' => [
        (object)['id' => 1, 'name' => 'Industrias de captación, elevación, conducción, tratamiento, depuración y distribución de agua'],
        (object)['id' => 2, 'name' => 'Industrias de alimentación y bebidas'],
        (object)['id' => 3, 'name' => 'Artes gráficas, manipulados de papel y cartón, editoriales e industrias afines'],
        (object)['id' => 4, 'name' => 'Banca'],
        (object)['id' => 5, 'name' => 'Comercio'],
        (object)['id' => 6, 'name' => 'Construccion'],
    ],
    'genders' => [
        (object)['id' => 0, 'name' => 'Hombre'],
        (object)['id' => 1, 'name' => 'Mujer']
    ],
    'document_types' => [
        (object)['id' => 1, 'name' => 'NAF'],
        (object)['id' => 2, 'name' => 'ISFAS'],
        (object)['id' => 3, 'name' => 'MUTUALISTA']
    ],
    'academic_levels' => [
        (object)['id' => 1, 'academic_id' => 1, 'modality_id' => 3, 'name' => 'Sin estudios',       'specialty' => false, 'date_from' => '01/01/2004', 'date_to' => ''],
        (object)['id' => 2, 'academic_id' => 2, 'modality_id' => 3, 'name' => 'Estudios primarios', 'specialty' => false, 'date_from' => '01/01/2004', 'date_to' => ''],
        (object)['id' => 3, 'academic_id' => 3, 'modality_id' => 3, 'name' => 'Graduado escolar',   'specialty' => false, 'date_from' => '01/01/2004', 'date_to' => ''],
        (object)['id' => 4, 'academic_id' => 4, 'modality_id' => 3, 'name' => 'ESO',                'specialty' => false, 'date_from' => '01/01/2004', 'date_to' => ''],
    ],
    'employment_situations' => [
        (object)['id' => 0, 'name' => 'Desempleado'],
        (object)['id' => 1, 'name' => 'Ocupado'],
        (object)['id' => 2, 'name' => 'Otra']
    ],
    'unemployed_situations' => [
        (object)['id' => 67,    'name' => 'Percibe prestación por desempleo'],
        (object)['id' => 68,    'name' => 'Percibe subsidio por desempleo'],
        (object)['id' => 69,    'name' => 'En paro sin prestación de subsidio'],
        (object)['id' => 70,    'name' => 'Demandante del primer empleo'],
        (object)['id' => 144,   'name' => 'Otros no parados'],
    ],
    'professional_categories' => [
        (object)['id' => 1, 'name' => 'Directivos/as'],
        (object)['id' => 2, 'name' => 'Mandos intermedios'],
        (object)['id' => 3, 'name' => 'Técnicos/as'],
        (object)['id' => 4, 'name' => 'Trabajadores cualificados/as'],
        (object)['id' => 5, 'name' => 'Trabajadores no cualificados/as'],
    ],



    //******************************************************************************************************************
    //***   FOREM
    //******************************************************************************************************************
    'targets' => [
        (object)['id' => 1, 'name' => 'Desempleado'],
        (object)['id' => 2, 'name' => 'Empleado']
    ],
    'assistances' => [
        (object)['id' => 1, 'name' => 'Presencial'],
        (object)['id' => 2, 'name' => 'Teleformación'],
        (object)['id' => 3, 'name' => 'Mixta'],
    ],
    'types' => [
        (object)['id' => 1, 'name' => 'Certificados de profesionalidad'],
        (object)['id' => 2, 'name' => 'Formacion no subvencionada'],
        (object)['id' => 3, 'name' => 'Formacion subvencionada'],
        (object)['id' => 4, 'name' => 'Oposiciones'],
    ],
    'work_situations' => [
        (object)['id' => 1, 'name' => 'Desempleado/a'],
        (object)['id' => 2, 'name' => 'Trabajador/a área pública'],
        (object)['id' => 3, 'name' => 'Trabajador/a ERE (Expediente de Regulación de Empleo)'],
        (object)['id' => 4, 'name' => 'Trabajador/a no PYME (Más de 250 trabajadores)'],
        (object)['id' => 5, 'name' => 'Trabajador/a PYME (Menos de 250 trabajadores)'],
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