<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository{

    function __construct( array $relations = [])
    {
        parent::__construct(new User(),$relations);
    }

}
