<?php

namespace Modules\Admin\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Smalot\PdfParser\Parser;
use DOMDocument;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


// use Modules\Admin\Http\Controllers\Admin\ManualData;
// use Modules\Admin\Base\Eloquent\ManualData;


class SraController extends Controller
{
    /**
     * Display the dashboard with its widgets.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {

    //     $email = Auth::user()->email;
    // $cluster_id = DB::table('users')
    //     ->where('email', $email)
    //     ->value('cluster_id');

       
    //     $hut_survey_id = $request->input('hut_survey_id');
    //     $cluster_id = $request->input('cluster_id');
    //     $scheme_name = $request->input('scheme_name');
    //     $sort = $request->input('sort', 'HUTSURVERYID');
    //     $order = $request->input('order', 'asc');
    //     DB::enableQueryLog();

    //     $query = DB::connection('simconn')
    //     ->table('T_HUTOWNERINFODETAILS as h')
    //     ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
    //     ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
    //     ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
    //     ->select(
    //         'h.HUTSURVERYID',
    //         'p.ClusterId',
    //         DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
    //         DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"),
    //         'h.hutOwner_Current_Address as Address',
    //         't.PropertyType','h.FLOORNUM',
    //         'h.HUTLENGTH',
    //         'h.HUTWIDTH',
    //         DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area')
    //     )
    //     ->when($hut_survey_id, function ($query, $hut_survey_id) {
    //         return $query->where('h.HUTSURVERYID', $hut_survey_id);
    //     })
    //     ->where('p.ClusterId', $cluster_id)
    //     ->when($scheme_name, function ($query, $scheme_name) {
    //         return $query->where('s.SchemeName', 'like', "%{$scheme_name}%");
    //     })
    //     ->orderBy($sort, $order)
    //     ->get();
    //     dd(DB::getQueryLog()); die;

    //     $work = $inprogress = $completed = $missing = 0;
        
    //     // return datatables($query)->make();
    //     return view('admin::sra.index', compact('query', 'sort', 'order','work','inprogress','completed','missing'));
    // }


    public function index(Request $request)
{
    $email = Auth::user()->email;
    $cluster_id = DB::table('users')
        ->where('email', $email)
        ->value('cluster_id');

    $hut_survey_id = $request->input('hut_survey_id');
    $cluster_id_from_request = $request->input('cluster_id');
    $scheme_name = $request->input('scheme_name');
    $sort = $request->input('sort', 'HUTSURVERYID');
    $order = $request->input('order', 'asc');

    $query = DB::connection('simconn')
        ->table('T_HUTOWNERINFODETAILS as h')
        ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
        ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
        ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
        ->select(
            'h.HUTSURVERYID',
            'p.ClusterId',
            DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
            DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"),
            'h.hutOwner_Current_Address as Address',
            't.PropertyType','h.FLOORNUM',
            'h.HUTLENGTH',
            'h.HUTWIDTH',
            DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area')
        )
        ->when($hut_survey_id, function ($query, $hut_survey_id) {
            return $query->where('h.HUTSURVERYID', $hut_survey_id);
        })
        ->where('p.ClusterId', $cluster_id_from_request ?: $cluster_id)
        ->when($scheme_name, function ($query, $scheme_name) {
            return $query->where('s.SchemeName', 'like', "%{$scheme_name}%");
        })
        ->orderBy($sort, $order)
        ->get();
    
    //adhar end
        $year = 0;
     foreach($query as $data)
    {
         /*$merge_query = DB::table('adhar_document')
                       ->select('hut_id', DB::raw("CONCAT('Aadhar Document ', ' with UID ', uid, ', and address ', address) AS remark"))
                       -> where('hut_id',$data->HUTSURVERYID)
                       ->first();*/
       /* $merge_query = DB::table('election_document')
                       ->select('hut_id','year', DB::raw("CONCAT('election_document ',(CASE YEAR WHEN 2023 THEN 'Current Year' WHEN 2000 THEN 'Year 2000 or before' WHEN 2011 THEN 'Between 2000 and 2011' END),' with voter_id ', voter_id,', and address ', address) AS remark"))
                       -> where('hut_id',$data->HUTSURVERYID)
                       ->first();*/
         /* $merge_query = DB::table('electricity_document')
                       ->select('hut_id','year', DB::raw("CONCAT('electricity_document ',(CASE YEAR WHEN 2023 THEN 'Current Year' WHEN 2000 THEN 'Year 2000 or before' WHEN 2011 THEN 'Between 2000 and 2011' END),' with CA Number ',ca_number,', Bill dated ',bill_date,', with address ',
        elector_address,', having category ', category) AS remark"))
                       -> where('hut_id',$data->HUTSURVERYID)
                       ->first();*/
           /* $merge_query = DB::table('gumasta_document')
                       ->select('hut_id','year', DB::raw("CONCAT('gumasta_document ',(CASE YEAR WHEN 2023 THEN 'Current Year' WHEN 2000 THEN 'Year 2000 or before' WHEN 2011 THEN 'Between 2000 and 2011' END),' with License Number ',license_number,', Issue dated ',license_issue_date,
               ', Organization Name ',organization_name,', with address ', address,', Owner Name ',owner_name) AS remark"))
                       -> where('hut_id',$data->HUTSURVERYID)
                       ->first();*/
           /*  $merge_query = DB::table('photopass_document')
                       ->select('hut_id','year', DB::raw("CONCAT('photopass','with Survey Receipt No', survey_receipt_no,' With Name',name_as_per_survey_receipt) AS remark"))
                       -> where('hut_id',$data->HUTSURVERYID)
                       ->first();
*/
                      // print_r($merge_query);
                       //die;
         /*if(isset($merge_query->hut_id)){
             $chk_data = DB::table('sims_master_detail')->where('hut_id',$data->HUTSURVERYID)->get();
                if(count($chk_data) == 0){
                 DB::table('sims_master_detail')->insert([
                                'hut_id'=>$data->HUTSURVERYID,
                                'user_id'=>auth()->user()->id,
                                'photopass_status'=>1,
                                'photopass_remark'=>isset($merge_query->remark)?$merge_query->remark:'',
                                'created_at'=>NOW(),
                                
                        ]);        
                }else{
                     DB::table('sims_master_detail')
                    ->where('hut_id',$data->HUTSURVERYID)
                    ->update(['photopass_status' => '1','photopass_remark'=>isset($merge_query->remark)?$merge_query->remark:'','updated_at'=>NOW()]);
                }

                $chk_data1 = DB::table('sims_master')->where('hut_id',$data->HUTSURVERYID)->get();
                if(count($chk_data1) == 0){
                 DB::table('sims_master')->insert([
                                'hut_id'=>$data->HUTSURVERYID,
                                'created_at'=>NOW(),
                                
                        ]);        
                }
*/
                //adaar start
               
               /* $chk_data2 = DB::table('recommendation_adhar')->where('hut_id',$data->HUTSURVERYID)->where( 'user_id',auth()->user()->id)->where('user','ca')->get();
                if(count($chk_data2) == 0){
                 DB::table('recommendation_adhar')->insert([
                                'hut_id'=>$data->HUTSURVERYID,
                                'year'=>1,
                                'user_id'=>auth()->user()->id,
                                'overall_remark'=>isset($merge_query->remark)?$merge_query->remark:'',
                                'overall_eligibility'=>1,
                                'user'=>'ca',
                                'created_at'=>NOW(),
                                
                        ]);        
                }*/
                 //adhar end
                //election start

                /*if($merge_query->year == "Current Year"){
                    $year = 3;
                }
                if($merge_query->year == "Year 2000 or before"){
                    $year = 1;
                }
                if($merge_query->year == "Between 2000 and 2011"){
                    $year = 2;
                }
                 $chk_data2 = DB::table('recommendation_election')->where('hut_id',$data->HUTSURVERYID)->where( 'user_id',auth()->user()->id)->where('user','ca')->get();

                if(count($chk_data2) == 0){
                 DB::table('recommendation_election')->insert([
                                'hut_id'=>$data->HUTSURVERYID,
                                'year'=>$year,
                                'user_id'=>auth()->user()->id,
                                'overall_remark'=>isset($merge_query->remark)?$merge_query->remark:'',
                                'overall_eligibility'=>1,
                                'user'=>'ca',
                                'created_at'=>NOW(),
                                
                        ]);        
                }*/
                //election end

                //electricity start
                /*if($merge_query->year == "Current Year"){
                    $year = 3;
                }
                if($merge_query->year == "Year 2000 or before"){
                    $year = 1;
                }
                if($merge_query->year == "Between 2000 and 2011"){
                    $year = 2;
                }
                 $chk_data2 = DB::table('recommendation_electricity')->where('hut_id',$data->HUTSURVERYID)->where( 'user_id',auth()->user()->id)->where('user','ca')->get();

                if(count($chk_data2) == 0){
                 DB::table('recommendation_electricity')->insert([
                                'hut_id'=>$data->HUTSURVERYID,
                                'year'=>$year,
                                'user_id'=>auth()->user()->id,
                                'overall_remark'=>isset($merge_query->remark)?$merge_query->remark:'',
                                'overall_eligibility'=>1,
                                'user'=>'ca',
                                'created_at'=>NOW(),
                                
                        ]);        
                }*/
                //electricity end

                //gumasta start
              /*  if($merge_query->year == "Current Year"){
                    $year = 3;
                }
                if($merge_query->year == "Year 2000 or before"){
                    $year = 1;
                }
                if($merge_query->year == "Between 2000 and 2011"){
                    $year = 2;
                }
                 $chk_data2 = DB::table('recommendation_gumasta')->where('hut_id',$data->HUTSURVERYID)->where( 'user_id',auth()->user()->id)->where('user','ca')->get();

                if(count($chk_data2) == 0){
                 DB::table('recommendation_gumasta')->insert([
                                'hut_id'=>$data->HUTSURVERYID,
                                'year'=>$year,
                                'user_id'=>auth()->user()->id,
                                'overall_remark'=>isset($merge_query->remark)?$merge_query->remark:'',
                                'overall_eligibility'=>1,
                                'user'=>'ca',
                                'created_at'=>NOW(),
                                
                        ]);        
                }*/
                //gumasta end

                //photopass start
               
                
                 /*$chk_data2 = DB::table('recommendation_photopass')->where('hut_id',$data->HUTSURVERYID)->where( 'user_id',auth()->user()->id)->where('user','ca')->get();

                if(count($chk_data2) == 0){
                 DB::table('recommendation_photopass')->insert([
                                'hut_id'=>$data->HUTSURVERYID,
                                'year'=>$year,
                                'user_id'=>auth()->user()->id,
                                'overall_remark'=>isset($merge_query->remark)?$merge_query->remark:'',
                                'overall_eligibility'=>1,
                                'user'=>'ca',
                                'created_at'=>NOW(),
                                
                        ]);        
                }*/
              
                //photopass end
           /* }*/
        
