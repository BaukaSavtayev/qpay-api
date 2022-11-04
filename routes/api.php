<?php

use App\Http\Controllers\BonusController;
use App\Http\Controllers\Business\AccountController;
use App\Http\Controllers\Business\BusinessController;
use App\Http\Controllers\Business\Data\ContactsController;
use App\Http\Controllers\Business\Data\ScheduleController;
use App\Http\Controllers\Business\Employee\BusinessEmployeesController;
use App\Http\Controllers\Business\Employee\EmployeeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\Client\ClientsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




//Route::get('/city', [CityController::class, 'index']);
//Route::post('/city/add', [CityController::class, 'addCity']);





Route::post('/login', [SessionController::class, 'login']);

//test method
Route::post('register/business', [RegisterController::class, 'registerBusiness']);
Route::post('register/client', [RegisterController::class, 'registerClient']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('business/{business}/employees', BusinessEmployeesController::class);

    Route::post('/logout', [SessionController::class, 'logout']);

    Route::group(['prefix' => 'business/{business}/'], function(){
        Route::get('city', [CityController::class, 'index']);
        Route::get('categories', [CategoryController::class, 'businessCategories']);
        Route::get('contacts', [ContactsController::class, 'index']);
        Route::get('schedules', [ScheduleController::class, 'index']);
        Route::get('image', [ImageController::class, 'getProfileImage']);
    });

    Route::get('/category/{category}', [CategoryController::class, 'categoryBusinesses']);
    Route::get('/categories', [CategoryController::class, 'allCategories']);
    Route::get('client/{client}/profile', [ClientsController::class, 'index']);
    Route::get('client/{client}/image', [ImageController::class, 'getProfileImage']);

    Route::group(['prefix' => 'transactions/{model}/','middleware' => ['role:Business|Client', 'IsTrueModel']], function(){
        Route::get('all', [TransactionController::class, 'all']);
        Route::get('accrual', [TransactionController::class, 'accrual']);
        Route::get('withdrawal', [TransactionController::class, 'withdrawal']);
    });

    Route::group(['prefix' => 'business/{business}/', 'middleware' => 'IsBusinessEmployeeOrOwner'], function(){
        Route::group(['middleware' => 'can:accrual-bonuses','IsBusinessEmployeeOROwner'], function(){
            Route::post('bonuses/accrual', [BonusController::class, 'accrual']);
        });
        Route::group(['middleware' => 'can:withdrawal-bonuses'], function(){
            Route::put('bonuses/withdrawal', [BonusController::class, 'withdrawal']);
        });
        Route::group(['middleware' => 'can:check-clients-list'], function(){
            Route::get('clients', [ClientsController::class, 'businessClients']);
            Route::get('client/{client}', [ClientsController::class, 'businessClient']);
            Route::get('clients/search', [ClientsController::class, 'searchBusinessClients']);
        });
        Route::group(['middleware' => 'can:profile-setup'], function(){
            Route::put('', [BusinessController::class, 'update']);
            Route::put('schedule', [ScheduleController::class, 'setSchedule']);
            Route::put('contacts', [ContactsController::class, 'setContacts']);
            Route::put('categories', [CategoryController::class, 'setRelates']);
            Route::put('city', [CityController::class, 'setCity']);
            Route::put('bonuses', [BonusController::class, 'setBonusesParams']);
        });
        Route::group(['middleware' => 'can:check-account'], function(){
            Route::get('account', [AccountController::class, 'show']);
        });
        Route::group(['middleware' => 'can:top-up-account'], function(){
            Route::post('account/top-up', [AccountController::class, 'topUpAccount']);
        });
    });


    Route::group(['middleware' => ['role:Business','IsBusinessOwner']], function(){

        Route::post('business/profile/image', [ImageController::class, 'setProfileImage']);
        Route::get('business/{business}/bonuses', [BonusController::class, 'index']);
        Route::delete('business/{business}', [BusinessController::class, 'destroy']);

        Route::group(['prefix' => 'business/{business}/dashboard/'], function(){
            Route::get('daily', [DashboardController::class, 'daily']);
            Route::get('dynamic', [DashboardController::class, 'dynamic']);
            Route::get('repeated', [DashboardController::class, 'repeated']);
            Route::get('ratio', [DashboardController::class, 'ratio']);
            Route::get('average', [DashboardController::class, 'average']);
            Route::get('customer-churn', [DashboardController::class, 'churn']);
        });
    });
    Route::group(['middleware' => ['role:Client']], function (){

        Route::group(['prefix' => 'client/{client}/'], function (){
            Route::get('partners', [PartnersController::class, 'partners']);
            Route::get('partner/{business}', [PartnersController::class, 'partner']);
            Route::get('bonuses', [PartnersController::class, 'partners']);
            Route::get('partner/{business}/bonuses', [PartnersController::class, 'partnerBonuses']);
            Route::get('partners/search', [PartnersController::class, 'searchPartners']);
            Route::put('profile', [ClientsController::class, 'update']);
            Route::post('profile/image', [ImageController::class, 'setProfileImage']);
        });

    });
    Route::group(['middleware' => 'role:Employee', 'IsTrueEmployee'], function (){
        Route::put('business/{business}/employee/{employee}', [EmployeeController::class, 'update']);
    });
});


