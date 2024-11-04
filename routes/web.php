<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AcademicYearController;
use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Admin\FeeHeadController;
use App\Http\Controllers\Admin\FeeStructureController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\AssignSubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\AssignTeacherController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Models\User; // Add this line to import the User model
use App\Events\ChatSent; // Ensure this is also imported if used

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'teacher'], function () {
    Route::group(['middleware' => 'teacher.guest'], function () {
        Route::get('login', [TeacherController::class, 'login'])->name('teacher.login');
        Route::post('authenticate', [TeacherController::class, 'authenticate'])->name('teacher.authenticate');
    });

    Route::group(['middleware' => 'teacher.auth'], function () {
        Route::get('dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
        Route::get('logout', [TeacherController::class, 'logout'])->name('teacher.logout');
        
        // Chat routes
        Route::get('chat/{user_id}', [ChatController::class, 'chatForm'])->name('teacher.chatForm');
        Route::post('chat/{user_id}', [ChatController::class, 'sendMessage'])->name('teacher.sendMessage');
        Route::get('/chat/{recipient}', [ChatController::class, 'viewChat'])->name('viewChat');
        Route::get('teacher/messages', [ChatController::class, 'teacherMessages'])->name('teacher.messages');


    });
});

Route::group(['prefix' => 'student'], function () {
    // Guest routes
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [UserController::class, 'index'])->name('student.login');
        Route::post('authenticate', [UserController::class, 'authenticate'])->name('student.authenticate');
    });

    // Authenticated routes
    Route::group(['middleware' => 'auth'], function () {
        Route::get('dashboard', [UserController::class, 'dashboard'])->name('student.dashboard');
        Route::get('logout', [UserController::class, 'logout'])->name('student.logout');
        Route::get('change-password', [UserController::class, 'changePassword'])->name('student.changePassword');
        Route::post('update-password', [UserController::class, 'updatePassword'])->name('student.updatePassword');
        Route::get('student/profile', [ProfileController::class, 'studentProfile'])->name('student.profile');
        Route::post('student/profile/update', [ProfileController::class, 'updateStudentProfile'])->name('student.profile.update');
        
        // Chat routes
        Route::get('chat/{user_id}', [ChatController::class, 'chatForm'])->name('student.chatForm');
        Route::post('chat/{user_id}', [ChatController::class, 'sendMessage'])->name('sendMessage');
        Route::get('student/messages', [ChatController::class, 'messages'])->name('student.messages');
        Route::get('/search-users', [ChatController::class, 'search'])->name('student.search');
        Route::get('/test-broadcast', function () {
            $user = User::first(); // Get the first user or however you want to fetch a user
        
            // Broadcast the event
            broadcast(new ChatSent($user, 'Test message'));
        
            // Log a message to confirm the event was broadcasted
            \Log::info('Broadcasted ChatSent event with message: Test message');
        
            return 'Broadcast event sent!';
        });
        
        
    });
});
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [AdminController::class, 'index'])->name('admin.login');
        Route::get('register', [AdminController::class, 'register'])->name('admin.register');
        Route::post('login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/admin/profile', [ProfileController::class, 'adminProfile'])->name('admin.profile');
        Route::post('/admin/profile/update', [ProfileController::class, 'updateAdminProfile'])->name('admin.profile.update');
 
        // Academic Year Management
        Route::get('academic', [AcademicYearController::class, 'index'])->name('academic-year.create');
        Route::post('academic', [AcademicYearController::class, 'store'])->name('academic-year.store');
        Route::get('academic-show', [AcademicYearController::class, 'show'])->name('academic-year.show');
        Route::get('academic-edit/{id}', [AcademicYearController::class, 'edit'])->name('academic-year.edit');
        Route::get('academic-delete/{id}', [AcademicYearController::class, 'delete'])->name('academic-year.delete');
        Route::post('academic-update/{id}', [AcademicYearController::class, 'update'])->name('academic-year.update');

        // Class Management
        Route::get('class', [ClassesController::class, 'index'])->name('class.create');
        Route::post('class-create', [ClassesController::class, 'store'])->name('class.store');
        Route::get('class-list', [ClassesController::class, 'show'])->name('class.show');
        Route::get('class-edit/{id}', [ClassesController::class, 'edit'])->name('class.edit');
        Route::get('class-delete/{id}', [ClassesController::class, 'delete'])->name('class.delete');
        Route::post('class-update/{id}', [ClassesController::class, 'update'])->name('class.update');

        // Announcement Management
        Route::get('announcement', [AnnouncementController::class, 'index'])->name('announcement.create');
        Route::post('announcement/store', [AnnouncementController::class, 'store'])->name('announcement.store');
        Route::get('announcement-show', [AnnouncementController::class, 'show'])->name('announcement.show');
        Route::get('announcement-edit/{id}', [AnnouncementController::class, 'edit'])->name('announcement.edit');
        Route::post('announcement-update/{id}', [AnnouncementController::class, 'update'])->name('announcement.update');
        Route::get('announcement-delete/{id}', [AnnouncementController::class, 'delete'])->name('announcement.delete');

        // Fee Management
        Route::get('fee', [FeeHeadController::class, 'index'])->name('fee-head.create');
        Route::post('fee-create', [FeeHeadController::class, 'store'])->name('fee-head.store');
        Route::get('fee-list', [FeeHeadController::class, 'show'])->name('fee-head.show');
        Route::get('fee-edit/{id}', [FeeHeadController::class, 'edit'])->name('fee-head.edit');
        Route::get('fee-delete/{id}', [FeeHeadController::class, 'delete'])->name('fee-head.delete');
        Route::post('fee-head-update/{id}', [FeeHeadController::class, 'update'])->name('fee-head.update');
        
        // Assign Teacher Management
        Route::get('assign-teacher', [AssignTeacherController::class, 'index'])->name('assign-teacher.create');
        Route::get('/admin/subjects-by-class', [AssignTeacherController::class, 'getSubjectsByClass'])->name('getSubjectsByClass');
        Route::post('assign-teacher', [AssignTeacherController::class, 'store'])->name('assign-teacher.store');

        // Teacher Management 
        Route::get('teacher', [TeacherController::class, 'index'])->name('teacher.create');
        Route::post('teacher-create', [TeacherController::class, 'store'])->name('teacher.store');
        Route::get('teacher-list-search', [TeacherController::class, 'search'])->name('teacher.search');
        Route::get('teacher-list', [TeacherController::class, 'show'])->name('teacher.show');
        Route::get('teacher-edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
        Route::post('teacher-update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
        Route::get('teacher-delete/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');


        // Fee Structure Management
        Route::get('fee-structure', [FeeStructureController::class, 'index'])->name('fee-structure.create');
        Route::get('fee-structure-search', [FeeStructureController::class, 'search'])->name('fee-structure.search');
        Route::post('fee-structure', [FeeStructureController::class, 'store'])->name('fee-structure.store');
        Route::get('fee-structure-list', [FeeStructureController::class, 'show'])->name('fee-structure.show');
        Route::get('fee-structure-edit/{id}', [FeeStructureController::class, 'edit'])->name('fee-structure.edit');
        Route::get('fee-structure-delete/{id}', [FeeStructureController::class, 'delete'])->name('fee-structure.delete');
        Route::post('fee-structure-update/{id}', [FeeStructureController::class, 'update'])->name('fee-structure.update');

        // Student Management
        Route::get('student/create', [StudentController::class, 'index'])->name('student.create');
        Route::post('student', [StudentController::class, 'store'])->name('student.store');
        Route::get('student-list-search', [StudentController::class, 'search'])->name('student.search');
        Route::get('student-list', [StudentController::class, 'show'])->name('student.show');
        Route::get('student-edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
        Route::post('student-update/{id}', [StudentController::class, 'update'])->name('student.update');
        Route::get('student-delete/{id}', [StudentController::class, 'delete'])->name('student.delete');

        // Subject Management
        Route::get('subject/create', [SubjectController::class, 'index'])->name('subject.create');
        Route::post('subject', [SubjectController::class, 'store'])->name('subject.store');
        Route::get('subject-list-search', [SubjectController::class, 'search'])->name('subject.search');
        Route::get('subject-list', [SubjectController::class, 'show'])->name('subject.show');
        Route::get('subject-edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit');
        Route::post('subject-update/{id}', [SubjectController::class, 'update'])->name('subject.update');
        Route::get('subject-delete/{id}', [SubjectController::class, 'delete'])->name('subject.delete');

        // Assign Subject Management
        Route::get('assign-subject', [AssignSubjectController::class, 'index'])->name('assign.create');
        Route::post('assign-subject', [AssignSubjectController::class, 'store'])->name('assign.store');
        Route::get('assign-list', [AssignSubjectController::class, 'show'])->name('assign.show');
        Route::get('assign-edit/{id}', [AssignSubjectController::class, 'edit'])->name('assign.edit');
        Route::delete('assign-delete/{id}', [AssignSubjectController::class, 'delete'])->name('assign.delete');
        Route::put('assign-update/{id}', [AssignSubjectController::class, 'update'])->name('assign.update');
   
    });
});
