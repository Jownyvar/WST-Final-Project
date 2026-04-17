<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COVS - Manage Candidates</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
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
        <h1 id="demo" style="font-weight: bold;">Manage Candidates</h1>
        <p>Search, Add, Update, and Delete candidates from the system.</p>
        <hr>

        <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 20px;">
          <button class="btn btn-primary" onclick="window.location.href='add-candidate.php'">
            Add Candidate
          </button>

          <form method="GET" action="manage-candidates.php" style="display: flex; align-items: center; gap: 10px;">
            <label style="font-weight: bold; white-space: nowrap;">Search candidate:</label>
            <input type="text" name="search" placeholder="Enter name or position..."
              style="padding: 6px; border: 1px solid #ccc; border-radius: 4px; width: 300px;"
              value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            <button type="submit" class="btn btn-outline-dark" style="font-weight: bold;">Go</button>

            <?php if (isset($_GET['search']) && $_GET['search'] !== ''): ?>
              <a href="manage-candidates.php" style="color: #666; font-size: 13px; text-decoration: none;">[Clear]</a>
            <?php endif; ?>
          </form>
        </div>

        <div class="table-responsive-sm">
          <table class="table table-hover">
            <thead>
              <tr>
                <th style="background-color: #923030; color: white;">ID</th>
                <th style="background-color: #923030; color: white;">Position</th>
                <th style="background-color: #923030; color: white;">Pictures</th>
                <th style="background-color: #923030; color: white;">Last Name</th>
                <th style="background-color: #923030; color: white;">First Name</th>
                <th style="background-color: #923030; color: white;">Middle Name</th>
                <th style="background-color: #923030; color: white;">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $xml = new DOMDocument();
              $xml->Load('candidates.xml');
              $x = $xml->getElementsByTagName('candidates')->item(0);
              $fr = $x->getElementsByTagName('candidate');

              $searchTerm = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';

              foreach ($fr as $candidate) {
                $id = $candidate->getElementsByTagName('id')->item(0)->nodeValue;
                $position = $candidate->getElementsByTagName('position')->item(0)->nodeValue;
                $image = $candidate->getElementsByTagName('image')->item(0)->nodeValue;
                $lastName = $candidate->getElementsByTagName('lastName')->item(0)->nodeValue;
                $firstName = $candidate->getElementsByTagName('firstName')->item(0)->nodeValue;
                $middleName = $candidate->getElementsByTagName('middleName')->item(0)->nodeValue;

                $searchableText = strtolower($position . " " . $firstName . " " . $middleName . " " . $lastName);

                if ($searchTerm == '' || strpos($searchableText, $searchTerm) !== false) {
                  echo "<tr>";
                  echo "<td class='c-id'>$id</td>";
                  echo "<td class='c-position'>$position</td>";
                  echo "<td class='c-pictures'><img src='$image' alt='Candidate Image' style='width: 100px;'></td>";
                  echo "<td class='c-lastName'>$lastName</td>";
                  echo "<td class='c-firstName'>$firstName</td>";
                  echo "<td class='c-middleName'>$middleName</td>";
                  echo "<td>";
                  echo "<button id='edit-btn-$id' style='margin-right: 10px;' class='btn btn-sm btn-warning' onclick='window.location.href=\"edit-candidate.php?id=$id\"'>Edit</button>";
                  echo "<button id='delete-btn-$id' class='btn btn-sm btn-danger' onclick='showDeleteModal($id, \"$firstName\", \"$lastName\")'>Delete</button>";
                  echo "</td>";
                  echo "</tr>";
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this candidate?</p>
          <p><strong>ID:</strong> <span id="modalCandidateId"></span></p>
          <p><strong>Name:</strong> <span id="modalCandidateName"></span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    var selectedCandidateId = null;

    function showDeleteModal(id, firstName, lastName) {
      selectedCandidateId = id;
      document.getElementById('modalCandidateId').textContent = id;
      document.getElementById('modalCandidateName').textContent = firstName + ' ' + lastName;

      const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
      deleteModal.show();
    }

    function confirmDelete() {
      if (selectedCandidateId) {
        window.location.href = 'delete-candidate.php?id=' + selectedCandidateId;
      }
    }
  </script>

</body>

</html>