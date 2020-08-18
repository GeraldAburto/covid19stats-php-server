<?php

namespace App\Services;

use Unirest\Request as Request;

class RapidAPIService
{
    public function getStats()
    {
        Request::verifyPeer(false);
        $response = Request::get(
            "https://covid-193.p.rapidapi.com/statistics",
            array(
                "X-RapidAPI-Host" => "covid-193.p.rapidapi.com",
                "X-RapidAPI-Key" => "703f1d299amsh57340e340d0bb7fp14836fjsn0413752f70b0"
            )
        );

        return $response;
    }
}
