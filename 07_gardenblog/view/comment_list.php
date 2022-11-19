<?php if(count($comments)) : ?>
    <?php foreach ( $comments as $comment) {
        include 'view/comment_item.php';
    }?>
<?php else : ?>
    <p>Er zijn geen reacties</p>
<?php endif; ?>