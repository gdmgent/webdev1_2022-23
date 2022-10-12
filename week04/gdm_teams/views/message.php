<div class="message<?= ($message['user_id'] == $current_user_id) ? ' my' : ''; ?>">
    <div class="name"><?= $message['firstname'] . ' ' . $message['lastname']; ?></div>
    <div class="text">
        <?= $message['message']; ?>
    </div>
    <div class="date"><?= date("D d M H:i:s", strtotime($message['created_on'])); ?></div>
</div>