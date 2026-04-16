<?php
$xml = new DOMDocument;
$xml->load('candidates.xml');
$candidates = $xml->getElementsByTagName('candidate');

$id = trim($_GET['id']);
$candidateNode = null;

foreach ($candidates as $candidate) {
    $candidateId = $candidate->getElementsByTagName('id')->item(0)->nodeValue;
    if ($candidateId == $id) {
        $candidateNode = $candidate;
        break;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($candidateNode) {
        $position = $_POST['position'];
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        // $image = $_POST['image'];

        $candidateNode->getElementsByTagName('position')->item(0)->nodeValue = $position;
        $candidateNode->getElementsByTagName('lastName')->item(0)->nodeValue = $lastName;
        $candidateNode->getElementsByTagName('firstName')->item(0)->nodeValue = $firstName;
        $candidateNode->getElementsByTagName('middleName')->item(0)->nodeValue = $middleName;
        // $candidateNode->getElementsByTagName('image')->item(0)->nodeValue = $image;

        $xml->save('candidates.xml');
        header('Location: manage-candidates.php');
        exit;
    }
}

$position = $candidateNode->getElementsByTagName('position')->item(0)->nodeValue;
$lastName = $candidateNode->getElementsByTagName('lastName')->item(0)->nodeValue;
$firstName = $candidateNode->getElementsByTagName('firstName')->item(0)->nodeValue;
$middleName = $candidateNode->getElementsByTagName('middleName')->item(0)->nodeValue;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COVS - Edit Candidate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>

    <?php include 'navbar.php'; ?>

    <div class="container-fluid">
        <div class="row" style="padding-left: 10px;">
            <?php include 'sidebar.php'; ?>
            <div class="col-10 p-4">
                <h1 style="font-weight: bold;">Edit Candidate</h1>
                <p>Update candidate details and save changes.</p>
                <hr>
                <form method="post" action="edit-candidate.php?id=<?php echo urlencode($id); ?>">
                    <div class="mb-3">
                        <label class="form-label">Position</label>
                        <select name="position" class="form-select" required>
                            <option value="">Candidate's Position</option>
                            <option value="President" <?php if ($position == 'President')
                                echo 'selected'; ?>>President
                            </option>
                            <option value="Vice President" <?php if ($position == 'Vice President')
                                echo 'selected'; ?>>
                                Vice President</option>
                            <option value="Secretary" <?php if ($position == 'Secretary')
                                echo 'selected'; ?>>Secretary
                            </option>
                            <option value="Treasurer" <?php if ($position == 'Treasurer')
                                echo 'selected'; ?>>Treasurer
                            </option>
                            <option value="Board Member" <?php if ($position == 'Board Member')
                                echo 'selected'; ?>>Board
                                Member</option>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="lastName" class="form-control"
                            value="<?php echo htmlspecialchars($lastName); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" name="firstName" class="form-control"
                            value="<?php echo htmlspecialchars($firstName); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Middle Name</label>
                        <input type="text" name="middleName" class="form-control"
                            value="<?php echo htmlspecialchars($middleName); ?>">
                    </div>
                    <!-- <div class="mb-3">
                        <label class="form-label">Change candidate's photo</label>
                        <input class="form-control" type="file" id="candidatePhoto" name="candidatePhoto"
                            accept="image/*">
                    </div> -->
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-secondary"
                        onclick="window.location.href='manage-candidates.php'">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>