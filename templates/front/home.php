<section>
    <table class="table table-bordered border-primary table-hover w-75 mx-auto my-5 rounded-5">
        <?php foreach ($topics as $topic) : ?>
            <tr>
                <td>
                    <a href="">
                        <?= $topic['title']; ?>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>