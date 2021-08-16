<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Report;
use App\Models\Post;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    public function isReported(Request $request)
    {
      

        $report = new Report();

        $report1 = Report::all();

        foreach ($report1 as $report1) {

            if ($report1->user_id == $request->user_id && $report1->post_id == $request->post_id) {
               
                return response()->json(["message" => "already reported"]);
            }
        }


        $report->post_id = $request->input('post_id');
        $report->user_id = $request->input('user_id');

        $report->issue = $request->input('issue');

       
        $report->save();
       
        return response()->json(["message" => "Reported successfully"]);

    }
    
}