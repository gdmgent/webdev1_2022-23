<header>
    <a href="/" class="brand"><span class="icon">A</span> <span>Artistify</span></a>
    <nav class="tabs">
        <span class="separator"></span>
        <a href="/" class="<?= (!$current_genre) ? 'active' : ''; ?>">All</a>
        <?php foreach ($genres as $genre) : ?>
            <a href="/genre/<?= $genre->slug; ?>" class="<?= ($current_genre && $current_genre->id == $genre->id) ? 'active' : ''; ?>"><?= $genre->name; ?></a>
        <?php endforeach; ?>
        
        <span class="separator"></span>
        <div class="profile">
            <?= getCurrentUser()->getFullName(); ?>
        </div>
        <a href="/favorites">My favorites</a>
        <a href="./">Log out</a>

    </nav>
</header>