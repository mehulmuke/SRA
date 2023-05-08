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


class MissingelectiondocumentsController extends Controller
{
    /**
     * Display the dashboard with its widgets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = DB::table('missing_election_details')->where('status',0)->get();
        return view('admin::missingelectiondocuments.index', compact('query'));
       
    }

}
