<?php 

session_start();
function generate($user){
    if (!isset($_SESSION['tokens'])) {
        $_SESSION['tokens'] = [];
    }

    if (!isset($_SESSION['tokens'][$user])) {
        $_SESSION['tokens'][$user] = [];
    }

    $token = bin2hex(random_bytes(32));

    if (count($_SESSION['tokens'][$user]) >= 10) {
        array_shift($_SESSION['tokens'][$user]);
    }

    $_SESSION['tokens'][$user][] = $token;

    return $token;
}

function verify_token($user,$token){
    $index = array_search($token,  $_SESSION['tokens'][$user]);
    if ($index !== false) {
        unset( $_SESSION['tokens'][$user][$index]);
        return true;
    }

    return false;
}

$user = 'zidane';
$token1 = generate($user);
$token2 = generate($user);
echo $token1;
echo '<br>';
echo $token2;
echo '<br>';

$verify1 = verify_token($user,$token1);
$verify2 = verify_token($user,$token2);

echo $verify1 ? 'Berhasil verify token 1' : 'gagal verify token 1';
echo '<br>';
echo $verify2 ? 'Berhasil verify token 2' : 'gagal verify token 2';
echo '<br>';