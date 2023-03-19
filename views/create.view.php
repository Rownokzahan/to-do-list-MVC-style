<?php include_once __DIR__ . "./partials/header.php" ?>

<h5 class="text-3xl text-center font-semibold">Create New Task</h5>
<!-- Insert Form -->
<form action="./create.php" method="POST" enctype="multipart/form-data">
    <div class="form-control w-full mb-4">
        <label class="label">
            <span class="label-text">Name</span>
        </label>
        <input type="text" name="name" placeholder="Task Name" class="input input-bordered w-full" required />
    </div>
    <div class="form-control w-full mb-4">
        <label class="label">
            <span class="label-text">Deadline</span>
        </label>
        <input type="date" name="deadline" class="input input-bordered w-full" required />
    </div>
    <div class="form-control w-full mb-4">
        <label class="label">
            <span class="label-text">Attachment</span>
        </label>
        <input type="file" accept="image/*" name="image" class="file-input file-input-bordered w-full" required />
    </div>
    <button type="submit" class="bg-[#8e40ee] px-5 py-[6px] text-white font-semibold rounded shadow-md block ml-auto">Create</button>
</form>

<?php include_once __DIR__ . "./partials/footer.php" ?>