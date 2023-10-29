<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Statistic;
use App\Models\Products;

class StatisticController extends Controller
{
    public function saveStatistic(Request $request) {
        $id = $request->id;

        $product = Products::find($id);
        $check = Statistic::where('product_id', $id)->first();

        if(!$check) {
            $statistic = new Statistic();
            $statistic->product_id = $product->product_id;
            $statistic->company_id = $product->user_id;
            $statistic->count = 1;
            $statistic->save();
        }else {
            $check->count = (int)$check->count + 1;
            $check->update();
        }
        return true;
    }

}
