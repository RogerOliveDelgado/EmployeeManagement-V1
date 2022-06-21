<?php

function getImageFromAPI(string $gender): string {
    $ch = curl_init();
    if($gender === ''){
        $url = "https://randomuser.me/api/?results=1";
    } else {
        $url = "https://randomuser.me/api/?results=1&gender={$gender}";
    }
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    
    if($error = curl_error($ch)){
        $image = './../assets/img/darth-vader';
    } else {
        $decoded = json_decode($response, true);
        $image = $decoded['results'][0]['picture']['large'];
    }
    curl_close($ch);
    return $image;
}