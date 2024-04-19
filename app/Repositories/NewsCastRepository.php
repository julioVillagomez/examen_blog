<?php

namespace App\Repositories;

use App\Models\NewsCast;

class NewsCastRepository extends BaseRepository{

    function __construct( array $relations = [])
    {
        parent::__construct(new NewsCast(),$relations);
    }

    public function pagination($paginate = 10){
        if(empty($this->relations)){
            return $this->model->orderBy('id','desc')->paginate($paginate);
        }
        return $this->model->orderBy('id','desc')->with($this->relations)->paginate($paginate);
    }

    public function findSlug(string $slug){
        if(empty($this->relations)){
            return $this->model->where('slug',$slug)->firstOrFail();
        }
        return $this->model->where('slug',$slug)->with($this->relations)->firstOrFail();
    }

}
