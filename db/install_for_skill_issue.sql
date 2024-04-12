USE `msr26`;

CREATE TABLE `gear_categories` (
    categoryId INT(11) NOT NULL AUTO_INCREMENT,
    categoryName VARCHAR(255) NOT NULL,
    dateCreated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (categoryId)
);

CREATE TABLE `gear_items` (
    gearId INT(11) NOT NULL AUTO_INCREMENT,
    categoryId INT(11) NOT NULL,
    code VARCHAR(10) NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255) NOT NULL,
    dateCreated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    stock INT(11) NOT NULL DEFAULT 1,
    onSale TINYINT(1) NOT NULL DEFAULT 0,
    salePrice DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    PRIMARY KEY (gearId),
    FOREIGN KEY (categoryId) REFERENCES gear_categories(categoryId)
);

INSERT INTO `gear_categories` (`categoryName`) VALUES
    ('camping_tent'),
    ('backpack'),
    ('portable_grill'),
    ('hammock'),
    ('binoculars');

INSERT INTO `gear_items`
    (`categoryId`, `code`, `name`, `description`, `price`, `image`)
VALUES
    (1, 'TNT001', 'Coleman Sundome', 'Dome tent with a sturdy frame that withstands 35+ mph winds', 69.99, 'tent1.png'),
    (1, 'TNT002', 'Coleman Evanston', 'Enjoy bug-free lounging and extra ventilation in a separate screened-in room that also offers an additional sleeping area on warmer nights', 150.00, 'tent2.png'),
    (1, 'TNT003', 'Coleman WeatherMaster', 'Cabin-like 10-person tent has enough room for 3 queen size air beds', 200.00, 'tent3.png'),
    (1, 'TNT004', 'Coleman Montana', '6/8 Person Family Tent with Included Rainfly, Carry Bag, and Spacious Interior, Fits Multiple Queen Airbeds and Sets Up in 15 Minutes', 250.00, 'tent4.jpg'),
    (1, 'TNT005', 'Coleman Skydome', 'With a quick setup under 5 minutes, the Coleman Skydome Camping Tent lets you enjoy more time with friends and family on your next camping trip.', 300.00, 'tent5.jpg'),
    (2, 'BKP001', 'REEBOW GEAR Military Tactical Backpack', 'Molle tactical backpack has molle system, Molle webbing throughout for attaching additional tactical pouches or gear as 3 day assault pack backpack combat molle backpack.', 49.99, 'backpack1.png'),
    (2, 'BKP002', 'Loowoko 50L Hiking Backpack', 'Cpmprehensive Upgraded Version - The Loowoko hiking travel backpack has been completely upgraded with better materials, stronger straps and more durable zippers, making it one of the most popular hiking daypack options for consumers.', 49.99, 'backpack2.png'),
    (2, 'BKP003', 'TETON 75L Explorer Internal Frame Backpack for Hiking', 'BEST SELLING BACKPACK: Consistently a best internal frame backpack on Amazon at a great price for such a feature rich backpack; TETON Tough, ready for hiking, backpacking and camping', 109.99, 'backpack3.png'),
    (2, 'BKP004', 'Unineovo 90L Hiking Backpack for Women Men, Waterproof Camping Essentials Bag with Rain Cover', 'The No Frame Hiking Backpack only 2.6 pounds for 90L large capacity, reducing the backpack loading weight so that you can carry more other items. The maximum loading bearing is 45lb. Unfold size:35x25x75 cm/10x13.8x29.5 inches. Perfect for a 5-7 day hiking trip.', 39.99, 'backpack4.jpg'),
    (2, 'BKP005', 'TETON 55L Scout Internal Frame Backpack for Hiking, Camping, Backpacking, Rain Cover Included', 'The best backpack makes all the difference. At a surprisingly great price, TETON''s Scout Backpacks are ideal for explorers looking for comfort in the great outdoors.', 63.22, 'backpack5.jpg'),
    (3, 'PGR001', 'Coleman Triton 2-Burner Propane Camping Stove,', 'PORTABLE: Easy addition to the campsite, picnic, roadside, and more', 79.99, 'grill1.png'),
    (3, 'PGR002', 'Coleman Tabletop 2-in-1 Camping Grill/Stove', '2-IN-1 DESIGN: Use grill and stove at the same time; 130 sq. in. grilling area; stove fits a 10 in. pan', 134.99, 'grill2.png'),
    (3, 'PGR003', 'Odoland Camping Campfire Grill', 'For space-saving storage and quick organization, the charcoal camping grill with compact size (13" x 10.5") is ideal. Equipped a carring case, making them compact and easy to take outdoor for bonfire, picnic, BBQ in the courtyard or garden.', 35.99, 'grill3.jpg'),
    (3, 'PGR004', 'Royal Gourmet PD1301S Portable 24-Inch 3-Burner Table Top Gas Grill Griddle with Cover', 'Portable and Convenient: Portable and easy to store. With sturdy feet for enhanced stability, this tabletop grill is perfect for any outdoor or home use by connecting the regulator with 20 lb. LP tank (not included) as fuel.', 99.00, 'grill4.jpg'),
    (3, 'PGR005', 'Fire Sense 60508 Notebook BBQ Grill 3.5mm Cooking Bars Instant Foldable', 'FIRE SENSE BLACK NOTEBOOK GRILL: We are pleased to offer the finest in contemporary design and quality in the Notebook Grill.', 28.75, 'grill5.jpg'),
    (4, 'HMK001', 'Kootek Camping Hammock Double & Single Portable Hammocks', 'Looking to elevate your outdoor experience and escape the hustle and bustle of everyday life? Look no further than our camping hammocks, designed to provide the perfect combination of durability and comfort. Whether you''re camping, hiking, or simply lounging on your patio with a hammock stand, our hammocks are the ideal addition to help you unwind and relax in ultimate comfort.', 24.99, 'hammock1.png'),
    (4, 'HMK002', 'AnorTrek Camping Hammock', 'he camping hammock comes with every thing you need. Two solid steel carabiners & two hammock tree straps, each strap long 8.2 ft and with 5+1 loops. Very easy to set up hammock within 90 seconds. The hammock weighs 1.3 lbs (Single) & 1.6 lbs (Double), can be used for camping, travel, yard perfectly. ', 24.99, 'hammock2.png'),
    (4, 'HMK003', 'G4Free Large Camping Hammock with Mosquito Net 2 Person Pop-up Parachute', 'The Pop-up designed hammock help you to install easily. With the hardware thick tree strap and solid carabiner clips hanging on the tree, you can enjoy your leisure time at once. Zipper works smooth and well placed.', 41.98, 'hammock3.png'),
    (4, 'HMK004', 'Night Cat Camping Hammock Tent with Mosquito Net and Rain Fly', 'Upgraded design with an exclusive storage pocket on bottom to be put into a sleeping pad (Excluded in Package), avoiding sleeping pad to move around and providing huge support on back & more comfortable sleeping overnight, especially better for supine sleepers and side sleepers', 99.99, 'hammock4.jpg'),
    (4, 'HMK005', 'OneTigris Hideout Hammock Underquilt', 'A perfect gear for hammock camping, hiking, backpacking, travel, beach, backyard, patio, etc.', 39.98, 'hammock5.jpg'),
    (5, 'BNO001', 'Vortex Optics Triumph HD 10x42 Binoculars', 'A full-size binocular with 1x magnification and 42mm objective lenses, the Triumph HD delivers excellent image quality, ergonomics, and durability for its class. It is a perfect companion for your next hunt or hike.', 149.99, 'binoculars1.png'),
    (5, 'BNO002', 'Nikon PROSTAFF P3 8x42 Binocular', 'Waterproof PROSTAFF P3 8x42 binoculars combine full-size 42mm objectives with 8X magnification for a brighter wide, steady view. Renowned Nikon optics with multilayer coatings create spectacular clarity. For any outdoor adventure, PROSTAFF P3 binoculars deliver more performance for less.', 139.95, 'binoculars2.png'),
    (5, 'BNO003', 'Vortex Optics Diamondback HD Binoculars 12x50', '12x magnification & 50mm objective lenses, these Diamondback HD binos are optimized with select glass elements to deliver exceptional resolution, cut chromatic aberration and provide outstanding color fidelity, sharpness and light transmission.', 269.00, 'binoculars3.png'),
    (5, 'BNO004', 'Vortex Optics Fury HD 5000 10x42 Applied Ballistics Laser Rangefinding Binoculars', 'The Fury HD 5000 AB is an extremely effective, angle-compensated laser rangefinding bino intended for hunters, archers, and shooters looking to take the guess work out of long-range shots with in-display ballistic data and built-in environmental sensors.', 1499.00, 'binoculars4.webp'),
    (5, '181177', 'Leupold BX-2 Alpine HD Binoculars, 10x42mm', 'Model #181177 - BX-2 Alpine HD 10x42mm binoculars in shadow gray', 249.99, 'binoculars5.jpg');

UPDATE `gear_items`
SET
    `onSale` = 1,
    `salePrice` = 51.34
WHERE `gearId` = 1;

UPDATE `gear_items`
SET
    `stock` = 0
WHERE `gearId` = 2;

/* These will change later */
CREATE TABLE `users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `firstname` VARCHAR(40) NOT NULL,
    `lastname` VARCHAR(60) NOT NULL,
    `isAdmin` TINYINT(1) NOT NULL DEFAULT 0,
    `dateCreated` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `orders` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `user_id` INT NOT NULL,
    `total` DECIMAL(10,2) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
);