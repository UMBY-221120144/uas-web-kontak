<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title); ?> | Aplikasi Kontak</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-10 mx-auto">
        <div class="card shadow-sm">
          <div class="card-header">
            <h1 class="h4 card-title mb-0"><?= esc($title); ?></h1>
          </div>
          <div class="card-body">
            <?= $this->renderSection('content'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>