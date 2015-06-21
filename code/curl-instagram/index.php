<!--
Copyright (c) 2013 , Craig MacGregor
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:
1. Redistributions of source code must retain the above copyright
   notice, this list of conditions and the following disclaimer.
2. Redistributions in binary form must reproduce the above copyright
   notice, this list of conditions and the following disclaimer in the
   documentation and/or other materials provided with the distribution.
3. All advertising materials mentioning features or use of this software
   must display the following acknowledgement:
   This product includes software developed by the <organization>.
4. Neither the name of the <organization> nor the
   names of its contributors may be used to endorse or promote products
   derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY Craig MacGregor \'AS IS\' AND ANY
EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL <COPYRIGHT HOLDER> BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
-->

<?php

//curl request to https://api.instagram.com/v1/tags/snow/media/recent?access_token=344145696.f59def8.d9277e0eb59f4283bfcfe6fb779b9181

?>

<?php

// create a new cURL resource
$ch = curl_init();

$curlURL = "https://api.instagram.com/v1/tags/bridge/media/recent?client_id=8cf53802be7a444ab11fdd90bba33aa2";

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $curlURL);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// grab URL and pass it to the browser
try{
    $result = curl_exec($ch);
}catch(Exception $e){
    print_r($e);
}
$json = json_decode($result);

// close cURL resource, and free up system resources
curl_close($ch);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <style type="text/css">
        html, body { margin: 0; padding: 0; background-color: #000; font-family: Helvetica, Arial sans-serif; font-size: 12px; }
        #site-container { width: 652px; margin: 0 auto }
        .photo-container { background-color: #FFF; float: left; margin: 0 0 20px 0; width: 652px; }
        .photo-inner { margin: 20px; float: left; }
        .clear { clear: both; }
        h1, #debug { color: #FFF; }
    </style>
    </head>
    <body>
        <div id="site-container">
            <h1>Latest photo's tagged with "#bridge" on Instagram</h1>
            <?php if(isset($json->data)){ ?>
                <?php foreach($json->data as $image){ ?>
                    <div class="photo-container">
                        <div class="photo-inner">
                            <img src="<?php echo $image->images->standard_resolution->url; ?>" />
                            <p>Caption: <?php echo $image->caption->text; ?></p>
                            <p>Time Created: <?php echo date('d-m-Y H:i:s',$image->created_time); ?></p>
                            <p>Tags: <?php foreach($image->tags as $tag){ echo "#".$tag." "; }//end foreach ?></p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                <?php }//end foreach ?>
            <?php }//end if ?>
        </div>
    </body>
</html>
