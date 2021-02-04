<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>Login - Questionnaire Extraordinare</title>
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/loginStyleSheet.css">
</head>

<body class="d-flex bg-light">
  <div class="container d-flex justify-content-center">
    <div class="row">
        <div class="col align-self-center">
            <h2 class="text-primary mb-4">Log Into Your Questionnaire Extraordinare Account</h2>
            <!-- Posts results to process.php -->
            <form action="assets/php/process.php" method="POST">
                <div class="mb-4">
                    <label class="form-label" for="usernameInput">Username</label>
                    <!-- Submit username to validate -->
                    <input type="text" name="username" class="form-control" id="usernameInput">
                </div>
                <div class="mb-4">
                  <!-- Submit password to validate -->
                    <label class="form-label" for="passwordInput">Password</label>
                    <input type="password" name="userPass" class="form-control" id="passwordInput">
                </div>
                <button type="submit" name="login" id="login" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

</body>

</html>