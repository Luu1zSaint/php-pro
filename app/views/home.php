<ul>
    <?php foreach($user as $info): ?>
    <li>
        <?= $info->firstName;?> | <a href="/user/<?= $info->id;?>">Details</a>
    </li>
    <?php endforeach; ?>
</ul>
