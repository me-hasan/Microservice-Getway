<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Services\StudentService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    use ApiResponser;

     /**
     * The service to consume the student microservice
     * @var AuthorService
     */
    public $studentService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * Return the list of student
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->studentService->obtainStudents());
    }

    /**
     * Create one new student
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->studentService->createStudent($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one student
     * @return Illuminate\Http\Response
     */
    public function show($student)
    {
        return $this->successResponse($this->studentService->obtainStudent($student));
    }

    /**
     * Update an existing student
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $student)
    {
        return $this->successResponse($this->studentService->editStudent($request->all(), $student));
    }

    /**
     * Remove an existing student
     * @return Illuminate\Http\Response
     */
    public function destroy($student)
    {
        return $this->successResponse($this->studentService->deleteStudent($student));
    }
}
