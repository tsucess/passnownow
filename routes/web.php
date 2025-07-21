<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\ExamPrep\StudentOperation;
use App\Http\Controllers\ExamPrep\SpecialAdminController;
use App\Http\Controllers\ExamPrep\AdminController;
use App\Http\Controllers\ExamPrep\ExamsController;
use App\Http\Controllers\ExamPrep\ClassesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExamPrep\SubjectsController;
use App\Http\Controllers\ExamPrep\TopicsController;
use App\Http\Controllers\ExamPrep\QuestionsController;
use App\Http\Controllers\ExamPrep\PaymentController;
use App\Http\Controllers\ExamPrep\SubscriptionController;
use App\Models\ExamPrep\Admin;
use App\Models\ExamPrep\Subjects;
use App\Models\ExamPrep\Questions;
use App\Models\ExamPrep\Classes;
use App\Models\ExamPrep\Pay;
use App\Models\ExamPrep\Transaction;
use App\Models\ExamPrep\Exams;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\ExamPrep\PayController;
use App\Http\Controllers\ExamPrep\ChartDataController;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {

    $eoutput = Exams::get();
    $coutput = Classes::get();
    // $poutput = Pays::get();
    return view('home', ['fetchClasses' => $coutput, 'fetchExams' => $eoutput]);
    // return ['Laravel' => app()->version()];
});




Route::get('/about', function () {
    return view('about');
});

