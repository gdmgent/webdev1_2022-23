<?php
$minutes = floor($track->duration / 60);
$seconds = str_pad($track->duration - ($minutes * 60), 2, '0', STR_PAD_LEFT);
?>
<div class="track">
    <div class="track-number"><?= $track_order; ?></div>
    <div class="track-name"><?= $track->name; ?></div>
    <div class="track-duration"><?= $minutes . ':' . $seconds; ?></div>
</div>