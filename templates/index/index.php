<p>test PHP project</p>

<?php if (\components\Authorization::isAdmin()): ?>

<a href="/users">User list</a>

<?php endif; ?>