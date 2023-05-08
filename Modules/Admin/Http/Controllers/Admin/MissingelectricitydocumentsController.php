<?php

namespace Modules\Admin\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Smalot\PdfParser\Parser;
use DOMDocument;
use thiagoalessio\TesseractOCR\TesseractOCR;

// use Modules\Admin\Http\Controllers\Admin\ManualData;
// use Modules\Admin\Base\Eloquent\ManualData;


class MissingelectricitydocumentsController extends Controller
{
    /**
     * Display the dashboard with its widgets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = DB::table('missing_electricity_details')->get();
        return view('admin::missingelectricitydocuments.index', compact('query'));

    }

    public function manualdata($hut_id){
    // Fetch category and year options
    $category_options = ['Residencial','Commercial']; // example options
    $year_options = ['2000', '2011', '2023']; // example options

    return view('admin::missingelectricitydocuments.manualdata', compact('category_options', 'year_options','hut_id'));


        }
    public function storeManualData(Request $request)
    {

        // Get the form data
        $hutId = $request->input('hut_id');
        $categoryId = $request->input('category_id');
        $year = $request->input('year');
        $image = $request->file('image');
        $path = $request->image->getClientOriginalName();

        // echo $categoryId;die;
        $new_path =  $hutId.'_li_bill.jpeg';
        $request->image->move(public_path('images'), $hutId.'_li_bill.jpeg');


        DB::table('missing_electricity_details')
                ->where('hut_id', $hutId)
                ->update(['category' => $categoryId,'year'=>$year,'file'=>$new_path,'status'=>1]);



        // Redirect the user to the page showing the manual data
        // return view('admin::sra.index');

        // return redirect()->route('admin.sra.index')->with('status', 'Profile updated!');
        return redirect()->route('admin.missingelectricitydocuments.index')->with('status', 'Document updated Successfully!');


    }

}
