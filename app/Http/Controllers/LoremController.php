<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use \Badcow\LoremIpsum\Generator;
use Illuminate\Http\Request;

class LoremIpsumController extends Controller {
    public function __construct() {
        # Put anything here that should ha  ppen before any of the other actions
    }
    /**
    * Responds to requests to GET /loremipsum/{noOfParas}
    */
    public function getLoremIpsum($noPara=2) {
        $generator = new Generator();
        $paragraphs = $generator->getParagraphs ($noPara);
        return view('lorem.ResultLorem')->with('title', 'Lorem Ipsum Generator')->with('paragraphs', $paragraphs);
    }
    public function postLoremIpsum(Request $request) {
        //Validate that Number of Paragraphs is integer
        $this->validate($request, [
            'noPara' => 'required|numeric',
       ]);
        $noPara = $request->input('noPara');
        $generator = new Generator();
        $paragraphs = $generator->getParagraphs ($noPara);
        return view('lorem.ResultLorem')->with('title', 'Lorem Ipsum Generator')->with('paragraphs', $paragraphs);
    }
}
?>