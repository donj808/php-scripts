<?php

/**
 *  Insertion Sort Algorithm
 *  
 */
function insertionSort( $arr ) {
    
    for( $i=1; $i < sizeof($arr); $i++ ) {
        
        $current = $arr[$i];
        $index = $i;
        
        for( $j = $index-1; $j >= 0; $j-- ) {
            if(  $arr[$j] > $current ) {
                $arr[$index] = $arr[$j];
                $index--;
            }
        }
        
        $arr[$index] = $current;
    }
    
    return $arr;
    
}

/** Tests Samples */
$arr = [8];
print_r( insertionSort( $arr ) );

$arr = [8, 2, 4, 1, 3];
print_r( insertionSort( $arr ) );

$arr = [8, 4, 3, 5, 1, 4, 2, 6, 3];
print_r( insertionSort( $arr ) );