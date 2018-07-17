<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Test PHP project</title>
</head>
<body>

<?php if (!\components\Authorization::checkAuth()): ?>
<!-- START AUTH -->
<div>
    <form name="login">
        <div>
            <label>Username</label>
            <input type="text" name="login" placeholder="Enter login">
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter password">
        </div>
    </form>
    <button onclick="logIn()">Log in</button>
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
<?php else:
    echo \components\Authorization::getLogin();
?>
    <a href="/account/logout">Log out</a>
<?php endif; ?>

<div>
    <h1>Hello World!</h1>
    <?= $content ?>
</div>
</body>
</html>