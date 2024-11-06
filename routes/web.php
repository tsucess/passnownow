<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExamsController;
use App\Http\Controllers\ClassesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\PaystackController;
use App\Models\Admin;
use App\Models\Subjects;
use App\Models\Classes;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;



Route::get('/', function () {

    $output = Classes::get();
    return view('home', ['fetchClasses' => $output]);
    // return ['Laravel' => app()->version()];
});



Route::get('/about', function () {
    return view('about');
});

Route::get('/subject', function () {
    return view('subject');
});

Route::get('/subjects', function () {
    return view('subjects');
});

Route::get('/notes', function () {
    return view('classnotes');
});

Route::get('/pastquestions', function () {
    return view('pastquestions');
});
Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/parentcouncelling', function () {
    return view('parentcouncelling');
});

Route::get('/subscriptions', function () {
    return view('subscriptions');
});


Route::get('/teacherresources', function () {
    return view('teacherresources');
});

Route::get('/useful-skills', function () {
    return view('usefulskills');
});

Route::get('/good-teacher', function () {
    return view('goodteacher');
});

Route::get('/students-motivation', function () {
    return view('studentsmotivation');
});

Route::get('/career-councelling', function () {
    return view('careercouncelling');
});

Route::get('/note-tips', function () {
    return view('note-tips');
});

Route::get('/parentresources', function () {
    return view('parentresources');
});


Route::get('/our-leadership', function () {
    return view('leadership');
});

Route::get('/our-programs', function () {
    return view('programs');
});

Route::get('/our-team', function () {
    return view('team');
});

Route::get('/explicit', function () {
    return view('explicit');
});

Route::get('/command', function () {
    return view('command');
});

Route::get('/task', function () {
    return view('task');
});

Route::get('/discovery', function () {
    return view('discovery');
});

Route::get('/problemsolving', function () {
    return view('problemsolving');
});

Route::get('/progression', function () {
    return view('progression');
});

Route::get('/motivate', function () {
    return view('motivate');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/checkout', function () {
    return view('checkout');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');





    Route::get('/detailedstat', function () {
        return view('admin.detailedstat');
    });

    Route::get('/totalsales', function () {
        return view('admin.totalsales');
    });
});




Route::get('/subscriptiondetails', function () {
    return view('admin.subscriptiondetails');
});

Route::get('/checkoutdetails', function () {
    return view('admin.checkoutdetails');
});

Route::get('/checkoutsummary', function () {
    return view('admin.checkoutsummary');
});

Route::get('/subscription', function () {
    return view('admin.subscription');
});






