<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Disaster Management Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .dashboard {
      max-width: 600px;
      margin: 50px auto;
    }
    .card a {
      text-decoration: none;
    }
  </style>
</head>
<body>

<div class="dashboard text-center">
  <h1 class="mb-4">🌍 Disaster Management System</h1>
  <div class="list-group shadow">
    <a href="add_disaster.php" class="list-group-item list-group-item-action">➕ Add Disaster</a>
    <a href="view_disasters.php" class="list-group-item list-group-item-action">📄 View Disasters</a>
    <a href="add_team.php" class="list-group-item list-group-item-action">➕ Add Rescue Team</a>
    <a href="view_teams.php" class="list-group-item list-group-item-action">👥 View Rescue Teams</a>
    <a href="add_victim.php" class="list-group-item list-group-item-action">➕ Add Victim</a>
    <a href="view_victims.php" class="list-group-item list-group-item-action">🧍‍♂️ View Victims</a>
    <a href="add_resource.php" class="list-group-item list-group-item-action">➕ Add Resource</a>
    <a href="view_resources.php" class="list-group-item list-group-item-action">📦 View Resources</a>
  </div>
</div>

</body>
</html>
