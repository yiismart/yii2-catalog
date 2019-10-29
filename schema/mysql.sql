create table if not exists `catalog_currency`
(
    `id` int(10) not null auto_increment,
    `name` varchar(100) not null,
    `code` varchar(10) not null,
    `rate` decimal(10,2) not null,
    `precision` integer default 2,
    `prefix` varchar(10) not null,
    `suffix` varchar(10) not null,
    `default` tinyint(1) default 0,
    primary key (`id`)
) engine InnoDB;

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
