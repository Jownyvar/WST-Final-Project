<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Candidate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <?php
    if (isset($_POST['add'])) {
        $id = $_POST['id'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $position = $_POST['position'];
        $xml = new DOMDocument();

        $xml->load('candidates.xml');
        $newCandidate = $xml->createElement('candidate');
        $newCandidate->appendChild($xml->createElement('id', $id));
        $newCandidate->appendChild($xml->createElement('firstName', $firstName));
        $newCandidate->appendChild($xml->createElement('middleName', $middleName));
        $newCandidate->appendChild($xml->createElement('lastName', $lastName));
        $newCandidate->appendChild($xml->createElement('position', $position));

        $xml->getElementsByTagName('candidates')->item(0)->appendChild($newCandidate);
        $xml->save('candidates.xml');
    }
    ?>
    <?php include 'navbar.php'; ?>

    <div class="container-fluid">
        <div class="row" style="padding-left: 10px;">
            <?php include 'sidebar.php'; ?>
            <div class="col-10 p-4">
                <h1 style="font-weight: bold;">Add Candidate</h1>
                <p>Fill out the form below to add a new candidate to the system.</p>
                <hr style="border: 3px solid #7C1F1F;">
                <form method="POST">
                    <span class="mb-3">
                        <label for="registerIDCandidate" class="form-label">ID</label>
                        <input name="id" type="number" class="form-control" id="registerIDCandidate"
                            aria-describedby="idHelp" required>
                    </span>
                    <br>
                    <span class="mb-3">
                        <label for="registerFirstNameCandidate" class="form-label">First Name</label>
                        <input name="firstName" type="text" class="form-control" id="registerFirstNameCandidate"
                            aria-describedby="firstNameHelp" required>
                    </span>
                    <br>
                    <span class="mb-3">
                        <label for="registerMiddleNameCandidate" class="form-label">Middle Name</label>
                        <input name="middleName" type="text" class="form-control" id="registerMiddleNameCandidate"
                            aria-describedby="middleNameHelp" required>
                    </span>
                    <br>
                    <span class="mb-3">
                        <label for="registerLastNameCandidate" class="form-label">Last Name</label>
                        <input name="lastName" type="text" class="form-control" id="registerLastNameCandidate"
                            aria-describedby="lastNameHelp" required>
                    </span>
                    <br>
                    <select name="position" class="form-select" aria-label="Default select example">
                        <option selected>Candidate's Position</option>
                        <option value="President">President</option>
                        <option value="Vice President">Vice President</option>
                        <option value="Secretary">Secretary</option>
                        <option value="Treasurer">Treasurer</option>
                        <option value="Board Member">Board Member</option>
                    </select>
                    <br>
                    <button type="submit" name="add" class="btn btn-primary">Add Candidate</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>