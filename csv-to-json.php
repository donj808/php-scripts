<?php 

/**
 *  Read csv file and convert to json
 *
 *  @param   string    $file     location to file. relative path or url
 *  @return  mixed
 */
function csv_to_json($file)
{
    $items = $fields = array(); 
    $i = 0;

    if ( ($handle = fopen($file, 'r')) !== FALSE) { // Check the resource is valid
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

    return json_encode( $items );
}


