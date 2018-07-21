<?php if (\components\Authorization::isAdmin()): ?>
<a href="/users/add">
    Add
</a>
<div>
    <form method="POST" action="/users/index">

        <?php
        $orders = array(
            "login ASC",
            "login DESC",
            "first_name ASC",
            "first_name DESC",
            "second_name ASC",
            "second_name DESC"
        );

        $key = array_search($orderBy, $orders);
        unset($orders[$key]);

        //var_dump($orders);
        $orders = array_values($orders);
        //var_dump($orders);

        $search = array(
            "first_name",
            "second_name",
            "login",
            "ASC",
            "DESC"
        );
        $replace = array(
            "First name",
            "Second name",
            "Login",
            "&#8593",
            "&#8595"
        );

        $ordersParsed = str_replace($search, $replace, $orders);
        $orderByParsed = str_replace($search, $replace, $orderBy);

        ?>

        <select name="order by">

            <option value="<?= $orderBy ?>"><?= $orderByParsed ?></option>

            <?php for ($j = 0; $j < count($orders); $j++): ?>
                <option value="<?= $orders[$j] ?>"><?= $ordersParsed[$j] ?></option>
            <?php endfor; ?>

        </select>
        <input type="submit" value="Select">

        <div>Sorted by <?= $orderBy ?></div>
    </form>
</div>
<div>
    <table class="container">
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr class="row">
                    <td class="col-sm">
                        <a href="/users/view?login=<?= $user["login"] ?>"><?= $user["login"] ?></a>
                    </td>
                    <td class="col-sm">
                        <a href="/users/view?login=<?= $user["login"] ?>"><?= $user["first_name"] ?></a>
                    </td>
                    <td class="col-sm">
                        <a href="/users/view?login=<?= $user["login"] ?>"><?= $user["second_name"] ?></a>
                    </td>
                    <td class="">
                        <a href="/users/view?login=<?= $user["login"] ?>">View</a>
                    </td>
                    <td class="">
                        <a href="/users/edit?login=<?= $user["login"] ?>">Edit</a>
                    </td>
                    <td class="">
                        <a href="/users/delete?login=<?= $user["login"] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>
        <?php if ($currentPage > 1): ?>

            <a href="/users/index?page=<?= $currentPage - 1 ?>">prev</a>

        <?php endif; ?>

        <?php
        $pageCounter = 1;
        $difference = $pages - $currentPage;

        $reverseDifference = $offset - $difference;
        if ($difference < $offset) $offset += $reverseDifference;

        $i = $currentPage - $offset;
        if ($i < 1) $i = 1;

        while ($i < $currentPage): ?>

            <a href="/users/index?page=<?= $i ?>"><?= $i ?></a>

        <?php $i++; $pageCounter++;
        endwhile; ?>

        <a><?= $currentPage ?></a>

        <?php
        $rightOffset = $offset * 2 + 1 - $pageCounter;

        $k = $currentPage + 1;
        while ($k <= $currentPage + $rightOffset):
            if ($k > $pages) break; ?>

            <a href="/users/index?page=<?= $k ?>"><?= $k ?></a>

        <?php $k++;
        endwhile;

        if ($currentPage != $pages): ?>

            <a href="/users/index?page=<?= $currentPage + 1 ?>">next</a>

        <?php endif; ?>
    </div>
</div>
<?php endif; ?>