Route::middleware('auth')->group(function () {
    Route::get('/admins', [AdminController::class, 'index'])->name('admins');
    Route::post('/admins', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admins/{data}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::patch('/admins/{data}/update', [AdminController::class, 'update'])->name('admin.update');
    Route::put('/admins/{data}/update', [AdminController::class, 'updatepassword'])->name('userpassword.update');
    Route::get('/admins/{data}/destroy', [AdminController::class, 'destroy'])->name('admin.destroy');

    Route::get('/users', [AdminController::class, 'usersonly'])->name('users');


// Classes Routes
    Route::get('/classes', [ClassesController::class, 'show'])->name('classes');
    Route::post('/classes', [ClassesController::class, 'store'])->name('classes.store');
    Route::post('/classes/{data}/edit', [ClassesController::class, 'edit'])->name('classes.edit');
    Route::patch('/classes', [ClassesController::class, 'update'])->name('classes.update');
    Route::get('/classes/{data}/destroy', [ClassesController::class, 'destroy'])->name('classes.destroy');
    Route::get('/subject/{data}/view', [SubjectsController::class, 'display'])->name('subject');


    // Subjects Routes
    Route::get('/adsubjects', [SubjectsController::class, 'show'])->name('adsubjects');
    Route::post('/adsubjects', [SubjectsController::class, 'store'])->name('adsubjects.store');
    Route::post('/adsubjects/{data}/edit', [SubjectsController::class, 'edit'])->name('adsubjects.edit');
    Route::patch('/adsubjects', [SubjectsController::class, 'update'])->name('adsubjects.update');
    Route::get('/adsubjects/{data}/destroy', [SubjectsController::class, 'destroy'])->name('adsubjects.destroy');


    // Topics Routes
    Route::get('/viewtopics/{data}/view', [TopicsController::class, 'show'])->name('viewtopics');
    Route::post('/viewtopics', [TopicsController::class, 'store'])->name('viewtopics.store');
    Route::post('/viewtopics/{data}/edit', [TopicsController::class, 'edit'])->name('viewtopics.edit');
    Route::patch('/viewtopics', [TopicsController::class, 'update'])->name('viewtopics.update');
    Route::get('/viewtopics/{data}/destroy', [TopicsController::class, 'destroy'])->name('viewtopics.destroy');




    // Exams Routes
    Route::get('/adexams', [ExamsController::class, 'show'])->name('adexams');
    Route::post('/adexams', [ExamsController::class, 'store'])->name('adexams.store');
    Route::post('/adexams/{data}/edit', [ExamsController::class, 'edit'])->name('adexams.edit');
    Route::patch('/adexams', [ExamsController::class, 'update'])->name('adexams.update');
    Route::get('/adexams/{data}/destroy', [ExamsController::class, 'destroy'])->name('adexams.destroy');
    Route::get('/enableExam', [ExamsController::class, 'enableStatus'])->name('enableExam');


    Route::get('/showpastquestions/{data}/view', [QuestionsController::class, 'usershow'])->name('showpastquestions');
    Route::get('/pqlearning/{data}/view', [QuestionsController::class, 'showpastquest'])->name('pqlearning');

    // Questions Routes
    Route::get('/adpastquestions/{data}/view', [QuestionsController::class, 'show'])->name('adpastquestions');
     Route::post('/adpastquestions', [QuestionsController::class, 'store'])->name('adpastquestions.store');
     Route::post('/adpastquestions/{data}/edit', [QuestionsController::class, 'edit'])->name('adpastquestions.edit');
     Route::patch('/adpastquestions', [QuestionsController::class, 'update'])->name('adpastquestions.update');
     Route::get('/adpastquestions/{data}/destroy', [QuestionsController::class, 'destroy'])->name('adpastquestions.destroy');
});




Route::get('/instructors', function () {
    return view('admin.instructors');
});




Route::get('/product', function () {
    return view('admin.product');
});

Route::get('/order', function () {
    return view('admin.order');
});

Route::get('/pastquestion', function()
{
    return view('admin.pastquestion');
});


Route::get('/learning', function()
{
    return view('admin.learning');
});

Route::get('/class', function()
{
    return view('admin.class');
});


Route::get('/subscription', function()
{
    return view('admin.subscription');
});



Route::get('/subject', function()
{
    return view('admin.subject');
});


Route::get('/pqexams', function()
{
    return view('pqexams');
});


Route::get('callback', [PaystackController::class, 'callback'])->name('callback');
Route::get('success', [PaystackController::class, 'success'])->name('success');
Route::get('cancel', [PaystackController::class, 'cancel'])->name('cancel');
//  To reduce longer url
// Route::get('/educational-resources', function(){
//     return view('about');
// })->name('edresources');

// {{ route('edresources')}} to references the route in the view page

// Access a nested view page with uri parameter
// Route::get('/dashboard/{name}/{lname}', function ($name, $lname) {
//     return view('admin.dashboard',['name'=>$name, 'lname'=>$lname]);
// });

// Route::get('user', [UserController::class, 'getUser']);
// Route::get('username/{name}', [UserController::class, 'getUsername']);

// How to get access view from controller
// Route::get('home', [UserController::class, 'getHome']);


// Route to prompt users to verify their email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Route to verify email upon clicking the email link
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard'); // Adjust this to wherever you want users redirected after verification
})->middleware(['auth', 'signed'])->name('verification.verify');

// Route to resend the verification email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// // Example of a route that requires email verification
// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });




// DASHBOARD ROUTING
Route::get('/dashboard', function () {
    $subjects = Subjects::limit(3)->get();
    $countAdmins = Admin::wherenot('role', 'user')->count();
    $countUsers = Admin::where('role', 'user')->count();
    $users = Admin::where('role', 'user')->get();
    return view('admin.dashboard',['fetchUsers' => $users, 'totalUsers' => $countUsers, 'totalAdmins' => $countAdmins, 'subjects' => $subjects]);
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('guest')->group(function () {
    // Password Reset Link Request Routes
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    // Password Reset Routes
    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});


require __DIR__ . '/auth.php';
