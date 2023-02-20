<?php

include_once('../assets/includes/dbh.inc.php');
include_once('../assets/includes/verification.php');

if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy</title>
    <link rel="stylesheet" href="../assets/css/amendview.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="../assets/js/date.js" defer></script>
    <script src="../assets/js/amendview.js" defer></script>
</head>
<body>
<div class="horizonal-nav">
    <span id="time"></span>
    <div class="logo-container">
        <i class="ri-capsule-line"></i>
        <span id="logo-title"> | BP</span>
    </div>
    <div class="account-container">
        <button>
            <span class="accountId">Logout</span>
        </button>
    </div>
</div>
<div class="main-container">
    <div class="vertical-nav">
        <a href="#">Drugs</a>
        <a href="#">Stock Control</a>
        <a href="#">Doctor</a>
        <a href="#">Customer</a>
        <a href="suppliers.php" class="selected">Supplier</a>
    </div>
    <main>
        <form name="form" action="../assets/includes/amendview.inc.php" method="post" class="info-wrapper">
            <h1>Amend and View</h1>
            <div class="info">
                <label for="suppliers">Supplier </label>
                <select name="suppliers" id="suppliers">
                    <?php

                    /*
                     * Get the necessary Supplier information from the database.
                     * Using a prepared statement to prevent SQL injection.
                     */
                    $sql = "SELECT supplierID, supplierName FROM suppliers WHERE deleted = 0";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    // Get the result and store in a variable.
                    $result = $stmt->get_result();

                    /*
                     * Check if the statement was executed successfully.
                     * If not, echo an error message and exit the script.
                     */
                    if (!$result) {
                        echo '<option value="0">Error</option>';
                        exit();
                    }

                    // Check if there's more than 0 rows in the result.
                    if ($result->num_rows > 0) {
                        /*
                         * If there is rows, loop through them and echo them as options.
                         */
                        while ($row = $result->fetch_assoc()) {

                            /*
                             * The currently viewed supplier ID has been stored in the $_SESSION variable.
                             * This is used to check if the current row is the same as the one that is currently being viewed.
                             * This is necessary as when the page reloads, if none of the option tags have the 'selected' attribute,
                             * the first option tag will be selected by default.
                             *
                             * This adds the 'selected' attribute to the option tag that matches the supplier ID of the supplier that is currently being viewed.
                             */
                            if ($_SESSION['supplierID'] === $row['supplierID']) {
                                echo '<option value="' . $row['supplierID'] . '" selected>' . $row['supplierName'] . '</option>';
                                continue;
                            }
                            echo '<option value="' . $row['supplierID'] . '">' . $row['supplierName'] . '</option>';
                        }
                    } else {
                        echo '<option value="0">No Suppliers</option>';
                    }

                    $stmt->close();
                    ?>
                </select>
            </div>

            <div class="info">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="<?php
                if (isset($_SESSION['address']))
                    echo $_SESSION['address'];
                ?>">
            </div>

            <div class="info">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php
                if (isset($_SESSION['email'])) {
                    echo $_SESSION['email'];
                }
                ?>">
            </div>

            <div class="info">
                <label for="website">Website</label>
                <input type="text" name="website" id="website" value="<?php
                if (isset($_SESSION['website']))
                    echo trim($_SESSION['website']);
                ?>">
            </div>

            <div class="info">
                <label for="telephone">Phone</label>
                <input type="text" name="telephone" id="telephone" value="<?php
                if (isset($_SESSION['telephone']))
                    echo trim($_SESSION['telephone']);
                ?>">
            </div>

            <div class="buttons">
                <div class="amend-buttons">
                    <button type="button" name="amend" id="buttonAmend" title="Enable Editing"
                            onclick="toggleEdit()">Enable Editing
                    </button>
                    <button type="button" name="submit-amend" id="submitAmend" onclick="confirmSubmit()">Submit
                        Changes
                    </button>
                </div>
                <button type="submit" name="view" id="buttonView">View</button>
            </div>

            <div class="error-container">
                <?php
                check();
                ?>
            </div>
        </form>
    </main>
</div>
</body>
</html>