<?php
// PHP Version >=7.3
// Author: DangNhuNam
// Version 1.0
class instagram {
          public function getHeader($cookie) {
                 $csrf = explode('csrftoken=', $cookie)[1];
                 $csrf_token = explode(';' , $csrf)[0];
                 $header = array();
                  $header[] = 'authority: www.instagram.com';
                  $header[] = 'content-type: application/json';
                  $header[] = 'accept: application/json';
                  $header[] = 'Cookie: '.$cookie;
                  $header[] = 'x-csrftoken: '.$csrf_token;
                  $header[] = 'user-agent: Mozilla/5.0 (Linux; Android 12; SM-T225) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36';
                  $header[] = 'x-instagram-ajax: 1005991556';
                return $header;
              }
          public function Like($id, $cookie) {
                $url = "https://i.instagram.com/api/v1/web/likes/".$id."/like/";
                $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_POST =>  TRUE,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_HTTPHEADER => $this->getHeader($cookie),
                CURLOPT_ENCODING => "",
                CURLOPT_HEADER => FALSE,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_TIMEOUT => 20,
                CURLOPT_PORT => 443,
              ));
         $body = curl_exec($curl);
         curl_close($curl);
         return $body;
      }
          public function Follow($id, $cookie) {
                $url = "https://www.instagram.com/web/friendships/".$id."/follow/";
                $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_POST =>  TRUE,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_HTTPHEADER => $this->getHeader($cookie),
                CURLOPT_ENCODING => "",
                CURLOPT_HEADER => FALSE,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_TIMEOUT => 20,
                CURLOPT_PORT => 443,
              ));
         $body = curl_exec($curl);
         curl_close($curl);
         return $body;
      }
   }
   $ig = new Instagram;
   $tym = $ig->Like('id_post', 'cookie);
   $fl  = $ig->Follow('id_users', 'cookie);
?>
