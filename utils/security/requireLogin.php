<?php

if(empty($_SESSION['user']) && !isset($stopFirewall)){
    // If they are not, we redirect them to the login page.
    header("Location: ". $baseURL."login/");

    // Remember that this die statement is absolutely critical.  Without it,
    // people can view your members-only content without logging in.
    die("Redirecting to login");
}

?>