<?php
include_once '../database/UserDB.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        UserDB::login($_POST['email'], $_POST['password'], $_POST['currentTab']);
    }
}
$currentTab = $_SERVER['REQUEST_URI'];
$myarray = explode('/', "ignore" . $currentTab);
$currentTab = $myarray[2];
?>

<!-- open element(s): "<html>" -->
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top position-static" role="navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="http://localhost/public_html/home/">My Blog</a>

        <button class="navbar-toggler border-0" type="button" data-toggle="collapse"
                data-target="#exCollapsingNavbar">
            &#9776;
        </button>

        <div class="collapse navbar-collapse" id="exCollapsingNavbar">
            <ul class="nav navbar-nav">
                <?php if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false): ?>
                    <li class="nav-item"><a href="http://localhost/public_html/allposts/" class="nav-link">All Posts</a>
                    </li>
                    <li class="nav-item"><a href="http://localhost/public_html/about/" class="nav-link">About</a></li>
                <?php elseif ($_SESSION['logged_in'] == true): ?>
                    <li class="nav-item"><a href="http://localhost/public_html/allposts/" class="nav-link">All Posts</a>
                    </li>
                    <li class="nav-item"><a href="http://localhost/public_html/about/" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="http://localhost/public_html/makepost/" class="nav-link">Make Post</a>
                    </li>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                <?php if (isset($_SESSION['isadmin'])) {
                    if ($_SESSION['isadmin'] == 1): ?>
                        <li class="nav-item order-2 order-md-1">
                            <a href="http://localhost/public_html/manage/" class="nav-link" title="Manage"><i
                                        class="fa fa-cog fa-fw fa-lg"></i></a>
                        </li>
                    <?php
                    endif;
                }
                 ?>
                <?php if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false): ?>
                    <li class="dropdown nav-item order-1 pr-3">
                        <button type="button" id="dropdownMenu1" data-toggle="dropdown"
                                class="btn btn-outline-secondary dropdown-toggle">Login <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right mt-1 mr-1">
                            <li class="p-3">
                                <form action="http://localhost/public_html/home/"
                                      class="form" role="form" method="post">
                                    <div class="form-group">
                                        <input id="email" placeholder="Email" class="form-control
                                         form-control-sm" type="email" required="" name="email">
                                    </div>
                                    <div class="form-group">
                                        <input id="password" placeholder="Password" class="form-control
                                        form-control-sm" type="password" required="" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="stayLoggedInInput" class="form-check-inline">
                                            <input id="stayLoggedInInput" class="form-check-input"
                                                   type="checkbox" name="stayLoggedIn" value="">
                                            <small>Stay logged in?</small>
                                        </label>
                                    </div>
                                    <input hidden name="currentTab" id="currentTab" type="text" value="<?php echo $currentTab ?>" >
                                    <div class="form-group">
                                        <button name="login" type="submit"
                                                class="btn btn-primary btn-block">Log in
                                        </button>
                                    </div>
                                    <div class="form-group text-xs-center">
                                        <small><a href="http://localhost/public_html/resetPas/forgot.php">
                                                Forgot password?</a></small>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item order-1">
                        <a href="http://localhost/public_html/registration/" class="nav-item m-auto">
                            <button name="register" type="button"
                                    class="btn btn-primary btn-block">Sign Up
                            </button>
                        </a>
                    </li>
                <?php elseif ($_SESSION['logged_in'] == true): ?>
                    <li>
                    <span class="navbar-text mr-3">
                        <?php echo "Welcome, " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . "!  ID:" . $_SESSION['user_id'] ?>
                    </span>
                    </li>
                    <li class="dropdown nav-item order-1 pr-3">
                        <a href="http://localhost/public_html/logout/logout.php">
                            <button name="logout" type="button" class="btn btn-outline-light">Log Out <span
                                        class="fa fa-sign-out mr-2"></span></button>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<!-- unclosed elements: "<html>" -->