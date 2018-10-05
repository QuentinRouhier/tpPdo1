<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a title="Home" class="nav-link" href="index.php?home"><?= HOME ?></a>
            </li>
            <li class="nav-item">
                <a title="Partie 1" class="nav-link" href="index.php?partie1"><?= PART_ONE ?></a>
            </li>
            <li class="nav-item">
                <a title="Partie 2" class="nav-link" href="index.php?partie2"><?= PART_TWO ?></a>
            </li>
            <?php if ($liAddUsser == TRUE) { ?>
                <li class="nav-item">
                    <a title="Ajout d'un utilisateur" class="nav-link" href="addUsers.php"><?= ADD_USER ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>