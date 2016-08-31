<?php

$img = $_FILES['img'];

  $filename = $img['tmp_name'];
  $client_id = "1f8efdcdde18b9c";
  $handle = fopen($filename, "r");
  $data = fread($handle, filesize($filename));
  $pvars   = array('image' => base64_encode($data));
  $timeout = 30;

  $curl = curl_init();

  curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
  $out = curl_exec($curl);

  curl_close($curl);
  $pms = json_decode($out, true);
  $url = $pms['data']['link'];

  if($url!=""){
   echo "<h2>Uploaded Without Any Problem</h2>";
   echo "<img src='$url'/>";
  } else {
   echo "<h2>There's a Problem</h2>";
   echo $pms['data']['error'];
  }

// 1f8efdcdde18b9c
?>
