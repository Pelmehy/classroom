<?php

namespace App\Exports;

use App\Models\UserInfo;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function view(): View
    {
//        dd($this->users);
        return view('exports.passwords', [
            'users' => $this->users,
        ]);
    }
}
