<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add/Update Team</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
<h3><?php echo isset($_GET['edit']) ? 'Update' : 'Add'; ?> Rescue Team</h3>

<?php
$team = ['team_name' => '', 'members_count' => '', 'contact' => ''];
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $res = $conn->query("SELECT * FROM rescue_teams WHERE id=$id");
    $team = $res->fetch_assoc();
}
?>

<form method="POST" class="mb-4">
    <input type="hidden" name="id" value="<?= $_GET['edit'] ?? '' ?>">
    <input class="form-control mb-2" type="text" name="team_name" value="<?= $team['team_name'] ?>" placeholder="Team Name" required>
    <input class="form-control mb-2" type="number" name="members_count" value="<?= $team['members_count'] ?>" placeholder="Members Count" required>
    <input class="form-control mb-2" type="text" name="contact" value="<?= $team['contact'] ?>" placeholder="Contact" required>
    <button class="btn btn-success" type="submit" name="<?= isset($_GET['edit']) ? 'update' : 'submit' ?>">
        <?= isset($_GET['edit']) ? 'Update' : 'Add' ?> Team
    </button>
</form>

<?php
if (isset($_POST['submit'])) {
    $stmt = $conn->prepare("INSERT INTO rescue_teams (team_name, members_count, contact) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $_POST['team_name'], $_POST['members_count'], $_POST['contact']);
    $stmt->execute();
    echo "<div class='alert alert-success'>Team added!</div>";
}

if (isset($_POST['update'])) {
    $stmt = $conn->prepare("UPDATE rescue_teams SET team_name=?, members_count=?, contact=? WHERE id=?");
    $stmt->bind_param("sisi", $_POST['team_name'], $_POST['members_count'], $_POST['contact'], $_POST['id']);
    $stmt->execute();
    echo "<div class='alert alert-success'>Team updated!</div>";
}
?>
<a href="view_teams.php" class="btn btn-secondary">Back to List</a>
</body>
</html>
