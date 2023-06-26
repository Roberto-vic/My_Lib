<?php
include("config.php");
?>
<!-- template -->
<div class="overflow-x-hidden">
    <!-- Navigation -->

    <?php

    include(FRONT_END . DS . "nav.php");

    ?>

    <!-- Login Form -->
    <div class="container d-flex vh-auto align-items-center login">
        <div class="col-6 offset-3">
            <h2 class="ms-3 mb-5">Login</h2>
            <div class="card shadow p-3 rounded top-50">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Passwort</span>
                            <input type="passwort" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <input type="submit" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Login Form -->

    <!-- footer -->
    <div class="container-fluid mt-5 py-5" style="background-color: #0d3b66;">
        <?php

        include(FRONT_END . DS . "footer.php");

        ?>
        <!-- /footer -->