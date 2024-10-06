<section>
    <?php foreach ($messages as $message) { ?>
        <div>
            <p><?= htmlspecialchars($message['content']); ?></p>
        </div>
    <?php } ?>
</section>