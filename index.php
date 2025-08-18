<?php

$conn = new mysqli("localhost", "root", "", "smart_methods");


if ($conn->connect_error) {
    die("failled " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'], $_POST['age'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $conn->query("INSERT INTO users (name, age) VALUES ('$name', $age)");
}

// عند الضغط على Toggle
if (isset($_GET['toggle'])) {
    $id = $_GET['toggle'];
    $result = $conn->query("SELECT status FROM users WHERE id=$id");
    $row = $result->fetch_assoc();
    $newStatus = $row['status'] ? 0 : 1;
    $conn->query("UPDATE users SET status=$newStatus WHERE id=$id");
    header("Location: index.php");
    exit;
}

// جلب البيانات لعرضها في الجدول
$users = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>SmartMethods Task</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        input { margin: 5px; }
        table, td, th {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
    </style>
</head>
<body>

<h2>إدخال بيانات</h2>
<form method="POST">
    name: <input type="text" name="name" required>
    age : <input type="number" name="age" required>
    <input type="submit" value="Submit">
</form>

<h2>جدول البيانات</h2>
<table>
    <tr><th>ID</th><th>Name</th><th>Age</th><th>Status</th><th>Action</th></tr>
    <?php while ($row = $users->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['age'] ?></td>
            <td><?= $row['status'] ?></td>
            <td><a href="?toggle=<?= $row['id'] ?>">Toggle</a></td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
