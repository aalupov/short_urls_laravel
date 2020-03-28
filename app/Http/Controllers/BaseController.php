<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UrlRepository;

abstract class BaseController extends Controller
{

    /**
     * BaseController constructor
     */
    public function __construct()
    {
        $this->UrlRepository = app(UrlRepository::class);
    }

    /**
     * Generate token
     *
     * @param int $length
     * 
     * @return string
     */
    protected function getToken($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;        
    }
}