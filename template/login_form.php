<body class="login-form bg-primary">
    <?php require ("title_card.php"); ?>
    <form id="loginForm" class="container d-flex justify-content-center" method="POST" action="#">
        <div class="d-flex flex-column justify-content-center">
            <div class="d-flex justify-content-center">
                <input class="textbox border-secondary form-control border-2 bg-primary rounded-pill text-secondary"
                    id="username" name="username" type="text" placeholder="Username" maxlength="20" required>
            </div>
            <div class="d-flex justify-content-center">
                <input class="textbox border-secondary form-control border-2 bg-primary rounded-pill text-secondary"
                    id="password" name="password" type="password" placeholder="Password" maxlength="20" required>
            </div>
            <span id="errorText" class="text-warning fs-7 text-center" hidden></span>
            <div class="d-flex justify-content-end">
                <input id="login" class="button rounded-pill btn btn-secondary text-primary" type="submit"
                    value="Login">
            </div>
        </div>
    </form>
    <footer class="form-link fixed-bottom mb-4">
        <p class="text-center text-secondary">New here? <a id="signup" class="link-tertiary" href="signup.php">Join
                us</a></p>
    </footer>
    <script src="/Postcards/js/login.js"></script>
</body>