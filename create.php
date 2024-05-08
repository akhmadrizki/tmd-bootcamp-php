<?php

    if (isset($_POST['save'])) {
        require_once("connection/config.php");

        $data = new Config();

        $data->setFirstName($_POST['first_name']);
        $data->setMiddleName($_POST['middle_name']);
        $data->setLastName($_POST['last_name']);
        $data->setBirthPlace($_POST['birth_place']);
        $data->setBirthDate($_POST['birth_date']);
        $data->setAddress($_POST['address']);
        $data->setEntryDate($_POST['entry_date']);

        $data->store();

        echo "<script>alert('Data has been saved!); document.location='index.php'</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>

    <?php include "layout/header.php"; ?>

    <!-- content -->
    <div class="container">
        <h1>Input New Student</h1>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="">First Name</label>
                <input type="text" name="first_name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Middle Name</label>
                <input type="text" name="middle_name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Last Name</label>
                <input type="text" name="last_name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Birth Place</label>
                <input type="text" name="birth_place" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Birth Date</label>
                <input type="date" name="birth_date" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Entry Date</label>
                <input type="date" name="entry_date" class="form-control">
            </div>

            <div class="mb-3">
                <button type="submit" name="save" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
    <!-- end content -->
    
    <?php include "layout/footer.php"; ?>