<?php

namespace App\Http\Controllers;

use App\Repositories\NewsCastRepository;
use App\Services\GenerateArticleService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $articleRepository;

    function __construct()
    {
        $this->articleRepository = new NewsCastRepository(['author.profile','source']);
    }

    public function index(){
        $articles = $this->articleRepository->pagination();
        return view('blog')->with('articles',$articles);
    }

    public function store(GenerateArticleService $service){
        $service->generate();
        return back()->withInput();
    }

    public function show($slug){
        $article = $this->articleRepository->findSlug($slug);
        return view('blog_detail')->with('article',$article);

    }
}
