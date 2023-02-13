<?php
include __DIR__.'/../../repository/ScreensRepository.php';
?>

<table>
        <thead>
            <tr>
                <th>pseudo</th>
                <th>name</th>
                <th>image</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $screensRepository = new ScreensRepository();
            $article = $screensRepository->findAllAndUser();

            foreach ($article as $construct) {?>
                <tr>
                    <td><?= $construct['pseudo'] ?></td>
                    <td><?= $construct['name'] ?></td>
                    <td><?= $construct['image'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>