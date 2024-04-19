<?php

namespace App\Repositories;

use App\Models\Source;

class SourceRepository extends BaseRepository{

    function __construct( array $relations = [])
    {
        parent::__construct(new Source(),$relations);
    }

    public function createOrFirst(array $data){
        return Source::createOrFirst($data);
    }

}
