-- Defin better name and not null for all attributs in table `user`
ALTER TABLE `user`
  CHANGE COLUMN `name` `username` VARCHAR(30);

ALTER TABLE `user`
  CHANGE COLUMN `password` `password` VARCHAR(40);