<?php
        $curl=curl_init('http://127.0.0.1:8000/api/orders/new');
            $data=curl_exec($curl);
            if($data===false){
                var_dump(curl_error($curl));
            }
            else{
                  echo "tokooss"; 
            }
            curl_close($curl);

            die();
?>