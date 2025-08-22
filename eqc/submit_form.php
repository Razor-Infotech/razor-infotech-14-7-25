<?php
session_start();
include 'config.php'; // Contains database connection details

// Check if the request is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $name = isset($_POST['name']) ? trim($_POST['name']) : null;
    $employeeId = isset($_POST['employeeId']) ? trim($_POST['employeeId']) : null;
    $team = isset($_POST['team']) ? trim($_POST['team']) : null;
    $tenure = isset($_POST['tenure']) ? trim($_POST['tenure']) : null;
    $callType = isset($_POST['callType']) ? trim($_POST['callType']) : null;
    $reviewerName = isset($_POST['reviewerName']) ? trim($_POST['reviewerName']) : null;

    // Check for required fields
    if (empty($name) || empty($employeeId) || empty($team) || empty($tenure) || empty($callType) || empty($reviewerName)) {
        echo json_encode(['success' => false, 'error' => 'All fields are required']);
        exit;
    }

    // Initialize empty evaluation data
    $evaluation_data = [];

    // Collect evaluation data
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'q') === 0 && isset($value)) {
            $question = $key;
            $answer = $value;
            $comment = isset($_POST['comment' . substr($key, 1)]) ? $_POST['comment' . substr($key, 1)] : '';
            $evaluation_data[] = json_encode(['question' => $question, 'answer' => $answer, 'comment' => $comment]);
        }
    }

    // Convert evaluation data array to JSON
    $evaluation_json = json_encode($evaluation_data);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO employee_details (name, employee_id, team, tenure, call_type, reviewer_name, evaluation_data) VALUES (?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        error_log('Prepare failed: (' . $conn->errno . ') ' . $conn->error);
        echo json_encode(['success' => false, 'error' => 'Prepare failed: ' . $conn->error]);
        exit;
    }

    $bind = $stmt->bind_param("sssssss", $name, $employeeId, $team, $tenure, $callType, $reviewerName, $evaluation_json);

    if ($bind === false) {
        error_log('Bind failed: (' . $stmt->errno . ') ' . $stmt->error);
        echo json_encode(['success' => false, 'error' => 'Bind failed: ' . $stmt->error]);
        exit;
    }

    $execute = $stmt->execute();

    if ($execute === false) {
        error_log('Execute failed: (' . $stmt->errno . ') ' . $stmt->error);
        echo json_encode(['success' => false, 'error' => 'Execute failed: ' . $stmt->error]);
    } else {
        echo json_encode(['success' => true]);
    }

    $stmt->close();
    $conn->close();
}
?>
