<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExamsController;
use App\Http\Controllers\ClassesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home');
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


// DASHBOARD ROUTING
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


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



    Route::get('/classes', [ClassesController::class, 'show'])->name('classes');
    Route::post('/classes', [ClassesController::class, 'store'])->name('classes.store');
    Route::post('/classes/{data}/edit', [ClassesController::class, 'edit'])->name('classes.edit');
    Route::patch('/classes', [ClassesController::class, 'update'])->name('classes.update');
    // Route::post('/classes/{data}/update', [ClassesController::class, 'update'])->name('classes.update');
    Route::get('/classes/{data}/destroy', [ClassesController::class, 'destroy'])->name('classes.destroy');
});





Route::get('/adsubjects', function () {
    return view('admin.adsubjects');
});


Route::get('/adpastquestions', function () {
    return view('admin.adpastquestions');
});

Route::get('/adexams', function () {
    return view('admin.adexams');
});

Route::post('/adexams', [ExamsController::class, 'store'])->name('adexams.store');

Route::get('/viewtopics', function () {
    return view('admin.viewtopics');
});


Route::get('/instructors', function () {
    return view('admin.instructors');
});

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