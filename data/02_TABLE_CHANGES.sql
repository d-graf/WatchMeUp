/*Newest changes */

ALTER TABLE `user`
  ADD COLUMN `isAdmin` TINYINT DEFAULT 0;

/*PW gibbiX12345!*/
INSERT INTO `user` (`username`, `email`, `password`, `isAdmin`) VALUES ('admin', 'admin@watchmeup.ch', '8cbe11587720206616ffffaa320cd25bf5dc2553', '1');