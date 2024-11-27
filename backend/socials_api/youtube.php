<?php
include_once "social_api.php";
/**
 * Availables methods
 * 
 * getFollowersCount(username)
 * getAllViews(username)
 * getVideosCount(username)
 * getProfilePicture(username)
 * getId(username)
 * getTitle(username)
 * getAllPostsID(username)
 * 
 * TODO : Factorize the code
 * TODO : Add more comments
 */

$env = parse_ini_file('.env');

class youtube implements social_api {
    /**
     * Based on the Sample HTTP code for youtube.channels.list
     */
        
 
     function __construct () {
        global $env;
        $this->apiKey = $env["YOUTUBE_API_KEY"];        

     }

     function getFollowersCount(string $username): int {
        $ch = curl_init();

        if (!file_exists("save/youtube_".$username.".json")) {
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://youtube.googleapis.com/youtube/v3/channels?part=snippet%2CcontentDetails%2Cstatistics&forHandle='.urlencode($username).'&key='.urlencode($this->apiKey),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                //    'Authorization: Bearer '.$this->apiKey,
                    'Accept: application/json'
                ],
            ]);
        } else {
            curl_setopt_array($ch, [
                CURLOPT_URL => 'file://' . realpath("save/youtube_".urlencode($username).".json"),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                //    'Authorization: Bearer '.$this->apiKey,
                    'Accept: application/json'
                ],
            ]);
        }

        $response = curl_exec($ch);
        $err = curl_error($ch);

        if ($err) {
            echo "cURL Error: " . $err;
        } else {
            file_put_contents("save/youtube_".$username.".json", $response);
            $data = json_decode($response, true);
            
            if (isset($data['error'])) {
                echo "Error: " . $data['error']['message'];
            } else {
                // Process successful response
                return $data["items"][0]["statistics"]["subscriberCount"];
            }
        }
     }

    function getAllViews(string $username) : string {
        $ch = curl_init();

        if (!file_exists("save/youtube_".$username.".json")) {
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://youtube.googleapis.com/youtube/v3/channels?part=snippet%2CcontentDetails%2Cstatistics&forHandle='.urlencode($username).'&key='.urlencode($this->apiKey),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                //    'Authorization: Bearer '.$this->apiKey,
                    'Accept: application/json'
                ],
            ]);
        } else {
            curl_setopt_array($ch, [
                CURLOPT_URL => 'file://' . realpath("save/youtube_".urlencode($username).".json"),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                //    'Authorization: Bearer '.$this->apiKey,
                    'Accept: application/json'
                ],
            ]);
        }

        $response = curl_exec($ch);
        $err = curl_error($ch);

        if ($err) {
            echo "cURL Error: " . $err;
        } else {
            file_put_contents("save/youtube_".$username.".json", $response);
            $data = json_decode($response, true);
            
            if (isset($data['error'])) {
                echo "Error: " . $data['error']['message'];
            } else {
                // Process successful response
                return $data["items"][0]["statistics"]["viewCount"];
            }
        }

    }

    function getVideosCount(string $username): string {
        $ch = curl_init();

        if (!file_exists("save/youtube_".$username.".json")) {
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://youtube.googleapis.com/youtube/v3/channels?part=snippet%2CcontentDetails%2Cstatistics&forHandle='.urlencode($username).'&key='.urlencode($this->apiKey),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                //    'Authorization: Bearer '.$this->apiKey,
                    'Accept: application/json'
                ],
            ]);
        } else {
            curl_setopt_array($ch, [
                CURLOPT_URL => 'file://' . realpath("save/youtube_".urlencode($username).".json"),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                //    'Authorization: Bearer '.$this->apiKey,
                    'Accept: application/json'
                ],
            ]);
        }

        $response = curl_exec($ch);
        $err = curl_error($ch);

        if ($err) {
            echo "cURL Error: " . $err;
        } else {
            file_put_contents("save/youtube_".$username.".json", $response);
            $data = json_decode($response, true);
            
            if (isset($data['error'])) {
                echo "Error: " . $data['error']['message'];
            } else {
                // Process successful response
                return $data["items"][0]["statistics"]["viewCount"];
            }
        }
    }

    function getProfilePicture(string $username):string {
        $ch = curl_init();

        if (!file_exists("save/youtube_".$username.".json")) {
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://youtube.googleapis.com/youtube/v3/channels?part=snippet%2CcontentDetails%2Cstatistics&forHandle='.urlencode($username).'&key='.urlencode($this->apiKey),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                //    'Authorization: Bearer '.$this->apiKey,
                    'Accept: application/json'
                ],
            ]);
        } else {
            curl_setopt_array($ch, [
                CURLOPT_URL => 'file://' . realpath("save/youtube_".urlencode($username).".json"),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                //    'Authorization: Bearer '.$this->apiKey,
                    'Accept: application/json'
                ],
            ]);
        }

        $response = curl_exec($ch);
        $err = curl_error($ch);

        if ($err) {
            echo "cURL Error: " . $err;
        } else {
            file_put_contents("save/youtube_".$username.".json", $response);
            $data = json_decode($response, true);
            
            if (isset($data['error'])) {
                echo "Error: " . $data['error']['message'];
            } else {
                // Process successful response
                return $data["items"][0]["snippet"]["thumbnails"]["high"]["url"];
            }
        }
    }

    function getId(string $username): string {
        $ch = curl_init();

        if (!file_exists("save/youtube_".$username.".json")) {
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://youtube.googleapis.com/youtube/v3/channels?part=snippet%2CcontentDetails%2Cstatistics&forHandle='.urlencode($username).'&key='.urlencode($this->apiKey),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                //    'Authorization: Bearer '.$this->apiKey,
                    'Accept: application/json'
                ],
            ]);
        } else {
            curl_setopt_array($ch, [
                CURLOPT_URL => 'file://' . realpath("save/youtube_".urlencode($username).".json"),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                //    'Authorization: Bearer '.$this->apiKey,
                    'Accept: application/json'
                ],
            ]);
        }

        $response = curl_exec($ch);
        $err = curl_error($ch);

        if ($err) {
            echo "cURL Error: " . $err;
        } else {
            file_put_contents("save/youtube_".$username.".json", $response);
            $data = json_decode($response, true);
            
            if (isset($data['error'])) {
                echo "Error: " . $data['error']['message'];
            } else {
                // Process successful response
                return $data["items"][0]["id"];
            }
        }
    }


    function getTitle(string $username): string {
        $ch = curl_init();

        if (!file_exists("save/youtube_".$username.".json")) {
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://youtube.googleapis.com/youtube/v3/channels?part=snippet%2CcontentDetails%2Cstatistics&forHandle='.urlencode($username).'&key='.urlencode($this->apiKey),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                //    'Authorization: Bearer '.$this->apiKey,
                    'Accept: application/json'
                ],
            ]);
        } else {
            curl_setopt_array($ch, [
                CURLOPT_URL => 'file://' . realpath("save/youtube_".urlencode($username).".json"),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                //    'Authorization: Bearer '.$this->apiKey,
                    'Accept: application/json'
                ],
            ]);
        }

        $response = curl_exec($ch);
        $err = curl_error($ch);

        if ($err) {
            echo "cURL Error: " . $err;
        } else {
            file_put_contents("save/youtube_".$username.".json", $response);
            $data = json_decode($response, true);
            
            if (isset($data['error'])) {
                echo "Error: " . $data['error']['message'];
            } else {
                // Process successful response
                return $data["items"][0]["snippet"]["title"];
            }
        }
    }

    function getAllPostsID(string $username): array {
        $ch = curl_init();

        if (!file_exists("save/youtube_posts_".$username.".json")) {
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://youtube.googleapis.com/youtube/v3/activities?part=snippet%2CcontentDetails&channelId='.urlencode($this->getId($username)).'&maxResults=25&key='.urlencode($this->apiKey),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                //    'Authorization: Bearer '.$this->apiKey,
                    'Accept: application/json'
                ],
            ]);
        } else {
            curl_setopt_array($ch, [
                CURLOPT_URL => 'file://' . realpath("save/youtube_posts_".urlencode($username).".json"),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                //    'Authorization: Bearer '.$this->apiKey,
                    'Accept: application/json'
                ],
            ]);
        }

        $response = curl_exec($ch);
        $err = curl_error($ch);

        if ($err) {
            echo "cURL Error: " . $err;
        } else {
            file_put_contents("save/youtube_posts_".$username.".json", $response);
            $data = json_decode($response, true);
            
            if (isset($data['error'])) {
                echo "Error: " . $data['error']['message'];
            } else {
                // Process successful response
                $arr = array();
                foreach ($data["items"] as $d) {
                    array_push($arr, $d["id"]);
                }
                return $arr;
            }
        }
    }

    function getPostData(string $username, string $postID):array {
        $ch = curl_init();

        if (!file_exists("save/youtube_posts_".$username.".json")) {
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://youtube.googleapis.com/youtube/v3/activities?part=snippet%2CcontentDetails&channelId='.urlencode($this->getId($username)).'&maxResults=25&key='.urlencode($this->apiKey),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                //    'Authorization: Bearer '.$this->apiKey,
                    'Accept: application/json'
                ],
            ]);
        } else {
            curl_setopt_array($ch, [
                CURLOPT_URL => 'file://' . realpath("save/youtube_posts_".urlencode($username).".json"),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                //    'Authorization: Bearer '.$this->apiKey,
                    'Accept: application/json'
                ],
            ]);
        }

        $response = curl_exec($ch);
        $err = curl_error($ch);

        if ($err) {
            echo "cURL Error: " . $err;
        } else {
            file_put_contents("save/youtube_posts_".$username.".json", $response);
            $data = json_decode($response, true);
            
            if (isset($data['error'])) {
                echo "Error: " . $data['error']['message'];
            } else {
                // Process successful response
                $index = array_search($postID, array_column($data['items'], 'id'));

                if ($index !== false) {
                    return $data["items"][$index];
                } else {
                    return "Id not found in the array.";
                }

            }
        }
    }
}