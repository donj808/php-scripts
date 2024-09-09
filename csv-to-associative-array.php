<?php 

/**
 *  Read csv file and convert to an associative array
 *
 *  @param   string    $file     location to file. relative path or url
 *  @return  mixed
 */
function csv_to_array($file)
{
  $rows = array_map( 'str_getcsv', file( $file ));
  $header = array_shift( $rows );
  $contents = array();
  foreach ($rows as $row) {
    $contents[] = array_combine($header, $row);
  }

  return $contents
}
