<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contacts\CurrencyRepositoryInterface;

class HomeController extends Controller
{
    
     protected $model;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CurrencyRepositoryInterface $currency)
    {
        $this->model = $currency;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	       
        $list = $this->model->getListForSelectBox();
        return view('home', ['list' => $list]);
    }
}
