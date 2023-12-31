<?php

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
    return view('welcome');
});


## 1- create new Route
Route::get("/st", function (){
    return view("summertraining");
}); ## get represent request methods you will use ?

/*
 * GET --> get page
 * POST  --> send data to the server
 * PUT  --> update data
 * DELETE  ---> delete
 * */


## 1- create new Route
Route::get("/name", function (){
    return "noha";
}); ## get represent request methods you will use ?


Route::get("/students", function (){
//    $students = ["Ahmed",'Abdelrhaman', 'Omar','Shahd', 'Mohamed'];
//    return $students;

    $info = ["name"=>"noha", "work"=>"iti", 'age'=>31];
    return $info;
}); ## get represent request methods you will use ?


Route::get("/hello/{name}", function ($name){
   return "<h1 style='text-align: center;color: darkred'>
            Hello {$name}
        </h1>" ;
});


### move to the controller  000> control app --> http request
use App\Http\Controllers\ITIController;

Route::get('/controller',[ITIController::class, 'index'] );
Route::get("/welcome/{name}",[ITIController::class, 'saywelcome']);

### create different pages ---> application iti ---> students
use App\Http\Controllers\StudentController;

Route::get("/students/land", [StudentController::class, 'landing']);
Route::get('/students/list', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
Route::get('/students/{id}/delete', [StudentController::class, 'delete'])->name('students.delete');
Route::post("/students", [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
## when need to update an object  ---> it's preferred to use put method
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');




#### you create routes for the controller operations into one line

use App\Http\Controllers\PostController;
Route::resource('posts',PostController::class);








Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/**
GET|HEAD        posts ........................................... posts.index › PostController@index
  POST            posts ....................................... posts.store › PostController@store
  GET|HEAD        posts/create ..................... posts.create › PostController@create
  GET|HEAD        posts/{post} ........................... posts.show › PostController@show
  PUT|PATCH       posts/{post} ........................... posts.update › PostController@update
  DELETE          posts/{post} ....................... posts.destroy › PostController@destroy
  GET|HEAD        posts/{post}/edit ............................... posts.edit › PostController@edit
**/



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
/**

GET|HEAD        login ........................................ login › Auth\LoginController@showLoginForm
  POST            login ..................................... Auth\LoginController@login
  POST            logout ................................... logout › Auth\LoginController@logout
 *
 *
 *  GET|HEAD        register ................. register › Auth\RegisterController@showRegistrationForm
POST            register .................................. Auth\RegisterController@register

 */
