<?php

return [
    'teachers' => [
        'base_uri' => env('TEACHERS_SERVICE_BASE_URL'),
        'secret' => env('TEACHERS_SERVICE_SECRET'),
       
    ],

    'students' => [
        'base_uri' => env('STUDENTS_SERVICE_BASE_URL'),
        'secret' => env('STUDENTS_SERVICE_SECRET'),
        
    ],
];