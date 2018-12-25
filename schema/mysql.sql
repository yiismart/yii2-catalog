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
    `alias` varchar(100) not null,
    `name` varchar(100) not null,
    `description` text,
    `url` varchar(200) default null,
    `file` varchar(200) default null,
    `thumb` varchar(200) default null,
    primary key (`id`),
    key `alias` (`alias`),
    key `name` (`name`)
) engine InnoDB;

create table if not exists `catalog_category`
(
    `id` int(10) not null auto_increment,
    `lft` int(10) not null,
    `rgt` int(10) not null,
    `depth` int(10) not null,
    `active` tinyint(1) default 1,
    `alias` varchar(100) default null,
    `title` varchar(100),
    `path` text,
    `productCount` int(10) default null,
    `activeProductCount` int(10) default null,
    primary key (`id`),
    key `alias` (`alias`)
) engine InnoDB;

create table if not exists `catalog_category_property`
(
    `id` int(10) not null auto_increment,
    `category_id` int(10) not null,
    `alias` varchar(50) default null,
    `name` varchar(50) default null,
    `type` int(10) not null,
    `svalues` text,
    `unit` varchar(10) default null,
    `search` tinyint(1) default 0,
    `order` int(10) default null,
    primary key (`id`),
    foreign key (`category_id`) references `catalog_category` (`id`) on delete cascade on update cascade,
    key `alias` (`alias`)
) engine InnoDB;

create table if not exists `catalog_product`
(
    `id` int(10) not null auto_increment,
    `category_id` int(10) not null,
    `category_lft` int(10) not null,
    `category_rgt` int(10) not null,
    `vendor_id` int(10) default null,
    `currency_id` int(10) default null,
    `active` tinyint(1) default 1,
    `sku` varchar(50) not null,
    `alias` varchar(100) default null,
    `name` varchar(200) default null,
    `description` text,
    `vendor` varchar(100) default null,
    `price` decimal(10,2) default null,
    `oldPrice` decimal(10,2) default null,
    `countryOfOrigin` varchar(100) default null,
    `length` int(10) default null,
    `width` int(10) default null,
    `height` int(10) default null,
    `weight` decimal(10,3) default null,
    `modifyDate` datetime,
    `thumb` varchar(200) default null,
    `imageCount` int(10) not null,
    `priceValue` decimal(12, 4) default null,
    `availability` int(10) not null,
    `quantity` int(10) default 0,
    primary key (`id`),
    foreign key (`category_id`) references `catalog_category` (`id`) on delete cascade on update cascade,
    unique key `sku` (`sku`),
    key `alias` (`alias`),
    key `filter` (`category_lft`, `category_rgt`, `vendor_id`, `price`)
) engine InnoDB;

create table if not exists `catalog_product_barcode`
(
    `id` int(10) not null auto_increment,
    `product_id` int(10) not null,
    `barcode` varchar(50) not null,
    primary key (`id`),
    foreign key (`product_id`) references `catalog_product` (`id`) on delete cascade on update cascade,
    key `barcode` (`barcode`)
) engine InnoDB;

create table if not exists `catalog_product_property`
(
    `id` int(10) not null auto_increment,
    `product_id` int(10) not null,
    `property_id` int(10) not null,
    `value` varchar(30) not null,
    `numericValue` double not null,
    primary key (`id`),
    foreign key (`product_id`) references `catalog_product` (`id`) on delete cascade on update cascade,
    foreign key (`property_id`) references `catalog_category_property` (`id`) on delete cascade on update cascade,
    key `filter` (`product_id`, `property_id`, `value`),
    key `numericFilter` (`product_id`, `property_id`, `numericValue`)
) engine InnoDB;

create table if not exists `catalog_product_image`
(
    `id` int(10) not null auto_increment,
    `product_id` int(10) not null,
    `file` varchar(200) default null,
    `thumb` varchar(200) default null,
    primary key (`id`),
    foreign key (`product_id`) references `catalog_product` (`id`) on delete cascade on update cascade
) engine InnoDB;

