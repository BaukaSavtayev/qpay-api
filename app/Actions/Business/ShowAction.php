<?php

namespace App\Actions\Business;

use App\Models\Business;

class ShowAction implements \App\Contracts\Business\ShowBusiness
{

    public function execute(int $id): mixed
    {
        return Business::find($id);
    }
}
