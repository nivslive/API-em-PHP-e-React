<?php



namespace App\Services;



class Header {


	public function cors() {
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type, Accept');
	}


	public function test() {

		echo "test";
	}
}