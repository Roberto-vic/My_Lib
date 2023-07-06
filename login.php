<?php require_once("config.php"); ?>
<?php
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: admin/index.php");
    exit;
}

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT Mitarbeiter_Nr, Username, Passwort FROM beschäftigte WHERE Username = :username";

        if ($stmt = $dbh->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Check if username exists, if yes then verify password
                if ($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $id = $row["Mitarbeiter_Nr"];
                        $username = $row["Username"];
                        $password = $row["Passwort"];
                        if (password_verify($password, $password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: admin/index.php?buecher");
                        } else if ($username == $row['Username'] && $password == $row['Passwort']) {
                            header("location: admin/index.php?buecher");
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }

    // Close connection
    unset($pdo);
}
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
            <?php
            if (!empty($login_err)) {
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }
            ?>
            <div class="card shadow p-3 rounded top-50">
                <div class="card-body">
                    <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
                            <input type="text" class='form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>' value='<?php echo $username; ?>' name="username">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                            <input type="password" class='form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>' name="password">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="input-group mb-3">
                            <input type="submit" value="Login" class="btn btn-outline btn-md">
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