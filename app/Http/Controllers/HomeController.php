<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth' , ['except' => ['notification']]) ;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * last data read and post to view for map view and table view
     */
    public function home()
    {


        $last_users = Admin::query()->latest()->limit(5)->get();
        $last_news = News::query()->orderBy('id', 'desc')->get();


        return view('dashboard.home',compact('last_news', 'last_users')) ;
    }

    /**
     * @param Request $request
     * @return string
     */
    public function pdf(Request $request)
    {

        $rows = $request['rows'];
        $cols = $request['cols'];

        $pdf = PDF::loadView('pdf.document', ['rows' => $rows, 'cols' => $cols]);
        $pdf->save('document.pdf');
        return 'document.pdf';
    }




}
