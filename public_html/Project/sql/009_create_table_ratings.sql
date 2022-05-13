CREATE TABLE IF NOT EXISTS `Ratings`(
    `id`  int NOT NULL AUTO_INCREMENT ,
    `item_id` int ,
    `user_id`    int ,
    `rating`     int(1) NOT NULL CHECK(rating>=1 and rating<=5),
    `comment`    text NOT NULL,
    `created`    datetime       default CURRENT_TIMESTAMP,
    `modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    foreign key (item_id) references RM_Items (id),
    foreign key (user_id) references Users (id),
    PRIMARY KEY(`id`);
)