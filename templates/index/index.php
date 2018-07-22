<h6>Test PHP project</h6>

<?php if (\components\Authorization::isAdmin()): ?>

<a class="btn btn-primary" href="/users">User list</a>

<?php endif; ?>