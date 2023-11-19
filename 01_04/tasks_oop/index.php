<?php

// hostname: "127.0.0.1"
// username: "mariadb"
// password: "mariadb"
// database: "mariadb"
// port:     3306

$db = new mysqli("127.0.0.1", "mariadb", "mariadb", "mariadb", 3306);

if ($db->connect_errno) {
  exit("Failed to Connect");
}

$sql = "SELECT * FROM tasks ORDER BY priority DESC";
$result = $db->query($sql);

if (!$result) {
  exit("SQL Query is failed!");
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Task Manager: Task List</title>
</head>

<body>

  <header>
    <h1>Task Manager</h1>
  </header>

  <section>

    <h1>Task List</h1>

    <table>
      <tr>
        <th>ID</th>
        <th>Priority</th>
        <th>Completed</th>
        <th>Description</th>
      </tr>

      <?php // loop through tasks 
      while ($row = $result->fetch_object()) {
      ?>
        <tr>
          <td><?php echo $row->id  ?></td>
          <td><?php echo $row->priority  ?></td>
          <td><?php echo $row->completed  ?></td>
          <td><?php echo $row->description  ?></td>
        </tr>
      <?php // end loop 
      }
      ?>
    </table>

  </section>

</body>

</html>

<?php

$result->free();
$db->close();

?>