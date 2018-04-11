<?php if (isset($_SESSION['report_code']) && $_SESSION['report_code'] !== ""): ?>

<?php if ($_SESSION['report_code'] === 'error'): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h2><strong>Error</strong></h2>

    <?php elseif ($_SESSION['report_code'] === 'success'): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h2><strong>Success</strong></h2>

        <?php elseif ($_SESSION['report_code'] === 'logout'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h2>Thanks for stopping by,</h2><p>You have been logged out!</p>
        <?php
        session_unset();
        session_destroy();
        endif;
        ?>


        <?php if (isset($_SESSION['message']) AND !empty($_SESSION['message'])):
            echo $_SESSION['message']; endif; ?>
        <hr/>
        You can dismiss this message with the X button.
    </div>
    <?php
    $_SESSION['report_code']="";
    endif;
    ?>