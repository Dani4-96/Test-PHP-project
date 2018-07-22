<form method="POST" action="/users/add">
    <div class="form-group">
        <label>Login</label>
        <input class="form-control" type="text" name="login" placeholder="Enter login">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" name="password" placeholder="Enter password">
    </div>
    <div class="form-group">
        <label>First name</label>
            <input class="form-control" type="text" name="first_name" placeholder="Enter first name">
    </div>
    <div class="form-group">
        <label>Second name</label>
        <input class="form-control" type="text" name="second_name" placeholder="Enter second name">
    </div>
    <div class="form-group">
        <label>Sex</label>
        <select class="custom-select" name="sex">
            <option value="M">M</option>
            <option value="F">F</option>
        </select>
    </div>
    <div class="form-group">
        <label>Date of birth</label>
        <input class="form-control" value="2000-01-01" type="date" name="date_of_birth" placeholder="Enter date of birth">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Submit">
        <a class="btn btn-secondary" href="/users">Back</a>
    </div>
</form>