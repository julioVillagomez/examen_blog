<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\ProfileRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;


class RandomUserService{

    private $userRepository;
    private $profileRepository;

    function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->profileRepository = new ProfileRepository();
    }

    public function create(){
        $response = Http::get('https://randomuser.me/api/');
        $userRamdon = $response->json()['results'][0];
        $user = $this->userRepository->save(new User([
            'email' => $userRamdon["email"],
            'password' => Hash::make($userRamdon['login']["password"])
        ]));

        $profile = [
            'name'     => $userRamdon['name']['first'],
            'lastname' => $userRamdon['name']['last'],
            'image'    => $userRamdon['picture']['thumbnail'],
            'phone'    => $userRamdon['phone'],
            'cell'     => $userRamdon['cell'],
            'country'  => $userRamdon['location']['country'],
            'city'     => $userRamdon['location']['city'],
            'state'    => $userRamdon['location']['state'],
            'postcode' => $userRamdon['location']['postcode'],
            'gender'   => $userRamdon['gender'],
        ];

        $this->profileRepository->saveByUser($user,$profile);

        return $user->load('profile');
    }
}
