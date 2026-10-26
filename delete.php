<?php
include('conn.php');

if (isset($_REQUEST['did'])) {
    // Retrieve and validate the ID as an integer
    $id = $_REQUEST['did'];
    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        // Invalid ID, redirect or handle error
        echo "<script type=\"text/javascript\">
                alert('Invalid ID');
                window.location = \"show.php\";
              </script>";
        exit;
    }

    // Prepare and execute a parameterized DELETE statement
    $stmt = $conn->prepare("DELETE FROM task WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $re_del = $stmt->execute();
        $stmt->close();

        if ($re_del) {
            echo "<script type=\"text/javascript\">
                    window.location = \"show.php\";
                  </script>";
        } else {
            echo "<script type=\"text/javascript\">
                    alert('Delete not success');
                    window.location = \"show.php\";
                  </script>";
        }
    } else {
        // Preparation failed
        echo "<script type=\"text/javascript\">
                alert('Database error');
                window.location = \"show.php\";
              </script>";
    }
}
?>