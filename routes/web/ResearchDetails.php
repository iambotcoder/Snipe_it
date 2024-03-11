<?php

use App\Http\Controllers\ResearchDetails;
use Illuminate\Support\Facades\Route;



Route::resource('researchDetails', ResearchDetails\ResearchDetailsController::class, []);
