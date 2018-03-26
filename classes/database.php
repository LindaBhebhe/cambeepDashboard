<?php

 /** @author Linda Bhebhe
 **/

include_once 'database_info.php';

 $conn = '';
 $result = '';

/**
 * Method to connect to the database
 * @return bool true if the connection is successful
 */
function connect()
{
    $conn = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
    if (mysqli_connect_errno()) {
        return false;
    } else {
        return $conn;
    }
}


/**
 * this function executes a query and returns the results
 * @param $sql the sql statement to execute
 * @return result the results of the executed query
 */
function execute($sql)
{
	$conn =connect();
    if (!connect()) {
        return false;
    }
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return false;
    }
    return $result;
}


?>
