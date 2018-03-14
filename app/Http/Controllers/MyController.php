<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

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
}