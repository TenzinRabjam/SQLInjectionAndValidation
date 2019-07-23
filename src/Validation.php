<?php
/**
 * Validation.php
 *
 * PHP Version 7
 *
 * @category Source
 * @package  App
 * @author   Don Stringham <donstringham@weber.edu>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://weber.edu
 */
declare(strict_types=1);
namespace App;

$db_ip = 'mariadb-dev.ctqka5csqsg2.us-west-2.rds.amazonaws.com';

if (filter_var($db_ip, FILTER_VALIDATE_IP)) {
    echo "IP address '$db_ip' is considered valid.";
}

$conn = mysqli_connect($db_ip, 'student', 'letmein', 'student');
$query = "SELECT col_password FROM test WHERE col_string = '{$_GET['col_string']}' AND col_number = '{$_GET['col_number']}'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
var_dump($row);
mysqli_free_result($result);
mysqli_close($conn);
