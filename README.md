# citizen

ALTER TABLE `constructeur` ADD `validation` BOOLEAN NOT NULL DEFAULT FALSE AFTER `id_user`;
ALTER TABLE `screens` ADD `validation` BOOLEAN NOT NULL DEFAULT FALSE AFTER `date`;
INSERT INTO `objet_type` (`id`, `nom`, `id_user`, `date`) VALUES (NULL, 'propriétaire', '2', current_timestamp()), (NULL, 'service', '2', current_timestamp());
