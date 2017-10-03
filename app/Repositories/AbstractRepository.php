<?php

namespace App\Repositories;

abstract class AbstractRepository {

    protected $model;
    protected $input;
    public $data;

    public function __construct() {

        $model = $this->model;
    }

    public function init($id = null) {
        if ($id) {
            $this->model = $this->model->find($id);
        } else {
            $this->model = $this->model->newInstance();
        }

        return $this;
    }

    public function getData() {
        return $this->data->get();
    }

    public function setProperties($vars) {
        extract($this->input);

        foreach ($vars as $_val) {
            if (isset(${$_val})) {
                $this->model->$_val = $$_val;
            }
        }

        return $this;
    }

    public function create($data) {
        return $this->model->create($data);
    }

    public function newInstance() {
        return new $this->model;
    }

    public function all() {
        return $this->model->all();
    }

    public function push() {
        return $this->model->push();
    }

    public function updateUniques() {
        $is_saved = $this->model->updateUniques();

        return $this->saveRelations($is_saved, $this->model);
    }

    public function save() {


        if ($this->exists()) {
            return $this->updateUniques();
        }

        $data = $this->input;

        if (array_key_exists('_token', $data)) {
            unset($data['_token']);
        }

        $is_saved = $this->model->save();

        return $this->saveRelations($is_saved, $this->model);
    }

    public function saveRelations($is_saved, $parent) {
        return $is_saved;
    }

    public function delete($id) {
        \Log::info('delete');
        return $this->model->where('id',$id)->delete();
    }

    public function exists() {
        return $this->model->exists;
    }

    public function destroy($id) {
        \Log::info('destroy');
        return $this->model->destroy($id);
    }

    public function errors() {
        return $this->model->errors();
    }

    public function find($id) {
        return $this->model->find($id);
    }

    public function make(array $with = array()) {
        return $this->model->with($with);
    }

    public function getById($id, array $with = array()) {
        $query = $this->make($with);

        return $query->find($id);
    }

    
    public function getFirstBy($key, $value, array $with = array()) {
        return $this->make($with)->where($key, '=', $value)->first();
    }
    public function getManyBy($key, $value, array $with = array()) {
        return $this->make($with)->where($key, '=', $value)->get();
    }

    

    public function getFirstOrCreate($data) {
        return $this->model->firstOrCreate($data);
    }

    public function lists($field, $key = null) {
        return $this->model->lists($field, $key);
    }

    public function deleteIn($ids) {
        \Log::info('deleteIn');
        foreach ($ids as $id) {
            $this->model = $this->model->find($id);
        }

        return $this->model->whereIn('id', $ids)->delete();
    }

    public function getModel() {
        return $this->model;
    }

    public function getTableName() {
        return $this->model->getTable();
    }

}
