<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class StudentService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the students service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the authors service
     * @var string
     */
    public $secret;


    public function __construct()
    {
        $this->baseUri = config('services.students.base_uri');
        $this->secret = config('services.students.secret');
    }

    /**
     * Obtain the full list of student from the teacher service
     * @return string
     */
    public function obtainStudents()
    {
        return $this->performRequest('GET', '/students');
    }

    /**
     * Create one student using the student service
     * @return string
     */
    public function createStudent($data)
    {
        return $this->performRequest('POST', '/students', $data);
    }

    /**
     * Obtain one single student from the student service
     * @return string
     */
    public function obtainStudent($student)
    {
        return $this->performRequest('GET', "/students/{$student}");
    }

    /**
     * Update an instance of student using the student service
     * @return string
     */
    public function editStudent($data, $student)
    {
        return $this->performRequest('PUT', "/students/{$student}", $data);
    }

    /**
     * Remove a single student using the student service
     * @return string
     */
    public function deleteStudent($student)
    {
        return $this->performRequest('DELETE', "/students/{$student}");
    }


}