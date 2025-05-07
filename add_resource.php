<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Resource</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h2 class="mb-4">➕ Add Resource</h2>

  <?php
  if (isset($_POST['submit'])) {
      $stmt = $conn->prepare("INSERT INTO resources (resource_type, quantity, location) VALUES (?, ?, ?)");
      $stmt->bind_param("sis", $_POST['resource_type'], $_POST['quantity'], $_POST['location']);
      if ($stmt->execute()) {
          echo "<div class='alert alert-success'>✅ Resource added successfully!</div>";
      } else {
          echo "<div class='alert alert-danger'>❌ Error: " . $stmt->error . "</div>";
      }
  }
  ?>

  <form method="POST" class="shadow p-4 bg-white rounded">
    <div class="mb-3">
      <label class="form-label">Resource Type</label>
      <input type="text" name="resource_type" class="form-control" placeholder="e.g. Water, Food, Medicine" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Quantity</label>
      <input type="number" name="quantity" class="form-control" placeholder="e.g. 500" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Location</label>
      <input type="text" name="location" class="form-control" placeholder="e.g. Warehouse A" required>
    </div>
    <button type="submit" name="submit" class="btn btn-success">Add Resource</button>
    <a href="index.php" class="btn btn-secondary ms-2">Back to Dashboard</a>
  </form>
</div>

</body>
</html>
