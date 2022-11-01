<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Services\TeacherService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeacherController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the authors microservice
     * @var AuthorService
     */
    public $teacherService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }

    /**
     * Return the list of teacher
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->teacherService->obtainTeachers());
    }

    /**
     * Create one new teacher
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->teacherService->createTeacher($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one teacher
     * @return Illuminate\Http\Response
     */
    public function show($teacher)
    {
        return $this->successResponse($this->teacherService->obtainTeacher($teacher));
    }

    /**
     * Update an existing teacher
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $teacher)
    {
        return $this->successResponse($this->teacherService->editTeacher($request->all(), $teacher));
    }

    /**
     * Remove an existing teacher
     * @return Illuminate\Http\Response
     */
    public function destroy($teacher)
    {
        return $this->successResponse($this->teacherService->deleteTeacher($teacher));
    }
}
