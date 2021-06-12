<?php

if(isset($_POST["getData"])){
    $action = $_POST["getData"];

        Api($action);
        
    }


function Api($action){

    $url = "https://ignite-careers.com/test/endpoint.php";
    $data = '{"jobId":10}';

    $headers = array(
        "Authorization: Bearer qwertyuiop",
        "Content-Type: application/json",
    );

    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($curl);
    curl_close($curl);
    $dex = json_decode($response, true);

    if($action == "get_data"){
        foreach($dex["data"] as $d){

            echo "<tr>";
    
                echo "<td>".$d["uid"]."</td>";
                echo "<td>".$d["first_name"]."</td>";
                echo "<td>".$d["last_name"]."</td>";
                echo "<td>".$d["mobile"]."</td>";
                echo "<td>".$d["email"]."</td>";
    
        echo "</tr>";
        
        }

    }

    if($action == "get_download"){
        $filename ="data.csv";
        header("Content-Description: File Transfer");
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="'.$filename.'";');
        ob_end_clean();
        $csv = fopen('php://output', 'w');
        fputcsv($csv, array_keys($dex["data"][0]));
        foreach($dex["data"] as $dat){
       
           fputcsv($csv,$dat);
        }
        fclose($csv);
    
        exit();
    }
    
  

}










?>