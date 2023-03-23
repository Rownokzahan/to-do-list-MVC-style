<?php include_once __DIR__ . "./partials/header.php" ?>

<h5 class="text-3xl font-semibold text-center">Update Task</h5>
<!-- Update Form -->
<form action="/edit" method="POST" enctype="multipart/form-data" id="update-form">
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