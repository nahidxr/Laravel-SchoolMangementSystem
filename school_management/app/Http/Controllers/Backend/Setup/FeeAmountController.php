<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\FeeCategory;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\FeeCategoryAmount;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class FeeAmountController extends Controller
{
    public function ViewFeeAmount()
    {
        // $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();




        //using query builder
        $query = 'select fee_categories.id,fee_categories.name from fee_category_amounts
        inner join fee_categories on fee_category_amounts.fee_category_id= fee_categories.id
        group by fee_categories.id,fee_categories.name';

        $data['allData'] = DB::select($query);
        // dd($data);


        // $data['allData'] = FeeCategoryAmount::all();
        return view('backend.setup.fee_amount.view_fee_amount', $data);
    }

    public function AddFeeAmount()
    {

        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount', $data);
    }
    public function StoreFeeAmount(Request $request)
    {


        $countClass = count($request->class_id);
        if ($countClass != NULL) {
            for ($i = 0; $i < $countClass; $i++) {
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        }
        $notification = array(
            'message' => 'Fee Amount Inserted Successfully',
            'alert-type' => 'success'


        );
        return redirect()->route('fee.amount.view')->with($notification);
    }

    public function FeeAmountEdit($id)
    {
        // $editData = FeeCategoryAmount::find($id);

        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        $data['editData'] = FeeCategoryAmount::where('fee_category_id', $id)->orderBy('class_id', 'asc')->get();
        // dd($data);

        // dd($data);

        // return view('backend.setup.fee_category.edit_fee_cat', compact('editData'));
        return view('backend.setup.fee_amount.edit_fee_amount', $data);
    }
    public function FeeAmountUpdate(Request $request, $free_category_id)
    {

        if ($request->class_id == NULL) {
            $notification = array(
                'message' => 'Sorry!!',
                'alert-type' => 'error'


            );
            return redirect()->route('fee.amount.edit', $free_category_id)->with($notification);
        } else {

            $countClass = count($request->class_id);
            FeeCategoryAmount::where('fee_category_id', $free_category_id)->delete();
            if ($countClass != NULL) {
                for ($i = 0; $i < $countClass; $i++) {
                    $fee_amount = new FeeCategoryAmount();
                    $fee_amount->fee_category_id = $request->fee_category_id;
                    $fee_amount->class_id = $request->class_id[$i];
                    $fee_amount->amount = $request->amount[$i];
                    $fee_amount->save();
                }
            }
            $notification = array(
                'message' => 'Fee Amount Updated Successfully',
                'alert-type' => 'success'


            );
            return redirect()->route('fee.amount.view')->with($notification);
        }
    }

    public function FeeAmountDelete($id)
    {

        $data = FeeCategoryAmount::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Fee Amount Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('fee.amount.view')->with($notification);
    }

    public function FeeAmountDetails($id)
    {

        // $query = 'select fee_categories.id,fee_categories.name from fee_category_amounts
        // inner join fee_categories on fee_category_amounts.fee_category_id= fee_categories.id
        // group by fee_categories.id,fee_categories.name';

        // $data['allData'] = DB::select($query);

        

        // $data['detailsData'] = DB::table('fee_category_amounts')
        //     ->join('student_classes ', 'fee_category_amounts.class_id', '=', 'student_classes .id')
        //     ->select('fee_category_amounts.fee_category_id', 'student_classes.id', 'student_classes.name', 'fee_category_amounts.amount')
        //     ->groupBy('fee_category_amounts.fee_category_id', 'student_classes.id', 'student_classes.name', 'fee_category_amounts.amount')
        //     ->where('fee_category_id', $id)
        //     ->get();
        // // dd($data);


        // $data['detailsData'] = FeeCategoryAmount::where('fee_category_id', $id)->orderBy('class_id', 'asc')->get();


        // $data['allData'] = FeeCategoryAmount::all();
        return view('backend.setup.fee_amount.details_fee_amount', $data);
    }
}
