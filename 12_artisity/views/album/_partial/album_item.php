<a href="/album/<?= $album->id; ?>" class="card">
    <img src="/images/<?= $album->image; ?>" alt="1">
    <div class="card-info">
        <h3><?= $album->name; ?></h3>
        <div class="artist-name"><?= $album->year; ?>, <?= $album->artist; ?></div>    
    </div>
</a>