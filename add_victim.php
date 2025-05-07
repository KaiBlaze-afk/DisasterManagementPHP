<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Victim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Add Victim</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Victim Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter victim's name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Age</label>
                    <input type="number" name="age" class="form-control" placeholder="Enter age" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="Safe">Safe</option>
                        <option value="Injured">Injured</option>
                        <option value="Missing">Missing</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Disaster ID</label>
                    <input type="number" name="disaster_id" class="form-control" placeholder="e.g. 1" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Assigned Team ID</label>
                    <input type="number" name="assigned_team_id" class="form-control" placeholder="e.g. 2" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Add Victim</button>
                <a href="view_victims.php" class="btn btn-secondary">View All Victims</a>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                $stmt = $conn->prepare("INSERT INTO victims (name, age, status, disaster_id, assigned_team_id) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sisii", $_POST['name'], $_POST['age'], $_POST['status'], $_POST['disaster_id'], $_POST['assigned_team_id']);
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success mt-3'>Victim added successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger mt-3'>Error: " . $stmt->error . "</div>";
                }
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
