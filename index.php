<?php include_once __DIR__ . "./partials/header.php" ?>

<div class="flex justify-between items-center pb-8">
    <h1 class="text-center text-2xl font-semibold uppercase text-white">To Do List</h1>
    <a href="./create.php" class="h-fit bg-[#8e40ee] px-5 py-[6px] text-white font-semibold rounded-xl shadow-md">New Task</a>
</div>
<div class="overflow-x-auto">
    <table class="table w-full">
        <thead>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Attachment</th>
                <th>Start Time</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once __DIR__ . "./connect.php";
            $query = "SELECT * FROM tasks ORDER BY id";
            $statement = $pdo->query($query);
            $tasks = $statement->fetchAll(PDO::FETCH_OBJ);
            $count = 1;
            foreach ($tasks as $task) :
            ?>
                <tr class="hover">
                    <th>
                        <?php echo $count; ?>
                    </th>
                    <td>
                        <?php echo $task->name; ?>
                    </td>
                    <td><img src="<?php echo $task->attachment; ?>" class="w-12 h-12 rounded" alt=""></td>
                    <td>
                        <?php echo $task->start_time; ?>
                    </td>
                    <td>
                        <?php echo $task->deadline; ?>
                    </td>
                    <td>
                        <?php echo $task->status; ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?= $task->id; ?>" class="bi bi-pencil-square mr-8 text-[#8e40ee] text-xl"></a>
                    </td>
                    <td>
                        <a href="delete.php?id=<?= $task->id; ?>" class="bi bi bi-trash mr-4 text-red-500 text-xl"></a>
                    </td>
                </tr>
            <?php
                $count++;
            endforeach;
            ?>
        </tbody>
    </table>
</div>


<?php include_once __DIR__ . "./partials/footer.php" ?>