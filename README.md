# citizen

ALTER TABLE `constructeur` ADD `validation` BOOLEAN NOT NULL DEFAULT FALSE AFTER `id_user`;
ALTER TABLE `screens` ADD `validation` BOOLEAN NOT NULL DEFAULT FALSE AFTER `date`;
