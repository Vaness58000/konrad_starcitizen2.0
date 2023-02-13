<?php
include __DIR__.'/../../repository/LieuxRepository.php';
?>

<table>
        <thead>
            <tr>
                <th>nom</th>
                <th>contenu</th>
                <th>image</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $lieuxLuneRepository = new LieuxRepository();
            $lieuxLune = $lieuxLuneRepository->findAllCat(5);
            
            foreach ($lieuxLune as $construct) {?>
                <tr>
                    <td><?= $construct['nom_lieu'] ?></td>
                    <td class="td_text_pad"><div class="td_text"><?= str_replace("\n", "<br/>",$construct['contenu']) ?></div></td>
                    <td>
                        <?php 
                        $lieuxLune_img = $lieuxLuneRepository->findAllImgObj($construct["id_objet"]);

                        foreach ($lieuxLune_img as $construct_img) {?>
                                <?= $construct_img['name'] ?>,
                        <?php } ?>
                    </td>
                    <td class="td_text_pad"><div class="td_text">
                    <table>
                        <tbody>
                            <?php 
                            $lieuxLune_info_img = $lieuxLuneRepository->findAllInfObj($construct["id_objet"]);
                            
                            foreach ($lieuxLune_info_img as $construct_inf) {?>
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