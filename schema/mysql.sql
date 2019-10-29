create table if not exists `catalog_vendor`
(
    `id` int(10) not null auto_increment,
    `user_id` int(10) default null,
    `title` varchar(100) not null,
    `alias` varchar(200) not null,
    `image` varchar(200) default null,
    `description` text,
    `link` varchar(200) default null,
    primary key (`id`),
    key `alias` (`alias`),
    key `title` (`title`)
) engine InnoDB;
