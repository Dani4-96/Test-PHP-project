<form method="POST" action="/users/edit?login=<?= $user["login"] ?>">
    <div>
        <label>Login</label>
        <div>
            <input type="text" name="login" placeholder="Enter login" value="<?= $user["login"] ?>">
        </div>
    </div>
    <div>
        <label>Password</label>
        <div>
            <input type="password" name="password" placeholder="Enter password">
        </div>
    </div>
    <div>
        <div>
            <input type="submit" value="Submit">
        </div>
        <div>
            <a href="/users">Back</a>
        </div>
    </div>
</form>