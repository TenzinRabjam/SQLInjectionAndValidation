<?php
/**
 * SQLInjection.php
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

$ip = 'mariadb-dev.ctqka5csqsg2.us-west-2.rds.amazonaws.com';

if (filter_var($ip, FILTER_VALIDATE_IP)) {
    echo "IP address '$ip' is considered valid.";
}

// URL with SQL injection: http://localhost:8000/SQLInjection.php?col_string=%27Two%27+OR+1=1--&col_number=2



$dsn = 'mysql:dbname=student;host='.$ip;
$username = 'student';
$password = 'letmein';

$pdo = new \PDO($dsn, $username, $password);
$query = $pdo->prepare("SELECT * FROM test WHERE col_string = ? AND col_number = ?");
$parameters = [$_GET['col_string'], $_GET['col_number']];

try {
    $query->execute($parameters);
} catch (\PDOException $stmt) {
    print_r($stmt->getMessage());
}

$rows = $query->fetchAll(\PDO::FETCH_ASSOC);

print('Retrieved '.$query ->rowCount().' row(s)</br></br>');

foreach ($rows as $row) {
    printf('<li>%s, %s, %s, %s, %s</li></br>', $row[0],$row[1],$row[2],$row[3],$row[4]);
}
