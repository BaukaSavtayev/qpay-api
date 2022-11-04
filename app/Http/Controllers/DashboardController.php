<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeIntervalRequest;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Contracts\Business\Dashboard as Actions;

class DashboardController extends Controller
{

    public function daily(Business $business, TimeIntervalRequest $request)
    {
        return app(Actions\GetDailySales::class)->execute($business, $request->get('time_interval'));
    }
    public function average(Business $business, TimeIntervalRequest $request)
    {
        return app(Actions\GetSalesAverage::class)->execute($business, $request->get('time_interval'));
    }
    public function repeated(Business $business, TimeIntervalRequest $request)
    {
        return app(Actions\GetRepeatedSales::class)->execute($business, $request->get('time_interval'));
    }
    public function churn(Business $business)
    {
        return app(Actions\GetCustomerChurn::class)->execute($business);
    }
    public function ratio(Business $business)
    {
        return app(Actions\GetClientsRatio::class)->execute($business);
    }
    public function dynamic(Business $business, TimeIntervalRequest $request)
    {
        return app(Actions\GetSalesDynamics::class)->execute($business, $request->get('time_interval'));
    }
}
