CREATE TABLE IF NOT EXISTS `Products`(
    `id` int not null AUTO_INCREMENT,
    `name` varchar(30) ,
    `description` text,
    `category` text,
    `stock` int DEFAULT  0,
    `unit_price` DECIMAL(18,2),
    `visibility` boolean DEFAULT 1,
    `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `modified` TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`),
    UNIQUE(`name`)
)