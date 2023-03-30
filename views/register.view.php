<?php include_once __DIR__ . "./partials/header.php" ?>

<h5 class="text-3xl text-center font-semibold">Sign Up</h5>
<!-- Insert Form -->
<form action="./register" method="POST" enctype="multipart/form-data">

    <h3 class="text-xl text-center font-semibold text-red-400 mt-4">
        <?php
        if (!empty($_SESSION['signup_error_message'])) {
            echo $_SESSION['signup_error_message'];
        }
        unset($_SESSION['signup_error_message']);
        ?>
    </h3>

    <div class="form-control w-full mb-4">
        <label class="label">
            <span class="label-text">Username</span>
        </label>
        <input type="text" name="username" placeholder="Username" class="input input-bordered w-full" required />
    </div>
    <div class="form-control w-full mb-4">
        <label class="label">
            <span class="label-text">Email</span>
        </label>
        <input type="email" name="email" placeholder="Email" class="input input-bordered w-full" required />
    </div>
    <div class="form-control w-full mb-4">
        <label class="label">
            <span class="label-text">Password</span>
        </label>
        <input type="password" name="password" placeholder="password" class="input input-bordered w-full" required />
    </div>
    <button type="submit" class="bg-[#8e40ee] px-5 py-[6px] text-white font-semibold rounded shadow-md block ml-auto">Sign Up</button>
</form>

<p class="text-center mt-2">Already have an account? <a href="/login" class="text-primary">Login</a></p>
<?php include_once __DIR__ . "./partials/footer.php" ?>