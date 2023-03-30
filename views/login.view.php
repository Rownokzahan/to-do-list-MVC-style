<?php include_once __DIR__ . "./partials/header.php" ?>

<h5 class="text-3xl text-center font-semibold">Login</h5>
<!-- Insert Form -->
<form action="./login" method="POST" enctype="multipart/form-data">

<?php var_dump($_SESSION) ?>

    <h3 class="text-xl text-center font-semibold text-red-400 mt-4"><?= isset($_SESSION['is_user_logged_in']) ? $_SESSION['login_error_message'] : '' ?></h3>

    <div class="form-control w-full mb-4">
        <label class="label">
            <span class="label-text">Username / Email</span>
        </label>
        <input type="text" name="username-email" placeholder="Username or email" class="input input-bordered w-full" required />
    </div>
    <div class="form-control w-full mb-4">
        <label class="label">
            <span class="label-text">Password</span>
        </label>
        <input type="password" name="password" placeholder="password" class="input input-bordered w-full" required />
    </div>
    <button type="submit" class="bg-[#8e40ee] px-5 py-[6px] text-white font-semibold rounded shadow-md block ml-auto">Login</button>
</form>

<p class="text-center mt-2">Don't have an account? <a href="/register" class="text-primary">Create New</a></p>
<?php include_once __DIR__ . "./partials/footer.php" ?>