            //die;
    }
    $work = $inprogress = $completed = $missing = 0;

    foreach($query as $data)
    {
        // print_r($data);die;
        $flag = 0;
        $missing_query_id = DB::table('missing_document')
        ->select('*')
        ->where('status','0')
        ->where('hut_id',$data->HUTSURVERYID)
        ->where('cluster_id',auth()->user()->cluster_id)
        ->get();

        $missing_id = count($missing_query_id);
        if($missing_id <= 0)
        {
            $completed_id_query = DB::table('sims_master')
                            ->select('*')
                            ->where('status','1')
                            ->where('hut_id', $data->HUTSURVERYID)
                            ->where('user_id',auth()->user()->id)
                            ->get();
            $completed_id = count($completed_id_query);
            
            if($completed_id <= 0)
            {
                $recommendation_gumasta = DB::table('recommendation_gumasta')
                            ->select('*')
                            ->where('hut_id', $data->HUTSURVERYID)
                            ->get();
                if(count($recommendation_gumasta) > 0)
                        $flag = 1;

                $recommendation_adhar = DB::table('recommendation_adhar')
                            ->select('*')
                            ->where('hut_id', $data->HUTSURVERYID)
                            ->get();
                if(count($recommendation_adhar) > 0)
                        $flag = 1;
                
                $recommendation_agreement = DB::table('recommendation_agreement')
                            ->select('*')
                            ->where('hut_id', $data->HUTSURVERYID)
                            ->get();
                if(count($recommendation_agreement) > 0)
                        $flag = 1;
                
                $recommendation_election = DB::table('recommendation_election')
                        ->select('*')
                        ->where('hut_id', $data->HUTSURVERYID)
                        ->get();
                if(count($recommendation_election) > 0)
                    $flag = 1;

                $recommendation_electricity = DB::table('recommendation_electricity')
                    ->select('*')
                    ->where('hut_id', $data->HUTSURVERYID)
                    ->get();
                if(count($recommendation_electricity) > 0)
                    $flag = 1;
                
                /*---- Photopass recommendation when work with photopass please uncomment the code ----*/
                // $recommendation_photopass = DB::table('recommendation_photopass')
                //     ->select('*')
                //     ->where('hut_id', $data->HUTSURVERYID)
                //     ->get();
                // if(count($recommendation_photopass) > 0)
                //     $flag = 1;

                /*---- END ----*/
                $results_total = DB::table('sims_master_detail')
                        ->where('hut_id', $data->HUTSURVERYID)
                        ->where(function ($query) {
                            $query->where('election_status', '>', 0)
                                ->orWhere('electricity_status', '>', 0)
                                ->orWhere('overall_status', '>', 0)
                                ->orWhere('adhar_status', '>', 0)
                                ->orWhere('agreement_status', '>', 0)
                                ->orWhere('photopass_status', '>', 0);
                        })
                        ->get();
                
                if(count($results_total) > 0)
                        $flag = 1;
                
                if($flag == 1)
                    $inprogress += 1;
                else
                    $work += 1;
            }
        }
    }
    
    $completed_query = DB::table('sims_master')
                        ->select('*')
                        ->where('status','1')
                        ->where('user_id',auth()->user()->id)
                        ->get();
    $completed = count($completed_query);
    
    $missing_query = DB::table('missing_document')
                        ->select('*')
                        ->where('status','0')
                        ->where('cluster_id',auth()->user()->cluster_id)
                        ->get();

    $missing = count($missing_query);

    return view('admin::sra.index', compact('query', 'sort', 'order', 'work', 'inprogress', 'completed', 'missing'));
}
public function work_status(Request $request, $status)
{
    $email = Auth::user()->email;
    $cluster_id = DB::table('users')
        ->where('email', $email)
        ->value('cluster_id');

    $hut_survey_id = $request->input('hut_survey_id');
    $cluster_id_from_request = $request->input('cluster_id');
    $scheme_name = $request->input('scheme_name');
    $sort = $request->input('sort', 'HUTSURVERYID');
    $order = $request->input('order', 'asc');
    
    $query_hut_details = DB::connection('simconn')
            ->table('T_HUTOWNERINFODETAILS as h')
            ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
            ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
            ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
            ->select(
                'h.HUTSURVERYID',
                'p.ClusterId',
                DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
                DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"),
                'h.hutOwner_Current_Address as Address',
                't.PropertyType','h.FLOORNUM',
                'h.HUTLENGTH',
                'h.HUTWIDTH',
                DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area')
            )
            ->when($hut_survey_id, function ($query, $hut_survey_id) {
                return $query->where('h.HUTSURVERYID', $hut_survey_id);
            })
            ->where('p.ClusterId', $cluster_id_from_request ?: $cluster_id)
            ->when($scheme_name, function ($query, $scheme_name) {
                return $query->where('s.SchemeName', 'like', "%{$scheme_name}%");
            })
            ->orderBy($sort, $order)
            ->get();

        $completed_query =  DB::table('sims_master')
            ->select('*')
            ->where('status','1')
            ->where('user_id',auth()->user()->id)
            ->get();
            $cmp_hut_ids = array();
        foreach($completed_query as $data_list)
        {
            $cmp_hut_ids[] = $data_list->hut_id;
        }
        // print_r($cmp_hut_ids);die;
    $query_work = $query_inprogress = $query_cmp = array();
    foreach($query_hut_details as $data)
    {
        // print_r($data);die;
        $flag = 0;
        $hut_id = $data->HUTSURVERYID;
        $missing_query_id = DB::table('missing_document')
        ->select('*')
        ->where('status','0')
        ->where('hut_id',$data->HUTSURVERYID)
        ->where('cluster_id',auth()->user()->cluster_id)
        ->get();

        $missing_id = count($missing_query_id);
        if($missing_id <= 0)
        {

            $completed_id_query = DB::table('sims_master')
            ->select('*')
            ->where('status','1')
            ->where('hut_id', $data->HUTSURVERYID)
            ->where('user_id',auth()->user()->id)
            ->get();
            $completed_id = count($completed_id_query);

            if($completed_id <= 0)
            {
                $recommendation_gumasta = DB::table('recommendation_gumasta')
                        ->select('*')
                        ->where('hut_id', $data->HUTSURVERYID)
                        ->get();
                if(count($recommendation_gumasta) > 0)
                    $flag = 1;

                $recommendation_adhar = DB::table('recommendation_adhar')
                        ->select('*')
                        ->where('hut_id', $data->HUTSURVERYID)
                        ->get();
                if(count($recommendation_adhar) > 0)
                    $flag = 1;

                $recommendation_agreement = DB::table('recommendation_agreement')
                        ->select('*')
                        ->where('hut_id', $data->HUTSURVERYID)
                        ->get();
                if(count($recommendation_agreement) > 0)
                    $flag = 1;

                $recommendation_election = DB::table('recommendation_election')
                    ->select('*')
                    ->where('hut_id', $data->HUTSURVERYID)
                    ->get();
                if(count($recommendation_election) > 0)
                $flag = 1;

                $recommendation_electricity = DB::table('recommendation_electricity')
                ->select('*')
                ->where('hut_id', $data->HUTSURVERYID)
                ->get();
                if(count($recommendation_electricity) > 0)
                $flag = 1;

                /*---- Photopass recommendation when work with photopass please uncomment the code ----*/
                // $recommendation_photopass = DB::table('recommendation_photopass')
                //     ->select('*')
                //     ->where('hut_id', $data->HUTSURVERYID)
                //     ->get();
                // if(count($recommendation_photopass) > 0)
                //     $flag = 1;

                /*---- END ----*/
                $results_total = DB::table('sims_master_detail')
                    ->where('hut_id', $data->HUTSURVERYID)
                    ->where(function ($query) {
                        $query->where('election_status', '>', 0)
                            ->orWhere('electricity_status', '>', 0)
                            ->orWhere('overall_status', '>', 0)
                            ->orWhere('adhar_status', '>', 0)
                            ->orWhere('agreement_status', '>', 0)
                            ->orWhere('photopass_status', '>', 0);
                    })
                    ->get();

                if(count($results_total) > 0)
                    $flag = 1;
                
                    if($flag == 1)
                    {
                        $query_inprogress[] = array(
                            'Area' => $data->Area,
                            'HUTWIDTH' => $data->HUTWIDTH,
                            'HUTLENGTH' => $data->HUTLENGTH,
                            'FLOORNUM' => $data->FLOORNUM,
                            'PropertyType' => $data->PropertyType,
                            'Address' => $data->Address,
                            'HUTOWNERNAME' => $data->HUTOWNERNAME,
                            'ClusterId' => $data->ClusterId,
                            'SchemeName' => $data->SchemeName,
                            'HUTSURVERYID' => $data->HUTSURVERYID
                        );
                    }    
                    else
                    {           
                        $query_work[] = array(
                            'Area' => $data->Area,
                            'HUTWIDTH' => $data->HUTWIDTH,
                            'HUTLENGTH' => $data->HUTLENGTH,
                            'FLOORNUM' => $data->FLOORNUM,
                            'PropertyType' => $data->PropertyType,
                            'Address' => $data->Address,
                            'HUTOWNERNAME' => $data->HUTOWNERNAME,
                            'ClusterId' => $data->ClusterId,
                            'SchemeName' => $data->SchemeName,
                            'HUTSURVERYID' => $data->HUTSURVERYID
                        );
                    }
            }

            if(in_array($hut_id,$cmp_hut_ids))
            {
                $query_cmp[] = array(
                    'Area' => $data->Area,
                    'HUTWIDTH' => $data->HUTWIDTH,
                    'HUTLENGTH' => $data->HUTLENGTH,
                    'FLOORNUM' => $data->FLOORNUM,
                    'PropertyType' => $data->PropertyType,
                    'Address' => $data->Address,
                    'HUTOWNERNAME' => $data->HUTOWNERNAME,
                    'ClusterId' => $data->ClusterId,
                    'SchemeName' => $data->SchemeName,
                    'HUTSURVERYID' => $data->HUTSURVERYID
                );
            }
        }
    }
    
    if($status == 1)
    {
        $query = $query_work;
    }
    if($status == 2)
    {
        $query = $query_inprogress;
    }
    if($status == 3)
    {
        $query = $query_cmp;
    }
    return view('admin::sra.work_status', compact('query', 'sort', 'order'));
}


    public function list_missingdocuments(Request $request)
    {
    }

    
    //     public function listingproof(Request $request,$hid)
    // {

    //     // print_r($request->all());die;

    //     // $hut_id = $request->input('hut_id');

    //     // Query the database to retrieve the data for the table
    //     $query =DB::connection('simconn')->table('T_HUTOWNERINFODETAILS as h')
    //     ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
    //     ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
    //     ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
    //     ->select('h.HUTSURVERYID', 'p.ClusterId', DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
    //     DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"), 'h.hutOwner_Current_Address as Address',
    //     't.PropertyType','h.FLOORNUM','h.HUTLENGTH', 'h.HUTWIDTH', DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area'))->where('HUTSURVERYID', '=', $hid)->get();

    //     $query1 = DB::connection('simconn')
    //         ->table('T_ImageDocumentsChild')
    //         ->select('DocumentContent','DOCCategory')
    //         ->where('HUTSURVERYID', '=', $hid)
    //          ->where('DOCCategory','DOC2')
    //         ->get();
    //         foreach($query1 as $img)
    //         {
    //             // print_r($img);
    //             $base64Image = $img->DocumentContent;
    //         }
    //     // print_r( $base64Image);die;
    //         $file_name = public_path('images/'.$hid.'_li_bill.jpeg');

    //         //--------------Base64 image code from DB
    //         // if(isset($base64Image))
    //         // {
    //         //     $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

    //         //     $fileRead = (new TesseractOCR($imageData))
    //         //     ->setLanguage('eng')
    //         //     ->run();

    //         //     $string = $fileRead;

    //         //     // print_r($string);die;
    //         // }
    //         //------------------End
    //         // echo "AMI";die;
    //         if(file_exists($file_name)){
    //             // $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
    //             $fileRead = (new TesseractOCR($file_name))
    //             ->setLanguage('eng')
    //             ->run();

    //             $string = $fileRead;
    //             // echo "<pre>";
    //             // print_r($fileRead);die;
    //             if($string != ''){
    //                 // if (preg_match('/\bACCOUNT NO\.\s*(\d{9})\b/', $string, $matches)) {
    //                 if (preg_match('/\bACCOUNT NO\.\s*(\d{9})\b/', $string, $matches)) {

    //                     // Account number found
    //                     $ca = $matches[1];
    //                     // echo $ca;
    //                 } else {
    //                     $ca = '';
    //                     // Account number not found
    //                 }
    //             }else
    //             {
    //                 $ca = '';
    //             }

    //         }
    //         else{
    //             $string = '';

    //             $ca_new = $request->input('ca_no');

    //             if(isset($ca_new))
    //             {
    //                 $ca = $ca_new;
    //             }
    //             else{
    //                 $ca = '';
    //             }
    //         }

    //         // echo $ca;die;
    //                 $nca = '';
    //                 $password = 'KJH#$@kds32@!kjhdkftt';
    //                 $salt = "SALT_VALUE";

    //                 $method = 'aes-256-cbc';
    //                 $iv = "16806642kbM7c5!$";
    //                 $iterations = 65536;
    //                 $keylength = 256;

    //                 $key = hash_pbkdf2("sha1", $password, ($salt), $iterations, $keylength,true);


    //                 $ca_parameter = base64_encode(openssl_encrypt($ca, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv));
    //                 $nca_parameter = base64_encode(openssl_encrypt($nca, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv));

    //                 $soapUrl = "https://issdev.adanielectricity.com/SRASERVICE/SRA_Service.asmx"; // asmx URL of WSDL

    //                 $xml_post_string = '<?xml version="1.0" encoding="utf-8"
    //                 <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
    //                 <soap:Body>
    //                     <SRA_Details xmlns="http://tempuri.org/">
    //                     <CA>' . $ca_parameter . '</CA>
    //                     <NCA>' . $nca_parameter . '</NCA>
    //                     </SRA_Details>
    //                 </soap:Body>
    //                 </soap:Envelope>';

    //                 $headers = array(
    //                 "Content-type: text/xml;charset=\"utf-8\"",
    //                 "Accept: text/xml",
    //                 "Cache-Control: no-cache",
    //                 "Pragma: no-cache",
    //                 "SOAPAction: http://tempuri.org/SRA_Details",
    //                 "Content-length: " . strlen($xml_post_string),
    //                 );

    //                 $url = $soapUrl;

    //                 $ch = curl_init();
    //                 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    //                 curl_setopt($ch, CURLOPT_URL, $url);
    //                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //                 curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
    //                 curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    //                 curl_setopt($ch, CURLOPT_POST, true);
    //                 curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
    //                 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //                 $response = curl_exec($ch);

    //             // Check for curl errors
    //             if (curl_errno($ch)) {
    //                 echo "Failed to retrieve data: " . curl_error($ch);
    //                 exit;
    //             }

    //             // Check for empty or null response
    //             if (!$response) {
    //                 echo "Empty or null response received";
    //                 exit;
    //             }
    //             // Parse the XML response
    //             $doc = new DOMDocument();
    //             if (!$doc->loadXML($response)) {
    //                 echo "Failed to parse XML response";
    //                 exit;
    //             }

    //             $decoded_response = base64_decode($doc->textContent);

    //             // Check for decoding errors
    //             if ($decoded_response === false) {
    //                 echo "Failed to decode response";
    //                 exit;
    //             }

    //             $responseData = openssl_decrypt($decoded_response, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
    //             // print_r($responseData);die;
    //             // Check for decryption errors
    //             if ($responseData === false) {
    //                 echo "Failed to decrypt response";
    //                 exit;
    //             }

    //             // print_r($responseData); die;
    //             //  echo "<pre>";
    //             $json_decoded = json_decode($responseData);
    //                 foreach($json_decoded as $key => $result){
    //                     $new_result[$key] = $result;
    //                 }

    //                 $service_provider_new = 'Adani';
    //                 $category_new = 'Lightbill';
    //                 $address_new = '';

    //                 //  print_r($new_result);die;
    //                 $service_provider = $request->input('service_provider');
    //                 $category = $request->input('category');
    //                 $address = $request->input('address');
    //                 if(isset($service_provider))
    //                     $service_provider_new = $service_provider;
    //                 if(isset($category))
    //                     $category_new = $category;
    //                 if(isset($address))
    //                     $address_new = $address;

    //              $chk_missing_status = 0;
    //             $missing_election_details = DB::table('missing_electricity_details')->where('hut_id',$hid)->get();
    //             $chk_missing_status = count($missing_election_details);
    //             $missing_images = array();
    //             $missing_images = DB::table('missing_electricity_details')->where('hut_id',$hid)->get();




    //     // Return the view with the data for the table
    //     return view('admin::sra.electricity', ['query' => $query , 'query1'=>$query1 ,'new_result'=>$new_result,'ca_no' => $ca,'address'=> $address_new,'service_provider'=>$service_provider_new,'category' => $category_new,'missing_status'=>$chk_missing_status,'missing_images'=>$missing_images]);
    // } -->
    public function detail(Request $request,$hid)
    {
        $ca = 0;
        // print_r($request->all());die;

        // $hut_id = $request->input('hut_id');

        // Query the database to retrieve the data for the table
        $query =DB::connection('simconn')->table('T_HUTOWNERINFODETAILS as h')
        ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
        ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
        ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
        ->select('h.HUTSURVERYID', 'p.ClusterId', DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
        DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"), 'h.hutOwner_Current_Address as Address',
        't.PropertyType','h.FLOORNUM','h.HUTLENGTH', 'h.HUTWIDTH', DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area'))->where('HUTSURVERYID', '=', $hid)->get();

        $query1 = DB::connection('simconn')
            ->table('T_ImageDocumentsChild')
            ->select('DocumentContent','DOCCategory')
            ->where('HUTSURVERYID', '=', $hid)
            ->where('DOCCategory','DOC2')
            ->get();

        $recomm_remarks = DB::table('recommendation_electricity')->where('hut_id',$hid)->where('user','vendor')->get();

        $recomm_remarks_ca = DB::table('recommendation_electricity')->where('hut_id',$hid)->where('user','ca')->where('user_id',auth()->user()->id)->get();
        $adani_data = DB::table('adani_electricity_data')->where('hut_id',$hid)->get();

        
        
        if(count($adani_data) == 0){
            //insert data start
            $query_find_ca = DB::table('electricity_document')
            ->select('*')
            ->where('hut_id', $hid)
            ->where('ca_number','!=','')
            ->first();
            if(isset($query_find_ca)){
                $ca = $query_find_ca->ca_number;
            }
            //adani api call start
                $password = 'KJH#$@kds32@!kjhdkftt';
                $salt = "SALT_VALUE";
                $nca = "";
                $method = 'aes-256-cbc';
                $iv = "16806642kbM7c5!$";
                $iterations = 65536;
                $keylength = 256;

                $key = hash_pbkdf2("sha1", $password, ($salt), $iterations, $keylength,true);

                //year 2000 start
                
                $ca_parameter = base64_encode(openssl_encrypt($ca, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv));
                $nca_parameter = base64_encode(openssl_encrypt($nca, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv));

                $soapUrl = "https://issdev.adanielectricity.com/SRASERVICE/SRA_Service.asmx"; // asmx URL of WSDL

                $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Body>
                    <SRA_Details xmlns="http://tempuri.org/">
                    <CA>' . $ca_parameter . '</CA>
                    <NCA>' . $nca_parameter . '</NCA>
                    </SRA_Details>
                </soap:Body>
                </soap:Envelope>';

                $headers = array(
                "Content-type: text/xml;charset=\"utf-8\"",
                "Accept: text/xml",
                "Cache-Control: no-cache",
                "Pragma: no-cache",
                "SOAPAction: http://tempuri.org/SRA_Details",
                "Content-length: " . strlen($xml_post_string),
                );

                $url = $soapUrl;

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                curl_setopt($ch, CURLOPT_TIMEOUT, 100);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $response = curl_exec($ch);
                //print_r($response);die;
                // Check for curl errors
                if (curl_errno($ch)) {
                    echo "Failed to retrieve data: " . curl_error($ch);
                    exit;
                }

                // Check for empty or null response
                if (!$response) {
                    echo "Empty or null response received";
                    exit;
                }
                // Parse the XML response
                $doc = new DOMDocument();
                if (!$doc->loadXML($response)) {
                    echo "Failed to parse XML response";
                    exit;
                }

                $decoded_response = base64_decode($doc->textContent);

                // Check for decoding errors
                if ($decoded_response === false) {
                    echo "Failed to decode response";
                    exit;
                }

                $responseData = openssl_decrypt($decoded_response, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
                // print_r($responseData);die;
                // Check for decryption errors
                if ($responseData === false) {
                    echo "Failed to decrypt response";
                    exit;
                }

                // print_r($responseData); die;
                //  echo "<pre>";
                $json_decoded = json_decode($responseData);
                                //  print_r($json_decoded); die;


                $arrears = $json_decoded->ARREARS;

                if ($arrears > 100) {
                    echo "<script>alert('You have pending Arrears Amount $arrears. Please pay first.')</script>";
                }
                foreach($json_decoded as $key => $result){
                    $new_result[$key] = $result;
                }
                $data_address = $owner_name = $category = $service_provider = $legacy_ca_no = $first_consumer_name = $first_bill_val = $change_name_date = $change_date = $ca_no = $move_in_date = $move_out_date = $legacy_customer = $house_no = $tariff = $flag_migr = "";
                $year = 0 ;
                $created_at= Now();
                foreach ($new_result as $key => $result) {
                  if(gettype($result) == 'array')
                  {    
                    foreach($result as $data)
                    {
                         if(isset($data->ZLEGACY_CA)){
                            $data_address = $data->ADD1 . ',' . $data->ADD2 . ',' . $data->ADD3;
                            $owner_name = $data->CUR_NAME;
                            $category = $data->CONS_TYPE;
                            $service_provider = "Adani Electricity";
                            $legacy_ca_no = $data->ZLEGACY_CA;
                            $first_consumer_name = $data->NAME_FIRST_CONS;
                            if($data->FIRST_BILL != ""){
                                $inyymm = $data->FIRST_BILL;
                                $year1 = substr($inyymm, 0, 2);
                                $month = substr($inyymm, 2, 2);
                                $date = Carbon::createFromFormat('!m-y', $month.'-'.$year1);
                                $first_bill_val= $date->format('m/Y');
                                $first_bill_val_year= $date->format('Y');
                                if($first_bill_val_year >= 2003 && $year < 2011 )
                                {
                                    $year = 2;
                                }else{
                                    $year = 1;
                                }
                            }
                            $change_name_date = $data->CHANGE_DATE;
                            $change_date = $data->SD_TRX_DATE;
                            
                            //insert query start

                            DB::table('adani_electricity_data')->insert(
                                    array(
                                        'hut_id'        =>   $hid,
                                        'owner_name'    =>   $owner_name,
                                        'address'    =>   $data_address,
                                        'category'       =>   $category,
                                        'service_provider' =>   $service_provider,
                                        'legacy_ca_no'     =>   $legacy_ca_no,
                                        'first_consumer_name'     =>   $first_consumer_name,
                                        'first_bill'     =>   $first_bill_val,
                                        'change_name_date'     =>   $change_name_date,
                                        'change_date'     =>   $change_date,
                                        'year'     =>   $year,
                                        'created_at'     =>   $created_at,
                                    )
                            );
                            //insert query end
                         }

                         if(isset($data->CA)){
                            $mi_date = isset($data->MI_DATE) ? $data->MI_DATE : '';
                            $mi_year = substr($mi_date,0,4);
                            if($mi_year >= 2000 && $mi_year < 2011 )
                            {
                                $data_address = $data->ADDRESS1 . ', ' . $data->ADDRESS2 . ', ' . $data->ADDRESS3.','.$data->PIN_CODE;
                                $owner_name = $data->NAME;
                                $ca_no = $data->CA;
                                $move_in_date = $data->MI_DATE;
                                $move_out_date = $data->MO_DATE;
                                $legacy_customer = $data->LEGACY_CUSTOMER;
                                $house_no = $data->HOUSE_NO;
                                $tariff = $data->TARIFF;
                                if($data->FLAG_MIGR == "X"){
                                    $flag_migr = "Changeover consumers";
                                }else{
                                    $flag_migr = $data->MO_DATE;
                                }
                                
                                $year = 2;
                                //insert query start
                               
                                DB::table('adani_electricity_data')->insert(
                                        array(
                                            'hut_id'        =>   $hid,
                                            'owner_name'    =>   $owner_name,
                                            'address'    =>   $data_address,
                                            'category'       =>   $category,
                                            'service_provider' =>   $service_provider,
                                            'ca_no'     =>   $ca_no,
                                            'move_in_date'     =>   $move_in_date,
                                            'move_out_date'     =>   $move_out_date,
                                            'legacy_customer'     =>   $legacy_customer,
                                            'house_no'     =>   $house_no,
                                            'tariff'     =>   $tariff,
                                            'flag_migr'     =>   $flag_migr,
                                            'year'     =>   $year,
                                            'created_at'     =>   $created_at,
                                        )
                                );
                                //insert query end
                            }
                           
                            if($mi_year >= 2011)
                            {
                                $data_address = $data->ADDRESS1 . ', ' . $data->ADDRESS2 . ', ' . $data->ADDRESS3.','.$data->PIN_CODE;
                                $owner_name = $data->NAME;
                                $ca_no = $data->CA;
                                $move_in_date = $data->MI_DATE;
                                $move_out_date = $data->MO_DATE;
                                $legacy_customer = $data->LEGACY_CUSTOMER;
                                $house_no = $data->HOUSE_NO;
                                $tariff = $data->TARIFF;
                                if($data->FLAG_MIGR == "X"){
                                    $flag_migr = "Changeover consumers";
                                }else{
                                    $flag_migr = $data->MO_DATE;
                                }
                                
                                $year = 3;
                                //insert query start
                               
                                DB::table('adani_electricity_data')->insert(
                                        array(
                                            'hut_id'        =>   $hid,
                                            'owner_name'    =>   $owner_name,
                                            'address'    =>   $data_address,
                                            'category'       =>   $category,
                                            'service_provider' =>   $service_provider,
                                            'ca_no'     =>   $ca_no,
                                            'move_in_date'     =>   $move_in_date,
                                            'move_out_date'     =>   $move_out_date,
                                            'legacy_customer'     =>   $legacy_customer,
                                            'house_no'     =>   $house_no,
                                            'tariff'     =>   $tariff,
                                            'flag_migr'     =>   $flag_migr,
                                            'year'     =>   $year,
                                            'created_at'     =>   $created_at,
                                        )
                                );
                                //insert query end
                            }
                         }
                         
                    }
                  }
                }
            //adani api call end

            //insert data end
        }
        //die;

        $adani_data_1 = DB::table('adani_electricity_data')->where('hut_id',$hid)->where('year',1)->get();
        $adani_data_2 = DB::table('adani_electricity_data')->where('hut_id',$hid)->where('year',2)->get();
        $adani_data_3 = DB::table('adani_electricity_data')->where('hut_id',$hid)->where('year',3)->get();
        // print_r($recomm_remarks);die;
        
            /*foreach($query1 as $img)
            {
                // print_r($img);
                $base64Image = $img->DocumentContent;
            }
        // print_r( $base64Image);die;
            $file_name = public_path('images/'.$hid.'_li_bill.jpeg');*/

            //--------------Base64 image code from DB
            // if(isset($base64Image))
            // {
            //     $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

            //     $fileRead = (new TesseractOCR($imageData))
            //     ->setLanguage('eng')
            //     ->run();

            //     $string = $fileRead;

            //     // print_r($string);die;
            // }
            //------------------End
            // echo "AMI";die;
            /*if(file_exists($file_name)){
                // $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
                $fileRead = (new TesseractOCR($file_name))
                ->setLanguage('eng')
                ->run();

                $string = $fileRead;
                // echo "<pre>";
                // print_r($fileRead);die;
                if($string != ''){
                    // if (preg_match('/\bACCOUNT NO\.\s*(\d{9})\b/', $string, $matches)) {
                    if (preg_match('/\bACCOUNT NO\.\s*(\d{9})\b/', $string, $matches)) {

                        // Account number found
                        //$ca = $matches[1];
                        $ca = '000102411935';

                        // echo $ca;
                    } else {
                        $ca = '';
                        // Account number not found
                    }
                }else
                {
                    $ca = '';
                }

            }
            else{
                $string = '';

                $ca_new = $request->input('ca_no');

                if(isset($ca_new))
                {
                    $ca = $ca_new;
                }
                else{
                    $ca = '';
                }
            }*/

            //echo $ca;die;
           // $ca = '';
            $query3 = DB::table('electricity_document')
            ->select('*')
            ->where('hut_id', $hid)
            ->where('year', '2000')
            ->get();

            $query4 = DB::table('electricity_document')
            ->select('*')
            ->where('hut_id', $hid)
            ->where('year', '2011')
            ->get();

            $query5 = DB::table('electricity_document')
            ->select('*')
            ->where('hut_id', $hid)
            ->where('year', '2023')
            ->get();
            
            /*if(count($query3) > 0){
                $ca = isset($query3[0]->ca_number)?$query3[0]->ca_number:'';
            }*/
            /*if(count($query4) > 0){
                $ca = isset($query4[0]->ca_number)?$query4[0]->ca_number:'';
            }
            if(count($query5) > 0){
                $ca = isset($query5[0]->ca_number)?$query5[0]->ca_number:'';
            }*/
                
                /*$ca1 = isset($query4[0]->ca_number)?$query4[0]->ca_number:'';
                $ca2 = isset($query5[0]->ca_number)?$query5[0]->ca_number:'';*/
                
                /*$nca = '';
                $password = 'KJH#$@kds32@!kjhdkftt';
                $salt = "SALT_VALUE";

                $method = 'aes-256-cbc';
                $iv = "16806642kbM7c5!$";
                $iterations = 65536;
                $keylength = 256;

                $key = hash_pbkdf2("sha1", $password, ($salt), $iterations, $keylength,true);

                //year 2000 start
                
                $ca_parameter = base64_encode(openssl_encrypt($ca, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv));
                $nca_parameter = base64_encode(openssl_encrypt($nca, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv));

                $soapUrl = "https://issdev.adanielectricity.com/SRASERVICE/SRA_Service.asmx"; // asmx URL of WSDL

                $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Body>
                    <SRA_Details xmlns="http://tempuri.org/">
                    <CA>' . $ca_parameter . '</CA>
                    <NCA>' . $nca_parameter . '</NCA>
                    </SRA_Details>
                </soap:Body>
                </soap:Envelope>';

                $headers = array(
                "Content-type: text/xml;charset=\"utf-8\"",
                "Accept: text/xml",
                "Cache-Control: no-cache",
                "Pragma: no-cache",
                "SOAPAction: http://tempuri.org/SRA_Details",
                "Content-length: " . strlen($xml_post_string),
                );

                $url = $soapUrl;

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                curl_setopt($ch, CURLOPT_TIMEOUT, 100);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $response = curl_exec($ch);
                //print_r($response);die;
                // Check for curl errors
                if (curl_errno($ch)) {
                    echo "Failed to retrieve data: " . curl_error($ch);
                    exit;
                }

                // Check for empty or null response
                if (!$response) {
                    echo "Empty or null response received";
                    exit;
                }
                // Parse the XML response
                $doc = new DOMDocument();
                if (!$doc->loadXML($response)) {
                    echo "Failed to parse XML response";
                    exit;
                }

                $decoded_response = base64_decode($doc->textContent);

                // Check for decoding errors
                if ($decoded_response === false) {
                    echo "Failed to decode response";
                    exit;
                }

                $responseData = openssl_decrypt($decoded_response, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
                // print_r($responseData);die;
                // Check for decryption errors
                if ($responseData === false) {
                    echo "Failed to decrypt response";
                    exit;
                }

                // print_r($responseData); die;
                //  echo "<pre>";
                $json_decoded = json_decode($responseData);
                foreach($json_decoded as $key => $result){
                    $new_result[$key] = $result;
                }*/
                //year 2000 end

                //year 2011 start
                /*if($ca1 != ""){
                $ca_parameter1 = base64_encode(openssl_encrypt($ca1, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv));

                $soapUrl1 = "https://issdev.adanielectricity.com/SRASERVICE/SRA_Service.asmx"; // asmx URL of WSDL

                $xml_post_string1 = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Body>
                    <SRA_Details xmlns="http://tempuri.org/">
                    <CA>' . $ca_parameter1 . '</CA>
                    <NCA>' . $nca_parameter . '</NCA>
                    </SRA_Details>
                </soap:Body>
                </soap:Envelope>';

                $headers1 = array(
                "Content-type: text/xml;charset=\"utf-8\"",
                "Accept: text/xml",
                "Cache-Control: no-cache",
                "Pragma: no-cache",
                "SOAPAction: http://tempuri.org/SRA_Details",
                "Content-length: " . strlen($xml_post_string1),
                );

                $url1 = $soapUrl1;

                $ch1 = curl_init();
                curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, 1);
                curl_setopt($ch1, CURLOPT_URL, $url1);
                curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch1, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                curl_setopt($ch1, CURLOPT_TIMEOUT, 100);
                curl_setopt($ch1, CURLOPT_POST, true);
                curl_setopt($ch1, CURLOPT_POSTFIELDS, $xml_post_string1);
                curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers1);
                $response1 = curl_exec($ch1);
                //print_r($response);die;
                // Check for curl errors
                if (curl_errno($ch1)) {
                    echo "Failed to retrieve data: " . curl_error($ch1);
                    exit;
                }

                // Check for empty or null response
                if (!$response1) {
                    echo "Empty or null response received";
                    exit;
                }
                // Parse the XML response
                $doc1 = new DOMDocument();
                if (!$doc1->loadXML($response1)) {
                    echo "Failed to parse XML response";
                    exit;
                }

                $decoded_response1 = base64_decode($doc1->textContent);

                // Check for decoding errors
                if ($decoded_response1 === false) {
                    echo "Failed to decode response";
                    exit;
                }

                $responseData1 = openssl_decrypt($decoded_response1, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
                // print_r($responseData);die;
                // Check for decryption errors
                if ($responseData1 === false) {
                    echo "Failed to decrypt response";
                    exit;
                }

                // print_r($responseData); die;
                //  echo "<pre>";
                $json_decoded1 = json_decode($responseData1);
                foreach($json_decoded1 as $key => $result){
                    $new_result1[$key] = $result;
                }
                }*/
                //year 2011 end

                 //year 2023 start
                /*if($ca2 != ""){
                $ca_parameter2 = base64_encode(openssl_encrypt($ca2, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv));

                $soapUrl2 = "https://issdev.adanielectricity.com/SRASERVICE/SRA_Service.asmx"; // asmx URL of WSDL

                $xml_post_string2 = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Body>
                    <SRA_Details xmlns="http://tempuri.org/">
                    <CA>' . $ca_parameter2 . '</CA>
                    <NCA>' . $nca_parameter . '</NCA>
                    </SRA_Details>
                </soap:Body>
                </soap:Envelope>';

                $headers2 = array(
                "Content-type: text/xml;charset=\"utf-8\"",
                "Accept: text/xml",
                "Cache-Control: no-cache",
                "Pragma: no-cache",
                "SOAPAction: http://tempuri.org/SRA_Details",
                "Content-length: " . strlen($xml_post_string2),
                );

                $url2 = $soapUrl2;

                $ch2 = curl_init();
                curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, 1);
                curl_setopt($ch2, CURLOPT_URL, $url2);
                curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch2, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                curl_setopt($ch2, CURLOPT_TIMEOUT, 100);
                curl_setopt($ch2, CURLOPT_POST, true);
                curl_setopt($ch2, CURLOPT_POSTFIELDS, $xml_post_string2);
                curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers2);
                $response2 = curl_exec($ch2);
                //print_r($response);die;
                // Check for curl errors
                if (curl_errno($ch2)) {
                    echo "Failed to retrieve data: " . curl_error($ch2);
                    exit;
                }

                // Check for empty or null response
                if (!$response2) {
                    echo "Empty or null response received";
                    exit;
                }
                // Parse the XML response
                $doc2 = new DOMDocument();
                if (!$doc2->loadXML($response2)) {
                    echo "Failed to parse XML response";
                    exit;
                }

                $decoded_response2 = base64_decode($doc2->textContent);

                // Check for decoding errors
                if ($decoded_response2 === false) {
                    echo "Failed to decode response";
                    exit;
                }

                $responseData2 = openssl_decrypt($decoded_response2, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
                // print_r($responseData);die;
                // Check for decryption errors
                if ($responseData2 === false) {
                    echo "Failed to decrypt response";
                    exit;
                }

                // print_r($responseData); die;
                //  echo "<pre>";
                $json_decoded2 = json_decode($responseData2);
                foreach($json_decoded2 as $key => $result){
                    $new_result2[$key] = $result;
                }
                }*/
                //year 2023 end

                /*$service_provider_new = 'Adani';
                $category_new = 'Residential';
                $address_new = '';
                // $name = 'Francis Domnic Fernandis';
                $name = '';
                $bill_date = '';*/



                //  print_r($new_result);die;
               /* $service_provider = $request->input('service_provider');
                $category = $request->input('category');
                $address = $request->input('address');
                $name = $request->input('name');
                $bill_date = $request->input('bill_date');


                if(isset($service_provider))
                    $service_provider_new = $service_provider;
                if(isset($category))
                    $category_new = $category;
                if(isset($address))
                    $address_new = $address;
                if(isset($name))
                    $name = $name;
                if(isset($bill_date))
                    $bill_date = $bill_date;*/
            

            
            
            //print_r($query3);die;
            

            $chk_missing_status = 0;
            $missing_election_details = DB::table('missing_electricity_details')->where('hut_id',$hid)->get();
            $chk_missing_status = count($missing_election_details);
            $missing_images = array();
            $missing_images = DB::table('missing_electricity_details')->where('hut_id',$hid)->get();

         $query_overall_remark = DB::table('sims_master_detail')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('user_id',auth()->user()->id)
        ->where('electricity_status','<>',0)
        ->where('electricity_remark','<>','')
        ->get();
   

        // Return the view with the data for the table
        return view('admin::sra.detail', ['query' => $query , 'query1' => $query1 ,'new_result' => $adani_data_1,'new_result_2' => $adani_data_2,'new_result_3' => $adani_data_3,'missing_status' => $chk_missing_status,'missing_images' => $missing_images, "recomm_remarks" => $recomm_remarks, "recomm_remarks_ca" => $recomm_remarks_ca,'query3' => $query3,'query4' => $query4,'query5' => $query5,'overall_remark'=>$query_overall_remark]);
    }

    public function listingproof(Request $request,$hid)
    {

        // print_r($request->all());die;

        // $hut_id = $request->input('hut_id');

        // Query the database to retrieve the data for the table
        $query =DB::connection('simconn')->table('T_HUTOWNERINFODETAILS as h')
        ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
        ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
        ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
        ->select('h.HUTSURVERYID', 'p.ClusterId', DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
        DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"), 'h.hutOwner_Current_Address as Address',
        't.PropertyType','h.FLOORNUM','h.HUTLENGTH', 'h.HUTWIDTH', DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area'))->where('HUTSURVERYID', '=', $hid)->get();

        $query1 = DB::connection('simconn')
            ->table('T_ImageDocumentsChild')
            ->select('DocumentContent','DOCCategory')
            ->where('HUTSURVERYID', '=', $hid)
            // ->where('DOCCategory','DOC2')
            ->get();
            foreach($query1 as $img)
            {
                // print_r($img);
                $base64Image = $img->DocumentContent;
            }
        // print_r( $base64Image);die;
            $file_name = public_path('images/'.$hid.'_li_bill.jpeg');

            //--------------Base64 image code from DB
            // if(isset($base64Image))
            // {
            //     $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

            //     $fileRead = (new TesseractOCR($imageData))
            //     ->setLanguage('eng')
            //     ->run();

            //     $string = $fileRead;

            //     // print_r($string);die;
            // }
            //------------------End
            // echo "AMI";die;
            if(file_exists($file_name)){
                // $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
                $fileRead = (new TesseractOCR($file_name))
                ->setLanguage('eng')
                ->run();

                $string = $fileRead;
                // echo "<pre>";
                // print_r($fileRead);die;
                if($string != ''){
                    // if (preg_match('/\bACCOUNT NO\.\s*(\d{9})\b/', $string, $matches)) {
                    if (preg_match('/\bACCOUNT NO\.\s*(\d{9})\b/', $string, $matches)) {

                        // Account number found
                        $ca = $matches[1];
                        //$ca = '000102411935';

                        // echo $ca;
                    } else {
                        $ca = '';
                        // Account number not found
                    }
                }else
                {
                    $ca = '';
                }

            }
            else{
                $string = '';

                $ca_new = $request->input('ca_no');

                if(isset($ca_new))
                {
                    $ca = $ca_new;
                }
                else{
                    $ca = '';
                }
            }

            //echo $ca;die;
                    $nca = '';
                    $password = 'KJH#$@kds32@!kjhdkftt';
                    $salt = "SALT_VALUE";

                    $method = 'aes-256-cbc';
                    $iv = "16806642kbM7c5!$";
                    $iterations = 65536;
                    $keylength = 256;

                    $key = hash_pbkdf2("sha1", $password, ($salt), $iterations, $keylength,true);


                    $ca_parameter = base64_encode(openssl_encrypt($ca, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv));
                    $nca_parameter = base64_encode(openssl_encrypt($nca, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv));

                    $soapUrl = "https://issdev.adanielectricity.com/SRASERVICE/SRA_Service.asmx"; // asmx URL of WSDL

                    $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                    <soap:Body>
                        <SRA_Details xmlns="http://tempuri.org/">
                        <CA>' . $ca_parameter . '</CA>
                        <NCA>' . $nca_parameter . '</NCA>
                        </SRA_Details>
                    </soap:Body>
                    </soap:Envelope>';

                    $headers = array(
                    "Content-type: text/xml;charset=\"utf-8\"",
                    "Accept: text/xml",
                    "Cache-Control: no-cache",
                    "Pragma: no-cache",
                    "SOAPAction: http://tempuri.org/SRA_Details",
                    "Content-length: " . strlen($xml_post_string),
                    );

                    $url = $soapUrl;

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 100);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    $response = curl_exec($ch);
                    //print_r($response);die;
                // Check for curl errors
                if (curl_errno($ch)) {
                    echo "Failed to retrieve data: " . curl_error($ch);
                    exit;
                }

                // Check for empty or null response
                if (!$response) {
                    echo "Empty or null response received";
                    exit;
                }
                // Parse the XML response
                $doc = new DOMDocument();
                if (!$doc->loadXML($response)) {
                    echo "Failed to parse XML response";
                    exit;
                }

                $decoded_response = base64_decode($doc->textContent);

                // Check for decoding errors
                if ($decoded_response === false) {
                    echo "Failed to decode response";
                    exit;
                }

                $responseData = openssl_decrypt($decoded_response, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
                // print_r($responseData);die;
                // Check for decryption errors
                if ($responseData === false) {
                    echo "Failed to decrypt response";
                    exit;
                }

                // print_r($responseData); die;
                //  echo "<pre>";
                $json_decoded = json_decode($responseData);
                    foreach($json_decoded as $key => $result){
                        $new_result[$key] = $result;
                    }

                    $service_provider_new = 'Adani';
                    $category_new = 'Lightbill';
                    $address_new = '';

                    //  print_r($new_result);die;
                    $service_provider = $request->input('service_provider');
                    $category = $request->input('category');
                    $address = $request->input('address');
                    if(isset($service_provider))
                        $service_provider_new = $service_provider;
                    if(isset($category))
                        $category_new = $category;
                    if(isset($address))
                        $address_new = $address;

                $chk_missing_status = 0;
                $missing_election_details = DB::table('missing_electricity_details')->where('hut_id',$hid)->get();
                $chk_missing_status = count($missing_election_details);
                $missing_images = array();
                $missing_images = DB::table('missing_electricity_details')->where('hut_id',$hid)->get();




        // Return the view with the data for the table
        return view('admin::sra.electricity', ['query' => $query , 'query1'=>$query1 ,'new_result'=>$new_result,'ca_no' => $ca,'address'=> $address_new,'service_provider'=>$service_provider_new,'category' => $category_new,'missing_status'=>$chk_missing_status,'missing_images'=>$missing_images]);
    }

    public function election11($hid)
    {


        $parser = new \Smalot\PdfParser\Parser();

        $file_name = '';
        $query2 = DB::table('missing_election_details')
            ->select('*')
            ->where('hut_id',$hid)
            ->where('status',1)
            ->get();
        if(count($query2) > 0){
            // $hut_id = 'HE_08400001';
            $file_name = public_path('images/'.$hid.'.jpeg');
        }
        $fileRead = '';
        if(file_exists($file_name))
        {
            $fileRead = (new TesseractOCR($file_name))
            ->setLanguage('eng')
            ->run();
        }


        $string = $fileRead;
        $elector_name = '';
        $election_no = '';
        if( preg_match('/(TMF|GBP|HPK)\d+|MT\s*\/\d+\/\d+\s*\/\d+/', $string, $matches))
        {
            $election_no = $matches[0];
        }
        $pattern = '/[^\w\s]/';
        $replacement = '';
        $clean_string = preg_replace($pattern, $replacement, $string);

        $pattern = '/Electors Name\s+([A-Za-z ]+)/';

        if(preg_match($pattern, $clean_string, $matches))
        {
            $elector_name = $matches[1];
        }
        // echo $election_no. ' - '.$elector_name;die;
        // $hut_id = $request->input('hut_id');

        // Query the database to retrieve the data for the table
        $query =DB::connection('simconn')->table('T_HUTOWNERINFODETAILS as h')
        ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
        ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
        ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
        ->select('h.HUTSURVERYID', 'p.ClusterId', DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
        DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"), 'h.hutOwner_Current_Address as Address',
        't.PropertyType', 'h.FLOORNUM','h.HUTLENGTH', 'h.HUTWIDTH', DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area'))->where('HUTSURVERYID', '=', $hid)->get();


        $query1 = DB::connection('simconn')
            ->table('T_ImageDocumentsChild')
            ->select('DocumentContent','DOCCategory')
            ->where('HUTSURVERYID', '=', $hid)
                ->where('DOCCategory','DOC1')
            ->get();


            // print_r("shdghs");die;


            // $query2 = DB::table('election_details')
            // ->select('*')
            // ->where('voter_id', '=', $election_no)
            // ->where("elector_name", "LIKE", "'%" . $elector_name . "%'")
            // ->get();
            $query2 = DB::table('election_details')
            ->select('*')
            ->where('hut_id',$hid)
            ->get();
            // if()
            if ($query2->count() > 0) {
                $find_data = $query2->toArray();
                // foreach()
            }
            else
            {
                $find_data = array();
            }
            $chk_missing_status = 0;
            $missing_election_details = DB::table('missing_election_details')->where('hut_id',$hid)->get();
            $chk_missing_status = count($missing_election_details);

            //get images fromlocal table
            $missing_images = array();
            $missing_images = DB::table('missing_election_details')->where('hut_id',$hid)->get();
            // print_r($missing_images);die;
        return view('admin::sra.election')->with('election_data', $find_data)->with('file_path',$file_name)->with('query' , $query)->with( 'query1',$query1)->with('elector_name',$elector_name)->with('hid',$hid)->with('election_no',$election_no)->with('missing_status',$chk_missing_status)->with('missing_images',$missing_images);
    }


    public function manualdata($id,$hut_id){
        // Fetch category and year options
        $category_options = ['Residencial','Commercial']; // example options
        $year_options = ['2000', '2011', '2023']; // example options

        return view('admin::sra.manualdata', compact('category_options', 'year_options','id','hut_id'));


    }


    public function manualdataelection($id,$hut_id){
        // Fetch category and year options
        $category_options = ['Voting Card']; // example options
        $year_options = ['2000', '2011', '2023']; // example options

        return view('admin::sra.manualdataelection', compact('category_options', 'year_options','id','hut_id'));


    }

    public function manualdataelectricity_missing($hid){
        // Fetch category and year options
        // echo "in";die;

        $query =DB::connection('simconn')->table('T_HUTOWNERINFODETAILS as h')
        ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
        ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
        ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
        ->select('h.HUTSURVERYID', 'p.ClusterId', DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
        DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"), 'h.hutOwner_Current_Address as Address',
        't.PropertyType', 'h.FLOORNUM','h.HUTLENGTH', 'h.HUTWIDTH', DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area'))->where('HUTSURVERYID', '=', $hid)->get();

        $cluster_id = $owner_name = $floor_num = $property_type = $address = '';
        foreach($query as $data){
            // print_r($data);
            $cluster_id = $data->ClusterId;
            $owner_name = $data->HUTOWNERNAME;
            $address  = $data->Address;
            $property_type = $data->PropertyType;
            $floor_num = $data->FLOORNUM;

        }

        $missing_electricity_details = DB::table('missing_electricity_details')->where('hut_id',$hid)->get();

        $chk_missing_status = count($missing_electricity_details);
        if($chk_missing_status == 0){
            DB::table('missing_electricity_details')->insert(
                    array(
                        'hut_id'        =>   $hid,
                        'cluster_id'    =>   $cluster_id,
                        'owner_name'    =>   $owner_name,
                        'address'       =>   $address,
                        'property_type' =>   $property_type,
                        'floor_num'     =>   $floor_num,
                    )
            );
        }
        // die;
        return redirect("http://sra-uat.apniamc.in/index.php/sra/electricity/".$hid);
        // return $this->listingproof($hid);
    }
    public function manualdataelection_missing($hid){
        // Fetch category and year options

        $query =DB::connection('simconn')->table('T_HUTOWNERINFODETAILS as h')
        ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
        ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
        ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
        ->select('h.HUTSURVERYID', 'p.ClusterId', DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
        DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"), 'h.hutOwner_Current_Address as Address',
        't.PropertyType', 'h.FLOORNUM','h.HUTLENGTH', 'h.HUTWIDTH', DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area'))->where('HUTSURVERYID', '=', $hid)->get();

        $cluster_id = $owner_name = $floor_num = $property_type = $address = '';
        foreach($query as $data){
            // print_r($data);
            $cluster_id = $data->ClusterId;
            $owner_name = $data->HUTOWNERNAME;
            $address  = $data->Address;
            $property_type = $data->PropertyType;
            $floor_num = $data->FLOORNUM;

        }
        // die;
        $missing_election_details = DB::table('missing_election_details')->where('hut_id',$hid)->get();

        $chk_missing_status = count($missing_election_details);
        if($chk_missing_status == 0){
            DB::table('missing_election_details')->insert(
                    array(
                        'hut_id'        =>   $hid,
                        'cluster_id'    =>   $cluster_id,
                        'owner_name'    =>   $owner_name,
                        'address'       =>   $address,
                        'property_type' =>   $property_type,
                        'floor_num'     =>   $floor_num,
                    )
            );
        }
        $parser = new \Smalot\PdfParser\Parser();

        // $hut_id = 'HE_08400001';
        $file_name = public_path('images/'.$hid.'.jpeg');
        $fileRead = '';
        if(file_exists($file_name))
        {
            $fileRead = (new TesseractOCR($file_name))
            ->setLanguage('eng')
            ->run();
        }


        $string = $fileRead;
        $elector_name = '';
        $election_no = '';
        if( preg_match('/(TMF|GBP|HPK)\d+|MT\s*\/\d+\/\d+\s*\/\d+/', $string, $matches))
        {
            $election_no = $matches[0];
        }
        $pattern = '/[^\w\s]/';
        $replacement = '';
        $clean_string = preg_replace($pattern, $replacement, $string);

        $pattern = '/Electors Name\s+([A-Za-z ]+)/';

        if(preg_match($pattern, $clean_string, $matches))
        {
            $elector_name = $matches[1];
        }
        // echo $election_no. ' - '.$elector_name;die;
        // $hut_id = $request->input('hut_id');

        // Query the database to retrieve the data for the table
        $query =DB::connection('simconn')->table('T_HUTOWNERINFODETAILS as h')
        ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
        ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
        ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
        ->select('h.HUTSURVERYID', 'p.ClusterId', DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
        DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"), 'h.hutOwner_Current_Address as Address',
        't.PropertyType', 'h.FLOORNUM','h.HUTLENGTH', 'h.HUTWIDTH', DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area'))->where('HUTSURVERYID', '=', $hid)->get();


        $query1 = DB::connection('simconn')
            ->table('T_ImageDocumentsChild')
            ->select('DocumentContent','DOCCategory')
            ->where('HUTSURVERYID', '=', $hid)
                ->where('DOCCategory','DOC1')
            ->get();


            // print_r("shdghs");die;


            // $query2 = DB::table('election_details')
            // ->select('*')
            // ->where('voter_id', '=', $election_no)
            // ->where("elector_name", "LIKE", "'%" . $elector_name . "%'")
            // ->get();
            $query2 = DB::table('election_details')
            ->select('*')
            ->where('hut_id',$hid)
            ->get();
            // if()
            if ($query2->count() > 0) {
                $find_data = $query2->toArray();
                // foreach()
            }
            else
            {
                $find_data = array();
            }

        $chk_missing_status = 0;
            $missing_election_details = DB::table('missing_election_details')->where('hut_id',$hid)->get();
            $chk_missing_status = count($missing_election_details);
        $missing_images = array();
            $missing_images = DB::table('missing_election_details')->where('hut_id',$hid)->get();

        return view('admin::sra.election')->with('election_data', $find_data)->with('file_path',$file_name)->with('query' , $query)->with( 'query1',$query1)->with('elector_name',$elector_name)->with('election_no',$election_no)->with('missing_status',$chk_missing_status) ->with('missing_images',$missing_images);



    }

        // use Illuminate\Support\Facades\Crypt;

        // public function storeManualData(Request $request)
        // {

        //     // Get the form data
        //     $hutId = $request->input('hut_id');
        //     $categoryId = $request->input('category_id');
        //     $year = $request->input('year');
        //     $categoryNumber = $request->input('category_number');
        //     $remark = $request->input('remark');
        //     $image = $request->file('image');
        //     $id = $request->input('id');

        //     // Read the image file contents
        //     $fileContents = file_get_contents($image);

        //     // Encrypt the file contents using Laravel's Crypt facade
        //     $encryptedContents = Crypt::encryptString($fileContents);

        //     DB::table('manualdata')->insert([
        //         'hut_id' => $hutId,
        //         'category_id' => $categoryId,
        //         'year' => $year,
        //         'category_number' => $categoryNumber,
        //         'remark' => $remark,
        //         'image' => $encryptedContents,
        //         'type' => $id, // Store the id obtained from the URL
        //     ]);

        //     // Redirect the user to the page showing the manual data
        //     // return view('admin::sra.index');

        //     return redirect()->route('admin.sra.index')->with('status', 'Profile updated!');
        // }


    public function storeManualData(Request $request)
    {

        // Get the form data
        $hutId = $request->input('hut_id');
        $categoryId = $request->input('category_id');
        $year = $request->input('year');
        $categoryNumber = $request->input('category_number');
        $ca_number = $request->input('ca_number');
        $name = $request->input('name');
        $address = $request->input('address');
        $image = $request->file('image');
        $id = $request->input('id');
        $path = $request->image->getClientOriginalName();

        // echo $categoryId;die;
        if($id == '2')
            $request->image->move(public_path('images'), $hutId.'_li_bill'.'.jpeg');
        else
            $request->image->move(public_path('images'), $hutId.'.jpeg');



        DB::table('manualdata')->insert([
            'hut_id' => $hutId,
            'category_id' => $categoryId,
            'year' => $year,
            'category_number' => $categoryNumber,
            'address' => $address,
            'name' => $name,
            'ca_number' => $ca_number,
            // 'address' => $address,
            'image' => $path,
            'type' => $id, // Store the id obtained from the URL
        ]);

        // Redirect the user to the page showing the manual data
        // return view('admin::sra.index');

        // return redirect()->route('admin.sra.index')->with('status', 'Profile updated!');
        return redirect()->route('admin.sra.electricity', ['hid' => $hutId])->with('message', 'Profile updated!');


    }

    public function storeManualDataelection(Request $request)
    {

        // Get the form data
        $hutId = $request->input('hut_id');
        $categoryId = $request->input('category_id');
        $year = $request->input('year');
        $categoryNumber = $request->input('category_number');
        $name = $request->input('name');
        $address = $request->input('address');
        $image = $request->file('image');
        $id = $request->input('id');
        $path = $request->image->getClientOriginalName();

        // echo $categoryId;die;
        if($categoryId == 'Lightbill')
            $request->image->move(public_path('images'), $hutId.'_li_bill'.'.jpeg');
        else
            $request->image->move(public_path('images'), $hutId.'.jpeg');



        DB::table('manualdataelection')->insert([
            'hut_id' => $hutId,
            'category_id' => $categoryId,
            'year' => $year,
            'category_number' => $categoryNumber,
            'name' => $name,
            'address' => $address,
            'image' => $path,
            'type' => $id, // Store the id obtained from the URL
        ]);

        // Redirect the user to the page showing the manual data
        // return view('admin::sra.index');

        return redirect()->route('admin.sra.election', ['hid' => $hutId])->with('message', 'Profile updated!');
        // return redirect()->route('admin.sra.index')->with('status', 'Profile updated!');

    }
    public function manualdata_pdf($hut_id){

        // echo "Testing "; die;
        // Fetch category and year options
        $category_options = ['Voting Card', 'Lightbill', 'Adhar Card']; // example options
        $year_options = ['2000', '2011', '2023']; // example options

        return view('admin::sra.manualdata_pdf', compact('category_options', 'year_options','hut_id'));
    }

    public function storeManualData_pdf(Request $request)
    {
        $hutId = $request->input('hut_id');
        $id = $request->input('id');
        $voter_id = $request->input('voter_id');
        $year = $request->input('year');
        $voter_name = $request->input('voter_name');
        $sr_no = $request->input('sr_no');
        $pdf_data = $request->file('pdf_data');
        $part_no = $request->input('part_no');
        $cont_no = $request->input('cont_no');
        $address = $request->input('address');


        $path = $request->pdf_data->getClientOriginalName();

        $request->pdf_data->move(public_path('pdf'), $path.'.pdf');


        DB::table('election_details')->insert([
            'hut_id' => $hutId,
            'voter_id' => $voter_id,
            'year' => $year,
            'elector_name' => $voter_name,
            'sr_no' => $sr_no,
            'file_upload' => $path,
            'part_no' => $part_no,
            'cont_no' => $cont_no,
            'address' => $address,
        ]);
        return redirect()->route('admin.sra.index')->with('status', 'Profile updated!');

    }

    // public function vendormanagerindex(Request $request)
    // {

    // //    echo "in"; die;
    //     $hut_survey_id = $request->input('hut_survey_id');
    //     $cluster_id = $request->input('cluster_id');
    //     $scheme_name = $request->input('scheme_name');
    //     $sort = $request->input('sort', 'HUTSURVERYID');
    //     $order = $request->input('order', 'asc');

    // $query = DB::connection('simconn')
    // ->table('T_HUTOWNERINFODETAILS as h')
    // ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
    // ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
    // ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
    // ->select(
    //     'h.HUTSURVERYID',
    //     'p.ClusterId',
    //     DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
    //     DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"),
    //     'h.hutOwner_Current_Address as Address',
    //     't.PropertyType','h.FLOORNUM',
    //     'h.HUTLENGTH',
    //     'h.HUTWIDTH',
    //     DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area')
    // )
    // ->when($hut_survey_id, function ($query, $hut_survey_id) {
    //     return $query->where('h.HUTSURVERYID', $hut_survey_id);
    // })
    // ->where('p.ClusterId', 'HE_084')
    // ->when($scheme_name, function ($query, $scheme_name) {
    //     return $query->where('s.SchemeName', 'like', "%{$scheme_name}%");
    // })
    // ->orderBy($sort, $order)
    // ->get();


    //     // return datatables($query)->make();
    //     return view('admin::sra.indexvendormanager', compact('query', 'sort', 'order'));
    // }

    public function vendormanagerindex(Request $request)
    {

        //    echo "in"; die;
        // $hut_survey_id = $request->input('hut_survey_id');
        // $cluster_id = $request->input('cluster_id');
        // $scheme_name = $request->input('scheme_name');
        // $sort = $request->input('sort', 'HUTSURVERYID');
        // $order = $request->input('order', 'asc');

        $query = DB::connection('simconn')
        ->table('T_HUTOWNERINFODETAILS as h')
        ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
        ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
        ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
        ->select (
            'h.HUTSURVERYID',
            'p.ClusterId',
            DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
            DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"),
            'h.hutOwner_Current_Address as Address',
            't.PropertyType','h.FLOORNUM',
            'h.HUTLENGTH',
            'h.HUTWIDTH',
            DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area')
        )->where('p.ClusterId', 'HE_084')
        // ->take(10)
        ->get();



        // return datatables($query)->make();
        return view('admin::sra.indexvendormanager', compact('query'));
    }

    public function documentlisting($hid){
        $query =DB::connection('simconn')->table('T_HUTOWNERINFODETAILS as h')
        ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
        ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
        ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
        ->select('h.HUTSURVERYID', 'p.ClusterId', DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
        DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"), 'h.hutOwner_Current_Address as Address',
        't.PropertyType', 'h.FLOORNUM','h.HUTLENGTH', 'h.HUTWIDTH', DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area'))->where('HUTSURVERYID', '=', $hid)->get();

        // print_r("Hiii");die;
        $query1 = DB::connection('simconn')
            ->table('T_ImageDocumentsChild')
            ->select('DocumentContent','DOCCategory')
            ->where('HUTSURVERYID', '=', $hid)
            // ->where('DOCCategory','DOC1')
            ->get();

        $election_document = DB::table('election_document')
        ->select('*')
        ->where('hut_id',$hid)
        ->get();

        $agreement_document = DB::table('agreement_document')
        ->select('*')
        ->where('hut_id',$hid)
        ->get();

        $electricity_document = DB::table('electricity_document')
        ->select('*')
        ->where('hut_id',$hid)
        ->get();
                  
        $gumasta_document = DB::table('gumasta_document')
        ->select('*')
        ->where('hut_id',$hid)
        ->get();

        $photopass_document = DB::table('survey_receipt_document')
        ->select('*')
        ->where('hut_id',$hid)
        ->get();

        $adhar_document = DB::table('adhar_document')
        ->select('*')
        ->where('hut_id',$hid)
        ->get();

        
        $other_document = DB::table('other_document')
        ->select('*')
        ->where('hut_id',$hid)
        ->get();
            //print_r($query1);die;

        // $query2 = DB::table('upload_missing_document')
        //             ->select('*')
        //             ->where('hut_id',$hid)
        //             ->get();

            return view('admin::sra.documentlisting')->with('query' , $query)->with( 'query1',$query1)->with('hid' , $hid)->with('election_document',$election_document)->with('agreement_document',$agreement_document)->with('electricity_document',$electricity_document)->with('gumasta_document',$gumasta_document)->with('photopass_document',$photopass_document)->with('adhar_document',$adhar_document)->with('other_document',$other_document);

    }
    public function storemissingdocument_bckup(Request $request)
    {

        $hid =  $request->input('hut_id');
        $year = $request->input('year');
        $Lightbill_image = $request->file('Lightbill_image');
        $Voting_Card_image = $request->file('Voting_Card_image');
        $Adhar_Card_image = $request->file('Adhar_Card_image');


        $query =DB::connection('simconn')->table('T_HUTOWNERINFODETAILS as h')
        ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
        ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
        ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
        ->select('h.HUTSURVERYID', 'p.ClusterId', DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
        DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"), 'h.hutOwner_Current_Address as Address',
        't.PropertyType', 'h.FLOORNUM','h.HUTLENGTH', 'h.HUTWIDTH', DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area'))->where('HUTSURVERYID', '=', $hid)->get();


        $query1 = DB::connection('simconn')
            ->table('T_ImageDocumentsChild')
            ->select('DocumentContent','DOCCategory')
            ->where('HUTSURVERYID', '=', $hid)
            ->where('DOCCategory','DOC1')
            ->get();


            $path_lightbill = $path_voting = $path_adhar = '';
            $new_name_light = $new_name_voter = $new_name_adhar = '';

            if (isset($Lightbill_image)) {
                $new_name_light = $hid.'_light_bill'.'.jpeg';
                $Lightbill_image->move(public_path('images'), $new_name_light);
                $path_lightbill = $request->Lightbill_image->getClientOriginalName();
            }
            if (isset($Voting_Card_image)) {
                $new_name_voter = $hid.'_voter_id'.'.jpeg';

                $Voting_Card_image->move(public_path('images'),$new_name_voter);
                $path_voting = $request->Voting_Card_image->getClientOriginalName();
            }
            if (isset($Adhar_Card_image)) {
                $new_name_adhar = $hid.'_adhar_card'.'.jpeg';
                $Adhar_Card_image->move(public_path('images'), $new_name_adhar);
                $path_adhar = $request->Adhar_Card_image->getClientOriginalName();
            }


        DB::table('upload_missing_document')->insert([
            'hut_id' => $hid,
            'light_bill_image' => $new_name_light,
            'year' => $year,
            'voter_id_image' => $new_name_voter,
            'adhar_image' => $new_name_adhar,
        ]);

        // return view('admin::sra.documentlisting')->with('query' , $query)->with( 'query1',$query1);
        return redirect()->route('admin.sra.documentlisting', ['hid' => $hid])->with('query', $query)->with('query1', $query1)->with('success', 'Documents uploaded successfully.');


    }
   
    public function storeremark(Request $request)
    {

    
        // print_r($request->all());die;

        $hutId = $request->input('hutid');
        $year = $request->input('year');
        $user_id = $request->input('user_id');
        // $id = $request->input('id');
        $elg1 = $request->input('elg1');
        $elg2 = $request->input('elg2');
        $elg3 = $request->input('elg3');
        $elg4 = $request->input('elg4');
        $elg5 = $request->input('elg5');
        $elg6 = $request->input('elg6');

        $user = $request->input('user');

        $remark1 = $remark2 = $remark3 = $remark4 = $remark5 = $remark6 = '';

        if($user == 'ca')
        {
            $remark1 = $request->input('remark1_ca');
            $remark2 = $request->input('remark2_ca');
            $remark3 = $request->input('remark3_ca');
            $remark4 = $request->input('remark4_ca');
            $remark5 = $request->input('remark5_ca');
            $remark6 = $request->input('remark6_ca');
        }
        elseif($user == 'vendor')
        {
            $remark1 = $request->input('remark1');
            $remark2 = $request->input('remark2');
            $remark3 = $request->input('remark3');
            $remark4 = $request->input('remark4');
            $remark5 = $request->input('remark5');
            $remark6 = $request->input('remark6');
        }  

        $oremark = $request->input('remark');
        $oelg = $request->input('elg');
    
            DB::table('recommendation_electricity')->insert([
                'hut_id'=>$hutId,
                'year'=>$year,
                'user_id'=>$user_id,
                'eligibility_name' => $elg1,
                'eligibility_address' => $elg2,
                'eligibility_category' => $elg3,
                'eligibility_serviceprovider' => $elg4,
                'eligibility_ca' => $elg5,
                'eligibility_billdate' => $elg6,
                'remark_name' => $remark1,
                'remark_address' => $remark2,
                'remark_category' => $remark3,
                'remark_serviceprovider' => $remark4,
                'remark_ca' => $remark5,
                'remark_billdate' => $remark6,
                'overall_remark' => $oremark,
                'overall_eligibility' => $oelg,
                'user' => $user,
                'created_at'=>NOW(),
                
        ]);
        
        
    
        //return redirect()->route('admin.sra.index')->with('status', 'Recommendation added!');
            //return redirect()->route('admin.sra.electricity', ['hid' => $hutId])->with('message', 'Data updated!');
            //return redirect("http://sra-uat.apniamc.in/index.php/sra/detail/".$hutId)->with('message', 'Data updated!');
            return redirect()->route('admin.sra.electricity', ['hid' => $hutId])->with('message', 'Recommendation Added Successfully!');

    }
    public function storeremark_election(Request $request)
    {
    
        // print_r($request->all());die;

        $hutId = $request->input('hutid');
        $year = $request->input('year');
        $user_id = $request->input('user_id');
        // $id = $request->input('id');
        $elg1 = $request->input('elg1');
        $elg2 = $request->input('elg2');
        $elg3 = $request->input('elg3');
        $elg4 = $request->input('elg4');
        $elg5 = $request->input('elg5');
        $elg6 = $request->input('elg6');
        $elg7 = $request->input('elg7');


        $user = $request->input('user');

        $remark1 = $remark2 = $remark3 = $remark4 = $remark5 = $remark6 = '';

        if($user == 'ca')
        {
            $remark1 = $request->input('remark1_ca');
            $remark2 = $request->input('remark2_ca');
            $remark3 = $request->input('remark3_ca');
            $remark4 = $request->input('remark4_ca');
            $remark5 = $request->input('remark5_ca');
            $remark6 = $request->input('remark6_ca');
            $remark7 = $request->input('remark7_ca');

        }
        elseif($user == 'vendor')
        {
            $remark1 = $request->input('remark1');
            $remark2 = $request->input('remark2');
            $remark3 = $request->input('remark3');
            $remark4 = $request->input('remark4');
            $remark5 = $request->input('remark5');
            $remark6 = $request->input('remark6');
            $remark7 = $request->input('remark7');

        }  

        $oremark = $request->input('remark');
        $oelg = $request->input('elg');
    
            DB::table('recommendation_election')->insert([
                'hut_id'=>$hutId,
                'year'=>$year,
                'user_id'=>$user_id,
                'eligibility_name' => $elg1,
                'eligibility_address' => $elg2,
                'eligibility_number' => $elg3,
                'eligibility_type' => $elg4,
                'eligibility_const_no' => $elg5,
                'eligibility_sr_no' => $elg6,
                'eligibility_part_no' => $elg7,
                'remark_name' => $remark1,
                'remark_address' => $remark2,
                'remark_number' => $remark3,
                'remark_type' => $remark4,
                'remark_const_no' => $remark5,
                'remark_sr_no' => $remark6,
                'remark_part_no' => $remark7,
                'overall_remark' => $oremark,
                'overall_eligibility' => $oelg,
                'user' => $user,
                'created_at'=>NOW(),
                
        ]);
        
        
    
        //return redirect()->route('admin.sra.index')->with('status', 'Recommendation added!');
        //return redirect()->route('admin.sra.election', ['hid' => $hutId])->with('message', 'Data updated!');
            //return redirect("http://sra-uat.apniamc.in/index.php/sra/elections/".$hutId)->with('message', 'Data updated!');
            return redirect()->route('admin.sra.election', ['hid' => $hutId])->with('message', 'Recommendation Added Successfully!');

    }
    public function election($hid)
    {
        $parser = new \Smalot\PdfParser\Parser();

        $file_name = '';
        $query2 = DB::table('missing_election_details')
            ->select('*')
            ->where('hut_id',$hid)
            ->where('status',1)
            ->get();
        if(count($query2) > 0){
            // $hut_id = 'HE_08400001';
            $file_name = public_path('images/'.$hid.'.jpeg');
        }
        $fileRead = '';
        if(file_exists($file_name))
        {
            $fileRead = (new TesseractOCR($file_name))
            ->setLanguage('eng')
            ->run();
        }

        $string = $fileRead;
        $elector_name = '';
        $election_no = '';
        if( preg_match('/(TMF|GBP|HPK)\d+|MT\s*\/\d+\/\d+\s*\/\d+/', $string, $matches))
        {
            $election_no = $matches[0];
        }
        $pattern = '/[^\w\s]/';
        $replacement = '';
        $clean_string = preg_replace($pattern, $replacement, $string);

        $pattern = '/Electors Name\s+([A-Za-z ]+)/';

        if(preg_match($pattern, $clean_string, $matches))
        {
            $elector_name = $matches[1];
        }
        // echo $election_no. ' - '.$elector_name;die;
        // $hut_id = $request->input('hut_id');

        // Query the database to retrieve the data for the table
        $query =DB::connection('simconn')->table('T_HUTOWNERINFODETAILS as h')
        ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
        ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
        ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
        ->select('h.HUTSURVERYID', 'p.ClusterId', DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
        DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"), 'h.hutOwner_Current_Address as Address',
        't.PropertyType', 'h.FLOORNUM','h.HUTLENGTH', 'h.HUTWIDTH', DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area'))->where('HUTSURVERYID', '=', $hid)->get();


        $query1 = DB::connection('simconn')
            ->table('T_ImageDocumentsChild')
            ->select('DocumentContent','DOCCategory')
            ->where('HUTSURVERYID', '=', $hid)
             ->where('DOCCategory','DOC1')
            ->get();

            // print_r("shdghs");die;
            // $query2 = DB::table('election_details')
            // ->select('*')
            // ->where('voter_id', '=', $election_no)
            // ->where("elector_name", "LIKE", "'%" . $elector_name . "%'")
            // ->get();

        $query2 = DB::table('election_details')
            ->select('*')
            ->where('hut_id',$hid)
            ->get();
            // print_r($query2);die;

            $query3 = DB::table('election_document')
            ->select('*')
            ->where('hut_id', $hid)
            ->where('year', 2000)
            ->get();

            $query4 = DB::table('election_document')
            ->select('*')
            ->where('hut_id', $hid)
            ->where('year', 2011)
            ->get();

            $query5 = DB::table('election_document')
            ->select('*')
            ->where('hut_id', $hid)
            ->where('year', 2023)
            ->get();


        if ($query2->count() > 0) {
            $find_data = $query2->toArray();
        }
        else
        {
            $find_data = array();
        }
        $chk_missing_status = 0;
        $missing_election_details = DB::table('missing_election_details')->where('hut_id',$hid)->get();
        $chk_missing_status = count($missing_election_details);

        //get images fromlocal table
        $missing_images = array();
        $missing_images = DB::table('missing_election_details')->where('hut_id',$hid)->get();
           
        $recomm_remarks = DB::table('recommendation_election')->where('hut_id',$hid)->where('user','vendor')->get();
        $recomm_remarks_ca = DB::table('recommendation_election')->where('hut_id',$hid)->where('user','ca')->where('user_id',auth()->user()->id)->get();

        $query_overall_remark = DB::table('sims_master_detail')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('user_id',auth()->user()->id)
        ->where('election_status','<>',0)
        ->where('election_remark','<>','')
        ->get();

        return view('admin::sra.election')->with('election_data', $find_data)->with('file_path',$file_name)->with('query' , $query)->with( 'query1',$query1)->with('elector_name',$elector_name)->with('hid',$hid)->with('election_no',$election_no)->with('missing_status',$chk_missing_status)->with('missing_images',$missing_images)->with("recomm_remarks" , $recomm_remarks)->with("recomm_remarks_ca" , $recomm_remarks_ca)->with("query3",$query3)->with("query4",$query4)->with("query5",$query5)->with('overall_remark',$query_overall_remark);   
    }
    public function missing_document()
    {
        $missing_doc = DB::table('missing_document')
                            ->select('*')
                            ->where('status','0')
                            ->where('cluster_id',auth()->user()->cluster_id)
                            ->get();
                            // print_r($missing_doc);die;
        return view('admin::sra.missing_document')->with('missing_document', $missing_doc);
    }
    public function uplodemissingdocument($hut_id)
    {

        $query =DB::connection('simconn')->table('T_HUTOWNERINFODETAILS as h')
        ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
        ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
        ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
        ->select('h.HUTSURVERYID','h.UIDNO', 'p.ClusterId', DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
        DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"), 'h.hutOwner_Current_Address as Address',
        't.PropertyType', 'h.FLOORNUM','h.HUTLENGTH', 'h.HUTWIDTH', DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area'))->where('HUTSURVERYID', '=', $hut_id)->get();


        $category_options = ['Voting Card', 'Lightbill','Photo pass','Gumasta','Registeration Agreement','Aadhar']; // example options
        // $year_options = ['2000', '2011', '2023']; // example options
        // $year_options = ['Year 2000 or Before', 'Year Between 2000 To 2011', 'Current Year']
        $year_options = [
            '2000' => 'Year 2000 or Before',
            '2011' => 'Year Between 2000 To 2011',
            '2023' => 'Current Year',
        ];
        

        return view('admin::sra.uplodemissingdocument', compact('category_options', 'year_options','hut_id','query'));
    }
    public function storemissingdocument(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());die;

        $missing_doc = DB::table('missing_document')
                            ->select('*')
                            ->where('status','0')
                            ->get();

        $hid =  $request->input('hut_id');
        $imgid = 0;
        $year = 0;
        
        $categories = $request->input('category_id');

        if(isset($categories)){
            foreach($categories as $data)
            {
                if ($data == 'Voting Card') {

                    $voter_id = $request->input('voter_id');
                    $voter_name = $request->input('voter_name');
                    $address = $request->input('voting_add');
                    $sr_no = $request->input('voting_srno');
                    $part_no = $request->input('part_no');
                    $constitution_no = $request->input('constitution_no');
                    $voter_image = $request->file('Voting_Card_image');
                    //year start
                    $year = $request->input('el_year');
                    if($year <= 2000){
                        
                        $imgid = 1;
                    }
                    if($year >= 2001 && $year <=2011){
                        
                        $imgid = 2;
                    }
                    if($year > 2011){
                        $imgid = 3;
                    }
                    //year end
                    $new_name_voter = '';
                    
                    if (isset($voter_image)) {
                        $new_name_voter = $hid . '_voter_id' . $imgid . '.jpeg';
                        //die;
                        $voter_image->move(public_path('images'), $new_name_voter);
                    }
                    //die;
                    $existing_voter = DB::table('election_document')->where('hut_id', $hid)->first();
                    
                    if (!$existing_voter) {
                        //echo "in";
                        DB::table('election_document')->insert([
                            'voter_id' => $voter_id,
                            'voter_name' => $voter_name,
                            'address' => $address,
                            'sr_no' => $sr_no,
                            'part_no' => $part_no,
                            'constitution_no' => $constitution_no,
                            'hut_id' => $hid,
                            'voter_image' => $new_name_voter,
                            'upload_date' => now(),
                            'year' => $year,
                        ]);
                    }
                }
                
                if($data == 'Lightbill')
                {
                    $Lightbill_image = $request->file('Lightbill_image');
                    $category = $request->input('category');
                    $ca_number = $request->input('elector_ca');
                    $elector_address = $request->input('elector_address');
                    $bill_date = $request->input('bill_date');
                    $elector_name = $request->input('elector_name');
                    //year start
                    $year = $request->input('ec_year');
                    if($year <= 2000){
                        
                        $imgid = 1;
                    }
                    if($year >= 2001 && $year <=2011){
                        
                        $imgid = 2;
                    }
                    if($year > 2011){
                        $imgid = 3;
                    }
                    //year end
                    $new_name_light = '';
                    
                    if (isset($Lightbill_image)) {
                        $new_name_light = $hid.'_light_bill' . $imgid .'.jpeg';
                        $Lightbill_image->move(public_path('images'), $new_name_light);
                        $path_lightbill = $request->Lightbill_image->getClientOriginalName();
                    }
                    $existing_lightbill = DB::table('electricity_document')->where('hut_id', $hid)->first();

                    if(!$existing_lightbill)
                    {
                        DB::table('electricity_document')->insert([
                            'elector_name' => $elector_name,
                            'bill_date' => $bill_date,
                            'ca_number' => $ca_number,
                            'hut_id' => $hid,
                            'elector_address' => $elector_address,
                            'category' => $category,
                            'bill_image' => $new_name_light,
                            'year' => $year,
                            'upload_date' => now(),
                        ]);
                    }


                }
                if($data == 'Photo pass')
                {
                    // print_r($request->all());die;
                    $survey_receipt_no = $request->input('survey_receipt_no');
                    $name_as_per_survey_receipt = $request->input('name_as_per_survey_receipt');
                    $address_as_per_survey_receipt = $request->input('address_as_per_survey_receipt');
                    $usage_type_of_hut = $request->input('usage_type_of_hut');
                    // $area_of_hut = $request->input('area_of_hut');
                    $survey_receipt_image = $request->file('Photo_pass_image');
                    $new_survey_receipt_image = '';
                    // $land_ownership = $request->input('land_ownership');


                    if (isset($survey_receipt_image)) {
                        $new_survey_receipt_image = $hid.'_survey_receipt'.'.jpeg';
                        $survey_receipt_image->move(public_path('images'),$new_survey_receipt_image);
                    }

                    $existing_survey_receipt = DB::table('survey_receipt_document')->where('hut_id', $hid)->first();

                    if (!$existing_survey_receipt) {
                        DB::table('survey_receipt_document')->insert([
                            'survey_receipt_no' => $survey_receipt_no,
                            'name_as_per_survey_receipt' => $name_as_per_survey_receipt,
                            'address_as_per_survey_receipt' => $address_as_per_survey_receipt,
                            'usage_type_of_hut' => $usage_type_of_hut,
                            // 'area_of_hut' => $area_of_hut,
                            'hut_id' => $hid,
                            'survey_receipt_image' => $new_survey_receipt_image,
                            'upload_date' => now(),
                            'year' => $year,
                            // 'land_ownership' => $land_ownership,
                        ]);
                    }
                }
                if($data == 'Gumasta')
                {
                    $license_number = $request->input('license_number');
                    $license_issue_date = $request->input('license_issue_date');
                    $owner_name = $request->input('owner_name');
                    $organization_name = $request->input('organization_name');
                    $address = $request->input('address');
                    $valid_upto = $request->input('valid_upto');
                    $gumasta_image = $request->file('Gumasta_image');
                    //year start
                    $year = $request->input('g_year');
                    if($year <= 2000){
                        
                        $imgid = 1;
                    }
                    if($year >= 2001 && $year <=2011){
                        
                        $imgid = 2;
                    }
                    if($year > 2011){
                        $imgid = 3;
                    }
                    //year end
                    $new_photo_pass_image = '';

                    if (isset($gumasta_image)) {
                        $new_gumasta_image = $hid.'_gumasta' . $imgid .'.jpeg';
                        $gumasta_image->move(public_path('images'),$new_gumasta_image);                    
                    }
                    $existing_voter = DB::table('gumasta_document')->where('hut_id', $hid)->first();
                    if (!$existing_voter) {
                        DB::table('gumasta_document')->insert([
                            'hut_id' => $hid,
                            'license_number' => $license_number,
                            'license_issue_date' => $license_issue_date,
                            'owner_name' => $owner_name,
                            'organization_name' => $organization_name,
                            'address' => $address,
                            'valid_upto' => $valid_upto,
                            'file' => $new_gumasta_image,
                            'upload_date' => now(),
                            'year' => $year,
                        ]);
                    }

                }
                if($data == 'Registeration Agreement')
                {
                    $sr_no = $request->input('sr_no');
                    $document = $request->input('document');
                    $aggrement_date = $request->input('aggrement_date');
                    $seller_name = $request->input('seller_name');
                    $purchaser_name = $request->input('purchaser_name');
                    $relationship = $request->input('relationship');
                    $agreement_images = $request->file('Registeration_Agreement_image');
                    //year start
                    $year = $request->input('ag_year');
                    if($year <= 2000){
                        
                        $imgid = 1;
                    }
                    if($year >= 2001 && $year <=2011){
                        
                        $imgid = 2;
                    }
                    if($year > 2011){
                        $imgid = 3;
                    }
                    //year end
                    // print_r($agreement_image);die;
                    $new_agreement_image = '';
                    $i = 1;
                
                    if (isset($agreement_images)) {
                        foreach($agreement_images as $agreement_image){
                            $type = $agreement_image->getClientMimeType();
                            if (strpos($type, 'image') !== false){
                                $new_agreement_image_store = $hid.'_agreement_'. $imgid .'_'. $i.'.jpeg';
                                $new_agreement_image .= $hid.'_agreement_'. $imgid .'_'. $i.'.jpeg,'; // add timestamp to ensure unique filename
                                $agreement_image->move(public_path( 'images'), $new_agreement_image_store);
                                $i++;
                            }
                            elseif($type === 'application/pdf') {
                                $new_agreement_image_store = $hid.'_agreement_'. $imgid .'.pdf';
                                $new_agreement_image .= $hid.'_agreement_'. $imgid .'.pdf,'; // add timestamp to ensure unique filename
                                $agreement_image->move(public_path( 'images'), $new_agreement_image_store);

                            }
                    
                        }
                    
                    }
                    
                    
                    $existing_voter = DB::table('agreement_document')->where('hut_id', $hid)->first();
                    if (!$existing_voter) {
                        DB::table('agreement_document')->insert([
                            'hut_id' => $hid,
                            'sr_no' => $sr_no,
                            'document' => $document,
                            'aggrement_date' => $aggrement_date,
                            'seller_name' => $seller_name,
                            'purchaser_name' => $purchaser_name,
                            'relationship' => $relationship,
                            'file' => substr($new_agreement_image,0,-1),
                            'upload_date' => now(),
                            
                        ]);
                    }
                }

                if($data == 'Aadhar')
                {
                    // print_r($request->all());die;
                    $uid = $request->input('uid');
                    $name = $request->input('name');
                    $dob = $request->input('dob');
                    $address = $request->input('address');
                     $adhar_images = $request->file('Aadhar_image');
                    
                    $new_adhar_image = '';
                    $i = 1;
                
                    if (isset($adhar_images)) {
                        foreach($adhar_images as $adhar_image){
                            $type = $adhar_image->getClientMimeType();
                            if (strpos($type, 'image') !== false){
                                $new_adhar_image_store = $hid.'_adhar_'. $imgid .'_'. $i.'.jpeg';
                                $new_adhar_image .= $hid.'_adhar_'. $imgid .'_'. $i.'.jpeg,'; // add timestamp to ensure unique filename
                                $adhar_image->move(public_path( 'images'), $new_adhar_image_store);
                                $i++;
                            }
                            elseif($type === 'application/pdf') {
                                $new_adhar_image_store = $hid.'_adhar_'. $imgid .'.pdf';
                                $new_adhar_image .= $hid.'_adhar_'. $imgid .'.pdf,'; // add timestamp to ensure unique filename
                                $adhar_image->move(public_path( 'images'),  $new_adhar_image_store);

                            }
                    
                        }
                    
                    }
                    
                    
                    $existing_adhar = DB::table('adhar_document')->where('hut_id', $hid)->first();
                    if (!$existing_adhar) {
                        DB::table('adhar_document')->insert([
                            'hut_id' => $hid,
                            'uid' => $uid,
                            'name' => $name,
                            'dob' => $dob,
                            'address' => $address,
                           
                            'file' => substr( $new_adhar_image,0,-1),
                            'upload_date' => now(),
                            
                        ]);
                    }
                }

                
            }
        }
        $document_type = $request->input('document_type');

        if (isset($document_type)) {
            $other_document = $request->file('document_file');
            $new_other_document = '';
        
            if (isset($other_document)) {
                $new_other_document = $hid . '_' . $document_type . '.jpeg';
                $other_document->move(public_path('images'), $new_other_document);
            }
        
            DB::table('other_document')->insert([
                'hut_id' => $hid,                        
                'document_type' => $document_type,
                'image' => $new_other_document,
                'upload_date' => now(),
            ]);
        }  
        DB::table('missing_document')
            ->where('hut_id', $hid)
            ->update(['status' => '1']);
        // print_r($request->all());die;
        
        return redirect()->route('admin.sra.missing_document')->with('success', 'Documents uploaded successfully.');

    }
    public function gumasta($hid)
{
    $query =DB::connection('simconn')->table('T_HUTOWNERINFODETAILS as h')
    ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
    ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
    ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
    ->select('h.HUTSURVERYID', 'p.ClusterId', DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
    DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"), 'h.hutOwner_Current_Address as Address',
    't.PropertyType', 'h.FLOORNUM','h.HUTLENGTH', 'h.HUTWIDTH', DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area'))->where('HUTSURVERYID', '=', $hid)->get();


    $query1 = DB::connection('simconn')
        ->table('T_ImageDocumentsChild')
        ->select('DocumentContent','DOCCategory')
        ->where('HUTSURVERYID', '=', $hid)
         ->where('DOCCategory','DOC3')
        ->get();

        $documents = DB::table('gumasta_document')
        ->select('*')
        ->where('hut_id', '=', $hid)        
        ->get();

        $documents3 = DB::table('gumasta_document')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('year', '2000')
        ->get();

        $documents1 = DB::table('gumasta_document')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('year', '2011')
        ->get();
    $documents2 = DB::table('gumasta_document')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('year', '2023')
        ->get();


    $intgrate_data = DB::table('gumasta_details')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->get();

        $recomm_remarks = DB::table('recommendation_gumasta')->where('hut_id',$hid)->where('user','vendor')->get();
        $recomm_remarks_ca = DB::table('recommendation_gumasta')->where('hut_id',$hid)->where('user','ca')->where('user_id',auth()->user()->id)->get();

    $query_overall_remark = DB::table('sims_master_detail')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('user_id',auth()->user()->id)
        ->where('gumasta_status','<>',0)
        ->where('gumasta_remark','<>','')
        ->get();

    return view('admin::sra.gumasta')->with('query' , $query)->with( 'query1',$query1)->with('hid',$hid)->with("recomm_remarks" , $recomm_remarks)->with("recomm_remarks_ca" , $recomm_remarks_ca)->with('documents',$documents)->with('intgrate_data',$intgrate_data)->with('overall_remark',$query_overall_remark)->with( 'documents1',$documents1)->with( 'documents2',$documents2)->with( 'documents3',$documents3);
}

public function agreement($hid)
{
    $query =DB::connection('simconn')->table('T_HUTOWNERINFODETAILS as h')
    ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
    ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
    ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
    ->select('h.HUTSURVERYID', 'p.ClusterId', DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
    DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"), 'h.hutOwner_Current_Address as Address',
    't.PropertyType', 'h.FLOORNUM','h.HUTLENGTH', 'h.HUTWIDTH', DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area'))->where('HUTSURVERYID', '=', $hid)->get();


    $query1 = DB::connection('simconn')
        ->table('T_ImageDocumentsChild')
        ->select('DocumentContent','DOCCategory')
        ->where('HUTSURVERYID', '=', $hid)
         ->where('DOCCategory','DOC3')
        ->get();

    $query_data = DB::table('recommendation_agreement')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('user','vendor')
       // ->where('user_id',auth()->user()->id)
        ->get();

    $recomm_remarks_ca = DB::table('recommendation_agreement')->where('hut_id',$hid)->where('user','ca')->where('user_id',auth()->user()->id)->get();

    $query_data2 = DB::table('agreement_details')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->get();


    $documents = DB::table('agreement_document')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->get();

    $query_overall_remark = DB::table('sims_master_detail')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('user_id',auth()->user()->id)
        ->where('agreement_status','<>',0)
        ->where('agreement_remark','<>','')
        ->get();

    return view('admin::sra.agreement')->with('query' , $query)->with('query1',$query1)->with('query_data',$query_data)->with('hid',$hid)->with('query_data2',$query_data2)->with('documents',$documents)->with('recomm_remarks_ca',$recomm_remarks_ca)->with('overall_remark',$query_overall_remark);

}

public function storeremark_agreement(Request $request)
    {
        // echo "in"; die;
        // print_r($request-all());die;


        $hutId = $request->input('hutid');
        $year = $request->input('year');
        $user_id = $request->input('user_id');
        // $id = $request->input('id');
        $elg1 = $request->input('elg1');
        $elg2 = $request->input('elg2');
        $elg3 = $request->input('elg3');
        $elg4 = $request->input('elg4');
        $elg5 = $request->input('elg5');
        $elg6 = $request->input('elg6');

        $user = $request->input('user');

        if($user==""){
            $user = "vendor";
        }

        $remark1 = $remark2 = $remark3 = $remark4 = $remark5 = $remark6 = '';

        if($user == 'ca')
        {
            $remark1 = $request->input('remark1_ca');
            $remark2 = $request->input('remark2_ca');
            $remark3 = $request->input('remark3_ca');
            $remark4 = $request->input('remark4_ca');
            $remark5 = $request->input('remark5_ca');
            $remark6 = $request->input('remark6_ca');
        }
        elseif($user == 'vendor')
        {
            $remark1 = $request->input('remark1');
            $remark2 = $request->input('remark2');
            $remark3 = $request->input('remark3');
            $remark4 = $request->input('remark4');
            $remark5 = $request->input('remark5');
            $remark6 = $request->input('remark6');
        }

        $oremark = $request->input('remark');
        $oelg = $request->input('elg');

            DB::table('recommendation_agreement')->insert([
                'hut_id'=>$hutId,
                'year'=>$year,
                'user_id'=>$user_id,
                'eligibility_srno' => $elg1,
                'eligibility_type' => $elg2,
                'eligibility_aggrement_date' => $elg3,
                'eligibility_seller_name' => $elg4,
                'eligibility_purchaser_name' => $elg5,
                'eligibility_relationship' => $elg6,
                'remark_srno' => $remark1,
                'remark_type' => $remark2,
                'remark_aggrement_date' => $remark3,
                'remark_seller_name' => $remark4,
                'remark_purchaser_name' => $remark5,
                'remark_relationship' => $remark6,
                'overall_remark' => $oremark,
                'overall_eligibility' => $oelg,
                'user' => $user,
                'created_at'=>NOW(),

        ]);
        //return redirect()->route('admin.sra.agreement', ['hid' => $hutId])->with('message', 'Data updated!');   
            return redirect()->route('admin.sra.agreement', ['hid' => $hutId])->with('message', 'Recommendation Added Successfully!');
        
    }
    public function storeremark_gumasta(Request $request)
    {
        // echo "in"; die;
        // print_r($request-all());die;


        $hutId = $request->input('hutid');
        $year = $request->input('year');
        $user_id = $request->input('user_id');
        // $id = $request->input('id');
        $elg1 = $request->input('elg1');
        $elg2 = $request->input('elg2');
        $elg3 = $request->input('elg3');
        $elg4 = $request->input('elg4');
        $elg5 = $request->input('elg5');
        $elg6 = $request->input('elg6');

        $user = $request->input('user');

        if($user==""){
            $user = "vendor";
        }

        $remark1 = $remark2 = $remark3 = $remark4 = '';

        if($user == 'ca')
        {
            $remark1 = $request->input('remark1_ca');
            $remark2 = $request->input('remark2_ca');
            $remark3 = $request->input('remark3_ca');
            $remark4 = $request->input('remark4_ca');
            $remark5 = $request->input('remark5_ca');
            $remark6 = $request->input('remark6');
        }
        elseif($user == 'vendor')
        {
            $remark1 = $request->input('remark1');
            $remark2 = $request->input('remark2');
            $remark3 = $request->input('remark3');
            $remark4 = $request->input('remark4');
            $remark5 = $request->input('remark5');
            $remark6 = $request->input('remark6');

        }

        $oremark = $request->input('remark');
        $oelg = $request->input('elg');

            DB::table('recommendation_gumasta')->insert([
                'hut_id'=>$hutId,
                'year'=>$year,
                'user_id'=>$user_id,
                'eligibility_licanse_name' => $elg1,
                'eligibility_licanse_issue_date' => $elg2,
                'eligibility_owner_org_name' => $elg3,
                'eligibility_address' => $elg4,
                'eligibility_validity' => $elg5,
                'eligibility_name' => $elg6,
                'remark_licanse_name' => $remark1,
                'remark_licanse_issue_date' => $remark2,
                'remark_owner_org_name' => $remark3,
                'remark_address' => $remark4,
                'remark_validity' => $remark5,
                'remark_owner_name' => $remark5,
                'overall_remark' => $oremark,
                'overall_eligibility' => $oelg,
                'user' => $user,
                'created_at'=>NOW(),

        ]);
        //return redirect()->route('admin.sra.gumasta', ['hid' => $hutId])->with('message', 'Data updated!');   
            return redirect()->route('admin.sra.gumasta', ['hid' => $hutId])->with('message', 'Recommendation Added Successfully!');

    }

    public function storemanualdata_agreement(Request $request)
    {
        // echo "in"; die;
        // print_r($request-all());die;


        $hutId = $request->input('hut_id');
        $year = $request->input('year');
        // $id = $request->input('id');
        $sr1 = $request->input('sr_no1');
        $sr2 = $request->input('sr_no2');
        $sr3 = $request->input('sr_no3');
        

        $type_doc1 = $request->input('type_doc1');
        $type_doc2 = $request->input('type_doc2');
        $type_doc3 = $request->input('type_doc3');
        

        $agg_date1 = $request->input('agg_date1');
        $agg_date2 = $request->input('agg_date2');
        $agg_date3 = $request->input('agg_date3');
        

        $name_seller1 = $request->input('name_seller1');
        $name_seller2 = $request->input('name_seller2');
        $name_seller3 = $request->input('name_seller3');

        $name_purchaser1 = $request->input('name_purchaser1');
        $name_purchaser2 = $request->input('name_purchaser2');
        $name_purchaser3 = $request->input('name_purchaser3');

        $relationship1 = $request->input('relationship1');
        $relationship2 = $request->input('relationship2');
        $relationship3 = $request->input('relationship3');

        
        DB::table('agreement_details')->insert([
                'hut_id'=>$hutId,
                'year'=>$year,
                'sr_no' => $sr1,
                'document' => $type_doc1,
                'seller_name' => $name_seller1,
                'purchaser_name' =>$name_purchaser1,
                'relationship' => $relationship1,
                'agreement_date' => $agg_date1,
                'created_at'=>NOW(),

        ]);

          DB::table('agreement_details')->insert([
                'hut_id'=>$hutId,
                'year'=>$year,
                'sr_no' => $sr2,
                'document' => $type_doc2,
                'seller_name' => $name_seller2,
                'purchaser_name' =>$name_purchaser2,
                'relationship' => $relationship2,
                'agreement_date' => $agg_date2,
                'created_at'=>NOW(),

        ]);

            DB::table('agreement_details')->insert([
                'hut_id'=>$hutId,
                'year'=>$year,
                'sr_no' => $sr3,
                'document' => $type_doc3,
                'seller_name' => $name_seller3,
                'purchaser_name' =>$name_purchaser3,
                'relationship' => $relationship3,
                'agreement_date' => $agg_date3,
                'created_at'=>NOW(),

        ]);

        return redirect()->route('admin.sra.agreement', ['hid' => $hutId])->with('message', 'Data updated!');   
       // return redirect()->route('admin.sra.index')->with('status', 'Data added!');

    }
    public function store_integration_gumasta(Request $request)
    {
        // echo "in"; die;
        // print_r($request->all());die;


        $hutId = $request->input('hut_id');
        $year = $request->input('year');
        $License_no = $request->input('License_no');
        $License_issue_date = $request->input('License_issue_date');
        $name = $request->input('name');
        $organisation_name =$request->input('organisation_name');
        $address = $request->input('address');
        $License_exp_date = $request->input('License_exp_date');

        $existing_agreemet = DB::table('gumasta_details')->where('hut_id', $hutId)->where('year',$year)->first();
        if(!$existing_agreemet){
            DB::table('gumasta_details')->insert([
                'hut_id'=>$hutId,
                'year'=>$year,
                'License_no' => $License_no,
                'License_issue_date' => $License_issue_date,
                'organisation_name' => $organisation_name,
                'name' => $name,
                'address' => $address,
                'License_exp_date' => $License_exp_date,
                'created_at'=>NOW(),

            ]);
        }
        return redirect()->route('admin.sra.gumasta', ['hid' => $hutId])->with('message', 'Data updated!');   
       // return redirect()->route('admin.sra.index')->with('status', 'Data added!');

    }
    public function showfinal($hid)
    {

        $query =DB::connection('simconn')->table('T_HUTOWNERINFODETAILS as h')
        ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
        ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
        ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
        ->select('h.HUTSURVERYID', 'p.ClusterId', DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
        DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"), 'h.hutOwner_Current_Address as Address',
        't.PropertyType', 'h.FLOORNUM','h.HUTLENGTH', 'h.HUTWIDTH', DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area'))->where('HUTSURVERYID', '=', $hid)->get();

        $missing_doc_cnt = 0;
        $missing_doc = DB::table('missing_document')
                           ->select('*')
                           ->where('hut_id',$hid)
                           ->get();
        //print_r($missing_doc);
        $sims_master_data = DB::table('sims_master_detail')
                           ->select('*')
                           ->where('hut_id',$hid)
                           ->where('user_id',auth()->user()->id)
                           ->get();                  
        $missing_doc_cnt = count($missing_doc);

        $query_electricity_recomm_1 = DB::table('recommendation_electricity')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('user_id',auth()->user()->id)
        ->where('year',1)
        ->get();

        $query_electricity_recomm_2 = DB::table('recommendation_electricity')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('user_id',auth()->user()->id)
        ->where('year',2)
        ->get();

        $query_electricity_recomm_3 = DB::table('recommendation_electricity')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('user_id',auth()->user()->id)
        ->where('year',3)
        ->get();

        $query_election_recomm_1 = DB::table('recommendation_election')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('user_id',auth()->user()->id)
        ->where('year',1)
        ->get();

        $query_election_recomm_2 = DB::table('recommendation_election')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('user_id',auth()->user()->id)
        ->where('year',2)
        ->get();

        $query_election_recomm_3 = DB::table('recommendation_election')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('user_id',auth()->user()->id)
        ->where('year',3)
        ->get();

        $query_agreement_recomm = DB::table('recommendation_agreement')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('user_id',auth()->user()->id)
        ->get();

        $query_gumasta_recomm_1 = DB::table('recommendation_gumasta')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('user_id',auth()->user()->id)
        ->where('year',1)
        ->get();

        $query_gumasta_recomm_2 = DB::table('recommendation_gumasta')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('user_id',auth()->user()->id)
        ->where('year',2)
        ->get();

        $query_gumasta_recomm_3 = DB::table('recommendation_gumasta')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('user_id',auth()->user()->id)
        ->where('year',3)
        ->get();

        $query_adhar = DB::table('recommendation_adhar')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('user_id',auth()->user()->id)
        
        ->get();

        $query_overall_remark = DB::table('sims_master_detail')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('user_id',auth()->user()->id)
        ->get();

        $query_overall_remark1 = DB::table('sims_master_detail')
                                    ->select('*')
                                    ->where('hut_id', '=', $hid)
                                    ->get();

        $query_overall_ca_remark = DB::table('sims_master')
        ->select('*')
        ->where('hut_id', '=', $hid)
        ->where('user_id',auth()->user()->id)
        ->get();
        
        return view('admin::sra.final')->with('hid',$hid)->with('query',$query)->with('query_adhar',$query_adhar)->with('missing_doc_status',$missing_doc_cnt)->with('sims_data',$sims_master_data)->with('overall_remark',$query_overall_remark)->with('overall_ca_remark',$query_overall_ca_remark)->with('recommendation_election_1',$query_election_recomm_1)->with('recommendation_election_2',$query_election_recomm_2)->with('recommendation_election_3',$query_election_recomm_3)->with('recommendation_agreement',$query_agreement_recomm)->with('recommendation_gumasta_1',$query_gumasta_recomm_1)->with('recommendation_gumasta_2',$query_gumasta_recomm_2)->with('recommendation_gumasta_3',$query_gumasta_recomm_3)->with('recommendation_electricity_1',$query_electricity_recomm_1)->with('recommendation_electricity_2',$query_electricity_recomm_2)->with('recommendation_electricity_3',$query_electricity_recomm_3)->with('overall_remark_vendor', $query_overall_remark1);
    }

    public function final_submit(Request $request)
    {
        $hid = $request->input('hut_id');
        $status = $request->input('status');
        $remark = $request->input('remark');

         switch ($request->input('action')) {
            case 'missing':
            //start
            $missing_doc = DB::table('missing_document')
                           ->select('*')
                           ->where('hut_id',$hid)
                           ->get();
            if(count($missing_doc) > 0){
                DB::table('missing_document')
                ->where('hut_id', $hid)
                ->update(['status' => '0']);
            }else{
                $query =DB::connection('simconn')->table('T_HUTOWNERINFODETAILS as h')
                ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
                ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
                ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
                ->select('h.HUTSURVERYID', 'p.ClusterId', DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
                DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"), 'h.hutOwner_Current_Address as Address',
                't.PropertyType', 'h.FLOORNUM','h.HUTLENGTH', 'h.HUTWIDTH', DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area'))->where('HUTSURVERYID', '=', $hid)->get();
                $cluster_id = $owner_name = $address = $property_type = $floor_num = 0;
                foreach($query as $data){
                    $cluster_id = $data->ClusterId;
                    $owner_name = $data->HUTOWNERNAME;
                    $address = $data->Address;
                    $property_type = $data->PropertyType;
                    $floor_num = $data->FLOORNUM;
                }
                 DB::table('missing_document')->insert(
                    array(
                        'hut_id'        =>   $hid,
                        'cluster_id'    =>   $cluster_id,
                        'owner_name'    =>   $owner_name,
                        'address'       =>   $address,
                        'property_type' =>   $property_type,
                        'floor_num'     =>   $floor_num,
                    )
            );
            }
            //  DB::table('sims_master_detail')
            //     ->where('hut_id', $hid)
            //     ->where('user_id',auth()->user()->id)
            //     ->update(['overall_status' => $status,'overall_remark'=>$remark,'updated_at'=>NOW()]);
            $missing_status = DB::table('sims_master_detail')
                           ->select('*')
                           ->where('hut_id',$hid)
                            ->where('user_id',auth()->user()->id)
                           ->get();
            if(count($missing_status) == 0){
                DB::table('sims_master_detail')->insert([
                        'hut_id'=>$hid,
                        'user_id'=>auth()->user()->id,
                        'created_at'=>NOW(),
                        'overall_remark'=>$remark,
                        'overall_status' => $status
                ]);
            }else{
            DB::table('sims_master_detail')
                ->where('hut_id', $hid)
                 ->where('user_id',auth()->user()->id)
                ->update(['overall_status' => $status,'overall_remark'=>$remark,'updated_at'=>NOW()]);
            }
            //end
                break;

            case 'submit':
                // DB::table('sims_master_detail')
                //     ->where('hut_id', $hid)
                //      ->where('user_id',auth()->user()->id)
                //     ->update(['overall_status' => $status,'overall_remark'=>$remark,'updated_at'=>NOW(),'status'=>'1']);
                $missing_status = DB::table('sims_master_detail')
                ->select('*')
                ->where('hut_id',$hid)
                ->where('user_id',auth()->user()->id)
                ->get();
                if(count($missing_status) == 0){
                DB::table('sims_master_detail')->insert([
                        'hut_id'=>$hid,
                        'user_id'=>auth()->user()->id,
                        'created_at'=>NOW(),
                        'status' => '1',
                        'overall_status' => $status,
                        'overall_remark'=>$remark
                ]);
                }else{
                DB::table('sims_master_detail')
                    ->where('hut_id', $hid)
                    ->where('user_id',auth()->user()->id)
                    ->update(['overall_status' => $status,'overall_remark'=>$remark,'updated_at'=>NOW(),'status'=>'1']);
                }
                break;

        }
        return redirect("http://sra-uat.apniamc.in/index.php/sra/final/".$hid)->with('message', 'Data updated!');  
        //return redirect()->route('admin.sra.final')->with('success', 'Data updated successfully.');
    }

    public function final_ca_submit(Request $request)
    {
        $hid = $request->input('hut_id');
        $status = $request->input('status');
        $remark = $request->input('remark');

         switch ($request->input('action')) {
            case 'missing':
            //start
           
            //end
                break;

            case 'submit':
                $missing_status_final = DB::table('sims_master')
                           ->select('*')
                           ->where('hut_id',$hid)
                            ->where('user_id',auth()->user()->id)
                           ->get();
                if(count($missing_status_final) == 0){
                    DB::table('sims_master')->insert([
                            'hut_id'=>$hid,
                            'user_id'=>auth()->user()->id,
                            'created_at'=>NOW(),
                            'status'=>'1',
                            'remark'=>$remark,
                            'overall_status' => $status
                    ]);
                }else{
                    DB::table('sims_master')
                        ->where('hut_id', $hid)
                        //->where('user_id',auth()->user()->id)
                        ->update(['user_id' => auth()->user()->id, 'overall_status' => $status,'remark'=>$remark,'updated_at'=>NOW(),'status'=>'1']);
                }

                break;
            
               

        }
        return redirect("http://sra-uat.apniamc.in/index.php/sra/final/".$hid)->with('message', 'Data updated!');  
        //return redirect()->route('admin.sra.final')->with('success', 'Data updated successfully.');
    }

    public function report(Request $request)
    {
        $filePath = public_path('report.xlsx');
        $headers = ['Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    
        return response()->download($filePath, 'report.xlsx', $headers);
    }



// public function viewreport(Request $request)
// {
//     $sims = DB::table('sims_master')->where('status', 1)->get();

//     $hutOwners = [];

//     foreach ($sims as $sim) {
//         $query = DB::connection('simconn')
//             ->table('T_HUTOWNERINFODETAILS as h')
//             ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
//             ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
//             ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
//             ->select(DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"),
//                      'h.hutOwner_Current_Address as Address',
//                      't.PropertyType as Category')
//                      ->where('HUTSURVERYID', '=', $sim->hut_id)
//                      ->get();

//         if (count($query) > 0) {
//             $hutOwners[] = $query[0];
//         }
//     }

//     return view('admin::sra.viewreport', ['sims' => $sims, 'hutOwners' => $hutOwners]);
// }


public function viewreport(Request $request)
{
    $sims = DB::table('sims_master_detail')->where('user_id', auth()->user()->id)->get();
    
    foreach ($sims as $sim) {
        $query = DB::connection('simconn')
            ->table('T_HUTOWNERINFODETAILS as h')
            ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
            ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
            ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
            ->select(DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"),
                     'h.hutOwner_Current_Address as Address',
                     't.PropertyType as Category',
                     DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area'))
            ->where('HUTSURVERYID', '=', $sim->hut_id)
            ->get();

        if (count($query) > 0) {
            $sim->hutOwnerName = $query[0]->HUTOWNERNAME; // Add the HUTOWNERNAME to the $sim object
            $sim->address = $query[0]->Address; // Add the Address to the $sim object
            $sim->Category = $query[0]->Category; // Add the Address to the $sim object
            $sim->Area = $query[0]->Area; // Add the Address to the $sim object

        }

        $hutOwners = DB::table('sims_master_detail')->where('hut_id', $sim->hut_id)->where('user_id', auth()->user()->id)->get();
        $sim->hutOwners = $hutOwners;
    }

    return view('admin::sra.viewreport', ['sims' => $sims]);
}


public function store_overall_remark(Request $request)
    {
        //echo "in";
         $hutId = $request->input('hutid');
         $user = $request->input('user');
         $elg = $request->input('elg');
         $remark = $request->input('remark');
         $type = $request->input('type');

         $data = DB::table('sims_master_detail')->where('hut_id',$hutId)->where('user_id',$user)->get();
         $chk_data = count($data);

         if($type == "agreement"){
             if($chk_data > 0){
                DB::table('sims_master_detail')
                ->where('hut_id', $hutId)
                ->where('user_id',$user)
                ->update(['agreement_status' => $elg,'agreement_remark' => $remark,'updated_at' => NOW()]);
             }else{
                  DB::table('sims_master_detail')->insert([
                        'hut_id'=>$hutId,
                        'user_id'=>$user,
                        'agreement_status' => $elg,
                        'agreement_remark' => $remark,
                        'created_at'=>NOW(),
                        
                ]);
             }
            return redirect()->route('admin.sra.agreement', ['hid' => $hutId])->with('message', 'Remark Added Successfully!');
         }
         if($type == "gumasta"){
            if($chk_data > 0){
                DB::table('sims_master_detail')
                ->where('hut_id', $hutId)
                ->where('user_id',$user)
                ->update(['gumasta_status' => $elg,'gumasta_remark' => $remark,'updated_at' => NOW()]);
             }else{
                  DB::table('sims_master_detail')->insert([
                        'hut_id'=>$hutId,
                        'user_id'=>$user,
                        'gumasta_status' => $elg,
                        'gumasta_remark' => $remark,
                        'created_at'=>NOW(),
                        
                ]);
             }
            return redirect()->route('admin.sra.gumasta', ['hid' => $hutId])->with('message', 'Remark Added Successfully!');

         }
         if($type == "election"){
            if($chk_data > 0){
                DB::table('sims_master_detail')
                ->where('hut_id', $hutId)
                ->where('user_id',$user)
                ->update(['election_status' => $elg,'election_remark' => $remark,'updated_at' => NOW()]);
             }else{
                  DB::table('sims_master_detail')->insert([
                        'hut_id'=>$hutId,
                        'user_id'=>$user,
                        'election_status' => $elg,
                        'election_remark' => $remark,
                        'created_at'=>NOW(),
                        
                ]);
             }
            return redirect()->route('admin.sra.election', ['hid' => $hutId])->with('message', 'Remark Added Successfully!');

         }
         if($type == "electricity"){
             if($chk_data > 0){
                DB::table('sims_master_detail')
                ->where('hut_id', $hutId)
                ->where('user_id',$user)
                ->update(['electricity_status' => $elg,'electricity_remark' => $remark,'updated_at' => NOW()]);
             }else{
                  DB::table('sims_master_detail')->insert([
                        'hut_id'=>$hutId,
                        'user_id'=>$user,
                        'electricity_status' => $elg,
                        'electricity_remark' => $remark,
                        'created_at'=>NOW(),
                        
                ]);
             }
            return redirect()->route('admin.sra.electricity', ['hid' => $hutId])->with('message', 'Remark Added Successfully!');
         }
         if($type == "photopass"){

         }
         /*if
         if($chk_data > 0){
            DB::table('sims_master_detail')
            ->where('hut_id', $hutId)
            ->update(['status' => '1']);
         }else{
              DB::table('sims_master_detail')->insert([
                    'hut_id'=>$hutId,
                    'user_id'=>$user,
                    'electricity_status' => $elg,
                    'electricity_remark' => $status
                    'created_at'=>NOW(),
                    
            ]);
         }*/
        // return redirect("http://sra-uat.apniamc.in/index.php/sra/detail/".$hid)->with('message', 'Data updated!');  
        // return redirect()->route('admin.sra.electricity', ['hid' => $hutId])->with('message', 'Remark updated!');

        if($type == "adhar"){
             if($chk_data > 0){
                DB::table('sims_master_detail')
                ->where('hut_id', $hutId)
                ->where('user_id',$user)
                ->update(['adhar_status' => $elg,'adhar_remark' => $remark,'updated_at' => NOW()]);
             }else{
                  DB::table('sims_master_detail')->insert([
                        'hut_id'=>$hutId,
                        'user_id'=>$user,
                        'adhar_status' => $elg,
                        'adhar_remark' => $remark,
                        'created_at'=>NOW(),
                        
                ]);
             }
            return redirect()->route('admin.sra.adhar', ['hid' => $hutId])->with('message', 'Remark Added Successfully!');
         }
    }

    public function getchekbox_data(Request $request)
    {
        $chk_id = $request->input('id');
        $str_arr = explode ("_", $chk_id); 
        //print_r($str_arr);
        //die;
        $hid = $request->input('hid');
        $name_sims = $request->input('oname');
        $address_sims = $request->input('add');
        $category_sims = $request->input('ptype');
        $service_provider_sims = 'Not Available';
        $ca_sims = 'Not Available';
        $bill_date_sims = 'Not Available';
        $ca = '';
            $query3 = DB::table('electricity_document')
            ->select('*')
            ->where('hut_id', $hid)
            ->where('year', '2000')
            ->get();

            $query4 = DB::table('electricity_document')
            ->select('*')
            ->where('hut_id', $hid)
            ->where('year', '2011')
            ->get();

            $query5 = DB::table('electricity_document')
            ->select('*')
            ->where('hut_id', $hid)
            ->where('year', '2023')
            ->get();
              /*if(count($query3) > 0){
                $ca = isset($query3[0]->ca_number)?$query3[0]->ca_number:'';
            }*/
            if(count($query4) > 0){
                $ca = isset($query4[0]->ca_number)?$query4[0]->ca_number:'';
            }
            if(count($query5) > 0){
                $ca = isset($query5[0]->ca_number)?$query5[0]->ca_number:'';
            }
                
                /*$ca1 = isset($query4[0]->ca_number)?$query4[0]->ca_number:'';
                $ca2 = isset($query5[0]->ca_number)?$query5[0]->ca_number:'';*/
                
                $nca = '';
                $password = 'KJH#$@kds32@!kjhdkftt';
                $salt = "SALT_VALUE";

                $method = 'aes-256-cbc';
                $iv = "16806642kbM7c5!$";
                $iterations = 65536;
                $keylength = 256;

                $key = hash_pbkdf2("sha1", $password, ($salt), $iterations, $keylength,true);

                //year 2000 start
                
                $ca_parameter = base64_encode(openssl_encrypt($ca, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv));
                $nca_parameter = base64_encode(openssl_encrypt($nca, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv));

                $soapUrl = "https://issdev.adanielectricity.com/SRASERVICE/SRA_Service.asmx"; // asmx URL of WSDL

                $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Body>
                    <SRA_Details xmlns="http://tempuri.org/">
                    <CA>' . $ca_parameter . '</CA>
                    <NCA>' . $nca_parameter . '</NCA>
                    </SRA_Details>
                </soap:Body>
                </soap:Envelope>';

                $headers = array(
                "Content-type: text/xml;charset=\"utf-8\"",
                "Accept: text/xml",
                "Cache-Control: no-cache",
                "Pragma: no-cache",
                "SOAPAction: http://tempuri.org/SRA_Details",
                "Content-length: " . strlen($xml_post_string),
                );

                $url = $soapUrl;

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                curl_setopt($ch, CURLOPT_TIMEOUT, 100);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $response = curl_exec($ch);
                //print_r($response);die;
                // Check for curl errors
                if (curl_errno($ch)) {
                    echo "Failed to retrieve data: " . curl_error($ch);
                    exit;
                }

                // Check for empty or null response
                if (!$response) {
                    echo "Empty or null response received";
                    exit;
                }
                // Parse the XML response
                $doc = new DOMDocument();
                if (!$doc->loadXML($response)) {
                    echo "Failed to parse XML response";
                    exit;
                }

                $decoded_response = base64_decode($doc->textContent);

                // Check for decoding errors
                if ($decoded_response === false) {
                    echo "Failed to decode response";
                    exit;
                }

                $responseData = openssl_decrypt($decoded_response, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
                // print_r($responseData);die;
                // Check for decryption errors
                if ($responseData === false) {
                    echo "Failed to decrypt response";
                    exit;
                }

                // print_r($responseData); die;
                //  echo "<pre>";
                $json_decoded = json_decode($responseData);
                foreach($json_decoded as $key => $result){
                    $new_result[$key] = $result;
                }
                $integration_name = array();
                $integration_address = array();
                $integration_bill_date = array();
                $integration_ca = array();
                $integration_service_provider = array();
                $integration_category = array();
                $data_address="";
                $match_name = $match_address = $match_category = $match_service_provider = $match_ca = $match_bill_date = array();
                $index = 0;
                foreach ($new_result as $key => $result) {
                    
                  if(gettype($result) == 'array')
                  {    
                    foreach($result as $data)
                    {
                      if(isset($data->ZLEGACY_CA)){
                        /*$mi_date = isset($data->MI_DATE) ? $data->MI_DATE : '';
                        $mi_year = substr($mi_date,0,4);
                       
                        if($mi_year >= 1990 && $mi_year < 2000 )
                        {*/
                          if (in_array($index, $str_arr))
                          {
                          $integration_name[] = strtolower($data->CUR_NAME);
                          $data_address = strtolower($data->ADD1) . ',' . strtolower($data->ADD2) . ',' . strtolower($data->ADD3);
                          if($data_address == ",,"){
                              $data_address = "Not Available";
                          }
                          $integration_address[] = $data_address;
                          $integration_category[] = strtolower($data->CONS_TYPE);
                          $integration_service_provider[] = 'Adani Electricity';
                          $integration_ca[] = '';
                          $integration_bill_date[] = '';
                          }
                          $index ++;
                        //}
                        // echo "AS";die;
                      }
                      
                    }
                  }
                }
                //print_r($integration_name);
                //For Name
                $name = isset($query3[0]->elector_name) ? $query3[0]->elector_name : 'Not Available';

                $match_data = similar_text($name_sims,$name,$percent);
                $match_name[$name] = number_format($percent,2);

                foreach($integration_name as $data)
                {
                  $match_data = similar_text($name_sims, $data, $percent);
                  $match_name[$data] = number_format($percent,2);
                }
                $highestPercentageOfName1 = 0;
                $highestPercentageName1 = "";

                foreach ($match_name as $name => $percentage) {
                    if ($percentage > $highestPercentageOfName1) {
                        $highestPercentageOfName1 = $percentage;
                        $highestPercentageName1 = $name;
                    }
                }
                if($highestPercentageName1 == 'Not Available') 
                  $highestPercentageOfName1 = 0;

                if($highestPercentageOfName1 == 100 )
                  $color_name = '#238823';
                elseif($highestPercentageOfName1 >= 50)
                  $color_name = '#FFBF00';
                else  
                  $color_name = '#d2222d';

                //For Address
                $address = isset($query3[0]->elector_address) ? $query3[0]->elector_address : 'Not Available';
                $match_data = similar_text($address_sims,$address,$percent);
                $match_address[$address] = number_format($percent,2);
                //print_r($match_address);
                foreach($integration_address as $data)
                {
                  $match_data = similar_text($address_sims, $data, $percent);
                  $match_address[$data] = number_format($percent,2);
                }
                //print_r($match_address);
                $highestPercentageOfAddress1 = 0;
                $highestPercentageAddress1 = "";

                foreach ($match_address as $address_key => $percentage) {
                    if ($percentage > $highestPercentageOfAddress1) {
                        $highestPercentageOfAddress1 = $percentage;
                        $highestPercentageAddress1 = $address_key;
                    }
                }
                if($highestPercentageAddress1 == 'Not Available') 
                  $highestPercentageOfAddress1 = 0;

                if($highestPercentageOfAddress1 == 100 )
                  $color_address = '#238823';
                elseif($highestPercentageOfAddress1 >= 50)
                  $color_address = '#FFBF00';
                else  
                  $color_address = '#d2222d';

                //For Category
                $category = isset($query3[0]->category) ? $query3[0]->category : 'Not Available';
                $match_data = similar_text($category_sims,$category,$percent);
                $match_category[$category] = number_format($percent,2);

                foreach($integration_category as $data)
                {
                  $match_data = similar_text($category_sims, $data, $percent);
                  $match_category[$data] = number_format($percent,2);
                }
                $highestPercentageOfCategory1 = 0;
                $highestPercentageCategory1 = "";

                foreach ($match_category as $category_key => $percentage) {
                    if ($percentage > $highestPercentageOfCategory1) {
                        $highestPercentageOfCategory1 = $percentage;
                        $highestPercentageCategory1 = $category_key;
                    }
                }
                if($highestPercentageCategory1 == 'Not Available') 
                  $highestPercentageOfCategory1 = 0;

                if($highestPercentageOfCategory1 == 100 )
                  $color_category = '#238823';
                elseif($highestPercentageOfCategory1 >= 50)
                  $color_category = '#FFBF00';
                else  
                  $color_category = '#d2222d';


                //For Service_provider
                $service_provider = isset($query3[0]->doc_type) ? $query3[0]->doc_type : 'Not Available';

                $match_data = similar_text($service_provider_sims,$service_provider,$percent);
                $match_service_provider[$service_provider] = number_format($percent,2);

                foreach($integration_service_provider as $data)
                {
                  $match_data = similar_text($service_provider_sims, $data, $percent);
                  $match_service_provider[$data] = number_format($percent,2);
                }
                $highestPercentageOfservice_provider1 = 0;
                $highestPercentageservice_provider1 = "";

                foreach ($match_service_provider as $service_provider_key => $percentage) {
                    if ($percentage > $highestPercentageOfservice_provider1) {
                        $highestPercentageOfservice_provider1 = $percentage;
                        $highestPercentageservice_provider1 = $service_provider_key;
                    }
                }
                if($highestPercentageservice_provider1 == 'Not Available') 
                  $highestPercentageOfservice_provider1 = 0;

                if($highestPercentageOfservice_provider1 == 100 )
                  $color_service_provider = '#238823';
                elseif($highestPercentageOfservice_provider1 >= 50)
                  $color_service_provider = '#FFBF00';
                else  
                  $color_service_provider = '#d2222d';


                //For CA   
                $ca_no = isset($query3[0]->ca_number) ? $query3[0]->ca_number : 'Not Available';          
                $match_data = similar_text($ca_sims,$ca_no,$percent);
                $match_ca[$ca_no] = number_format($percent,2);

                foreach($integration_ca as $data)
                {
                  $match_data = similar_text($ca_sims, $data, $percent);
                  $match_ca[$data] = number_format($percent,2);
                }
                $highestPercentageOfca1 = 0;
                $highestPercentageca1 = "";
                
                foreach ($match_ca as $ca_key => $percentage) {
                    if ($percentage > $highestPercentageOfca1) {
                        $highestPercentageOfca1 = $percentage;
                        $highestPercentageca1 = $ca_key;
                        if($highestPercentageca1 == 'Not Available')
                          $highestPercentageOfca1 = 0;
                    }
                }
              
              if($highestPercentageca1 == 'Not Available') 
                  $highestPercentageOfca1 = 0;

                if($highestPercentageOfca1 == 100 )
                  $color_ca = '#238823';
                elseif($highestPercentageOfca1 >= 50)
                  $color_ca = '#FFBF00';
                else  
                  $color_ca = '#d2222d';

              //For bill_date 
              $bill_date = isset($query3[0]->bill_date) ? $query3[0]->bill_date : 'Not Available'; 
              $match_data = similar_text($bill_date_sims,$bill_date,$percent);
              $match_bill_date[$bill_date] = number_format($percent,2);

              // print_r($integration_bill_date);die;
              foreach($integration_bill_date as $data)
              {
                $match_data = similar_text($bill_date_sims, $data, $percent);
                $match_bill_date[$data] = number_format($percent,2);
              }
              $highestPercentageOfbill_date1 = 0;
              $highestPercentagebill_date1 = "";

              foreach ($match_bill_date as $bill_date_key => $percentage) {
                  if ($percentage > $highestPercentageOfbill_date1) {
                      $highestPercentageOfbill_date1 = $percentage;
                      $highestPercentagebill_date1 = $bill_date_key;
                      if($highestPercentagebill_date1 == 'Not Available')
                          $highestPercentageOfbill_date1 = 0;
                  }
              }
              if($highestPercentagebill_date1 == 'Not Available') 
                  $highestPercentageOfbill_date1 = 0;

              if($highestPercentageOfbill_date1 == 100 )
                $color_bill_date = '#238823';
              elseif($highestPercentageOfbill_date1 >= 50)
                $color_bill_date = '#FFBF00';
              else  
                $color_bill_date = '#d2222d';
                echo '  <table class="table table-borderless table-responsive">
                        <thead><tr>
                            <th width="10%" style="background-color:'.$color_name.';color:#000;padding: 5px !important;">Owner Name</th>
                            <th width="20%" style="background-color:'.$color_address.';color:#000;padding: 5px !important;">Address </th>
                            <th width="10%" style="background-color:'.$color_category.';color:#000;padding: 5px !important;">Category</th>
                            <th width="10%" style="background-color:'.$color_service_provider.';color:#000;padding: 5px !important;">Service Provider</th>
                            <th width="10%" style="background-color:'.$color_ca.';color:#000;padding: 5px !important;">CA No</th>
                            <th width="10%" style="background-color:'.$color_bill_date.';color:#000;padding: 5px !important;">Bill Date</th>
                          </tr>
                        
                        
                        </thead>
                        <tbody>
                        <tr>
                              <td width="10%" >'. ucfirst($highestPercentageName1).'</td>
                              <td width="20%" >'. ucfirst($highestPercentageAddress1).'</td>
                              <td width="10%" >'. ucfirst($highestPercentageCategory1).'</td>
                              <td width="10%" >'. ucfirst($highestPercentageservice_provider1).'</td>
                              <td width="10%" >'. ucfirst($highestPercentageca1).'</td>
                              <td width="10%" >'. ucfirst($highestPercentagebill_date1).'</td>                     
                        </tr></tbody></table>';
          

    }
    public function adhar($hid){
        $query =DB::connection('simconn')->table('T_HUTOWNERINFODETAILS as h')
        ->join('M_Cluster as p', 'p.ClusterCode', '=', 'h.CLUSTERID')
        ->join('M_PropertyType as t', 't.PropertyTypeId', '=', 'h.PropertyTypeId')
        ->leftJoin('M_Scheme as s', 's.SchemeNO', '=', 'h.SCHEMEID')
        ->select('h.HUTSURVERYID','h.UIDNO', 'p.ClusterId', DB::raw("ISNULL(s.SchemeName, '') as SchemeName"),
        DB::raw("CONCAT(h.HFNAME, ' ', h.HMNAME, ' ', h.HLNAME) as HUTOWNERNAME"), 'h.hutOwner_Current_Address as Address',
        't.PropertyType', 'h.FLOORNUM','h.HUTLENGTH', 'h.HUTWIDTH', DB::raw('h.HUTLENGTH * h.HUTWIDTH as Area'))->where('HUTSURVERYID', '=', $hid)->get();

    
    
        $query1 = DB::connection('simconn')
            ->table('T_ImageDocumentsChild')
            ->select('DocumentContent','DOCCategory')
            ->where('HUTSURVERYID', '=', $hid)
             ->where('DOCCategory','DOC3')
            ->get();
    
        $query_data = DB::table('recommendation_adhar')
            ->select('*')
            ->where('hut_id', '=', $hid)
            ->where('user','vendor')
            // ->where('user_id',auth()->user()->id)
            ->get();
    
        $recomm_remarks_ca = DB::table('recommendation_adhar')->where('hut_id',$hid)->where('user','ca')->where('user_id',auth()->user()->id)->get();

    
        $query_data2 = DB::table('agreement_details')
            ->select('*')
            ->where('hut_id', '=', $hid)
            ->get();
    
        $adhar_details = DB::table('adhar_details')
            ->select('*')
            ->where('hut_id', '=', $hid)
            ->get();
    
        $documents = DB::table('adhar_document')
            ->select('*')
            ->where('hut_id', '=', $hid)
            ->get();
    
        $query_overall_remark = DB::table('sims_master_detail')
            ->select('*')
            ->where('hut_id', '=', $hid)
            ->where('user_id',auth()->user()->id)
            ->where('adhar_status','<>',0)
            ->where('adhar_remark','<>','')
            ->get();
    
        return view('admin::sra.adhar')->with('query' , $query)->with('query1',$query1)->with('query_data',$query_data)->with('hid',$hid)->with('query_data2',$query_data2)->with('documents',$documents)->with('recomm_remarks_ca',$recomm_remarks_ca)->with('overall_remark',$query_overall_remark)->with('adhar_details',$adhar_details);
    }

    public function storeremark_adhar(Request $request)
    {
        $hutId = $request->input('hutid');
        $year = $request->input('year');
        $user_id = $request->input('user_id');
        // $id = $request->input('id');
        $elg1 = $request->input('elg1');
        $elg2 = $request->input('elg2');
        $elg3 = $request->input('elg3');
        $elg4 = $request->input('elg4');
       

        $user = $request->input('user');

        if($user==""){
            $user = "vendor";
        }

        $remark1 = $remark2 = $remark3 = $remark4 = $remark5 = $remark6 = '';

        if($user == 'ca')
        {
            $remark1 = $request->input('remark1_ca');
            $remark2 = $request->input('remark2_ca');
            $remark3 = $request->input('remark3_ca');
            $remark4 = $request->input('remark4_ca');
          
        }
        elseif($user == 'vendor')
        {
            $remark1 = $request->input('remark1');
            $remark2 = $request->input('remark2');
            $remark3 = $request->input('remark3');
            $remark4 = $request->input('remark4');
         
        }

        $oremark = $request->input('remark');
        $oelg = $request->input('elg');

            DB::table('recommendation_adhar')->insert([
                'hut_id'=>$hutId,
                'year'=>$year,
                'user_id'=>$user_id,
                'eligibility_uid' => $elg1,
                'eligibility_name' => $elg2,
                'eligibility_dob' => $elg3,
                'eligibility_address' => $elg4,
               
                'remark_uid' => $remark1,
                'remark_name' => $remark2,
                'remark_dob' => $remark3,
                'remark_address' => $remark4,
               
                'overall_remark' => $oremark,
                'overall_eligibility' => $oelg,
                'user' => $user,
                'created_at'=>NOW(),

        ]);
        //return redirect()->route('admin.sra.agreement', ['hid' => $hutId])->with('message', 'Data updated!');   
            return redirect()->route('admin.sra.adhar', ['hid' => $hutId])->with('message', 'Recommendation Added Successfully!');
    }
    public function storemanualdata_adhar(Request $request)
    {
        // echo "in"; die;
        // print_r($request-all());die;


        $hutId = $request->input('hut_id');
        $year = $request->input('year');
        $uid_no = $request->input('uid_no');
        $owner_name = $request->input('owner_name');
        $birth_date = $request->input('birth_date');
        $owner_address = $request->input('owner_address');





        DB::table('adhar_details')->insert([
            'hut_id'=>$hutId,
            'year'=>$year,
            'uid_no' => $uid_no,
            'owner_name' => $owner_name,
            'birth_date' => $birth_date,
            'owner_address' =>$owner_address,
            'created_at'=>NOW(),

        ]);

        return redirect()->route('admin.sra.adhar', ['hid' => $hutId])->with('message', 'Data updated!');   
       // return redirect()->route('admin.sra.index')->with('status', 'Data added!');

    }
   
}