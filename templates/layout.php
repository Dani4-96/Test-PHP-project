<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <title>Test PHP project</title>
</head>
<body>

<?php if (!\components\Authorization::checkAuth()): ?>
<!-- START AUTH -->
<div class="container">
    <form name="login">
        <div class="form-group">
            <label>Username</label>
            <input class="form-control" type="text" name="login" placeholder="Enter login">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password" placeholder="Enter password">
        </div>
    </form>
    <button class="btn btn-primary" onclick="logIn()">Log in</button>
    <div class="check"></div>
</div>

<script>
    function logIn() {
        let formData = new FormData(document.forms.login);
        let client = new XMLHttpRequest();

        client.open("POST", "/account/login");
        client.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        client.send(formData);

        client.onreadystatechange = () => {
            console.log(client.status);
            if (client.readyState != 4) {
                console.log("shit");
                return;
            }

            if (client.status != 200) {
                alert(client.status + ": " + client.statusText);
            } else {
                let check = document.querySelector(".check");
                check.textContent = "";

                console.log(client.responseText);

                let response = JSON.parse(client.responseText);

                if (response.success) {
                    check.textContent = "Success!";
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    check.textContent = "Failure!"
                }

            }
        }
    }
</script>

<!-- END AUTH -->

    <?php else: ?>
    <div class="container">
        <div class="d-flex bd-highlight mb-3">
            <div class="ml-auto p-2 bd-highlight">
                <?= \components\Authorization::getLogin(); ?>
                <a class="" href="/account/logout">Log out</a>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="container">
        <h1>Admin panel</h1>
        <?= $content ?>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>