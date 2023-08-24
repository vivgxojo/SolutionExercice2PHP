<header>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">La vie de Bob</a>
        </div>
    </nav>
</header>
<?php if(isset($_SESSION['erreur'])) : ?>
<div class="alert alert-warning alert-dismissible fade <?=  $_SESSION['erreur']? 'show': '' ?>" role="alert">
    <p><?=  $_SESSION['erreur'] ?></p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif ?>