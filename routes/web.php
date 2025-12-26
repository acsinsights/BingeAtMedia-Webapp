<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
require __DIR__ . '/frontend.php';


Route::prefix('admin')->middleware(['admin.auth', 'role:admin'])->group(function () {
    Route::name('admin.')->group(function () {
        Volt::route('/dashboard', 'dashboard.index')->name('index');
        Volt::route('/profile', 'admin.profile')->name('profile');
        Volt::route('/website-data', 'website-data.index')->name('website-data');

        Route::group(['prefix' => 'testimonial'], function () {
            Route::name('testimonial.')->group(function () {

                Volt::route('/', 'testimonial.index')->name('index');
                Volt::route('/create', 'testimonial.create')->name('create');
                Volt::route('/edit/{id}', 'testimonial.edit')->name('edit');
                volt::route('/show/{id}', 'testimonial.show')->name('show');
            });
        });

        Route::group(['prefix' => 'blog'], function () {
            Route::name('blog.')->group(function () {

                Volt::route('/', 'blog.index')->name('index');
                Volt::route('/create', 'blog.create')->name('create');
                Volt::route('/edit/{id}', 'blog.edit')->name('edit');
            });
        });

        Route::group(['prefix' => 'contact'], function () {
            Route::name('contact.')->group(function () {

                Volt::route('/', 'contact.index')->name('index');
                Volt::route('/show/{id}', 'contact.show')->name('show');
            });
        });

        Route::group(['prefix' => 'enquiry-leads'], function () {
            Route::name('enquiry-leads.')->group(function () {

                Volt::route('/', 'enquiry-leads.index')->name('index');
                Volt::route('/show/{id}', 'enquiry-leads.show')->name('show');
            });
        });

        Route::group(['prefix' => 'page'], function () {
            Route::name('page.')->group(function () {
                Volt::route('/', 'page.index')->name('index');
                Volt::route('/edit/{id}', 'page.edit')->name('edit');
            });
        });

        Route::group(['prefix' => 'page-meta'], function () {
            Route::name('page-meta.')->group(function () {
                Volt::route('/', 'page-meta.index')->name('index');
                Volt::route('/edit/{id}', 'page-meta.edit')->name('edit');
            });
        });
    });
});
