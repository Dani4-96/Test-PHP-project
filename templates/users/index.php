<?php if (\components\Authorization::isAdmin()): ?>
<div class="d-flex bd-highlight mb-3">
    <a class="btn btn-secondary ml-auto p-2 bd-highlight" href="/users/add">
        Add user
    </a>
</div>
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

        <div class="form-row align-items-center">
            <div class="col-auto my-1">
                <select class="custom-select mr-sm-2" name="order by">

                    <option value="<?= $orderBy ?>"><?= $orderByParsed ?></option>

                    <?php for ($j = 0; $j < count($orders); $j++): ?>
                        <option value="<?= $orders[$j] ?>"><?= $ordersParsed[$j] ?></option>
                    <?php endfor; ?>

                </select>
            </div>
            <div class="col-auto my-1">
                <input class="btn btn-primary" type="submit" value="Select">
            </div>
            <div class="col-auto my-1">
                Sorted by: <?= $orderByParsed ?>
            </div>
        </div>

    </form>
</div>
<div>
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr class="row">
                <th class="col">Login</th>
                <th class="col">First name</th>
                <th class="col">Second name</th>
                <th class="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr class="row">
                    <td class="col">
                        <a href="/users/view?login=<?= $user["login"] ?>"><?= $user["login"] ?></a>
                    </td>
                    <td class="col">
                        <a href="/users/view?login=<?= $user["login"] ?>"><?= $user["first_name"] ?></a>
                    </td>
                    <td class="col">
                        <a href="/users/view?login=<?= $user["login"] ?>"><?= $user["second_name"] ?></a>
                    </td>
                    <td class="col">
                        <a class="btn btn-info" href="/users/view?login=<?= $user["login"] ?>">View</a>

                        <a class="btn btn-warning" href="/users/edit?login=<?= $user["login"] ?>">Edit</a>

                        <a class="btn btn-danger" href="/users/delete?login=<?= $user["login"] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>
        <ul class="pagination justify-content-center">
            <?php if ($currentPage > 1): ?>

                <li class="page-item"><a class="page-link" href="/users/index?page=<?= $currentPage - 1 ?>">prev</a></li>

            <?php endif; ?>

            <?php
            $pageCounter = 1;
            $difference = $pages - $currentPage;

            $reverseDifference = $offset - $difference;
            if ($difference < $offset) $offset += $reverseDifference;

            $i = $currentPage - $offset;
            if ($i < 1) $i = 1;

            while ($i < $currentPage): ?>

                <li class="page-item"><a class="page-link" href="/users/index?page=<?= $i ?>"><?= $i ?></a></li>

            <?php $i++; $pageCounter++;
            endwhile; ?>

            <li class="page-item active"><a class="page-link"><?= $currentPage ?></a></li>

            <?php
            $rightOffset = $offset * 2 + 1 - $pageCounter;

            $k = $currentPage + 1;
            while ($k <= $currentPage + $rightOffset):
                if ($k > $pages) break; ?>

                <li class="page-item"><a class="page-link" href="/users/index?page=<?= $k ?>"><?= $k ?></a></li>

            <?php $k++;
            endwhile;

            if ($currentPage != $pages): ?>

                <li class="page-item"><a class="page-link" href="/users/index?page=<?= $currentPage + 1 ?>">next</a></li>

            <?php endif; ?>
        </ul>
    </div>
</div>
<?php endif; ?>