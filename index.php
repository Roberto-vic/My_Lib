<?php 
include("config.php");
?>
    <!-- template -->
    <div class="overflow-x-hidden">
        <!-- Navigation -->

        <?php

        include(FRONT_END . DS . "nav.php");

        ?>

        <!-- /Navigation -->

        <!-- header -->
        <div class="container-fluid header py-5 mb-5" id="home">
            <?php

            include(FRONT_END . DS . "head.php");

            ?>
        </div>

        <!-- /header -->

        <!-- Neues -->

        <div class="container my-5 py-5" style="color: #0d3b66">
            <?php

            include(FRONT_END . DS . "neue.php");

            ?>
        </div>


        <!-- /Neues -->

        <!-- Öffnungszeit -->

        <div class="container-fluid my-5 py-5" style="background-color: #0d3b66;">
            <?php

            include(FRONT_END . DS . "offZeit.php");

            ?>
        </div>

        <!-- /Öffnungszeit -->

        <!-- Kontakt -->

        <div class="container-fluid my-5 py-4">
            <?php

            include(FRONT_END . DS . "kontakt.php");

            ?>
        </div>

        <!-- /Kontakt -->

        <!-- Footer -->

        <div class="container-fluid mt-5 py-5" style="background-color: #0d3b66;">
            <?php

            include(FRONT_END . DS . "footer.php");

            ?>
        </div>

        <!-- /Footer -->