Route::get('/subjec', function () {
    return view('subjec');
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

Route::get('/career-counselling', function () {
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



Route::get('/subscribeform', function () {
    return view('subscribeform');
});

// Route::post('/pay', [PayController::class, 'redirectToGateway'])->name('pay');
// Route::get('/payment/callback', [PayController::class, 'handleGatewayCallback']);






Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Route::get('/detailedstat', function () {
    //     return view('admin.detailedstat');
    // });

    Route::get('/detailedstat', [ChartDataController::class, 'showStats']);


    Route::get('/totalsales', [ChartDataController::class, 'salesAnalysis']);
});

// require __DIR__ . '/auth.php';





Route::get('/checkoutsummary', function () {
    return view('admin.checkoutsummary');
});

Route::get('/subscription', function () {
    return view('admin.subscription');
});



Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [StudentOperation::class, 'dashboard']);

    Route::get('/exam', [StudentOperation::class, 'exam']);
    Route::get('/join_exam/{id}', [StudentOperation::class, 'join_exam']);
    Route::post('/submit_questions', [StudentOperation::class, 'submit_questions']);
    Route::get('/show_result/{id}', [StudentOperation::class, 'show_result']);
    Route::get('/apply_exam/{id}', [StudentOperation::class, 'apply_exam']);
    Route::get('/view_result/{id}', [StudentOperation::class, 'view_result']);
    Route::get('/view_answer/{id}', [StudentOperation::class, 'view_answer']);
});


Route::middleware('auth')->group(function () {
    Route::get('/admins', [AdminController::class, 'index'])->name('admins');
    Route::post('/admins', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admins/{data}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::patch('/admins/{data}/update', [AdminController::class, 'update'])->name('admin.update');
    Route::put('/admins/{data}/update', [AdminController::class, 'updatepassword'])->name('userpassword.update');
    Route::get('/admins/{data}/destroy', [AdminController::class, 'destroy'])->name('admin.destroy');

    Route::get('/users', [AdminController::class, 'usersonly'])->name('users');




    

    // Special Question features STARTS 
    Route::get('/dashboard', [SpecialAdminController::class, 'index']);
    Route::get('/exam_category', [SpecialAdminController::class, 'exam_category']);
    Route::get('/delete_category/{id}', [SpecialAdminController::class, 'delete_category']);
    Route::get('/edit_category/{id}', [SpecialAdminController::class, 'edit_category']);
    Route::get('/category_status/{id}', [SpecialAdminController::class, 'category_status']);
    Route::get('/manage_exam', [SpecialAdminController::class, 'manage_exam']);
    Route::get('/exam_status/{id}', [SpecialAdminController::class, 'exam_status']);
    Route::get('/delete_exam/{id}', [SpecialAdminController::class, 'delete_exam']);
    Route::get('/edit_exam/{id}', [SpecialAdminController::class, 'edit_exam']);
    // Route::get('/manage_students', [SpecialAdminController::class, 'manage_students']);
    // Route::get('/student_status/{id}', [SpecialAdminController::class, 'student_status']);
    // Route::get('/delete_students/{id}', [SpecialAdminController::class, 'delete_students']);
    Route::get('/add_questions/{id}', [SpecialAdminController::class, 'add_questions']);
    Route::get('/question_status/{id}', [SpecialAdminController::class, 'question_status']);
    Route::get('/delete_question/{id}', [SpecialAdminController::class, 'delete_question']);
    Route::get('/update_question/{id}', [SpecialAdminController::class, 'update_question']);
    // Route::get('/registered_students', [SpecialAdminController::class, 'registered_students']);
    // Route::get('/delete_registered_students/{id}', [SpecialAdminController::class, 'delete_registered_students']);
    Route::get('/apply_exam/{id}', [SpecialAdminController::class, 'apply_exam']);
    Route::get('/admin_view_result/{id}', [SpecialAdminController::class, 'admin_view_result']);

    Route::post('/edit_question_inner', [SpecialAdminController::class, 'edit_question_inner']);
    Route::post('/add_new_question', [SpecialAdminController::class, 'add_new_question']);
    Route::post('/edit_students_final', [SpecialAdminController::class, 'edit_students_final']);
    // Route::post('/add_new_exam', [SpecialAdminController::class, 'add_new_exam']);
    // Route::post('/add_new_category', [SpecialAdminController::class, 'add_new_category']);
    // Route::post('/edit_new_category', [SpecialAdminController::class, 'edit_new_category']);
    Route::post('/edit_exam_sub', [SpecialAdminController::class, 'edit_exam_sub']);
    // Route::post('/add_new_students', [SpecialAdminController::class, 'add_new_students']);
    // Special Question features Ends













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
    Route::get('/viewquestions/{data}/view', [TopicsController::class, 'show'])->name('viewquestions');
    Route::post('/viewquestions', [TopicsController::class, 'store'])->name('viewquestions.store');
    Route::post('/viewquestions/{data}/edit', [TopicsController::class, 'edit'])->name('viewquestions.edit');
    Route::patch('/viewquestions', [TopicsController::class, 'update'])->name('viewquestions.update');
    Route::get('/viewquestions/{data}/destroy', [TopicsController::class, 'destroy'])->name('viewquestions.destroy');


    // Exams Routes
    //Route::get('/showpastquestions/{data}/view', [QuestionsController::class, 'usershow'])->name('showpastquestions');
    Route::get('/learning/{data}/view', [TopicsController::class, 'showtopics'])->name('learning');

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



    Route::get('/subscriptiondetails', function () {
        $userID = Auth::user()->unique_id;
        $subHistory = Transaction::where('user_unique_id', $userID)->where('payment_status', 'success')->get();
        $subExpiry = Transaction::where('user_unique_id', $userID)->where('payment_status', 'success')->latest('updated_at')->limit(1)->get();

        return view('admin.subscriptiondetails', ['subhistory' => $subHistory, 'exp_date' => $subExpiry]);
    });
    Route::get('/subscriptionhistory', function () {
        // $userID = Auth::user()->unique_id;
        $subHistory = Transaction::get();
        $subExpiry = Transaction::where('payment_status', 'success')->get();

        return view('admin.subscriptionhistory', ['subhistory' => $subHistory, 'exp_date' => $subExpiry]);
    });


    Route::get('/checkoutdetails', function () {
        return view('admin.checkoutdetails');
    });

    Route::get('/order', [ChartDataController::class, 'orderAnalysis']);
});















Route::get('/servicesubscription', function () {

    $eoutput = Exams::get();
    // $coutput = Classes::get();
    $poutput = Transaction::where('services', 'services')->where('payment_status', 'success')->get();
    return view('admin.servicesubscription', ['fetchClasses' => $poutput, 'fetchExams' => $eoutput]);
});


Route::get('/instructors', function () {
    return view('admin.instructors');
});


Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);


Route::get('/product', function () {
    return view('admin.product');
});



Route::get('/pastquestion', function () {
    return view('admin.pastquestion');
});


Route::get('/class', function () {
    return view('admin.class');
});


Route::get('/subscription', function () {
    return view('admin.subscription');
});





Route::get('/subject', function () {
    return view('admin.subject');
});


Route::get('/pqexams', function () {
    return view('pqexams');
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


// Route to prompt users to verify their email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');




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



// DASHBOARD ROUTING
Route::get('/dashboard', function () {

    $userID = Auth::user()->unique_id;
    $subHistory = Transaction::where('user_unique_id', $userID)->where('payment_status', 'success')->get();
    $subExpiry = Transaction::where('user_unique_id', $userID)->where('payment_status', 'success')->latest('updated_at')->limit(1)->get();

    $questions = Questions::limit(6)->get();
    $subjects = Subjects::limit(3)->get();
    $countAdmins = Admin::wherenot('role', 'user')->count();
    $countUsers = Admin::where('role', 'user')->count();
    $totalSum = Transaction::get()->where('payment_status', 'success')->sum('amount');
    $totalOrders = Transaction::get()->where('payment_status', 'success')->count();
    $users = Admin::where('role', 'user')->get();
    $totalSum = number_format($totalSum);

    return view('admin.dashboard', ['fetchUsers' => $users, 'totalUsers' => $countUsers, 'totalAdmins' => $countAdmins, 'subjects' => $subjects, 'subhistory' => $subHistory, 'exp_date' => $subExpiry, 'questions' => $questions, 'totalSum' => $totalSum, 'totalOrders' => $totalOrders]);
})->middleware(['auth', 'verified'])->name('dashboard');





Route::middleware('guest')->group(function () {
    // Password Reset Link Request Routes
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    // Password Reset Routes
    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});





//Subscribe mails
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');





require __DIR__ . '/auth.php';
