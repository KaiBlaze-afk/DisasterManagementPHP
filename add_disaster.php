<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Disaster</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h2 class="mb-4">➕ Add New Disaster</h2>

  <?php
  if (isset($_POST['submit'])) {
      $stmt = $conn->prepare("INSERT INTO disasters (name, type, location, date, severity) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("sssss", $_POST['name'], $_POST['type'], $_POST['location'], $_POST['date'], $_POST['severity']);
      if ($stmt->execute()) {
          echo "<div class='alert alert-success'>✅ Disaster added successfully!</div>";
      } else {
          echo "<div class='alert alert-danger'>❌ Error: " . $stmt->error . "</div>";
      }
  }
  ?>

  <form method="POST" class="shadow p-4 bg-white rounded">
    <div class="mb-3">
      <label class="form-label">Disaster Name</label>
      <input type="text" name="name" class="form-control" placeholder="e.g. Cyclone Amphan" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Type</label>
      <input type="text" name="type" class="form-control" placeholder="e.g. Flood, Earthquake" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Location</label>
      <input type="text" name="location" class="form-control" placeholder="e.g. West Bengal" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Date</label>
      <input type="date" name="date" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Severity</label>
      <select name="severity" class="form-select" required>
        <option selected disabled>Select severity</option>
        <option value="Low">Low</option>
        <option value="Medium">Medium</option>
        <option value="High">High</option>
      </select>
    </div>
    <button type="submit" name="submit" class="btn btn-success">Add Disaster</button>
    <a href="index.php" class="btn btn-secondary ms-2">Back to Dashboard</a>
  </form>
</div>

</body>
</html>
