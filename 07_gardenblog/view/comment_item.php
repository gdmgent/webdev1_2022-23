<div class="comment">
    <div class="text"><?= $comment->text; ?></div>
    <div class="info"><?= $comment->firstname; ?> - <?= date("l j F Y H:i", strtotime($comment->created_at)); ?></div>
</div>