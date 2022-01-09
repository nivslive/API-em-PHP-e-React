<?php

namespace App\Http\Services;


class HeaderService extends Services {

    public function AcceptJson() {
        return header('Content-Type: application/json');
    }




}