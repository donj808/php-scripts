<?php 
$items = $fields = array(); $i = 0;

$file = " "; // location to file. relative path or url

if (($handle = fopen($file, 'r')) !== FALSE) { // Check the resource is valid
	while (($row = fgetcsv($handle, 4096)) !== false) {
        if (empty($fields)) {
            $fields = $row;
            continue;
        }
        foreach ($row as $k=>$value) {
            $items[$i][$fields[$k]] = $value;
        }
        $i++;
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}

print_r( json_encode( $items ) );
