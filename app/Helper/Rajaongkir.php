<?php


if(!function_exists('city')){


    function city($id=null){

        if($id<1){
            $url="https://api.rajaongkir.com/starter/city";
        }
        else{
            $url="https://api.rajaongkir.com/starter/city?id=".$id;
        }
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: 0b48750be76c2e31a7473680944f0aff"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          return $response;
        }
    }
}

if(!function_exists('cost')){

    function cost($origin,$destination,$weigth,$courier){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => 'origin='.$origin.'&destination='.$destination.'&weight='.$weigth.'&courier='.$courier,
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 0b48750be76c2e31a7473680944f0aff"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
             echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
     }
}
?>
