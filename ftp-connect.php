<?php
    /** 
     *  Connect to FTP and Read Files
     *
     *
     *  @param   string    $host     ftp host
     *  @param   string    $user     ftp user
     *  @param   string    $pass     ftp password
     *  @param   string    $file     ftp file location
     *  @return  mixed
     */
  

  function get_ftp_file( $host, $user, $pass, $file ) {

    // Create a FTP instance
    $ftp_conn = ftp_connect($host) or die("Could not connect to $ftp_server");

    // Login to the FTP
    ftp_login($ftp_conn, $user, $pass);
    ftp_pasv($ftp_conn, true);

    // Get the ftp file
    $h = fopen('php://temp', 'r+');
    ftp_fget($ftp_conn, $h, $file, FTP_BINARY, 0);

    // Read the file and get contents
    $fstats = fstat($h);
    fseek($h, 0);
    $contents = fread($h, $fstats['size']); 
    fclose($h);
    ftp_close($ftp_conn);
    return $contents
  }
