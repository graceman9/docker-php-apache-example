<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// The MySQL service named in the docker-compose.yml.
$host = 'db';

// Database use name
$user = 'MYSQL_USER';

//database user password
$pass = 'MYSQL_PASSWORD';

$db = 'MYSQL_DATABASE';

// check the MySQL connection status
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL server successfully!";
}

$result = $conn->query("SELECT * FROM test");
if ($result) {
    $users = $result->fetch_all(MYSQLI_ASSOC);
    echo '<ul>Users:';
    foreach ($users as $user) {
        echo '<div>';
        echo $user['id'], ': ', $user['name'];
        echo '</div>';
    }
    echo '</ul>';
}