<?php

// hostname: "127.0.0.1"
// username: "mariadb"
// password: "mariadb"
// database: "mariadb"
// port:     3306

$hostname = "127.0.0.1:3306";
$username = "mariadb";
$password = "mariadb";
$database = "mariadb";

$conn = mysqli_connect($hostname, $username, $password, $database);

$task_id;
$task_priority;
$task_completed;
$task_description;

if ($conn) {
  $query = "SELECT * FROM tasks LIMIT 1";
  $result = mysqli_query($conn, $query);

  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $task_id = $row['id'];
      $task_priority = $row['priority'];
      $task_completed = $row['completed'];
      $task_description = $row['description'];
    }
  }
  mysqli_close($conn);
} else {
  echo "Failed to connet";
}


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
      <dd> <?php echo $task_id; ?> </dd>
    </dl>
    <dl>
      <dt>Priority</dt>
      <dd><?php echo $task_priority; ?></dd>
    </dl>
    <dl>
      <dt>Completed</dt>
      <dd>
        <?php echo $task_completed ? "Completed" : "Incompleted"; ?>
      </dd>
    </dl>
    <dl>
      <dt>Description</dt>
      <dd><?php echo $task_description; ?></dd>
    </dl>

  </section>

</body>

</html>