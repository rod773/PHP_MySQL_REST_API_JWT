CREATE TABLE `php_rest_api_noauth`.`tbl_employees` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `designation` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`));