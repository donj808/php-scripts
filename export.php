<?php

class Export
{
	/**
	 *  Export File
	 *
	 *  @param   string  $filename
	 *  @param   array   $headers
	 *  @param   array   line_outpus
	 *  @return  void 
	 */
    public function export_to_file( $filename, $headers, $line_outputs ) {
        ob_end_clean(); // flush the buffer
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $oFile = fopen('php://output', "w"); 
        ob_end_clean(); // re-flush the buffer
        // default header
        $_headers = [
            'Cache-Control: no-cache, no-store, must-revalidate, post-check=0, pre-check=0',
            'Content-Description: File Transfer',
            'Content-type: ' . $this->get_content_type( $ext ),
            'Content-Disposition: attachment; filename='. $filename,
            'Expires: 0',
            'Pragma: public',
            'Pragma: no-cache'
        ];
        $headers =  array_unique( array_merge($headers, $_headers) );
        foreach( $headers as $header ) {
            header( $header );
        }
        foreach( $line_outputs as $line_output ) {
            if ( $ext == 'csv' ) {
                fputcsv( $oFile, $line_output );
            }
            else {
                fwrite( $oFile, $line_output );
            }
        }
        // close the stream
        fclose($oFile);
        die();
    }


    /**
	 *  Get File Header Content Type
	 *  
	 *  @param   string
	 *  @return  string
	 */
    public function get_content_type( $type ) {
        $content_type = "text/plain";
        switch($type){
            case 'csv':
                $content_type = "text/csv";
                break;
            case 'txt':
            default:
                $break;
        }
        return $content_type;
    }

}

// $content = array( "Hello World!\n", "This is a test\n" );
// $header = array();
// $ofile = new Export();
// $ofile->export_to_file( "hello.txt", $header, $content );