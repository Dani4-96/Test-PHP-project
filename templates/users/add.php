<form method="POST" action="/users/add">
    <div>
        <label>Login</label>
        <div>
            <input type="text" name="login" placeholder="Enter login">
        </div>
    </div>
    <div>
        <label>Password</label>
        <div>
            <input type="password" name="password" placeholder="Enter password">
        </div>
    </div>
    <div>
        <label>First name</label>
        <div>
            <input type="text" name="first_name" placeholder="Enter first name">
        </div>
    </div>
    <div>
        <label>Second name</label>
        <div>
            <input type="text" name="second_name" placeholder="Enter second name">
        </div>
    </div>
    <div>
        <label>Sex</label>
        <select name="sex">
            <option value="M">M</option>
            <option value="F">F</option>
        </select>
    </div>
    <div>
        <label>Date of birth</label>
        <div>
            <input type="date" name="date_of_birth" placeholder="Enter date of birth">
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