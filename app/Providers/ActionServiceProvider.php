<?php

namespace App\Providers;

use App\Actions as Actions;
use App\Contracts as Contracts;
use Illuminate\Support\ServiceProvider;


class ActionServiceProvider extends ServiceProvider
{
    public array $singletons = [
        Contracts\Business\Register\RegisterBusiness::class => Actions\Business\Register\RegisterAction::class,
        Contracts\Business\UpdateBusiness::class => Actions\Business\UpdateAction::class,
        Contracts\Business\ShowBusiness::class => Actions\Business\ShowAction::class,
        Contracts\Business\DeleteBusiness::class => Actions\Business\DeleteAction::class,

        Contracts\Business\Schedule\setSchedule::class => Actions\Business\Schedule\UpdateAction::class,
        Contracts\Business\City\SetCity::class => Actions\Business\City\UpdateAction::class,
        Contracts\Business\Contacts\SetContacts::class => Actions\Business\Contacts\UpdateAction::class,
        Contracts\Business\Categories\SetCategories::class => Actions\Business\Categories\UpdateAction::class,

        Contracts\Business\Employee\Register\RegisterEmployee::class => Actions\Business\Employee\Register\RegisterAction::class,
        Contracts\Business\Employee\UpdateEmployee::class => Actions\Business\Employee\UpdateAction::class,
        Contracts\Business\Employee\DeleteEmployee::class => Actions\Business\Employee\DeleteAction::class,

        Contracts\Business\Account\TopUpAccount::class => Actions\Business\Account\TopUpAction::class,

        Contracts\Client\Register\RegisterClient::class => Actions\Client\Register\RegisterAction::class,

        Contracts\Business\Bonuses\SetBonusesParams::class => Actions\Business\Bonuses\UpdateAction::class,
        Contracts\Business\Bonuses\SendBonus::class => Actions\Business\Bonuses\SendAction::class,
        Contracts\Business\Bonuses\WithdrawalBonuses::class => Actions\Business\Bonuses\Withdrawal::class,

        Contracts\Image\SetImage::class => Actions\Image\UpdateAction::class,

        Contracts\Business\Dashboard\GetDailySales::class => Actions\Business\Dashboard\DailySales\GetAction::class,
        Contracts\Business\Dashboard\GetRepeatedSales::class => Actions\Business\Dashboard\RepeatedSales\GetAction::class,
        Contracts\Business\Dashboard\GetSalesAverage::class => Actions\Business\Dashboard\SalesAverage\GetAction::class,
        Contracts\Business\Dashboard\GetClientsRatio::class => Actions\Business\Dashboard\ClientsRatio\GetAction::class,
        Contracts\Business\Dashboard\GetSalesDynamics::class => Actions\Business\Dashboard\SalesDynamics\GetAction::class,
        Contracts\Business\Dashboard\GetCustomerChurn::class => Actions\Business\Dashboard\CustomerChurn\GetAction::class,


        Contracts\Business\Clients\SearchBusinessClients::class => Actions\Business\Clients\SearchAction::class,

        Contracts\Client\SearchPartners::class => Actions\Client\Partners\SearchAction::class,
        Contracts\Client\ClientUpdate::class => Actions\Client\UpdateAction::class,
        Contracts\Client\Partners\GetAllPartnersWithBonuses::class => Actions\Client\Partners\GetAction::class,
        Contracts\Client\Partners\GetPartner::class => Actions\Client\Partners\GetOneAction::class,

        Contracts\Category\ShowAllCategories::class => Actions\Category\ShowCatsAction::class,
        Contracts\Category\ShowCategoryBusinesses::class => Actions\Category\ShowCatBusinessesAction::class,
        Contracts\Category\ShowBusinessCategories::class => Actions\Category\ShowBusinessCatsAction::class,

        Contracts\Transaction\GetAllTransactions::class => Actions\Transaction\GetAction::class,
        Contracts\Transaction\GetAccrualTransactions::class => Actions\Transaction\Accrual\GetAction::class,
        Contracts\Transaction\GetWithdrawalTransactions::class => Actions\Transaction\Withdrawal\GetAction::class,
        Contracts\Business\Clients\ShowOneClient::class => Actions\Business\Clients\ShowAction::class,
    ];
}
