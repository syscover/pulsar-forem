<?php

return [

    //******************************************************************************************************************
    //***   Targets
    //******************************************************************************************************************
    'targets' => [
        (object)['id' => 1, 'name' => 'Desempleado'],
        (object)['id' => 2, 'name' => 'Empleado']
    ],

    //******************************************************************************************************************
    //***   Types
    //******************************************************************************************************************
    'types' => [
        (object)['id' => 1, 'name' => 'Certificados de profesionalidad'],
        (object)['id' => 2, 'name' => 'Formacion no subvencionada'],
        (object)['id' => 3, 'name' => 'Formacion subvencionada'],
        (object)['id' => 4, 'name' => 'Oposiciones'],
    ],

    //******************************************************************************************************************
    //***   Modalities
    //******************************************************************************************************************
    'modalities' => [
        (object)['id' => 1, 'name' => 'Presencial'],
        (object)['id' => 2, 'name' => 'Teleformación'],
        (object)['id' => 3, 'name' => 'Mixta'],
    ],

    //******************************************************************************************************************
    //***   Genders
    //******************************************************************************************************************
    'genders' => [
        (object)['id' => 1, 'name' => 'Varón'],
        (object)['id' => 2, 'name' => 'Mujer'],
    ],

    //******************************************************************************************************************
    //***   Works situation
    //******************************************************************************************************************
    'work_situations' => [
        (object)['id' => 1, 'name' => 'Desempleado/a'],
        (object)['id' => 2, 'name' => 'Trabajador/a área pública'],
        (object)['id' => 3, 'name' => 'Trabajador/a ERE (Expediente de Regulación de Empleo)'],
        (object)['id' => 4, 'name' => 'Trabajador/a no PYME (Más de 250 trabajadores)'],
        (object)['id' => 5, 'name' => 'Trabajador/a PYME (Menos de 250 trabajadores)'],
    ],

    //******************************************************************************************************************
    //***   Unemployed situation
    //******************************************************************************************************************
    'unemployed_situations' => [
        (object)['id' => 1, 'name' => 'Otros no parados'],
        (object)['id' => 2, 'name' => 'Demandante del primer empleo'],
        (object)['id' => 3, 'name' => 'En paro sin prestación de subsidio'],
        (object)['id' => 4, 'name' => 'Percibe prestación por desempleo'],
        (object)['id' => 5, 'name' => 'Percibe subsidio por desempleo'],
    ],

    //******************************************************************************************************************
    //***   Availabilities
    //******************************************************************************************************************
    'availabilities' => [
        (object)['id' => 1, 'name' => 'Albacete'],
        (object)['id' => 2, 'name' => 'Castilla la Mancha'],
        (object)['id' => 3, 'name' => 'Ciudad Real'],
        (object)['id' => 4, 'name' => 'Cuenca'],
        (object)['id' => 5, 'name' => 'Formación Online'],
        (object)['id' => 6, 'name' => 'Guadalajara'],
        (object)['id' => 7, 'name' => 'Toledo'],
    ],

    //******************************************************************************************************************
    //***   Expertises
    //******************************************************************************************************************
    'expertises' => [
        (object)['id' => 1, 'name' => '3 Años trabajando o más'],
        (object)['id' => 2, 'name' => 'De 1 a 3 años trabajados'],
        (object)['id' => 3, 'name' => 'Menos de 1 año tarbajado'],
        (object)['id' => 4, 'name' => 'Ninguna']
    ],

    //******************************************************************************************************************
    //***   Training
    //******************************************************************************************************************
    'trainings' => [
        (object)['id' => 1, 'name' => 'Ninguna'],
        (object)['id' => 2, 'name' => 'De 1 a 100 horas'],
        (object)['id' => 3, 'name' => 'De 100 a 300 horas'],
        (object)['id' => 4, 'name' => '300 horas o más']
    ],

    //******************************************************************************************************************
    //***   Training
    //******************************************************************************************************************
    'profiles' => [
        (object)['id' => 1, 'name' => 'Formador/a'],
        (object)['id' => 2, 'name' => 'Proyectos'],
    ],
];