create table if not exists `catalog_product_related`
(
    `id` int(10) not null auto_increment,
    `product_id` int(10) not null,
    `related_id` int(10) not null,
    primary key (`id`),
    foreign key (`product_id`) references `catalog_product` (`id`) on delete cascade on update cascade,
    foreign key (`related_id`) references `catalog_product` (`id`) on delete cascade on update cascade
) engine InnoDB;

create table if not exists `catalog_store`
(
    `id` int(10) not null auto_increment,
    `name` varchar(100) not null,
    `type` int(10) not null,
    primary key (`id`)
) engine InnoDB;

create table if not exists `catalog_store_product`
(
    `id` int(10) not null auto_increment,
    `store_id` int(10) not null,
    `product_id` int(10) not null,
    `quantity` int(10) not null,
    primary key (`id`),
    foreign key (`store_id`) references `catalog_store` (`id`) on delete cascade on update cascade,
    foreign key (`product_id`) references `catalog_product` (`id`) on delete cascade on update cascade
) engine InnoDB;

create table if not exists `catalog_delivery`
(
    `id` int(10) not null auto_increment,
    `currency_id` int(10) default null,
    `name` varchar(100) not null,
    `price` decimal(10,2) not null,
    `days` int(10) not null,
    `_fields` text not null,
    primary key (`id`)
) engine InnoDB;

create table if not exists `catalog_order`
(
    `id` int(10) not null auto_increment,
    `number` varchar(20) not null,
    `issueDate` datetime not null,
    `paymentTerm` datetime default null,
    `currency_id` int(10) default null,
    `discount` int(10) not null,
    `productAmount` decimal(10,2) not null,
    `discountAmount` decimal(10,2) not null,
    `subtotalAmount` decimal(10,2) not null,
    `deliveryAmount` decimal(10,2) not null,
    `totalAmount` decimal(10,2) not null,
    `comment` text,
    `paymentState` int(10) not null,
    `paidAmount` decimal(10,2) not null,
    primary key (`id`)
) engine InnoDB;

create table if not exists `catalog_order_customer`
(
    `id` int(10) not null auto_increment,
    `order_id` int(10) not null,
    `user_id` int(10) default null,
    `name` varchar(100) not null,
    `phone` varchar(20) not null,
    `email` varchar(100) not null,
    primary key (`id`),
    foreign key (`order_id`) references `catalog_order` (`id`) on delete cascade on update cascade
) engine InnoDB;

create table if not exists `catalog_order_product`
(
    `id` int(10) not null auto_increment,
    `order_id` int(10) not null,
    `product_id` int(10) not null,
    `sku` varchar(50) not null,
    `name` varchar(200) default null,
    `count` int(10) not null,
    `price` decimal(10,2) not null,
    `amount` decimal(10,2) not null,
    `discount` int(10) default null,
    `discountAmount` decimal(10,2) not null,
    `totalAmount` decimal(10,2) not null,
    primary key (`id`),
    foreign key (`order_id`) references `catalog_order` (`id`) on delete cascade on update cascade
) engine InnoDB;

create table if not exists `catalog_order_delivery`
(
    `id` int(10) not null auto_increment,
    `order_id` int(10) not null,
    `delivery_class` varchar(200) not null,
    `name` varchar(100) not null,
    `price` decimal(10,2) not null,
    `days` int(10) not null,
    `_fields` text not null,
    `store_id` int(10) default null,
    `serviceName` varchar(100) default null,
    `city` varchar(100) default null,
    `street` varchar(100) default null,
    `house` varchar(10) default null,
    `apartment` varchar(10) default null,
    `entrance` varchar(100) default null,
    `entryphone` varchar(10) default null,
    `floor` int(10) default null,
    `recipient` varchar(100) default null,
    `phone` varchar(20) default null,
    `trackingCode` varchar(20) default null,
    primary key (`id`),
    unique key (`order_id`),
    foreign key (`order_id`) references `catalog_order` (`id`) on delete cascade on update cascade
) engine InnoDB;
