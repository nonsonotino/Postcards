<body class="signup-form bg-primary">
    <?php require ("title_card.php"); ?>
    <form id="signupForm" class="container d-flex justify-content-center" action="#" method="POST">
        <div>
            <div class="d-flex justify-content-center">
                <input class="textbox border-secondary form-control border-2 bg-primary rounded-pill text-secondary"
                    id="username" name="username" type="text" placeholder="Username" maxlength="20" required>
            </div>
            <div class="d-flex justify-content-center">
                <input class="textbox border-secondary form-control border-2 bg-primary rounded-pill text-secondary"
                    id="email" name="email" type="text" placeholder="E-mail" maxlength="200" required>
            </div>
            <div class="d-flex justify-content-center">
                <input class="textbox border-secondary form-control border-2 bg-primary rounded-pill text-secondary"
                    id="password" name="password" type="password" placeholder="Password" maxlength="20" required>
            </div>
            <div class="d-flex justify-content-center">
                <input class="textbox border-secondary form-control border-2 bg-primary rounded-pill text-secondary"
                    id="confirm_password" name="confirm_password" type="password" placeholder="Confirm your password"
                    maxlength="20" required>
                <span id="errorText" class="text-danger fs-7" hidden></span>
            </div>
            <div class="d-flex justify-content-end">
                <input id="submit" class="button rounded-pill btn btn-secondary text-primary" type="submit"
                    value="Sign in">
            </div>
        </div>
    </form>
    <footer class="form-link fixed-bottom mb-4">
        <p class="text-center text-secondary">Already on board? <a id="login" class="link-tertiary"
                href="login.php">Login</a></p>
    </footer>
    <script src="/Postcards/js/signup.js"></script>
</body>