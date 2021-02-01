---
layout: login
title: Login
---
<div class="container d-flex justify-content-center">
    <div class="row">
        <div class="col align-self-center">
            <h2 class="text-primary mb-4">Log Into Your Questionnaire Extraordinare Account</h2>
            <form action="assets/php/process.php" method="POST">
                <div class="mb-4">
                    <label class="form-label" for="usernameInput">Username</label>
                    <input type="text" name="username" class="form-control" id="usernameInput">
                </div>
                <div class="mb-4">
                    <label class="form-label" for="passwordInput">Password</label>
                    <input type="password" name="userPass" class="form-control" id="passwordInput">
                </div>
                <button type="submit" name="login" id="login" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
