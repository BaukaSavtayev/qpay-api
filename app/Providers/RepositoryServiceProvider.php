<?php

namespace App\Providers;

use App\Repositories as Repositories;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        Repositories\EloquentRepositoryInterface::class => Repositories\Eloquent\BaseRepository::class,
        Repositories\BusinessRepositoryInterface::class => Repositories\Eloquent\BusinessRepository::class,
        Repositories\EmployeeRepositoryInterface::class => Repositories\Eloquent\EmployeeRepository::class,
        Repositories\BusinessCategoryRepositoryInterface::class => Repositories\Eloquent\BusinessCategoryRepository::class,
        Repositories\UserRepositoryInterface::class => Repositories\Eloquent\UserRepository::class,
        Repositories\DashboardRepositoryInterface::class => Repositories\Eloquent\DashboardRepository::class,
        Repositories\ClientRepositoryInterface::class => Repositories\Eloquent\ClientRepository::class,
        Repositories\PaymentRepositoryInterface::class => Repositories\Eloquent\PaymentRepository::class,
        Repositories\CategoryRepositoryInterface::class => Repositories\Eloquent\CategoryRepository::class,
        Repositories\ScheduleRepositoryInterface::class => Repositories\Eloquent\ScheduleRepository::class,
        Repositories\ContactRepositoryInterface::class => Repositories\Eloquent\ContactRepository::class,
        Repositories\ImageRepositoryInterface::class => Repositories\Eloquent\ImageRepository::class,
        Repositories\CityRepositoryInterface::class => Repositories\Eloquent\CityRepository::class,
        Repositories\PartnerRepositoryInterface::class => Repositories\Eloquent\PartnerRepository::class,
        Repositories\BonusRepositoryInterface::class => Repositories\Eloquent\BonusRepository::class,
        Repositories\BonusSettingsRepositoryInterface::class => Repositories\Eloquent\BonusSettingsRepository::class,
        Repositories\TransactionRepositoryInterface::class => Repositories\Eloquent\TransactionRepository::class,

    ];
}
