<?php

/** 
 *  Get the uptime of the server
 */


    $data = shell_exec('uptime');
    $uptime = explode(' up ', $data);
    $uptime = explode(',', $uptime[1]);
    $uptime = $uptime[0].', '.$uptime[1];

    echo ('Current server uptime: '.$uptime );

?>