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

        <button class="btn btn-primary mb-3" onclick="window.location.href='add-candidate.php'">
          Add Candidate
        </button>

        <table class="table table-hover">
          <tr>
            <th style="background-color: #923030; color: white;">ID</th>
            <th style="background-color: #923030; color: white;">Position</th>
            <th style="background-color: #923030; color: white;">Last Name</th>
            <th style="background-color: #923030; color: white;">First Name</th>
            <th style="background-color: #923030; color: white;">Middle Name</th>
            <th style="background-color: #923030; color: white;">Actions</th>
          </tr>
          <?php
          $xml = new DOMDocument();
          $xml->Load('candidates.xml');
          $x = $xml->getElementsByTagName('candidates')->item(0);
          $fr = $x->getElementsByTagName('candidate');
          $i = 0;
          $tf = 0;
          foreach ($fr as $candidate) {
            $id = $candidate->getElementsByTagName('id')->item(0)->nodeValue;
            $position = $candidate->getElementsByTagName('position')->item(0)->nodeValue;
            $lastName = $candidate->getElementsByTagName('lastName')->item(0)->nodeValue;
            $firstName = $candidate->getElementsByTagName('firstName')->item(0)->nodeValue;
            $middleName = $candidate->getElementsByTagName('middleName')->item(0)->nodeValue;
            echo "<tr>";
            echo "<td class='c-id'>$id</td>";
            echo "<td class='c-position'>$position</td>";
            echo "<td class='c-lastName'>$lastName</td>";
            echo "<td class='c-firstName'>$firstName</td>";
            echo "<td class='c-middleName'>$middleName</td>";
            echo "<td>";
            echo "<button style='margin-right: 10px;' class='btn btn-sm btn-warning'>Edit</button>";
            echo "<button class='btn btn-sm btn-danger'>Delete</button>";
            echo "</td>";
            echo "</tr>";
          }
          ?>
        </table>
      </div>
    </div>
  </div>


</body>

</html>