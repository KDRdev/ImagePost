<header class="row">
    <div class="container">
        <div class="row text-uppercase justify-content-center">
            <div id="nav-menu" class="nav-menu p-3 text-uppercase">
                <ul class="nav">
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <li class="nav-item">
                            <span class="nav-link">Hi, <?php echo $_SESSION['user_name']; ?></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/posts/add">Add post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/posts/list">Posts</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
