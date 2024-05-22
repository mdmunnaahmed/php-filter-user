<?php
header('Content-Type: application/json');

// Get the JSON input
$input = file_get_contents('php://input');
$data = json_decode($input, true);

$startDate = $data['startDate'];
$endDate = $data['endDate'];

try {
  $pdo = new PDO('mysql:host=localhost;dbname=demo', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->prepare('SELECT id, firstName, lastName, email, phone, age, ytUsername, created_time FROM users WHERE created_time BETWEEN :startDate AND :endDate');
  $stmt->bindParam(':startDate', $startDate);
  $stmt->bindParam(':endDate', $endDate);
  $stmt->execute();

  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($result);
} catch (PDOException $e) {
  echo json_encode(['error' => $e->getMessage()]);
}
