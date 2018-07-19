<?php if (\components\Authorization::isAdmin()): ?>
<a href="/users/add">
    Add
</a>
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
                        <a href="/users/edit?login=<?= $user["login"] ?>">Edit</a>
                    </td>
                    <td>
                        <a href="/users/delete?login=<?= $user["login"] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>
        <?php if ($currentPage > 1): ?>
            <a href="/users/index?page=<?= $currentPage - 1 ?>">prev</a>
        <?php endif;


        ?>


        <?php
        $i = $currentPage - 3;
        if ($i < 1) $i = 1;


        while ($i < $currentPage):

            ?>

            <a href="/users/index?page=<?= $i ?>"><?= $i ?></a>
        <?php
        $i++;
        endwhile; ?>

        <a><?= $currentPage ?></a>

        <?php
        $k = $currentPage + 1;
        while ($k <= $currentPage + 3):
            if ($k > $pages) break;
        ?>
            <a href="/users/index?page=<?= $k ?>"><?= $k ?></a>
        <?php
        $k++;
        endwhile; ?>





        <?php
        if ($currentPage != $pages):
        ?>
        <a href="/users/index?page=<?= $currentPage + 1 ?>">next</a>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>