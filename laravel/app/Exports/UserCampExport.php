<?php
namespace App\Exports;
use App\Models\UserCamp;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UserCampExport implements FromView
{
    public function view(): View
    {
        $users = UserCamp::query();
        $users = $users->where('active',1)->latest()->get();
        return view('Admin.usercamp.excel', compact('users'));
    }
}

