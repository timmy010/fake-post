<?php

declare(strict_types = 1);

namespace Timmy010\FakePost;

class FakePost
{
    public function getPost(): array
    {
        $postNumm = rand(0, 250);
        return $this->requestToDummy($postNumm);
    }

    private function requestToDummy(int $postNumm) {
        $queryUrl = "https://dummyjson.com/posts/{$postNumm}";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 0,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $queryUrl,
        ));
        $result = curl_exec($curl);
        curl_close($curl);
        
        $res = json_decode($result, true);
        
        return $res;
    }
}