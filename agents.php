<!DOCTYPE html>
<head>
<?php include 'db_connection.php'; ?>
<link rel="stylesheet" href="styles.css">
<?php include 'header.php'; ?>
</head>
<body>
<dev id="header"></dev>
<?php
$stmt = $pdo->query("SELECT * FROM agents ORDER BY name desc");
$agents = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($agents as $agent): ?>
        <tr>
            <td><?= $agent['name'] ?></td>
            <td><?= $agent['phone'] ?></td>
            <td><?= $agent['email'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>

