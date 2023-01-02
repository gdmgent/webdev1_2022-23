<div class="header-bar">
    <h1><?php
        if(isset($current_genre)) {
            echo $current_genre->name;
        } elseif($_SERVER['REQUEST_URI'] == '/favorites') {
            echo 'My favorites';
        } else
        {
            echo 'Random albums';
        }
    ?></h1>
    <form>
        <input type="text" placeholder="Search">
        <button type="submit">Search</button>
    </form>
</div>
<div class="cards">
    <?php foreach ( $albums as $album) {
        include BASE_DIR . '/views/album/_partial/album_item.php';
    }?>
</div>