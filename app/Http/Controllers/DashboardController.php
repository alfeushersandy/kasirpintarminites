<?php

namespace App\Http\Controllers;

use App\Enums\ReimburseStatus;
use App\Models\Reimbursement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if(Auth::user()->jabatan == 'Direktur' || Auth::user()->jabatan == 'Finance'){
            $request = Reimbursement::count();
            $pending = Reimbursement::where('status', ReimburseStatus::Pending)->count();
            $approve = Reimbursement::where('status', ReimburseStatus::Approve)->count();
            $reject = Reimbursement::where('status', ReimburseStatus::Reject_Dir)->where('status', ReimburseStatus::Reject_Dir)->count();
            $verified = Reimbursement::where('status', ReimburseStatus::Verified)->count();
        }else{
            $request = Reimbursement::where('user_id', Auth::user()->id)->count();
            $pending = Reimbursement::where('status', ReimburseStatus::Pending)->where('user_id', Auth::user()->id)->count();
            $approve = Reimbursement::where('status', ReimburseStatus::Approve)->where('user_id', Auth::user()->id)->count();
            $reject = Reimbursement::where('status', ReimburseStatus::Reject_Dir)->where('status', ReimburseStatus::Reject_Dir)->where('user_id', Auth::user()->id)->count();
            $verified = Reimbursement::where('status', ReimburseStatus::Verified)->where('user_id', Auth::user()->id)->count();
        }
        return view('dashboard.index', compact(['request', 'pending', 'approve', 'reject', 'verified']));
    }
}
