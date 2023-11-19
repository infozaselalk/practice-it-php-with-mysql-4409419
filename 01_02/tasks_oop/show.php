<?php

// hostname: "127.0.0.1"
// username: "mariadb"
// password: "mariadb"
// database: "mariadb"
// port:     3306

$db = new mysqli("127.0.0.1", "mariadb", "mariadb", "mariadb", "3306");

if ($db->connect_errno) {
  exit("Database Connection Failed");
}

$sql = "SELECT * FROM tasks LIMIT 1";
$result = $db->query($sql);

if (!$result) {
  exit("Database Query Failed");
}

$task = $result->fetch_object();


?>

<!doctype html>
<html lang="en">

<head>
  <title>Task Manager: Show Task</title>
</head>

<body>

  <header>
    <h1>Task Manager</h1>
  </header>

  <section>

    <h1>Show Task</h1>

    <dl>
      <dt>ID</dt>
      <dd><?php echo $task->id ?></dd>
    </dl>
    <dl>
      <dt>Priority</dt>
      <dd><?php echo $task->priority ?></dd>
    </dl>
    <dl>
      <dt>Completed</dt>
      <dd><?php echo $task->completed ? 'completed':'incomplete';?></dd>
    </dl>
    <dl>
      <dt>Description</dt>
      <dd><?php echo $task->description;?></dd>
    </dl>

  </section>

</body>

</html>