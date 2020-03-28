<?php
namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;

class HomePageController extends BaseController
{

    /**
     * HomePageController constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Get short url.
     *
     * @param App\Http\Requests\UrlRequest; $request
     * @return \Illuminate\Http\Response
     */
    public function getShortUrl(UrlRequest $request)
    {
        $token = $this->getToken();
        $checkUniqToken = true;

        while ($checkUniqToken) {
            if (! $this->UrlRepository->getUrlByToken($token)->isEmpty()) {
                $token = $this->getToken();
            } else {
                $checkUniqToken = false;
            }
        }

        $this->UrlRepository->addUrl($request->input('url'), $token);

        return redirect()->back()->with('success', 'Congratulation! Your short URL is ' . env('APP_URL') . '/' . $token);
    }

    /**
     * Process a short url request.
     *
     * @param string $shortUrlToken
     *
     * @return \Illuminate\Http\Response
     */
    public function shortUrlProcess($token)
    {
        $url = $this->UrlRepository->getUrlByToken($token);

        if (! $url->isEmpty()) {
            return redirect($url[0]->url);
        } else {
            return redirect()->route('home.index')->withErrors('This URL does not exist.');
        }
    }
}
