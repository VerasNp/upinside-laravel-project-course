<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    public function home()
    {
        $posts = \App\Post::orderBy('created_at', 'DESC')->limit(3)->get();
        $head = $this->seo->render(env('APP_NAME') . ' - Upinside Treinamentos', 'Descrição teste', url('/'), asset('images/img/img_bg_1.jpg'));
        return view('front.home', [
            'head' => $head,
            'posts' => $posts
        ]);
    }

    public function course()
    {
        $head = $this->seo->render(env('APP_NAME') . ' - Sobre o curso', 'Descrição teste', route('course'), asset('images/img/img_bg_1.jpg'));
        return view('front.course');
    }

    public function blog()
    {
        $posts = \App\Post::orderBy('created_at', 'DESC')->limit(3)->get();
        $head = $this->seo->render(env('APP_NAME') . ' - Blog', 'Descrição teste', route('blog'), asset('images/img/img_bg_1.jpg'));
        return view('front.blog',  [
            'posts' => $posts
        ]);
    }

    public function article($uri)
    {

        $post = \App\Post::where('uri', $uri)->first();
        $head = $this->seo->render(env('APP_NAME') . ' - ' . $post->title, $post->subtitle, route('article', $post->uri), \Illuminate\Support\Facades\Storage::url(\App\Support\Cropper::thumb($post->cover, 1200, 628)));
        return view('front.article', [
            'head' => $head,
            'post' => $post
        ]);
    }

    public function contact()
    {
        $head = $this->seo->render(env('APP_NAME') . ' - Upinside Treinamentos', 'Descrição teste', route('contact'), asset('images/img/img_bg_1.jpg'));
        return view('front.contact');
    }

    public function sendMail(Request $request)
    {
        $data  = [
            'reply_name' => $request->first_name . " " . $request->last_name,
            'reply_email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        Mail::send(new Contact($data));

        return redirect()->back();

        return new Contact($data);
    }
}
