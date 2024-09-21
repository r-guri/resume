<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManageCodeHubController;
use App\Http\Controllers\MultiStepFormController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GoogleController;
use Laravel\Socialite\Facades\Socialite;

// Public routes
Route::get('/', [HomeController::class, 'topHeader']);
Route::get('about', function () { return view('about'); });
Route::get('contact', function () { return view('contact'); });
Route::get('blog', function () { return view('blog'); });
Route::get('team', function () { return view('team'); });
Route::get('price', function () { return view('price'); });
Route::get('service', function () { return view('service'); });
Route::get('testimonial', function () { return view('testimonial'); });
Route::get('feature', function () { return view('feature'); });
Route::get('detail', function () { return view('detail'); });
Route::get('privacy-policy', function () { return view('privacy'); });
Route::get('signup', [AuthController::class, 'signup'])->name('signup');

// Auth routes
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout']);
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgotPassword', [AuthController::class, 'forgotPasswordAction'])->name('forgotPassword');

Route::get('sa', function () {
    return view('admin.index');
});
Route::get('login', function () {
    return view('admin.index');
});
Route::get('topHeader', function () { return view('admin/topHeader'); });
Route::get('ViewCount', function () { return view('admin/mainCount'); });
Route::get('ViewAbout', function () { return view('admin/about'); });
Route::get('ViewChoose', function () { return view('admin/choose'); });

// Admin actions (protected by middleware)
Route::middleware(['auth'])->group(function () {
    Route::get('password_change', [AuthController::class, 'showPasswordChangeForm'])->name('password_change');
Route::post('passwordchangeAction', [AuthController::class, 'passwordchangeAction'])->name('passwordchangeAction');

    Route::post('updateTop', [ManageCodeHubController::class, 'topHeaderUpdate']);
    Route::post('mainCountPost', [ManageCodeHubController::class, 'mainCountUpdateAction']);
    Route::post('aboutPost', [ManageCodeHubController::class, 'aboutUpdateAction']);
    Route::post('choosePost', [ManageCodeHubController::class, 'chooseUpdateAction']);
    // Route::get('dashboard', [AuthController::class, 'dashboard']);
    Route::get('/form/{step?}', [MultiStepFormController::class, 'showForm'])->name('form.step');
    Route::post('/form/save', [MultiStepFormController::class, 'saveForm'])->name('form.save');


    Route::post('bookssave', [MultiStepFormController::class, 'bookssave'])->name('bookssave');
    Route::post('researchsave', [MultiStepFormController::class, 'researchsave'])->name('researchsave');
    Route::post('publicationsave', [MultiStepFormController::class, 'publicationsave'])->name('publicationsave');
    Route::post('thesis_supervisedsave', [MultiStepFormController::class, 'thesis_supervisedsave'])->name('thesis_supervisedsave');
    Route::post('conference_detailsave', [MultiStepFormController::class, 'conference_detailsave'])->name('conference_detailsave');
    Route::post('seminarsstore', [MultiStepFormController::class, 'seminarsstore'])->name('seminarsstore');
    Route::post('workshopsstore', [MultiStepFormController::class, 'workshopsstore'])->name('workshopsstore');
    Route::post('patentsstore', [MultiStepFormController::class, 'patentsstore'])->name('patentsstore');
    Route::post('awardsstore', [MultiStepFormController::class, 'awardsstore'])->name('awardsstore');
    Route::post('membershipsstore', [MultiStepFormController::class, 'membershipsstore'])->name('membershipsstore');


    Route::delete('/deleteBook/{id}', [MultiStepFormController::class, 'destroyBook'])->name('form.destroyBook');
    Route::delete('/deletePublication/{id}', [MultiStepFormController::class, 'destroyPublication'])->name('form.destroyPublication');
    Route::delete('/deleteThesisSupervised/{id}', [MultiStepFormController::class, 'destroyThesisSupervised'])->name('form.destroyThesisSupervised');
    Route::delete('/deleteConferenceDetail/{id}', [MultiStepFormController::class, 'destroyConferenceDetail'])->name('form.destroyConferenceDetail');
    Route::delete('/deleteSeminar/{id}', [MultiStepFormController::class, 'destroySeminar'])->name('form.destroySeminar');
    Route::delete('/deleteWorkshop/{id}', [MultiStepFormController::class, 'destroyWorkshop'])->name('form.destroyWorkshop');
    Route::delete('/deletePatent/{id}', [MultiStepFormController::class, 'destroyPatent'])->name('form.destroyPatent');
    Route::delete('/deleteMembership/{id}', [MultiStepFormController::class, 'destroyMembership'])->name('form.destroyMembership');
    Route::delete('/deleteAward/{id}', [MultiStepFormController::class, 'destroyAward'])->name('form.destroyAward');
    Route::delete('/deleteResearch/{id}', [MultiStepFormController::class, 'destroyResearch'])->name('form.destroyResearch');



    Route::delete('/deleteProject/{id}', [MultiStepFormController::class, 'destroy'])->name('form.destroy');
    Route::delete('/deleteEducation/{id}', [MultiStepFormController::class, 'destroyEducation'])->name('form.destroyEducation');
    Route::delete('/deleteExperience/{id}', [MultiStepFormController::class, 'destroyExperience'])->name('form.destroyExperience');
    Route::get('/courses', [CourseController::class, 'getCourses'])->name('courses');
    Route::get('/preview-resume', [MultiStepFormController::class, 'preview'])->name('preview');
    Route::get('/template-resume', [MultiStepFormController::class, 'templates'])->name('templates');
});

Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');
    return "Caches cleared!";
});


Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');