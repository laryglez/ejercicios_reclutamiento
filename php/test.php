<?php
$result = '';
if ( isset( $_POST[ 'csv' ] ) && isset( $_POST[ 'column' ] ) ) {
    $csv = $_POST[ 'csv' ];
    $column = $_POST[ 'column' ];
    try {
        $result = sort_csv( $csv, $column );
        $result = implode( '\\n', $result );
        $result = "<p class='mt-5'>The resulting string is: $result</p>";
    } catch ( Exception $e ) {
        $result = '<p class="mt-5">Exception: '.  $e->getMessage(). '</p>';
    }

}

function sort_csv( $csv, $column ) {
    $data = explode( '\\n', $csv );
    $data_array = array();
    foreach ( $data as $row )
 {
        $data_array [] = explode( ',', $row );
    }
    if ( count( $data_array[ 0 ] ) <= $column )
 {
        throw new Exception( 'Column does not exist.' );
    }
    $aux = array();
    foreach ( $data_array as $key => $fila ) {
        $aux[ $key ] = $fila[ $column ];
    }
    array_multisort( $aux, SORT_ASC, $data_array );

    $result = array();
    foreach ( $data_array as $row ) {
        $result[] = implode( ',', $row );
    }

    return $result;
}

