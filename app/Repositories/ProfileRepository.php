<?php

namespace App\Repositories;

use App\Models\Profile;
use App\Models\User;

class ProfileRepository extends BaseRepository{

    function __construct( array $relations = [])
    {
        parent::__construct(new Profile,$relations);
    }


    public function saveByUser(User $user,array $profile){
        $user->profile()->createOrFirst($profile);
    }

}
