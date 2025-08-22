<?php
session_start();
$session_timeout = 43200000;

// Check if admin is logged in
if (!isset($_SESSION['id'])) {
    header("Location: admin-job-post.php");
    exit();
}

// Check session timeout
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $session_timeout) {
    session_unset();
    session_destroy();
    header('Location: admin-job-post.php');
    exit();
}
$_SESSION['LAST_ACTIVITY'] = time();

require 'eqc/config.php';

// Handle delete request
if (isset($_POST['delete_job']) && isset($_POST['job_id'])) {
    $job_id = (int)$_POST['job_id'];
    $delete_query = "DELETE FROM post WHERE id = $job_id";
    
    if ($conn->query($delete_query) === TRUE) {
        $success_message = "Job post deleted successfully!";
    } else {
        $error_message = "Error deleting job post: " . $conn->error;
    }
}

// Handle edit request
if (isset($_POST['update_job'])) {
    $job_id = (int)$_POST['job_id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $responsibilities = mysqli_real_escape_string($conn, $_POST['responsiblities']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
    $employment_type = mysqli_real_escape_string($conn, $_POST['employment_type'] ?? 'FULL_TIME');
    $street_address = mysqli_real_escape_string($conn, $_POST['street_address'] ?? '');
    $city = mysqli_real_escape_string($conn, $_POST['city'] ?? '');
    $state = mysqli_real_escape_string($conn, $_POST['state'] ?? '');
    $postal_code = mysqli_real_escape_string($conn, $_POST['postal_code'] ?? '');
    $country = mysqli_real_escape_string($conn, $_POST['country'] ?? 'IN');
    $salary_value = mysqli_real_escape_string($conn, $_POST['salary_value'] ?? '0');
    $currency = mysqli_real_escape_string($conn, $_POST['currency'] ?? 'INR');
    $unit_text = mysqli_real_escape_string($conn, $_POST['unit_text'] ?? 'MONTH');

    $update_query = "UPDATE post SET 
        description = '$description',
        responsiblities = '$responsibilities',
        date = '$date',
        end_date = '$end_date',
        employment_type = '$employment_type',
        street_address = '$street_address',
        city = '$city',
        state = '$state',
        postal_code = '$postal_code',
        country = '$country',
        salary_value = '$salary_value',
        currency = '$currency',
        unit_text = '$unit_text'
        WHERE id = $job_id";

    if ($conn->query($update_query) === TRUE) {
        $success_message = "Job post updated successfully!";
    } else {
        $error_message = "Error updating job post: " . $conn->error;
    }
}

// Get job data for editing
$edit_job = null;
if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
    $edit_id = (int)$_GET['edit'];
    $edit_query = "SELECT * FROM post WHERE id = $edit_id";
    $edit_result = $conn->query($edit_query);
    if ($edit_result && $edit_result->num_rows > 0) {
        $edit_job = $edit_result->fetch_assoc();
    }
}

