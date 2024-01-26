<body class="bg-primary">
    <?php require("title_card.php"); ?>
    <form class="container d-flex justify-content-center" action="#">
        <div>
            <div class="d-flex justify-content-center">
                <input class="textbox border-secondary form-control border-2 bg-primary rounded-pill text-secondary"
                    id="username" name="username" type="text" placeholder="Username" maxlength="20" required>
            </div>
            <div class="d-flex justify-content-center">
                <input class="textbox border-secondary form-control border-2 bg-primary rounded-pill text-secondary"
                    id="email" name="email" type="text" placeholder="E-mail" maxlength="20" required>
            </div>
            <div class="d-flex justify-content-center">
                <input class="textbox border-secondary form-control border-2 bg-primary rounded-pill text-secondary"
                    id="password-first" name="password-first" type="password" placeholder="Password" maxlength="20"
                    required>
            </div>
            <div class="d-flex justify-content-center">
                <input class="textbox border-secondary form-control border-2 bg-primary rounded-pill text-secondary"
                    id="password-second" name="password-second" type="password" placeholder="Confirm your password"
                    maxlength="20" required>
            </div>
            <div class="d-flex justify-content-end">
                <input class="button rounded-pill btn btn-secondary text-primary" type="submit" value="Sign in">
            </div>
        </div>
    </form>
    <footer class="form-link fixed-bottom mb-4">
        <p class="text-center text-secondary">Already on board? <a class="link-tertiary" href="#">Login</a></p>
    </footer>
</body>