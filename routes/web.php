<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\VocabularyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('header');
})->name('header');

Route::get('/homePage', function () {
    return view('homePage');
})->name('homePage');

Route::get('/translatePage', function () {
    return view('translatePage');
})->name('translatePage');

Route::get('/dictionaryPage', function () {
    return view('dictionaryPage');
})->name('dictionaryPage');

Route::get('user/topicPage', [TopicsController::class, 'topicsToPage'])->name('topicPage');

Route::get('user/topicPage/vocabulary/{id_topic}', [TopicsController::class, 'vocaToTopicPage'])->name('detailtopicPage');

//login
Route::get('user/login', function () {
    return view('loginPage');
})->name('loginPage');
Route::get('user/signup', function () {
    return view('signupPage');
})->name('signupPage');
Route::post('user/login', [AccountController::class, 'login']);

//signup
Route::post('user/signin', function(){
    return redirect()->route('signupPage');
});
Route::post('user/signup', function(){
    return redirect()->route('loginPage');
});
Route::post('user/register', [AccountController::class, 'register']);

//admin
Route::get('admin/homepage/{username}', [AccountController::class, 'adminPage'])->name('adminHomePage');
Route::get('admin/topic/add', function(){
    return view('admin.addTopicPage');
})->name('addTopicPage');

Route::get('admin/listtopic', [TopicsController::class, 'showTopicsAdmin'])->name('listTopic');
Route::post('admin/topic/delete', [TopicsController::class, 'deleteTopic']);
Route::post('admin/topic/edit', [TopicsController::class, 'getTopicToEdit']);
Route::post('admin/topic/edit/submit', [TopicsController::class, 'editTopic']);
Route::post('admin/topicadd', function(){
    return redirect()->route('addTopicPage');
});
Route::post('admin/topic/add/submit', [TopicsController::class, 'addTopic']);

//admin detail topic
Route::get('admin/topic/detail/{id}', [VocabularyController::class, 'showDetailVocaOfTopic'])->name('listVocaOfTopic');
Route::get('admin/topic/vocaaddd',[VocabularyController::class, 'addVocaTopicPage'])->name('addVocaTopicPage');
Route::post('admin/topic/vocabulary/add/submit', [VocabularyController::class, 'addVocaTopic']);
Route::post('admin/topic/vocaadd', function(){
    return redirect()->route('addVocaTopicPage');
});
Route::get('admin/topic/vocabulary/delete', [VocabularyController::class, 'deleteVoca']);
Route::get('admin/topic/vocabulary/edit/{id}', [VocabularyController::class, 'getVocaToEdit']);
Route::post('admin/topic/vocabulary/edit/submit', [VocabularyController::class, 'editVoca']);

Route::get('user/info/{username}',[AccountController::class, 'infoPage'])->name('infoPage');
Route::post('user/info/update',[AccountController::class, 'updateUser']);
Route::post('user/info/updatepassword',[AccountController::class, 'changePassword']);
Route::get('user/homepage/{username}', [AccountController::class, 'userPage'])->name('userHomePage');

Route::get('user/topic/review/{id_topic}', [VocabularyController::class, 'reviewVoca'])->name('reviewVocaPage');
Route::get('user/topic/review/back/{id_topic}',[VocabularyController::class, 'backReview']);
Route::post('user/topic/review/submit', [VocabularyController::class, 'submitReview']);