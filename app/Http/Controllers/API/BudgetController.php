<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BudgetPost;
use App\Models\Budgets;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{
    public function addDebit(BudgetPost $req) {
        try {
            DB::beginTransaction();
            $prevBalance = Budgets::pluck('balance')->last();
    
            Budgets::create([
                'details'   => 'Income',
                'debits'    => $req->income,
                'balance'   => (!empty($prevBalance)) ? $prevBalance+$req->income : $req->income,
            ]);
            $results = Budgets::get();
            DB::commit();

            return response()->json(['state'=>'success','msg'=>'New Income added!','data'=>$results]);
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['state'=>'failed','msg'=>$th->getMessage()]);
        }
    }

    public function addCredit(BudgetPost $req) {
        try {
            DB::beginTransaction();
            $prevBalance = Budgets::pluck('balance')->last();

            if (empty($prevBalance)) {
                return response()->json(['state'=>'failed','msg'=>'Your Balance is empty!']);
            } else {
                if ($req->expense > $prevBalance) {
                    return response()->json(['state'=>'failed','msg'=>'Your Balance is not enough!']);
                } else {
                    Budgets::create([
                        'details'   => 'Expense',
                        'credits'   => $req->expense,
                        'balance'   => (!empty($prevBalance)) ? $prevBalance-$req->expense : 0,
                    ]);
                }
            }
            $results = Budgets::get();
            DB::commit();

            return response()->json(['state'=>'success','msg'=>'New Expense added!','data'=>$results]);
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['state'=>'failed','msg'=>$th->getMessage()]);
        }
    }

    public function resetBudget() {
        try {
            Budgets::truncate();
            return response()->json(['state'=>'success','msg'=>'All budgets deleted!']);
        } catch (\Throwable $th) {
            return response()->json(['state'=>'failed','msg'=>$th->getMessage()]);
        }
    }
}
