<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyController extends BaseController {

    public function testController() {
        return 'test controller';
    }

    public function testControllerPara($name) {
        return $name;
    }

    public function testRedirect() {
        return redirect()->route('routeLN', ['id' => 1]);
    }

    public function getURL(Request $request) {
        // return $request->url();
        if($request->is('get*'))
            echo 'Ok';
        else
            echo 'no';
    }

    public function postForm(Request $request) {
        // return $request->input('name');
        if($request->has('name')) {
            echo 'ok';
        } else {
            echo 'no';
        }
    }

    public function setCookie() {
        $response = new Response();
        $response->cookie('Course', 'Laravel', 1);
        return $response;
    }

    public function getCookie(Request $request) {
        return $request->cookie('Course');
    }
}