<?php if (\components\Authorization::isAdmin()): ?>
<div>
    <form method="POST" action="/users/index">
        <select name="order by">
            <option disabled selected value="order by">Order by</option>
            <option value="login ASC">Login &#8593</option>
            <option value="login DESC">Login &#8595</option>
        </select>
        <input type="submit" value="Select">
    </form>
</div>
<div>
    <table>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <a href="/users/view?login=<?= $user["login"] ?>"><?= $user["login"] ?></a>
                    </td>
                    <td>
                        <a href="/users/view?login=<?= $user["login"] ?>">View</a>
                    </td>
                    <td>
                        <a href="/users/delete?login=<?= $user["login"] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>