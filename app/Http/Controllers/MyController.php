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

    // get file upload
    public function postFile(Request $request) {
        //$path = $request->file('myFile')->store('public/img');

        if($request->hasFile('myFile')) {

            //$request->file('myFile')->extension(); // get ex of file
            $path_tmp = $request->file('myFile'); // lấy đường dẫn tạm của file;
            $filename = $path_tmp->getClientOriginalName('myFile'); // lấy tên file
            return $path_tmp->storeAs('public/img', $filename);
        }
        
    }

    public function getJSON() {
        $arr = ['Laravel' => 'ABC', 'CI', 'Zend'];
        $ABC = response()->json($arr);
        var_dump($arr);
    }
}