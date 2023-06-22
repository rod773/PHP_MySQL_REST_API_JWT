SELECT * FROM php_rest_api_noauth.tbl_employees;

CREATE TABLE `php_rest_api_jwt_auth`.`tbl_users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(50) NOT NULL,
  `last_name` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `oassword` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  UNIQUE INDEX `oassword_UNIQUE` (`oassword` ASC) VISIBLE);

