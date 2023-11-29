<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends Controller {
    public function index(Request $request, $id){
        $name = "Donald Trump";
        $age = "75";
        $data = [
            "id" => $id,
            "name" => $name,
            "age" => $age
        ];

        $response = new Response($data, 200);
        
        // Essential Cookie Informations
        $cookieName = "access_token";
        $cookieValue = "2023_OSTAD_Laravel";
        $validity = 10;
        $domainName = $_SERVER['SERVER_NAME'];
        $secure = "false";
        $httpOnly = "true";
        
        $response->cookie(
            $cookieName,
            $cookieValue,
            $validity,
            "/",
            $domainName,
            $secure,
            $httpOnly
        );

        return $response;
    }
}
