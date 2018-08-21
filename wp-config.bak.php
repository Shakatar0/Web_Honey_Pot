<?php
//Createur : Shakatar

$bdd = new PDO("mysql:host=127.0.0.1;dbname=honey_pot","root","");

$ip = $_SERVER['REMOTE_ADDR'];
$info = $_SERVER['HTTP_USER_AGENT'];

$check_info = $bdd->prepare("SELECT * FROM hackers_informations WHERE ip = ? AND info = ?");
$check_info->execute(array($ip, $info));
$check_info = $check_info->rowCount();

if($check_info == 0){
	$log_hacker_req = $bdd->prepare("INSERT INTO hackers_informations(ip, info) VALUES(?, ?)");
	$log_hacker_req->execute(array($ip, $info));
}//Sinon il est déjà inscrit dans la base de donnée, c'est pour éviter les doublons.

//highlight_file('wp_temp5412.txt');
echo nl2br(htmlspecialchars(file_get_contents('wp_temp5412.txt')));
?>