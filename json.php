<?php
    /** 
     *  Accessing JSON Objects and Arrays
     */

    $json_str = '[{"name":"Jonathan Suh","gender":"male"},{"name":"William Philbin","gender":"male"},{"name":"Allison McKinnery","gender":"female"}]';

    // Convert JSON string to Array
    $json_array = json_decode($json_str, true);
    print_r( "JSON string to array: <br/>" );
    print_r( $json_array );        // Dump all data of the Array
    print_r( "<br/>" );

    // Access the Array
    foreach( $json_array as $array ) {
        print_r( "[ Name: " . $array["name"] . " , " . "Gender: " . $array["gender"] . " ]<br>" );
    }

    print_r( "<br/>" );

    // Convert JSON string to Object
    $json_object = json_decode($json_str);
    print_r( "JSON string to object: <br/>" );
    print_r($json_object);      // Dump all data of the Object
    print_r( "<br/>" );
    foreach( $json_object as $object ){
        print_r( "[ Name: ". $object->name . " , " . "Gender: " . $object->gender . " ]<br>" );
    }

?>