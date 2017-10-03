<?php

namespace App\Repositories;

use App\Repositories\Contacts\CurrencyRepositoryInterface;
use App\Currency;

class CurrencyRepository extends AbstractRepository implements CurrencyRepositoryInterface {

    protected $model;
    public $app_name = 'currency';

    public function __construct(Currency $currency) {
        $this->model = $currency;
        parent::__construct();
    }

    public function with($input) {
        $this->input = $input;
        $user = \Auth::user();

        $vars = ['name', 'code', 'rate'];
        $this->setProperties($vars);
        $this->model->created_by = $user->id;
        return $this;
    }
    
    public function deleteAll()
    {
        return $this->model->truncate();
    }

    public function getList() {
        return $this->model->orderBy('id', 'DESC')->get();
    }

    public function getListForSelectBox() {
        return $this->model->pluck('name', 'id')->toArray();
    }
    public function convert($input)
    {
        $from_id = $input['from'];
        $to_id = $input['to'];
        $input_val = $input['input_val'];
        $from = $this->model->find($from_id);
        $rate = $from->rate;
        if($from_id == $to_id) {
            return "Value : ".($input_val)." (Rate : ".$rate.")";
        }
        return "Value : ".($input_val * $rate)." (Rate : ".$rate.")";       
    }

}

?>
