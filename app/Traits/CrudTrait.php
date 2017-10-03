<?php

namespace App\Traits;

use \View;
use \Input;
use \Redirect;
use \Response;
use \Session;
use \Exception;

trait CrudTrait {

    protected $relations = [];

 

    public function index() {
        
        $list = $this->model->getList();

        return view($this->app_name . '.list', ['list' => $list]);
    }

    public function create() {
        return view($this->app_name . '.create');
    }

    private function save($id = null) 
    {
        $data = $this->model->init($id)->with(Input::all());
   
        try {
            $this->model->save();
           
        } catch (Exception $e) {

            $errors = $e->getMessage();   // insert query
            if ($id) {
                return Redirect::route($this->edit_route, $id)->withErrors($errors)->withInput();
            }
            return Redirect::route($this->add_route)->withErrors($errors)->withInput();
        }
        return Redirect::route($this->list_route);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        return $this->save();
    }
    
    public function destroy($id)
    {
       $this->model->delete($id);
        return Redirect::route($this->list_route);
    }

}
