<?php
include __DIR__.'/../../repository/VaisseauRepository.php';
?>

<table>
        <thead>
            <tr>
                <th>nom</th>
                <th>prix</th>
                <th>equipage</th>
                <th>taille</th>
                <th>poids</th>
                <th>vitesse_max</th>
                <th>capacite</th>
                <th>contenu</th>
                <th>image</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $vaisseauRepository = new VaisseauRepository();
            $vaisseau = $vaisseauRepository->findAll();
            
            foreach ($vaisseau as $construct) {?>
                <tr>
                    <td><?= $construct['nom_vaiss'] ?></td>
                    <td><?= $construct['prix'] ?></td>
                    <td><?= $construct['equipage'] ?></td>
                    <td><?= $construct['taille'] ?></td>
                    <td><?= $construct['poids'] ?></td>
                    <td><?= $construct['vitesse_max'] ?></td>
                    <td><?= $construct['capacite'] ?></td>
                    <td class="td_text_pad"><div class="td_text"><?= str_replace("\n", "<br/>",$construct['contenu']) ?></div></td>
                    <td>
                        <?php 
                        $vaisseau_img = $vaisseauRepository->findAllImgObj($construct["id_objet"]);

                        foreach ($vaisseau_img as $construct_img) {?>
                                <?= $construct_img['name'] ?>,
                        <?php } ?>
                    </td>
                    <td class="td_text_pad"><div class="td_text">
                    <table>
                        <tbody>
                            <?php 
                            $vaisseau_info_img = $vaisseauRepository->findAllInfObj($construct["id_objet"]);
                            
                            foreach ($vaisseau_info_img as $construct_inf) {?>
                                <tr>
                                    <td><?= $construct_inf['nom'] ?></td>
                                    <td class="td_text_pad"><div class="td_text"><?= str_replace("\n", "<br/>",$construct_inf['info']) ?></div></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </div></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>