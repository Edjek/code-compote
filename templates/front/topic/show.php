<section>
    <?php
    foreach ($messages as $message){
        ?>
        <div>
            <p><?= $message['content'] ?></p>
        </div>
        <?php
    }
    ?>
</section>