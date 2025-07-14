<?php
// Database connection details
$servername = "localhost";
$username = "u965360670_razor";
$password = "Razor_123";
$dbname = "u965360670_razor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch evaluations from the database
$sql = "SELECT * FROM employee_details";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Results</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            padding: 20px;
        }

        .text-center {
            text-align: center;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .details {
            display: none;
        }

        .details td {
            background-color: #f9f9f9;
        }

        .show-details {
            cursor: pointer;
        }

        .download-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Evaluation Results</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Employee ID</th>
                    <th>Team</th>
                    <th>Tenure</th>
                    <th>Call Type</th>
                    <th>Reviewer Name</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $evaluations = json_decode($row['evaluation_data'], true);
                        echo "<tr class='show-details' data-id='" . htmlspecialchars($row['employee_id']) . "'>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['employee_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['team']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['tenure']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['call_type']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['reviewer_name']) . "</td>";
                        echo "<td><button class='download-button' onclick='downloadPDF(" . htmlspecialchars($row['employee_id']) . ")'>Download</button></td>";
                        echo "</tr>";

                        if (is_array($evaluations)) {
                            echo "<tr class='details' id='details-" . htmlspecialchars($row['employee_id']) . "'>";
                            echo "<td colspan='7'>";
                            echo "<table class='table table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Question</th>";
                            echo "<th>Answer</th>";
                            echo "<th>Comment</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            foreach ($evaluations as $evaluation) {
                                $evaluation = json_decode($evaluation, true);
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($evaluation['question']) . "</td>";
                                echo "<td>" . htmlspecialchars($evaluation['answer']) . "</td>";
                                echo "<td>" . htmlspecialchars($evaluation['comment']) . "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No evaluations found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const rows = document.querySelectorAll('.show-details');
            rows.forEach(row => {
                row.addEventListener('click', function () {
                    const detailsRow = document.getElementById('details-' + this.dataset.id);
                    detailsRow.style.display = detailsRow.style.display === 'table-row' ? 'none' : 'table-row';
                });
            });
        });

        function downloadPDF(employeeId) {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            const detailsRow = document.getElementById('details-' + employeeId);
            const rows = detailsRow.querySelectorAll('tr');
            let y = 10;
            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                let text = '';
                cells.forEach(cell => {
                    text += cell.textContent + ' ';
                });
                doc.text(text, 10, y);
                y += 10;
            });

            doc.save('evaluation_' + employeeId + '.pdf');
        }
    </script>
</body>

</html>
