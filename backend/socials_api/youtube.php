<?php
include_once "social_api.php";
/*
TODO : 
Add memoization (store the last request and use it as long as we don't actualize the data)
*/
$env = parse_ini_file('.env');

class youtube { //implements social_api {
    /**
     * Based on the Sample PHP code for youtube.channels.list
     */
        
 
     function __construct () {
        global $env;
        $this->apiKey = $env["YOUTUBE_API_KEY"];        

     }

     function getFollowersCount($username) {
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://youtube.googleapis.com/youtube/v3/channels?part=snippet%2CcontentDetails%2Cstatistics&forHandle='.urldecode($username).'&key='.urlencode($this->apiKey),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
            //    'Authorization: Bearer '.$this->apiKey,
                'Accept: application/json'
            ],
        ]);

        $response = curl_exec($ch);
        $err = curl_error($ch);

        if ($err) {
            echo "cURL Error: " . $err;
        } else {
            $data = json_decode($response, true);
            
            if (isset($data['error'])) {
                echo "Error: " . $data['error']['message'];
            } else {
                // Process successful response
                return $data["items"][0]["statistics"]["subscriberCount"];
            }
        }
     }

    function getAllViews($username) {
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://youtube.googleapis.com/youtube/v3/channels?part=snippet%2CcontentDetails%2Cstatistics&forHandle='.urldecode($username).'&key='.urlencode($this->apiKey),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
            //    'Authorization: Bearer '.$this->apiKey,
                'Accept: application/json'
            ],
        ]);

        $response = curl_exec($ch);
        $err = curl_error($ch);

        if ($err) {
            echo "cURL Error: " . $err;
        } else {
            $data = json_decode($response, true);
            
            if (isset($data['error'])) {
                echo "Error: " . $data['error']['message'];
            } else {
                // Process successful response
                return $data["items"][0]["statistics"]["viewCount"];
            }
        }

    }

    function getVideosCount($username) {
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://youtube.googleapis.com/youtube/v3/channels?part=snippet%2CcontentDetails%2Cstatistics&forHandle='.urldecode($username).'&key='.urlencode($this->apiKey),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
            //    'Authorization: Bearer '.$this->apiKey,
                'Accept: application/json'
            ],
        ]);

        $response = curl_exec($ch);
        $err = curl_error($ch);

        if ($err) {
            echo "cURL Error: " . $err;
        } else {
            $data = json_decode($response, true);
            
            if (isset($data['error'])) {
                echo "Error: " . $data['error']['message'];
            } else {
                // Process successful response
                return $data["items"][0]["statistics"]["viewCount"];
            }
        }
    }
}