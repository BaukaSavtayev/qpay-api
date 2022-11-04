<?php

namespace App\Actions\Business;

use App\Contracts\Business\DeleteBusiness;
use App\Models\Account;
use App\Models\BonusSettings;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\Contact;
use App\Models\Employee;
use App\Models\ModelUser;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DeleteAction implements DeleteBusiness
{
    public function execute(int $id): mixed
    {
        $user = User::where('userable_id', $id)->first();
        if ($user->userable_type != Business::class){
            return [
                'success' => false,
                'message' => 'Бизнес профиль не найден',
            ];
        }
        $res = DB::transaction(function () use ($id, $user){

            $user->userable_id = null;
            $user->userable_type = null;
            $user->save();

            Schedule::where('business_id', $id)->delete();
            BusinessCategory::where('business_id', $id)->delete();
            Account::where('accountable_id', $id)->delete();
            BonusSettings::where('business_id', $id)->delete();
            Contact::where('business_id', $id)->delete();

            //edit
            Employee::where('business_id', $id)->delete();
            //edit


            $user->removeRole('Business');

            Business::destroy($id);
            return [
                'success' => true,
                'message' => 'Бизнес удален'
            ];
        });
        return $res;
    }
}
