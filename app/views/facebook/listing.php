
    <h1>Facebook User List</h1>
    <table class="table table-bordered table-hover">
        <thead>
            <tr">
                <th class="text-center col-md-1">#</th>
                <th class="text-center  col-md-1">Picture</th>
                <th class="text-center">Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                    <td class="text-center">#</td>
                    <td class="text-center"><img src="//graph.facebook.com/<?= $user['id']; ?>/picture" alt="<?= $user['name']; ?>'s profile picture" class="img-rounded"></td>
                    <td><?= $user['name'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
