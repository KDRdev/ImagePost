<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col">
            <?php if (count($data['posts']) == 0): ?>
                <p class='text-center'>
                    There are no records here!<a href="<?php echo URLROOT; ?>/posts/add"> Add one</a>!
                </p>
                <?php else: ?>
                <table width="100%">
                    <thead>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Image</th>
                        </thead>
                    <tbody>
                        <?php foreach ($data['posts'] as $post) : ?>
                            <tr style="border-bottom: 1px solid black">
                                <td><?php echo $post->firstname; ?></td>
                                <td><?php echo $post->lastname; ?></td>
                                <td>
                                    <?php if (!empty($post->filename)): ?>
                                        <a href="<?php echo URLROOT . '/uploads/' . $post->filename?>" target="_blank">Download Image</a>
                                    <?php else : ?>
                                        <span>Image not uploaded</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>