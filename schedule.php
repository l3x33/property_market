<!DOCTYPE html>
<head>
<?php include 'db_connection.php'; ?>
<link rel="stylesheet" href="styles.css">
<?php include 'header.php'; ?>
</head>

<body>
<dev id="header"></dev>
<?php
$stmt = $pdo->query("SELECT * FROM properties WHERE status='available' ORDER BY city desc");
$properties = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
$stmt = $pdo->query("SELECT a.name AS agent_name, a.phone, a.email, p.address AS property_address, ap.appointment_date, ap.status
FROM agents a
JOIN appointments ap ON a.id = ap.agent_id
JOIN properties p ON ap.property_id = p.id
WHERE ap.status = 'scheduled'
ORDER BY ap.appointment_date ASC;");
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <thead>
        <tr>
            <th>Agent</th>
            <th>Phone</th>
            <th>Property address</th>
            <th>Appointment date</th>
            <th>Status</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $res): ?>
        <tr>
            <td><?= $res['agent_name'] ?></td>
            <td><?= $res['phone'] ?></td>
            <td><?= $res['property_address'] ?></td>
            <td><?= $res['appointment_date'] ?></td>
            <td><?= $res['status'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>

