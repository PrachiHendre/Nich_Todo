<?php
require_once('config.php'); // Include your database connection file (explained below)

// Get todo items from database
$stmt = $conn->prepare("SELECT * FROM tasks");
$stmt->execute();
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
</head>
<body>
    <h1>My Todo List</h1>

    <!-- Add Task Form -->
    <form method="POST" action="add_task.php">
        <input type="text" name="task" placeholder="Add a new task">
        <button type="submit">Add</button>
    </form>

    <!-- Display Todo List -->
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <!-- Checkbox for marking completion -->
                <input type="checkbox" 
                       id="task-<?php echo $task['id']; ?>" 
                       name="task-<?php echo $task['task']; ?>" 
                       <?php if ($task['completed']): ?> checked <?php endif; ?> 
                       onchange="updateTask(<?php echo $task['id']; ?>, this.checked)">
                <label for="task-<?php echo $task['id']; ?>">
                    <?php echo $task['task']; ?>
                </label>
                <!-- Delete button for task -->
                <a href="delete_task.php?id=<?php echo $task['id']; ?>">
                    <button>Delete</button>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <script>
        function updateTask(id, completed) {
            window.location.href = `update_task.php?id=${id}&completed=${completed}`;
        }
    </script>
</body>
</html>