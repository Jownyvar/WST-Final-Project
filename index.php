<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COVS - Credits</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>

  <?php include 'navbar.php'; ?>

  <div class="container-fluid">
    <div class="row" style="padding-left: 10px;">
      <?php include 'sidebar.php'; ?>
      <div class="col-10 p-4">

        <h1 style="font-weight: bold;">About the Project</h1>
        <p>The people behind COVS.</p>
        <hr style="border: 3px solid #7C1F1F;">

        <div class="p-3 mb-4 rounded" style="background-color: #f8f9fa;">
          <strong>COVS — Candidate Online Voting System</strong> is a web-based voting system created as a requirement
          for <strong>Web System and Technologies | IT 211</strong> at Bulacan State university A.Y 2025-2026.
        </div>

        <p class="text-muted" style="font-weight: bold;">
          DEVELOPERS
        </p>

        <div class="row g-3">
          <div class="col-md-4">
            <div class="card h-100 text-center p-3">
              <div class="d-flex justify-content-center mb-3">
                <div class="avatar">JV</div>
              </div>
              <h5>John Lloyd E. Vargas</h5>
              <p>Developer</p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card h-100 text-center p-3">
              <div class="d-flex justify-content-center mb-3">
                <div class="avatar">NE</div>
              </div>
              <h5>Nicole S. Echevarria</h5>
              <p>Developer</p>
            </div>
          </div>
        </div>
        <hr>
        <p class="text-muted" style="font-weight: bold;">PROFESSOR</p>
        <div class="row g-1">
          <div class="col-md-4">
            <div class="card h-100 text-center p-3">
              <div class="d-flex justify-content-center mb-3">
                <div class="avatar">SA</div>
              </div>
              <h5>Dr. Sheldon V. Arenas</h5>
              <p>Course Instructor</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>