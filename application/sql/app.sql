SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for {app_name}_app_navbar_menus
-- ----------------------------
CREATE TABLE IF NOT EXISTS `{app_name}_app_navbar_menus`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NULL DEFAULT NULL,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `route_id` int(11) NULL DEFAULT NULL,
  `icon` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `order` int(11) NULL DEFAULT NULL,
  `uuid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(1) NULL DEFAULT 0,
  `active` tinyint(1) NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `Unique sidebar`(`parent_id`, `name`) USING BTREE,
  INDEX `route_id`(`route_id`) USING BTREE,
  CONSTRAINT `{app_name}_app_navbar_menus_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `{app_name}_app_navbar_menus` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `{app_name}_app_navbar_menus_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `{app_name}_app_routes` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for {app_name}_app_notifications
-- ----------------------------
CREATE TABLE IF NOT EXISTS `{app_name}_app_notifications`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `url` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tablename` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `table_reference` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `view_at` datetime(0) NULL DEFAULT NULL,
  `uuid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `{app_name}_app_notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `{app_name}_app_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for {app_name}_app_permissions
-- ----------------------------
CREATE TABLE IF NOT EXISTS `{app_name}_app_permissions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `uuid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `Unique permission`(`permission`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for {app_name}_app_role_permissions
-- ----------------------------
CREATE TABLE IF NOT EXISTS `{app_name}_app_role_permissions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NULL DEFAULT NULL,
  `permission_id` int(11) NULL DEFAULT NULL,
  `uuid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `Unique role_id, permission`(`role_id`, `permission_id`) USING BTREE,
  INDEX `permission_id`(`permission_id`) USING BTREE,
  CONSTRAINT `{app_name}_app_role_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `{app_name}_app_roles` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `{app_name}_app_role_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `{app_name}_app_permissions` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for {app_name}_app_role_routes
-- ----------------------------
CREATE TABLE IF NOT EXISTS `{app_name}_app_role_routes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `route_id` int(11) NULL DEFAULT NULL,
  `uuid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `Unique role_route`(`role_id`, `route_id`) USING BTREE,
  INDEX `route_id`(`route_id`) USING BTREE,
  CONSTRAINT `{app_name}_app_role_routes_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `{app_name}_app_routes` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `{app_name}_app_role_routes_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `{app_name}_app_roles` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for {app_name}_app_roles
-- ----------------------------
CREATE TABLE IF NOT EXISTS `{app_name}_app_roles`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `uuid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `Unique route`(`role`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for {app_name}_app_routes
-- ----------------------------
CREATE TABLE IF NOT EXISTS `{app_name}_app_routes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `function` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `active_sidebar_route_id` int(11) NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `public` tinyint(1) NULL DEFAULT 0,
  `uuid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `Unique route`(`route`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for {app_name}_app_sessions
-- ----------------------------
CREATE TABLE IF NOT EXISTS `{app_name}_app_sessions`  (
  `id` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `user_id` int(11) NULL DEFAULT NULL,
  INDEX `ci_sessions_timestamp`(`timestamp`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for {app_name}_app_sidebar_menus
-- ----------------------------
CREATE TABLE IF NOT EXISTS `{app_name}_app_sidebar_menus`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NULL DEFAULT NULL,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `route_id` int(11) NULL DEFAULT NULL,
  `icon` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `order` int(11) NULL DEFAULT NULL,
  `uuid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `Unique sidebar`(`parent_id`, `name`) USING BTREE,
  INDEX `route_id`(`route_id`) USING BTREE,
  CONSTRAINT `{app_name}_app_sidebar_menus_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `{app_name}_app_sidebar_menus` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `{app_name}_app_sidebar_menus_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `{app_name}_app_routes` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for {app_name}_app_user_extensions
-- ----------------------------
CREATE TABLE IF NOT EXISTS `{app_name}_app_user_extensions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `middle_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `last_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `extension_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `img_filename` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `verification_id` int(11) NULL DEFAULT NULL,
  `uuid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `unique_email`(`email`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `{app_name}_app_user_extensions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `{app_name}_app_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for {app_name}_app_user_roles
-- ----------------------------
CREATE TABLE IF NOT EXISTS `{app_name}_app_user_roles`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NULL DEFAULT NULL,
  `uuid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `Unique user_role`(`user_id`, `role_id`) USING BTREE,
  INDEX `role_id`(`role_id`) USING BTREE,
  CONSTRAINT `{app_name}_app_user_roles_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `{app_name}_app_roles` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `{app_name}_app_user_roles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `{app_name}_app_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for {app_name}_app_users
-- ----------------------------
CREATE TABLE IF NOT EXISTS `{app_name}_app_users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `password` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `uuid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `Unique username`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for {app_name}_app_verifications
-- ----------------------------
CREATE TABLE IF NOT EXISTS `{app_name}_app_verifications`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `expiration_at` datetime(0) NULL DEFAULT NULL,
  `verified_at` datetime(0) NULL DEFAULT NULL,
  `uuid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT 1,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Triggers structure for table {app_name}_app_navbar_menus
-- ----------------------------
DROP TRIGGER IF EXISTS `{app_name}_app_navbar_menus_uuid`;
delimiter ;;
CREATE TRIGGER `{app_name}_app_navbar_menus_uuid` BEFORE INSERT ON `{app_name}_app_navbar_menus` FOR EACH ROW BEGIN
  IF new.uuid IS NULL THEN
    SET new.uuid = uuid();
  END IF;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table {app_name}_app_notifications
-- ----------------------------
DROP TRIGGER IF EXISTS `{app_name}_app_notifications_uuid`;
delimiter ;;
CREATE TRIGGER `{app_name}_app_notifications_uuid` BEFORE INSERT ON `{app_name}_app_notifications` FOR EACH ROW BEGIN
  IF new.uuid IS NULL THEN
    SET new.uuid = uuid();
  END IF;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table {app_name}_app_permissions
-- ----------------------------
DROP TRIGGER IF EXISTS `{app_name}_app_permissions_uuid`;
delimiter ;;
CREATE TRIGGER `{app_name}_app_permissions_uuid` BEFORE INSERT ON `{app_name}_app_permissions` FOR EACH ROW BEGIN
  IF new.uuid IS NULL THEN
    SET new.uuid = uuid();
  END IF;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table {app_name}_app_role_permissions
-- ----------------------------
DROP TRIGGER IF EXISTS `{app_name}_app_role_permissions_uuid`;
delimiter ;;
CREATE TRIGGER `{app_name}_app_role_permissions_uuid` BEFORE INSERT ON `{app_name}_app_role_permissions` FOR EACH ROW BEGIN
  IF new.uuid IS NULL THEN
    SET new.uuid = uuid();
  END IF;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table {app_name}_app_role_routes
-- ----------------------------
DROP TRIGGER IF EXISTS `{app_name}_app_role_routes`;
delimiter ;;
CREATE TRIGGER `{app_name}_app_role_routes` BEFORE INSERT ON `{app_name}_app_role_routes` FOR EACH ROW BEGIN
  IF new.uuid IS NULL THEN
    SET new.uuid = uuid();
  END IF;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table {app_name}_app_roles
-- ----------------------------
DROP TRIGGER IF EXISTS `{app_name}_app_roles_uuid`;
delimiter ;;
CREATE TRIGGER `{app_name}_app_roles_uuid` BEFORE INSERT ON `{app_name}_app_roles` FOR EACH ROW BEGIN
  IF new.uuid IS NULL THEN
    SET new.uuid = uuid();
  END IF;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table {app_name}_app_routes
-- ----------------------------
DROP TRIGGER IF EXISTS `{app_name}_app_routes_uuid`;
delimiter ;;
CREATE TRIGGER `{app_name}_app_routes_uuid` BEFORE INSERT ON `{app_name}_app_routes` FOR EACH ROW BEGIN
  IF new.uuid IS NULL THEN
    SET new.uuid = uuid();
  END IF;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table {app_name}_app_sidebar_menus
-- ----------------------------
DROP TRIGGER IF EXISTS `{app_name}_app_sidebar_menus_uuid`;
delimiter ;;
CREATE TRIGGER `{app_name}_app_sidebar_menus_uuid` BEFORE INSERT ON `{app_name}_app_sidebar_menus` FOR EACH ROW BEGIN
  IF new.uuid IS NULL THEN
    SET new.uuid = uuid();
  END IF;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table {app_name}_app_user_extensions
-- ----------------------------
DROP TRIGGER IF EXISTS `{app_name}_app_user_extensions_uuid`;
delimiter ;;
CREATE TRIGGER `{app_name}_app_user_extensions_uuid` BEFORE INSERT ON `{app_name}_app_user_extensions` FOR EACH ROW BEGIN
  IF new.uuid IS NULL THEN
    SET new.uuid = uuid();
  END IF;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table {app_name}_app_user_roles
-- ----------------------------
DROP TRIGGER IF EXISTS `{app_name}_app_user_roles_uuid`;
delimiter ;;
CREATE TRIGGER `{app_name}_app_user_roles_uuid` BEFORE INSERT ON `{app_name}_app_user_roles` FOR EACH ROW BEGIN
  IF new.uuid IS NULL THEN
    SET new.uuid = uuid();
  END IF;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table {app_name}_app_users
-- ----------------------------
DROP TRIGGER IF EXISTS `{app_name}_app_users_uuid`;
delimiter ;;
CREATE TRIGGER `{app_name}_app_users_uuid` BEFORE INSERT ON `{app_name}_app_users` FOR EACH ROW BEGIN
  IF new.uuid IS NULL THEN
    SET new.uuid = uuid();
  END IF;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table {app_name}_app_verifications
-- ----------------------------
DROP TRIGGER IF EXISTS `{app_name}_app_verifications_uuid`;
delimiter ;;
CREATE TRIGGER `{app_name}_app_verifications_uuid` BEFORE INSERT ON `{app_name}_app_verifications` FOR EACH ROW BEGIN
  IF new.uuid IS NULL THEN
    SET new.uuid = uuid();
  END IF;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
