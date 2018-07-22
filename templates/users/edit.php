<form method="POST" action="/users/edit?login=<?= $user["login"] ?>">
    <div class="form-group">
        <label>Login</label>
        <input class="form-control" type="text" name="login" placeholder="Enter login" value="<?= $user["login"] ?>">
    </div>
    <div>
        <label>Password</label>
        <input class="form-control" type="password" name="password" placeholder="Enter password">
    </div>
    <div class="form-group">
        <label>First name</label>
        <input class="form-control" type="text" name="first_name" placeholder="Enter first name" value="<?= $user["first_name"] ?>">
    </div>
    <div class="form-group">
        <label>Second name</label>
        <input class="form-control" type="text" name="second_name" placeholder="Enter second name" value="<?= $user["second_name"] ?>">
    </div>
    <div class="form-group">
        <label>Sex</label>
        <select class="custom-select" name="sex">
            <option value="<?= $user["sex"] ?>"><?= $user["sex"] ?></option>
            <option value="<?php $sex = "";
            if ($user["sex"] == "M") {
                $sex = "F";
            } else $sex = "M";
            echo $sex; ?>"><?= $sex ?></option>
        </select>
    </div>
    <div class="form-group">
        <label>Date of birth</label>
        <input class="form-control" type="date" name="date_of_birth" placeholder="Enter date of birth" value="<?= $user["date_of_birth"] ?>">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Submit">
        <a class="btn btn-secondary" href="/users">Back</a>
    </div>
</form>