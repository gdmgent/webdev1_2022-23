<div class="message">
    <div class="avatar"><img src="https://picsum.photos/id/<?= $message['user_id']; ?>/100/100"></div>
    <div class="content">
        <div class="info"><a href="#"><?= $message['first_name'] . ' ' . $message['last_name']; ?></a> &bull; @deweirdt &bull; Donderdag 1 oktober 2020 11:20</div>
        <div class="tweet"><?= $message['message']; ?></div>
    </div>
</div>