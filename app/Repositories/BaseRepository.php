<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository{

    protected $model;
    protected $relations;

    function __construct(Model $model,array $relations = [])
    {
        $this->model = $model;
        $this->relations = $relations;
    }


    public function all(){
        if(empty($relations)){
            return $this->model->get();
        }
        return $this->model->with($relations)->get();
    }


    public function get(int $id): ?Model{
        return $this->model->find($id);
    }

    public function save(Model $model): ?Model{
        $model->save();
        return $model;
    }

    public function delete(int $id){
        return $this->model->find($id)->delete();
    }

}
