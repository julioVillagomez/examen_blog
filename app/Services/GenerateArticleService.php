<?php

namespace App\Services;

use App\Models\NewsCast;
use App\Repositories\NewsCastRepository;
use App\Repositories\SourceRepository;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class GenerateArticleService{

    private $generateUser;
    private $source;
    private $newcast;

    function __construct()
    {
        $this->generateUser = new RandomUserService();
        $this->source = new SourceRepository();
        $this->newcast = new NewsCastRepository();
    }

    public function generate(){
        $response = Http::get('https://newsapi.org/v2/everything',[
            'apiKey' => env('API_KEY'),
            "domains"=>"bbc.co.uk,techcrunch.com,engadget.com,wsj.com",
            'pageSize' => 20
        ]);
        $response = $response->json();

        foreach ($response['articles'] as $key => $item) {
            $source = $this->source->createOrFirst(['name' =>$item['source']['name']]);
            $user = $this->generateUser->create();
            $data = [
                    'title'        => $item['title'],
                    'description'  => $item['description'],
                    'url'          => $item['url'],
                    'url_to_image' => $item['urlToImage'],
                    'published_at' => $item['publishedAt'],
                    'content'      => $item['content'],
                    'user_id'      => $user->id,
                    'source_id'    => $source->id,
                    'slug'         => Str::slug($item['title'], '-')
            ];
            $this->newcast->save(new NewsCast($data));

        }


    }


}
