<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\userController;
use App\Models\listing;
use App\Models\listingModel;
use Illuminate\Http\Request;
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

//--the status by default is 200 but I changed it to 404 || the second header is just custume:
// Route::get('/', function () {
//     return response('<h1>hello</h1>', 404)->header('Content-Type', 'text/plain')
//         ->header('hi', 'bye');
// });

//--this is a wild card that we give an id variable:
//--where is for giving constraints
//--status of dd is 500
//--ddd(); is for debugging and show us the codes:
// route::get('/posts/{id}', function ($id) {
//     // dd($id);
//     ddd($id);
//     return response('post ' . $id);
// })->where('id', '[0-9]+');

//--request object || this a query:
// Route::get('/search', function (Request $request) {
//     // dd($request);
//     return $request->name . ' ' . $request->city;
// });

//--view have not be blade, it can be just php:
// Route::get('/noBlade', function () {
//     return view('listing', [
//         'heading' => 'latest listing',
//         'noBladeListings' => [
//             [
//                 'id' => 1,
//                 'title' => 'listing one',
//                 'description' => 'Hello, how are you?'

//             ],
//             [
//                 'id' => 2,
//                 'title' => 'listing two',
//                 'description' => 'it is none of your bussiness.'
//             ]
//         ]
//     ]);
// });


// Route::get('/', function () {
//     return view('/learning/listings', [
//         'heading' => 'latest listing',
//         'listings' => [
//             [
//                 'id' => 1,
//                 'title' => 'listing one',
//                 'description' => 'Hello, how are you?'

//             ],
//             [
//                 'id' => 2,
//                 'title' => 'listing two',
//                 'description' => 'it is none of your bussiness.'
//             ]
//         ],
//         //--all listings:
//         //--this one comes from the model that we made in app\model
//         'listings2' => listingModel::all()
//     ]);
// });

// //--this one comes from the function with id in model:
// //--single listing:
// Route::get('/listings/{id}', function ($id) {
//     return view('/learning/listing3', [
//         'listing' => listingModel::find($id)
//     ]);
// });

// Route::get('/phpMyAdminDB', function () {
//     return view('/learning/listings2', [
//         'heading' => 'latest listing',
//         //--all listings:
//         //--this one comes from the model that we made in app\model
//         'listings2' => listing::all()
//     ]);
// });

// //--this one comes from the function with id in model:
// //--single listing:
// Route::get('/listings/phpMyAdminDB/{id}', function ($id) {
//     return view('/learning/listing3', [
//         'listing' => listing::find($id)
//     ]);
// });
//-- until here was for learning
//------------------------------------------------------------------------

//all listings
Route::get('/', [ListingController::class, 'index']);

//-- this is just another way of function bellow:
// Route::get('/listings/{id}', function ($id) {
//     $listing = Listing::find($id);

//     if ($listing) {
//         return view('listing', [
//             'listing' => $listing
//         ]);
//     } else {

//         abort('404');
//     }
// });


//show creat form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//store listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//edit submit to update
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//show register create form
Route::get('/register', [userController::class, 'create'])->middleware('guest');

//create new user
Route::post('/users', [userController::class, 'store']);

//logout user
Route::post('/logout', [userController::class, 'logout'])->middleware('auth');

//login || middleware guest to work we should go to provider>routh service provider and change the name of the homepage 
Route::get('/login', [userController::class, 'login'])->name('login')->middleware('guest');

//login user
Route::post('/users/authenticate', [userController::class, 'authenticate']);
