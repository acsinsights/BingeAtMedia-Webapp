<?php

use App\Http\Controllers\frontend\PageController;
use App\Http\Controllers\frontend\BlogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register frontend routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home page
Route::get('/', [PageController::class, 'home'])->name('frontend.home');

// About page
Route::get('/about', [PageController::class, 'about'])->name('frontend.about');

// Portfolio page
Route::get('/portfolio', [PageController::class, 'portfolio'])->name('frontend.portfolio');

// Blog pages
Route::get('/blog', [BlogController::class, 'index'])->name('frontend.blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('frontend.blog.show');

// Contact page
Route::get('/contact', [PageController::class, 'contact'])->name('frontend.contact');

// Privacy Policy page
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('frontend.privacy-policy');
Route::get('/privacy', [PageController::class, 'privacyPolicy'])->name('privacy');

// Terms of Service page
Route::get('/terms-of-service', [PageController::class, 'termsOfService'])->name('frontend.terms-of-service');
Route::get('/terms', [PageController::class, 'termsOfService'])->name('terms');

// Form submissions
Route::post('/contact/submit', [PageController::class, 'submitContact'])->name('frontend.contact.submit');
Route::post('/consultation/submit', [PageController::class, 'submitConsultation'])->name('frontend.consultation.submit');
Route::post('/enquiry/submit', [PageController::class, 'submitEnquiry'])->name('frontend.enquiry.submit');