// Get all job posts
$query = "SELECT * FROM post ORDER BY date DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Job Posts - Admin</title>
    <link rel="icon" href="assets/img/razor-img/logo/razor-fevicon.webp" type="image/webp">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="tinymce/tinymce.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 24px;
            font-weight: 600;
        }

        .header .btn-group {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .btn-success {
            background: #28a745;
            color: white;
        }

        .btn-success:hover {
            background: #218838;
        }

        .btn-warning {
            background: #ffc107;
            color: #212529;
        }

        .btn-warning:hover {
            background: #e0a800;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
            border: 1px solid #dc3545;
        }

        .btn-danger:hover {
            background: #c82333;
        }

        .btn-logout {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .btn-logout:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .content {
            padding: 30px;
        }

        .alert {
            padding: 12px 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: 500;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .stat-number {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .table-container {
            overflow-x: auto;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th {
            background: #f8f9fa;
            padding: 15px 12px;
            text-align: left;
            font-weight: 600;
            color: #495057;
            border-bottom: 2px solid #dee2e6;
        }

        td {
            padding: 15px 12px;
            border-bottom: 1px solid #dee2e6;
            vertical-align: top;
        }

        tr:hover {
            background: #f8f9fa;
        }

        .job-title {
            font-weight: 600;
            color: #495057;
            margin-bottom: 5px;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 8px;
        }

        .meta-item {
            background: #e9ecef;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            color: #6c757d;
        }

        .description {
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .date-info {
            font-size: 13px;
            color: #6c757d;
        }

        .status-active {
            background: #d4edda;
            color: #155724;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
        }

        .status-expired {
            background: #f8d7da;
            color: #721c24;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
        }

        .no-jobs {
            text-align: center;
            padding: 40px;
            color: #6c757d;
        }

        .no-jobs i {
            font-size: 48px;
            margin-bottom: 15px;
            opacity: 0.5;
        }

            // ...existing code...
        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            overflow-y: auto;
        }

        .modal-content {
            background: white;
            margin: 2% auto;
            padding: 0;
            border-radius: 8px;
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 30px;
            border-radius: 8px 8px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-body {
            padding: 30px;
        }

        .modal h3 {
            margin: 0;
            font-size: 18px;
        }

        .close {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            padding: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: background 0.3s ease;
        }

        .close:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #495057;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 600;
            color: #495057;
            margin: 30px 0 15px 0;
            padding-bottom: 8px;
            border-bottom: 2px solid #e9ecef;
        }

        .section-title:first-child {
            margin-top: 0;
        }

        .delete-modal-content {
            background: white;
            margin: 15% auto;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 400px;
            text-align: center;
        }

        .modal-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .form-row {
            }
            
            .actions {
                flex-direction: column;
                gap: 5px;
            }
            
            .btn-sm {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-briefcase"></i> Manage Job Posts</h1>
            <div class="btn-group">
                <?php if ($edit_job): ?>
                    <a href="?" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                <?php else: ?>
                    <a href="post.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Job
                    </a>
                <?php endif; ?>
                <a href="admin-logout.php" class="btn btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>

        <div class="content">
            <?php if (isset($success_message)): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> <?php echo $success_message; ?>
                </div>
            <?php endif; ?>

            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i> <?php echo $error_message; ?>
                </div>
            <?php endif; ?>

            <?php if ($edit_job): ?>
                <!-- Edit Form -->
                <div class="edit-form">
                    <h2 style="margin-bottom: 30px; color: #495057;">
                        <i class="fas fa-edit"></i> Edit Job Post: <?php echo htmlspecialchars($edit_job['title']); ?>
                    </h2>
                    
                    <form method="POST" id="editJobForm">
                        <input type="hidden" name="job_id" value="<?php echo $edit_job['id']; ?>">
                        
                        <div class="section-title">Basic Information</div>
                        <div class="form-group">
                            <label for="title">Job Title</label>
                            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($edit_job['title']); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="6" required><?php echo htmlspecialchars($edit_job['description']); ?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="responsiblities">Responsibilities</label>
                            <textarea name="responsiblities" id="responsiblities" rows="6" required><?php echo htmlspecialchars($edit_job['responsiblities']); ?></textarea>
                <div class="edit-form">
                        </div>
                        
                        <div class="section-title">Employment Details</div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="employment_type">Employment Type</label>
                                <select name="employment_type" id="employment_type" required>
                                    <option value="FULL_TIME" <?php echo ($edit_job['employment_type'] ?? '') == 'FULL_TIME' ? 'selected' : ''; ?>>Full Time</option>
                                    <option value="PART_TIME" <?php echo ($edit_job['employment_type'] ?? '') == 'PART_TIME' ? 'selected' : ''; ?>>Part Time</option>
                                    <option value="CONTRACTOR" <?php echo ($edit_job['employment_type'] ?? '') == 'CONTRACTOR' ? 'selected' : ''; ?>>Contractor</option>
                                    <option value="TEMPORARY" <?php echo ($edit_job['employment_type'] ?? '') == 'TEMPORARY' ? 'selected' : ''; ?>>Temporary</option>
                                    <option value="INTERN" <?php echo ($edit_job['employment_type'] ?? '') == 'INTERN' ? 'selected' : ''; ?>>Intern</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date">Posted Date</label>
                                <input type="date" name="date" id="date" value="<?php echo $edit_job['date']; ?>" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="end_date">Expiry Date</label>
                            <input type="date" name="end_date" id="end_date" value="<?php echo $edit_job['end_date']; ?>" required>
                        </div>
                        
                        <div class="section-title">Location Information</div>
                        <div class="form-group">
                            <label for="street_address">Street Address</label>
                            <input type="text" name="street_address" id="street_address" value="<?php echo htmlspecialchars($edit_job['street_address'] ?? ''); ?>">
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" value="<?php echo htmlspecialchars($edit_job['city'] ?? ''); ?>">
                            </div>
                            <div class="form-group">
                                <label for="state">State</label>
                                <select name="state" id="state">
                                    <option value="">Select State</option>
                                    <option value="Andhra Pradesh" <?php echo ($edit_job['state'] ?? '') == 'Andhra Pradesh' ? 'selected' : ''; ?>>Andhra Pradesh</option>
                                    <option value="Karnataka" <?php echo ($edit_job['state'] ?? '') == 'Karnataka' ? 'selected' : ''; ?>>Karnataka</option>
                                    <option value="Maharashtra" <?php echo ($edit_job['state'] ?? '') == 'Maharashtra' ? 'selected' : ''; ?>>Maharashtra</option>
                                    <option value="Tamil Nadu" <?php echo ($edit_job['state'] ?? '') == 'Tamil Nadu' ? 'selected' : ''; ?>>Tamil Nadu</option>
                                    <option value="Telangana" <?php echo ($edit_job['state'] ?? '') == 'Telangana' ? 'selected' : ''; ?>>Telangana</option>
                                    <option value="Delhi" <?php echo ($edit_job['state'] ?? '') == 'Delhi' ? 'selected' : ''; ?>>Delhi</option>
                                    <option value="Gujarat" <?php echo ($edit_job['state'] ?? '') == 'Gujarat' ? 'selected' : ''; ?>>Gujarat</option>
                                    <option value="Haryana" <?php echo ($edit_job['state'] ?? '') == 'Haryana' ? 'selected' : ''; ?>>Haryana</option>
                                    <option value="Uttar Pradesh" <?php echo ($edit_job['state'] ?? '') == 'Uttar Pradesh' ? 'selected' : ''; ?>>Uttar Pradesh</option>
                                    <option value="West Bengal" <?php echo ($edit_job['state'] ?? '') == 'West Bengal' ? 'selected' : ''; ?>>West Bengal</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="postal_code">Postal Code</label>
                                <input type="text" name="postal_code" id="postal_code" value="<?php echo htmlspecialchars($edit_job['postal_code'] ?? ''); ?>">
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country" id="country">
                                    <option value="IN" <?php echo ($edit_job['country'] ?? 'IN') == 'IN' ? 'selected' : ''; ?>>India</option>
                                    <option value="US" <?php echo ($edit_job['country'] ?? '') == 'US' ? 'selected' : ''; ?>>United States</option>
                                    <option value="UK" <?php echo ($edit_job['country'] ?? '') == 'UK' ? 'selected' : ''; ?>>United Kingdom</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="section-title">Salary Information</div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="salary_value">Salary Amount</label>
                                <input type="number" name="salary_value" id="salary_value" step="0.01" value="<?php echo $edit_job['salary_value'] ?? ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="currency">Currency</label>
                                <select name="currency" id="currency">
                                    <option value="INR" <?php echo ($edit_job['currency'] ?? 'INR') == 'INR' ? 'selected' : ''; ?>>INR</option>
                                    <option value="USD" <?php echo ($edit_job['currency'] ?? '') == 'USD' ? 'selected' : ''; ?>>USD</option>
                                    <option value="EUR" <?php echo ($edit_job['currency'] ?? '') == 'EUR' ? 'selected' : ''; ?>>EUR</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="unit_text">Salary Period</label>
                            <select name="unit_text" id="unit_text">
                                <option value="MONTH" <?php echo ($edit_job['unit_text'] ?? 'MONTH') == 'MONTH' ? 'selected' : ''; ?>>Per Month</option>
                                <option value="YEAR" <?php echo ($edit_job['unit_text'] ?? '') == 'YEAR' ? 'selected' : ''; ?>>Per Year</option>
                                <option value="HOUR" <?php echo ($edit_job['unit_text'] ?? '') == 'HOUR' ? 'selected' : ''; ?>>Per Hour</option>
                            </select>
                        </div>
                        
                        <div style="margin-top: 30px; display: flex; gap: 15px;">
                            <button type="submit" name="update_job" class="btn btn-success">
                                <i class="fas fa-save"></i> Update Job Post
                            <a href="?" class="btn btn-primary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            <?php else: ?>
                <!-- Job List -->
                <?php
                // Calculate stats
                $total_jobs = $result->num_rows;
                $active_jobs = 0;
                $expired_jobs = 0;
                $today = date('Y-m-d');

                if ($result->num_rows > 0) {
                    $result->data_seek(0);
                    while ($row = $result->fetch_assoc()) {
                        if ($row['end_date'] >= $today) {
                            $active_jobs++;
                        } else {
                            $expired_jobs++;
                        }
                    }
                    $result->data_seek(0);
                }
                ?>

                <div class="stats">
                    <div class="stat-card">
                        <div class="stat-number"><?php echo $total_jobs; ?></div>
                        <div>Total Jobs</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number"><?php echo $active_jobs; ?></div>
                        <div>Active Jobs</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number"><?php echo $expired_jobs; ?></div>
                        <div>Expired Jobs</div>
                    </div>
                </div>

                <div class="table-container">
                    <?php if ($result->num_rows > 0): ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Job Details</th>
                                    <th>Description</th>
                                    <th>Dates</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td>
                                            <div class="job-title"><?php echo htmlspecialchars($row['title']); ?></div>
                                            <div class="job-meta">
                                                <?php if (isset($row['employment_type']) && $row['employment_type']): ?>
                                                    <span class="meta-item"><?php echo htmlspecialchars($row['employment_type']); ?></span>
                                                <?php endif; ?>
                                                <?php if (isset($row['city']) && $row['city']): ?>
                                                    <span class="meta-item"><?php echo htmlspecialchars($row['city']); ?></span>
                                                <?php endif; ?>
                                                <?php if (isset($row['salary_value']) && $row['salary_value'] > 0): ?>
                                                    <span class="meta-item">₹<?php echo number_format($row['salary_value']); ?>/<?php echo strtolower($row['unit_text'] ?? 'month'); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="description" title="<?php echo htmlspecialchars(strip_tags($row['description'])); ?>">
                                                <?php echo htmlspecialchars(substr(strip_tags($row['description']), 0, 100)) . '...'; ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="date-info">
                                                <div><strong>Posted:</strong> <?php echo date('M j, Y', strtotime($row['date'])); ?></div>
                                                <div><strong>Expires:</strong> <?php echo date('M j, Y', strtotime($row['end_date'])); ?></div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if ($row['end_date'] >= $today): ?>
                                                <span class="status-active">Active</span>
                                            <?php else: ?>
                                                <span class="status-expired">Expired</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="actions">
                                                <a href="job-details?title=<?php echo urlencode($row['title']); ?>" 
                                                   class="btn btn-primary btn-sm" target="_blank">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                                <a href="?edit=<?php echo $row['id']; ?>" 
                                                   class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <button onclick="confirmDelete(<?php echo $row['id']; ?>, '<?php echo addslashes($row['title']); ?>')" 
                                                        class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="no-jobs">
                            <i class="fas fa-briefcase"></i>
                            <h3>No Job Posts Found</h3>
                            <p>You haven't created any job posts yet. Click "Add New Job" to get started.</p>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal">
        <div class="delete-modal-content">
            <h3><i class="fas fa-exclamation-triangle" style="color: #dc3545;"></i> Confirm Delete</h3>
            <p>Are you sure you want to delete the job post "<span id="jobTitle"></span>"?</p>
            <p style="color: #dc3545; font-size: 14px;">This action cannot be undone.</p>
            <div class="modal-buttons">
                <button onclick="closeModal()" class="btn btn-primary">Cancel</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    <input type="hidden" name="job_id" id="deleteJobId">
                    <button type="submit" name="delete_job" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Initialize TinyMCE for edit form
        <?php if ($edit_job): ?>
        tinymce.init({
            selector: '#description, #responsiblities',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | link image media table | bullist numlist',
            plugins: [
                'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link',
                'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount'
            ],
            height: 300,
            menubar: false,
            branding: false
        });

        // Form validation
        document.getElementById('editJobForm').addEventListener('submit', function (e) {
            var descContent = tinymce.get('description').getContent({ format: 'text' }).trim();
            var respContent = tinymce.get('responsiblities').getContent({ format: 'text' }).trim();
            
            if (descContent.length === 0) {
                e.preventDefault();
                alert('Please enter a job description.');
                return;
            }
            
            if (respContent.length === 0) {
                e.preventDefault();
                alert('Please enter job responsibilities.');
                return;
            }
            
            tinymce.triggerSave();
        });
        <?php endif; ?>

        // Auto-logout timer
        setTimeout(function () {
            window.location.href = 'admin-job-post.php';
        }, 43200000);

        function confirmDelete(jobId, jobTitle) {
            document.getElementById('deleteJobId').value = jobId;
            document.getElementById('jobTitle').textContent = jobTitle;
            document.getElementById('deleteModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('deleteModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }

        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>
</body>
</html>

<?php $conn->close(); ?>
