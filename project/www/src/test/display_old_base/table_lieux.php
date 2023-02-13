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
            $lieuxStRepository = new LieuxRepository();
            $lieuxSt = $lieuxStRepository->findAllCat(6);
            
            foreach ($lieuxSt as $construct) {?>
                <tr>
                    <td><?= $construct['nom_lieu'] ?></td>
                    <td class="td_text_pad"><div class="td_text"><?= str_replace("\n", "<br/>",$construct['contenu']) ?></div></td>
                    <td>
                        <?php 
                        $lieuxSt_img = $lieuxStRepository->findAllImgObj($construct["id_objet"]);

                        foreach ($lieuxSt_img as $construct_img) {?>
                                <?= $construct_img['name'] ?>,
                        <?php } ?>
                    </td>
                    <td class="td_text_pad"><div class="td_text">
                    <table>
                        <tbody>
                            <?php 
                            $lieuxSt_info_img = $lieuxStRepository->findAllInfObj($construct["id_objet"]);
                            
                            foreach ($lieuxSt_info_img as $construct_inf) {?>
                                <tr>
                                    <td><?= $construct_inf['nom'] ?></td>
                                    <td class="td_text_pad"><div class="td_text"><?= str_replace("\n", "<br/>",$construct_inf['info']) ?></div></td>
                                    <td>
                                        <?php 
                                        $lieuxSt_infimg = $lieuxStRepository->findAllImgInfObj($construct_inf["id"]);

                                        foreach ($lieuxSt_infimg as $construct_infimg) {?>
                                                <?= $construct_infimg['name'] ?>,
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </div></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>