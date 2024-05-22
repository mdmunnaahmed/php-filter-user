<?php
header('Content-Type: application/json');

// Database connection information
$host = 'localhost';
$dbname = 'demo';
$user = 'root';
$password = '';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Method Not Allowed']);
    exit;
}

try {
    // Get the JSON input
    $input = file_get_contents('php://input');
    if ($input === false) {
        throw new Exception('Failed to get input');
    }

    $data = json_decode($input, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('Invalid JSON input');
    }

    $startDate = $data['startDate'] ?? null;
    $endDate = $data['endDate'] ?? null;
    if (!$startDate || !$endDate) {
        throw new Exception('Missing startDate or endDate');
    }

    // Ensure that the endDate includes the entire day by adding time component
    $endDateTime = date('Y-m-d H:i:s', strtotime($endDate . ' 23:59:59'));

    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute the query
    $stmt = $pdo->prepare('SELECT id, firstName, lastName, email, phone, age, ytUsername, created_time FROM users WHERE created_time BETWEEN :startDate AND :endDate');
    $stmt->bindParam(':startDate', $startDate);
    $stmt->bindParam(':endDate', $endDateTime);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
