<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExamsController;
use App\Http\Controllers\ClassesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\QuestionsController;
use App\Models\Subjects;

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


// Classes Routes
    Route::get('/classes', [ClassesController::class, 'show'])->name('classes');
    Route::post('/classes', [ClassesController::class, 'store'])->name('classes.store');
    Route::post('/classes/{data}/edit', [ClassesController::class, 'edit'])->name('classes.edit');
    Route::patch('/classes', [ClassesController::class, 'update'])->name('classes.update');
    Route::get('/classes/{data}/destroy', [ClassesController::class, 'destroy'])->name('classes.destroy');


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



     // Questions Routes 
     Route::get('/adpastquestions/{data}/view', [QuestionsController::class, 'show'])->name('adpastquestions');
     Route::post('/adpastquestions', [QuestionsController::class, 'store'])->name('adpastquestions.store');
     Route::post('/adpastquestions/{data}/edit', [QuestionsController::class, 'edit'])->name('adpastquestions.edit');
     Route::patch('/adpastquestions', [QuestionsController::class, 'update'])->name('adpastquestions.update');
     Route::get('/adpastquestions/{data}/destroy', [QuestionsController::class, 'destroy'])->name('adpastquestions.destroy');
});
  


Route::get('/adpastquestions', function () {
    return view('admin.adpastquestions');
});

// Route::get('/adexams', function () {
//     return view('admin.adexams');
// });




Route::get('/instructors', function () {
    return view('admin.instructors');
});

Route::get('/addashboard', function () {
    return view('admin.addashboard');
});

Route::get('/addetailedstat', function () {
    return view('admin.addetailedstat');
});

Route::get('/adtotalsales', function () {
    return view('admin.adtotalsales');
});

Route::get('/product', function () {
    return view('admin.product');
});

Route::get('/order', function () {
    return view('admin.order');
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
