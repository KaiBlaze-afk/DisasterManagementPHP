<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Rescue Teams</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<h2>Rescue Teams</h2>

<a href="add_team.php" class="btn btn-primary mb-3">Add New Team</a>

<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM rescue_teams WHERE id=$id");
    echo "<div class='alert alert-danger'>Team deleted.</div>";
}
?>

<table class="table table-bordered">
    <thead class="table-light">
        <tr><th>ID</th><th>Name</th><th>Members</th><th>Contact</th><th>Actions</th></tr>
    </thead>
    <tbody>
<?php
$result = $conn->query("SELECT * FROM rescue_teams");
while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['team_name']}</td>
        <td>{$row['members_count']}</td>
        <td>{$row['contact']}</td>
        <td>
            <a class='btn btn-warning btn-sm' href='add_team.php?edit={$row['id']}'>Edit</a>
            <a class='btn btn-danger btn-sm' href='view_teams.php?delete={$row['id']}' onclick=\"return confirm('Are you sure?')\">Delete</a>
        </td>
    </tr>";
}
?>
    </tbody>
</table>
</body>
</html>
