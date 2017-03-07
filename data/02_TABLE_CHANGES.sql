-- Defin better name and not null for all attributs in table `user`
ALTER TABLE `user`
  CHANGE COLUMN `name` `username` VARCHAR(30);