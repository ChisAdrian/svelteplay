<?php
// Initialize an array to hold the response
$RESP = array();

// Define column names
$cols = array('NR', 'Col2', 'Col3', 'Col4');

// Initialize an array to hold the rows
$rows = array();

// Generate 102 rows of data
for ($x = 1; $x <= 102; $x++) {
    // Each row contains an array with numeric and string values
    array_push($rows, array(
        strval($x),                     // Numeric value
        'someV' . strval($x),           // 'someV' followed by the numeric value
        'someV2' . strval($x * 10),     // 'someV2' followed by the numeric value times 10
        '****'                          // Constant string '****'
    ));
}

// Push the column names and rows into the response array
array_push($RESP, $cols);
array_push($RESP, $rows);

// Encode the response array to JSON and echo it
echo json_encode($RESP);
?>
