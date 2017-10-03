<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contacts\CurrencyRepositoryInterface;
use \Redirect;
use \Response;
use \Input;

class CurrencyController extends Controller {

    protected $item;
    protected $app_name;
    protected $list_route = 'currency.index';
    protected $add_route = 'currency.create';
    protected $edit_route = 'currency.edit';

    use \App\Traits\CrudTrait;

    public function __construct(CurrencyRepositoryInterface $item) {
        $this->model = $item;
        $this->app_name = 'currency';
        $this->middleware('auth');
    }
    
    public function deleteAllAction()
    {
        $this->model->deleteAll();
        return Redirect::route($this->list_route);
    }
    
    public function convertAction()
    {
        $val = $this->model->convert(Input::all());
        return Response::Json(['success' => true,'val' => $val]);
    }


}
