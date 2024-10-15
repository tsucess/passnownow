<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;



Route::get('/', function () {
    return view('home');
    // return ['Laravel' => app()->version()];
});


Route::get('/about', function(){
    return view('about');
});

Route::get('/subject', function(){
    return view('subject');
});

Route::get('/subjects', function(){
    return view('subjects');
});

Route::get('/notes', function(){
    return view('classnotes');
});

Route::get('/pastquestions', function(){
    return view('pastquestions');
});
Route::get('/blog', function(){
    return view('blog');
});

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/parentcouncelling', function(){
    return view('parentcouncelling');
});

Route::get('/subscriptions', function(){
    return view('subscriptions');
});

Route::get('/register', function(){
    return view('register');
});

Route::get('/login', function(){
    return view('login');
});

Route::get('/teacherresources', function(){
    return view('teacherresources');
});

Route::get('/useful-skills', function(){
    return view('usefulskills');
});

Route::get('/good-teacher', function(){
    return view('goodteacher');
});

Route::get('/students-motivation', function(){
    return view('studentsmotivation');
});

Route::get('/career-councelling', function(){
    return view('careercouncelling');
});

Route::get('/note-tips', function(){
    return view('note-tips');
});

Route::get('/parentresources', function(){
    return view('parentresources');
});


Route::get('/our-leadership', function(){
    return view('leadership');
});

Route::get('/our-programs', function(){
    return view('programs');
});

Route::get('/our-team', function(){
    return view('team');
});

Route::get('/explicit', function(){
    return view('explicit');
});

Route::get('/command', function(){
    return view('command');
});

Route::get('/task', function(){
    return view('task');
});

Route::get('/discovery', function(){
    return view('discovery');
});

Route::get('/problemsolving', function(){
    return view('problemsolving');
});

Route::get('/progression', function(){
    return view('progression');
});

Route::get('/motivate', function(){
    return view('motivate');
});

Route::get('/faq', function(){
    return view('faq');
});

Route::get('/checkout', function(){
    return view('checkout');
});







// DASHBOARD ROUTING 
Route::get('/dashboard', function(){
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileCOntroller::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileCOntroller::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileCOntroller::class, 'destroy'])->name('profile.destroy');
});


Route::get('/profile', function(){
    return view('admin.profile');
});

Route::get('/subscriptiondetails', function(){
    return view('admin.subscriptiondetails');
});

Route::get('/checkoutdetails', function(){
    return view('admin.checkoutdetails');
});

Route::get('/checkoutsummary', function(){
    return view('admin.checkoutsummary');
});

Route::get('/subscription', function(){
    return view('admin.subscription');
});

Route::get('/admins', function(){
    return view('admin.admins');
});

Route::get('/users', function(){
    return view('admin.users');
});

Route::get('/classes', function(){
    return view('admin.classes');
});

Route::get('/adsubjects', function(){
    return view('admin.adsubjects');
});


Route::get('/adpastquestions', function(){
    return view('admin.adpastquestions');
});

Route::get('/adexams', function(){
    return view('admin.adexams');
});

Route::get('/viewtopics', function(){
    return view('admin.viewtopics');
});

Route::get('/viewdata', function(){
    return view('admin.viewdata');
});


Route::get('/instructors', function(){
    return view('admin.instructors');
});

//  To reduce longer url 
// Route::get('/educational-resources', function(){
//     return view('about');
// })->name('edresources');

// {{ route('edresources')}} to references the route in the view page

// Access a nested view page with uri parameter 
Route::get('/dashboard/{name}/{lname}', function ($name, $lname) {
    return view('admin.dashboard',['name'=>$name, 'lname'=>$lname]);
});

Route::get('user', [UserController::class, 'getUser']);
Route::get('username/{name}', [UserController::class, 'getUsername']);

// How to get access view from controller 
// Route::get('home', [UserController::class, 'getHome']);





require __DIR__.'/auth.php';