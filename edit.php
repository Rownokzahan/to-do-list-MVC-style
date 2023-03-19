<?php
require_once __DIR__ . "./connect.php";

if(!empty($_GET)){
    $id = $_GET["id"];

    try {
        $query = "SELECT * FROM tasks WHERE id = :id";
        $statement = $pdo->prepare($query);
        $statement->bindValue('id', $id);
        $statement->execute();
    
        $task = $statement->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo "Update failed: " . $e->getMessage();
        die();
    }
}

if (!empty($_POST)) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $deadline = $_POST["deadline"];
    $status = $_POST["status"];

    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];

    if (!is_dir('images')) {
        mkdir('images');
    }

    if (!is_dir('images/uploads')) {
        mkdir('images/uploads');
    }

    $directory = 'images/uploads/';
    $img_name = uniqid() . '_' . str_replace(" ", "_", $file_name);
    $img_path = $directory . $img_name;

    move_uploaded_file($file_tmp, $img_path);

    try {
        $query = "UPDATE tasks SET name = :name, attachment = :attachment, deadline = :deadline, status = :status WHERE id= :id";
        $statement = $pdo->prepare($query);
        $statement->bindValue('name', $name);
        $statement->bindValue('attachment', $img_path);
        $statement->bindValue('deadline', $deadline);
        $statement->bindValue('status', $status);
        $statement->bindValue('id', $id);
        $statement->execute();
        
        var_dump($statement);
    } catch (PDOException $e) {
        echo "Update failed: " . $e->getMessage();
        die();
    }
    header("Location: index.php");
}

?>

<?php include_once __DIR__ . "./partials/header.php" ?>

<h5 class="text-3xl font-semibold text-center">Update Task</h5>
<!-- Update Form -->
<form action="edit.php" method="POST" enctype="multipart/form-data" id="update-form">
    <input type="hidden" value="<?= $task->id; ?>" name="id">
    <div class="form-control w-full mb-4">
        <label class="label">
            <span class="label-text">Name</span>
        </label>
        <input type="text" name="name" value="<?= $task->name; ?>" placeholder="Task Name" class="input input-bordered w-full" />
    </div>
    <div class="form-control w-full mb-4">
        <label class="label">
            <span class="label-text">Deadline</span>
        </label>
        <input type="date" value="<?= $task->deadline; ?>" name="deadline" class="input input-bordered w-full" />
    </div>
    <div class="form-control w-full mb-4">
        <label class="label">
            <span class="label-text">Status</span>
        </label>
        <select name="status" class="select select-bordered flex-1">
            <option disabled>Status</option>
            <option <?php if ($task->status == 'In progress') echo ' selected'; ?>>In Progress</option>
            <option <?php if ($task->status == 'Complete') echo ' selected'; ?>>Complete</option>
            <option <?php if ($task->status == 'Incomplete') echo ' selected'; ?>>Incomplete</option>
        </select>
    </div>
    <div class="form-control w-full mb-4">
        <label class="label">
            <span class="label-text">Attachment</span>
        </label>
        <input type="file" accept="image/*" name="image" class="file-input file-input-bordered w-full" required />
    </div>
    <button type="submit" class="bg-[#8e40ee] px-5 py-[6px] text-white font-semibold rounded shadow-md block ml-auto">Update</button>
</form>


<?php include_once __DIR__ . "./partials/footer.php" ?>