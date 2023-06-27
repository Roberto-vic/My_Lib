<?php
include_once("config.php")
?>


<body>
    <!-- Navigation -->
    <?php
    include(FRONT_END . DS . "nav.php");
    ?>
    <!-- /navigation -->

    <!-- section -->
    <div class="container-fluid my-5">
        <div class="row">
            <h1 class="text-center my-2">Realitätspause - Buchsuche</h1>
            <hr>
            <p class="text-center mb-3">Hier kannst du das gewünschte Buch nach Titel, Autor oder Genre suchen....</p>
        </div>
        <div class="col-lg-6 offset-lg-3">
            <div class="input-group my-4">
                <input type="text" class="form-control" placeholder="zB. - Der Herr der Ringe" aria-label="" aria-describedby="">
                <input type="submit" value="Suchen" class="btn btn-outline">
            </div>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>

    <!-- /section -->

    <!-- footer -->
    <div class="container-fluid mt-5 py-5" style="background-color: #0d3b66;">
        <?php

        include(FRONT_END . DS . "footer.php");

        ?>
        <!-- /footer -->