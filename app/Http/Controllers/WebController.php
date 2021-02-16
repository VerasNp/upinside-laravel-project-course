<?php

namespace App\Http\Controllers;

use App\Support\Seo;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        $head = $this->seo->render(env('APP_NAME') . ' - Upinside Treinamentos', 'Descrição teste', url('/'), asset('images/img/img_bg_1.jpg'));
        return view('front.home', ['head' => $head]);
    }

    public function course()
    {
        $head = $this->seo->render(env('APP_NAME') . ' - Sobre o curso', 'Descrição teste', route('course'), asset('images/img/img_bg_1.jpg'));
        return view('front.course');
    }

    public function blog()
    {
        $head = $this->seo->render(env('APP_NAME') . ' - Blog', 'Descrição teste', route('blog'), asset('images/img/img_bg_1.jpg'));
        return view('front.blog');
    }

    public function article()
    {
        $head = $this->seo->render(env('APP_NAME') . ' - Sobre', 'Descrição teste', url('/'), asset('images/img/img_bg_1.jpg'));
        return view('front.article');
    }

    public function contact()
    {
        $head = $this->seo->render(env('APP_NAME') . ' - Upinside Treinamentos', 'Descrição teste', route('contact'), asset('images/img/img_bg_1.jpg'));
        return view('front.contact');
    }
}
