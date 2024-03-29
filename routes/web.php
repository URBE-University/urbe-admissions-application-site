<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\StarsIntegrationController;
use App\Http\Controllers\WebController;
use App\Http\Livewire\V2\Application\Apply;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/en');

Route::post('/restart', [ApplicationController::class, 'restart'])->name('application.restart');

Route::middleware('set.language')->prefix('{language}')->group(function () {
    Route::get('/', [WebController::class, 'home'])->name('home');
    Route::get('/start', [ApplicationController::class, 'index'])->name('application.start');
    Route::get('/application-not-found', [ApplicationController::class, 'not_found'])->name('application.not_found');
    Route::get('/application-saved', [ApplicationController::class, 'saved'])->name('application.saved');
    Route::get('/application-completed/{application}', [ApplicationController::class, 'completed'])->name('application.completed');
    Route::get('/continue/{application}', [ApplicationController::class, 'continue'])->name('application.continue');

    Route::get('/guardian-success', function () {
        return view('web.guardian-success');
    });

    /**
     * New Application Endpoint
     */
    Route::get('v2/apply', function () {
        return redirect("https://urb-web.scansoftware.com/cafeweb/tapestry?page=Application");
    })->name('web.v2.apply');

    /**
     * Authenticated routes
     * This is where all protected routes are stored
     */
    Route::middleware(['auth:sanctum', 'verified'])->group(function(){
        /**
         * List all the applications
         */
        Route::get('/applications', App\Http\Livewire\Admin\Applications\Index::class)->name('applications');

        /**
         * Display application details
         */
        Route::get('/applications/{application}/show', App\Http\Livewire\Admin\Applications\Show::class)->name('applications.show');

        /**
         * Application Download as PDF
         */
        Route::get('/applications/{application}/download', [ApplicationController::class, 'download'])->name('application.download');

        /**
         * Syncronize application with Stars Campus
         * Creates a lead resource in the Stars Campus software
         */
        Route::get('/applications/{application}/sync/stars', [StarsIntegrationController::class, 'sync'])->name('applications.stars-sync');

        /**
         * Application Settings
         */
        Route::get('/settings', App\Http\Livewire\System\Settings::class)->name('settings');
    });
});
