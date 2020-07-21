-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-07-2020 a las 18:20:50
-- Versión del servidor: 8.0.20-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cherry`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alliances`
--

CREATE TABLE `alliances` (
  `id` int NOT NULL,
  `client` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `ticket_value` decimal(10,4) NOT NULL,
  `ticket_quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `branches`
--

CREATE TABLE `branches` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `person_in_charge` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `branches`
--

INSERT INTO `branches` (`id`, `name`, `address`, `person_in_charge`) VALUES
(1, 'Umacollo', 'Umacollo 102', 'Rosa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `branch_warehouses`
--

CREATE TABLE `branch_warehouses` (
  `id` int NOT NULL,
  `warehouse_id` int NOT NULL,
  `branch_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `branch_warehouses`
--

INSERT INTO `branch_warehouses` (`id`, `warehouse_id`, `branch_id`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cakes`
--

CREATE TABLE `cakes` (
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(250) NOT NULL,
  `code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `state`) VALUES
(1, 'frutas', 'Son frutas', '', 1),
(2, 'aaaaa', 'asdasddasdsa', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `name` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` int NOT NULL,
  `user` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `name`, `lastname`, `email`, `phone`, `user`, `password`) VALUES
(1, 'Walker Manrique', 'walker', 'walket1239@gmail.com', 974777331, 'walkercito', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contracts`
--

CREATE TABLE `contracts` (
  `id` int NOT NULL,
  `client_id` int DEFAULT NULL,
  `production_id` int NOT NULL,
  `alliance_id` int DEFAULT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `total_price` decimal(10,4) NOT NULL,
  `account_price` decimal(10,4) NOT NULL,
  `description` varchar(600) NOT NULL,
  `branch_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contract_recipes`
--

CREATE TABLE `contract_recipes` (
  `id` int NOT NULL,
  `contract_id` int NOT NULL,
  `recipe_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `decorations`
--

CREATE TABLE `decorations` (
  `id` int NOT NULL,
  `description` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `decorations`
--

INSERT INTO `decorations` (`id`, `description`, `code`) VALUES
(1, 'cafe', 'cafecito'),
(2, 'chocolate', 'choco'),
(3, 'sublime', 'sbuli'),
(4, 'canela', 'necala'),
(5, 'asd', 'asdd'),
(6, 'dsdss', '1asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `decoration_dimensions`
--

CREATE TABLE `decoration_dimensions` (
  `id` int NOT NULL,
  `decoration_id` int NOT NULL,
  `dimension_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `decoration_dimensions`
--

INSERT INTO `decoration_dimensions` (`id`, `decoration_id`, `dimension_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 4, 1),
(4, 4, 2),
(5, 2, 1),
(6, 2, 2),
(7, 3, 1),
(8, 3, 2),
(9, 5, 1),
(10, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `decoration_products`
--

CREATE TABLE `decoration_products` (
  `id` int NOT NULL,
  `decoration_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `decoration_products`
--

INSERT INTO `decoration_products` (`id`, `decoration_id`, `product_id`) VALUES
(1, 1, 3),
(2, 1, 7),
(3, 4, 8),
(4, 4, 4),
(5, 2, 8),
(6, 2, 4),
(7, 3, 7),
(8, 3, 3),
(9, 5, 1),
(10, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `decoration_product_measures`
--

CREATE TABLE `decoration_product_measures` (
  `id` int NOT NULL,
  `decoration_dimension_id` int NOT NULL,
  `decoration_product_id` int NOT NULL,
  `quantity` decimal(10,4) NOT NULL,
  `unit` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `decoration_product_measures`
--

INSERT INTO `decoration_product_measures` (`id`, `decoration_dimension_id`, `decoration_product_id`, `quantity`, `unit`) VALUES
(1, 1, 1, '12.0000', 'dsd'),
(2, 2, 2, '121.0000', 'dsds'),
(3, 1, 3, '1231.0000', 'dsds'),
(4, 4, 2, '1231.0000', 'dsad'),
(5, 4, 4, '121.0000', 'dssd'),
(6, 5, 5, '312.0000', 'dsda'),
(7, 8, 7, '4343.0000', 'dsa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dimensions`
--

CREATE TABLE `dimensions` (
  `id` int NOT NULL,
  `description` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `dimensions`
--

INSERT INTO `dimensions` (`id`, `description`) VALUES
(1, '10'),
(2, '20'),
(3, '30'),
(4, '40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equivalences`
--

CREATE TABLE `equivalences` (
  `id` int NOT NULL,
  `description` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `equivalences`
--

INSERT INTO `equivalences` (`id`, `description`) VALUES
(1, 'equivalencias para las tortas dulces\r\n'),
(2, 'equivalencias para las tortas duras'),
(3, 'dwa'),
(4, 'walky'),
(5, 'equivalencias para los dulces');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equivalence_dimensions`
--

CREATE TABLE `equivalence_dimensions` (
  `id` int NOT NULL,
  `equivalence_id` int NOT NULL,
  `dimension_id` int NOT NULL,
  `quantity_recipes` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `equivalence_dimensions`
--

INSERT INTO `equivalence_dimensions` (`id`, `equivalence_id`, `dimension_id`, `quantity_recipes`) VALUES
(1, 1, 1, '1.0000'),
(2, 1, 2, '1.2000'),
(3, 1, 3, '1.6000'),
(4, 1, 4, '2.0000'),
(5, 2, 1, '1.0000'),
(6, 2, 2, '1.4000'),
(7, 2, 3, '1.8000'),
(8, 2, 4, '2.0000'),
(9, 3, 2, '12.0000'),
(10, 3, 1, '32.0000'),
(11, 3, 3, '43.0000'),
(12, 3, 4, '11.0000'),
(13, 4, 1, '111.0000'),
(14, 4, 2, '11.0000'),
(15, 4, 3, '111.0000'),
(16, 4, 4, '112.0000'),
(17, 5, 1, '1.0000'),
(18, 5, 2, '1.5000'),
(19, 5, 3, '1.6000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filling_dimensions`
--

CREATE TABLE `filling_dimensions` (
  `id` int NOT NULL,
  `raw_filling_id` int NOT NULL,
  `dimension_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `filling_dimensions`
--

INSERT INTO `filling_dimensions` (`id`, `raw_filling_id`, `dimension_id`) VALUES
(10, 1, 1),
(11, 1, 3),
(14, 2, 1),
(15, 2, 2),
(16, 2, 3),
(17, 2, 4),
(28, 5, 1),
(29, 5, 2),
(88, 10, 1),
(89, 10, 2),
(90, 10, 3),
(91, 11, 1),
(92, 11, 2),
(93, 12, 1),
(94, 12, 2),
(95, 12, 3),
(96, 13, 1),
(97, 13, 2),
(98, 14, 1),
(99, 14, 2),
(100, 14, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filling_products`
--

CREATE TABLE `filling_products` (
  `id` int NOT NULL,
  `raw_filling_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `filling_products`
--

INSERT INTO `filling_products` (`id`, `raw_filling_id`, `product_id`) VALUES
(2, 1, 8),
(3, 1, 7),
(5, 2, 5),
(6, 2, 4),
(7, 2, 3),
(8, 2, 2),
(9, 3, 1),
(10, 3, 3),
(11, 3, 6),
(12, 3, 10),
(23, 5, 3),
(24, 5, 4),
(25, 6, 1),
(26, 6, 2),
(27, 6, 4),
(28, 6, 8),
(29, 7, 1),
(30, 7, 4),
(31, 8, 1),
(32, 8, 4),
(33, 9, 1),
(34, 9, 2),
(35, 10, 3),
(36, 10, 4),
(37, 11, 6),
(38, 11, 5),
(39, 12, 4),
(40, 12, 7),
(41, 12, 5),
(42, 13, 1),
(43, 14, 3),
(44, 14, 4),
(45, 14, 6),
(46, 14, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filling_product_measures`
--

CREATE TABLE `filling_product_measures` (
  `id` int NOT NULL,
  `filling_product_id` int NOT NULL,
  `filling_dimension_id` int NOT NULL,
  `quantity` decimal(10,4) NOT NULL,
  `unit` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `filling_product_measures`
--

INSERT INTO `filling_product_measures` (`id`, `filling_product_id`, `filling_dimension_id`, `quantity`, `unit`) VALUES
(63, 2, 10, '1.0000', '12312'),
(64, 2, 14, '3121.0000', 'sdds'),
(65, 2, 10, '1.0000', '12312'),
(66, 3, 10, '0.0008', 'sdada'),
(67, 2, 11, '123.0000', 'dsada'),
(68, 3, 11, '1230.9999', 'dasd'),
(69, 37, 91, '13.0000', 'centimetros'),
(70, 38, 91, '12.0000', 'gramos'),
(71, 37, 92, '15.0000', 'centimetros'),
(72, 38, 92, '17.0000', 'gramos'),
(73, 39, 93, '12.0000', 'gramos'),
(74, 40, 93, '13.0000', 'gramos'),
(75, 41, 93, '14.0000', 'gramos'),
(76, 39, 94, '15.0000', 'gramos'),
(77, 40, 94, '16.0000', 'gramos'),
(78, 41, 94, '17.0000', 'gramos'),
(79, 39, 95, '18.0000', 'gramos'),
(80, 40, 95, '19.0000', 'gramos'),
(81, 41, 95, '20.0000', 'gramos'),
(82, 42, 96, '121.0000', 'asda'),
(83, 42, 97, '12.0000', 'das');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `final_cakes`
--

CREATE TABLE `final_cakes` (
  `id` int NOT NULL,
  `cake_id` int NOT NULL,
  `production_recipe_id` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `arrival_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preparation_products`
--

CREATE TABLE `preparation_products` (
  `id` int NOT NULL,
  `previous_preparation_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` decimal(10,4) NOT NULL,
  `unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `preparation_products`
--

INSERT INTO `preparation_products` (`id`, `previous_preparation_id`, `product_id`, `quantity`, `unit`) VALUES
(1, 2, 2, '112.0012', 'gramos'),
(2, 1, 1, '1231.1234', 'centimetos'),
(3, 6, 1, '12.0000', 'ds'),
(4, 7, 2, '123.0000', 'asdad'),
(5, 7, 1, '123.0000', 'dasd'),
(6, 7, 2, '123.0000', 'dsad'),
(7, 8, 1, '123.0000', 'gramos'),
(8, 8, 2, '789.0000', 'litros'),
(9, 8, 1, '987.0000', 'kilogramos'),
(10, 9, 1, '123.0000', 'das'),
(11, 9, 1, '132.0000', 'das'),
(12, 9, 1, '123.0000', 'asd'),
(13, 10, 1, '123.0000', '3'),
(14, 10, 1, '312.0000', '312'),
(15, 10, 1, '312.0000', '312'),
(16, 22, 1, '1.0000', 'dsdsdd'),
(17, 23, 2, '0.0002', 'asd'),
(18, 23, 1, '12.0000', 'sdsds'),
(19, 24, 2, '1231.0000', 'adsda'),
(20, 24, 1, '231.0000', 'adsa'),
(21, 24, 2, '1123.0000', 'fff');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `previous_preparations`
--

CREATE TABLE `previous_preparations` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(150) NOT NULL,
  `quantity_produced` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `previous_preparations`
--

INSERT INTO `previous_preparations` (`id`, `name`, `description`, `quantity_produced`) VALUES
(1, 'walker', 'holaaaaaaaaa', '1111.0000'),
(2, 'fer', 'adads', '12.0000'),
(3, 'walker', 'sds', '12312.0000'),
(4, 'asdad', 'dsd', '123.0000'),
(5, 'wala', 'dsd', '3123.0000'),
(6, 'walsss', 'dsd', '3123.0000'),
(7, 'ksks', 'ksksk', '123.0000'),
(8, 'chocolate', 'para tortas de chocolate', '100.0000'),
(9, 'aa', 'aaa', '123.0000'),
(10, 'ads', 'dasd', '312.0000'),
(11, 'asd', 'das', '213.0000'),
(12, 'dsa', 'das', '1.0000'),
(13, 'dasd', 'adsd', '1231.0000'),
(14, 'wda', 'dsad', '3123.0000'),
(15, 'dawda', 'dwa', '312312.0000'),
(20, 'dasas', 'dasd', '1231.0000'),
(21, 'aaaa', 'aaaaaa', '111111.0000'),
(22, 'asassasas', 'asasasasa', '11.0000'),
(23, 'dasd', 'dasda', '123.0000'),
(24, 'sdasd', 'dasdas', '32.0000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prodrecipe_details`
--

CREATE TABLE `prodrecipe_details` (
  `id` int NOT NULL,
  `production_recipe_id` int NOT NULL,
  `priority` enum('baja','media','alta','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `branch` int NOT NULL,
  `observations` varchar(600) NOT NULL,
  `phase` varchar(50) NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `prodrecipe_details`
--

INSERT INTO `prodrecipe_details` (`id`, `production_recipe_id`, `priority`, `branch`, `observations`, `phase`, `quantity`) VALUES
(2, 1, 'media', 1, 'asdada', 'inicio', 4),
(3, 2, 'media', 1, 'dsadas', 'inicio', 5),
(4, 3, 'media', 1, 'sdada', 'inicio', 6),
(5, 4, 'alta', 1, 'es para el presi', 'inicio', 1),
(6, 9, 'alta', 1, 'observación', 'esquema', 15),
(7, 10, 'alta', 1, 'asdas', 'terminado', 12),
(8, 11, 'alta', 1, 'esta produccion es urgente', 'terminado', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productions`
--

CREATE TABLE `productions` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `number_cakes` int DEFAULT NULL,
  `observations` varchar(800) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `productions`
--

INSERT INTO `productions` (`id`, `date`, `number_cakes`, `observations`) VALUES
(1, '2020-05-06', 0, 'chevere'),
(2, '2020-06-14', 0, 'null'),
(3, '2020-06-21', 0, 'null'),
(4, '2020-07-20', 0, 'null'),
(5, '2020-07-20', 0, 'null'),
(6, '2020-07-20', 0, 'null');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `production_recipes`
--

CREATE TABLE `production_recipes` (
  `id` int NOT NULL,
  `production_id` int NOT NULL,
  `recipe_dimension_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `production_recipes`
--

INSERT INTO `production_recipes` (`id`, `production_id`, `recipe_dimension_id`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 1, 2),
(4, 1, 5),
(5, 2, 2),
(6, 2, 4),
(7, 2, 3),
(8, 3, 2),
(9, 4, 3),
(10, 5, 2),
(11, 6, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `presentation` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `price`, `image`, `presentation`, `brand`) VALUES
(1, 'Naranja', 1, '2.10', '', 'caja', 'naranjasa'),
(2, 'Manzana', 1, '5.10', '', 'caja', 'Manzanasss'),
(3, 'Harina', 1, '10.00', NULL, 'bolsa', 'negrita'),
(4, 'Azucar', 1, '15.00', NULL, 'bolsa', 'rubia'),
(5, 'canela', 1, '12.00', NULL, 'bolsa', 'blanquita'),
(6, 'cafe', 1, '11.00', NULL, 'sobre', 'sas'),
(7, 'leche', 1, '14.00', NULL, 'tarro', 'soyvida'),
(8, 'huevos', 1, '14.00', NULL, 'asas', 'asd'),
(9, 'polvo de hornear', 1, '13.00', NULL, 'sobre', 'as'),
(10, 'levadura', 1, '12.00', NULL, 'ads', 'asd'),
(11, 'adsa', 1, '12.00', NULL, 'asda', 'asdasd'),
(12, 'asda', 1, '13.00', '', 'ads', 'asd'),
(13, 'AAS', 1, '12.00', '', 'saS', 'aSAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `person_in_charge` varchar(200) NOT NULL,
  `delivery_date` date NOT NULL,
  `provider_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `purchases`
--

INSERT INTO `purchases` (`id`, `date`, `person_in_charge`, `delivery_date`, `provider_id`) VALUES
(1, '2020-07-09', 'adsas', '2020-07-03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchase_products`
--

CREATE TABLE `purchase_products` (
  `id` int NOT NULL,
  `quantity` float NOT NULL,
  `unit` float NOT NULL,
  `observations` varchar(200) NOT NULL,
  `cost_by_unit` float NOT NULL,
  `product_id` int NOT NULL,
  `purchase_id` int NOT NULL,
  `warehouse_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `purchase_products`
--

INSERT INTO `purchase_products` (`id`, `quantity`, `unit`, `observations`, `cost_by_unit`, `product_id`, `purchase_id`, `warehouse_id`) VALUES
(1, 1, 4, 'asdas', 1231, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raws`
--

CREATE TABLE `raws` (
  `id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `equivalence_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `raws`
--

INSERT INTO `raws` (`id`, `name`, `code`, `equivalence_id`) VALUES
(1, 'crudo chocolate', 'chochoco', 1),
(2, 'crudo sublime', 'sublisubli', 1),
(3, 'crudo cafe', 'cafcaf', 2),
(4, 'crudo leche', 'milkmilk', 2),
(5, 'prueba1', 'pr1', 3),
(6, 'cryy', 'asdds', 4),
(7, 'csrr', 'asadasd', 4),
(8, 'car', 'asdas', 4),
(9, 'crudo chocolate', 'crucho', 5),
(10, 'crudo sublime', 'crusu', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raw_fillings`
--

CREATE TABLE `raw_fillings` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `raw_fillings`
--

INSERT INTO `raw_fillings` (`id`, `name`, `code`) VALUES
(1, 'chocolate', 'cocho'),
(2, 'canela', 'necala'),
(3, 'sd', 'fdfdf'),
(4, 'asadasddsa', 'asdasddsa'),
(5, 'prueba', 'asd'),
(6, 'aasd', 'asda'),
(7, 'as', 'dsss'),
(8, 'as', 'dsss'),
(9, 'ddd', 'sss'),
(10, 'yyyyyy', 'ggggggg'),
(11, 'cafe', 'cafecito'),
(12, 'sublime', 'subusu'),
(13, 'adsda', 'asdas'),
(14, 'prueba', 'pr_1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raw_products`
--

CREATE TABLE `raw_products` (
  `id` int NOT NULL,
  `raw_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `raw_products`
--

INSERT INTO `raw_products` (`id`, `raw_id`, `product_id`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 2, 5),
(4, 2, 8),
(5, 3, 6),
(6, 3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raw_recipes`
--

CREATE TABLE `raw_recipes` (
  `id` int NOT NULL,
  `recipes_quantity` decimal(10,3) NOT NULL,
  `unit` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recipes`
--

CREATE TABLE `recipes` (
  `id` int NOT NULL,
  `raw_id` int NOT NULL,
  `raw_filling_id` int NOT NULL,
  `decoration_id` int NOT NULL,
  `cooking_time` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `observations` varchar(450) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `comercial_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `recipes`
--

INSERT INTO `recipes` (`id`, `raw_id`, `raw_filling_id`, `decoration_id`, `cooking_time`, `observations`, `comercial_name`, `photo`) VALUES
(4, 1, 1, 2, NULL, NULL, 'Torta riquisima de chocolate', 'dsada'),
(5, 2, 12, 3, NULL, NULL, 'Torta de sublime', 'asdas'),
(6, 1, 5, 3, '476', 'asdasd', 'asdda', 'asdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recipe_dimensions`
--

CREATE TABLE `recipe_dimensions` (
  `recipe_dimensions_id` int NOT NULL,
  `dimension_id` int NOT NULL,
  `description` varchar(200) NOT NULL,
  `recipe_id` int NOT NULL,
  `price` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `recipe_dimensions`
--

INSERT INTO `recipe_dimensions` (`recipe_dimensions_id`, `dimension_id`, `description`, `recipe_id`, `price`) VALUES
(2, 1, 'rico rico', 5, '30.500'),
(3, 2, 'feo feo', 5, '10.500'),
(4, 1, 'maso maso', 4, '19.500'),
(5, 3, 'okioki', 4, '40.500');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recipe_product_measures`
--

CREATE TABLE `recipe_product_measures` (
  `id` int NOT NULL,
  `raw_product_id` int NOT NULL,
  `raw_recipe_id` int NOT NULL,
  `quantity` decimal(10,3) NOT NULL,
  `unit` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `sale_id` int NOT NULL,
  `stock_id` int NOT NULL,
  `date` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sales_type` varchar(30) NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `stock_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stocks`
--

CREATE TABLE `stocks` (
  `stock_id` int NOT NULL,
  `recipe_dimensions_id` int NOT NULL,
  `branch_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact_name` varchar(200) NOT NULL,
  `contact_phone` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `contact_name`, `contact_phone`) VALUES
(1, 'Abarrotes Maria', 'Calle Nueva 41', 'Maria Flores', 555555);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfers`
--

CREATE TABLE `transfers` (
  `id` int NOT NULL,
  `date` datetime NOT NULL,
  `manager` varchar(200) DEFAULT NULL,
  `branch_warehouse_origin_id` int NOT NULL,
  `branch_warehouse_destiny_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer_final_cake`
--

CREATE TABLE `transfer_final_cake` (
  `id` int NOT NULL,
  `transfer_id` int NOT NULL,
  `final_cake_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer_production_recipes`
--

CREATE TABLE `transfer_production_recipes` (
  `id` int NOT NULL,
  `transfer_id` int NOT NULL,
  `prodrecipe_details_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transfer_warehouse_products`
--

CREATE TABLE `transfer_warehouse_products` (
  `id` int NOT NULL,
  `warehouse_product_id` int NOT NULL,
  `transfer_id` int NOT NULL,
  `quantity` int NOT NULL,
  `unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transformations`
--

CREATE TABLE `transformations` (
  `id` int NOT NULL,
  `final_cake_id` int NOT NULL,
  `prodrecipe_detail_id` int NOT NULL,
  `recipe` int NOT NULL,
  `date` date NOT NULL,
  `detail` varchar(600) NOT NULL,
  `phase` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `created`, `modified`, `login`, `password`, `status`) VALUES
(1, '2020-04-07 03:47:27', '2020-04-07 03:48:18', 'Sara', 'bla', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `warehouses`
--

INSERT INTO `warehouses` (`id`, `type`) VALUES
(1, 'Frutos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `warehouse_products`
--

CREATE TABLE `warehouse_products` (
  `id` int NOT NULL,
  `branch_warehouse_id` int NOT NULL,
  `current_stock` float NOT NULL,
  `unit` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `product_id` int NOT NULL,
  `previous_stock` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alliances`
--
ALTER TABLE `alliances`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `branch_warehouses`
--
ALTER TABLE `branch_warehouses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_almacen_fk` (`warehouse_id`),
  ADD KEY `id_sucursal_fk` (`branch_id`);

--
-- Indices de la tabla `cakes`
--
ALTER TABLE `cakes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alliance_id` (`alliance_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `production_id` (`production_id`),
  ADD KEY `contracts_ibfk_4` (`branch_id`);

--
-- Indices de la tabla `contract_recipes`
--
ALTER TABLE `contract_recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_id` (`contract_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indices de la tabla `decorations`
--
ALTER TABLE `decorations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `decoration_dimensions`
--
ALTER TABLE `decoration_dimensions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `decoration_id` (`decoration_id`),
  ADD KEY `dimension_id` (`dimension_id`);

--
-- Indices de la tabla `decoration_products`
--
ALTER TABLE `decoration_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `decoration_id` (`decoration_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `decoration_product_measures`
--
ALTER TABLE `decoration_product_measures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `decoration_dimension_id` (`decoration_dimension_id`),
  ADD KEY `decoration_product_id` (`decoration_product_id`);

--
-- Indices de la tabla `dimensions`
--
ALTER TABLE `dimensions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equivalences`
--
ALTER TABLE `equivalences`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equivalence_dimensions`
--
ALTER TABLE `equivalence_dimensions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dimensiones` (`dimension_id`),
  ADD KEY `id_equivalencias` (`equivalence_id`);

--
-- Indices de la tabla `filling_dimensions`
--
ALTER TABLE `filling_dimensions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_crudo_relleno` (`raw_filling_id`),
  ADD KEY `id_dimensiones` (`dimension_id`);

--
-- Indices de la tabla `filling_products`
--
ALTER TABLE `filling_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_crudo_relleno` (`raw_filling_id`),
  ADD KEY `id_producto` (`product_id`);

--
-- Indices de la tabla `filling_product_measures`
--
ALTER TABLE `filling_product_measures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cru_re_dimen` (`filling_dimension_id`),
  ADD KEY `id_cru_re_prod` (`filling_product_id`);

--
-- Indices de la tabla `final_cakes`
--
ALTER TABLE `final_cakes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cake_id` (`cake_id`),
  ADD KEY `production_recipe_id` (`production_recipe_id`);

--
-- Indices de la tabla `preparation_products`
--
ALTER TABLE `preparation_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `previous_preparation_id` (`previous_preparation_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `previous_preparations`
--
ALTER TABLE `previous_preparations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prodrecipe_details`
--
ALTER TABLE `prodrecipe_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_recipe_id` (`production_recipe_id`),
  ADD KEY `fk_sucursal` (`branch`);

--
-- Indices de la tabla `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `production_recipes`
--
ALTER TABLE `production_recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_id` (`production_id`),
  ADD KEY `recipe_id` (`recipe_dimension_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categories` (`category_id`);

--
-- Indices de la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proveedor_fokey` (`provider_id`);

--
-- Indices de la tabla `purchase_products`
--
ALTER TABLE `purchase_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `almacen_fk` (`warehouse_id`),
  ADD KEY `id_producto_fk` (`product_id`),
  ADD KEY `id_compra_fk` (`purchase_id`);

--
-- Indices de la tabla `raws`
--
ALTER TABLE `raws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_equivalencia` (`equivalence_id`);

--
-- Indices de la tabla `raw_fillings`
--
ALTER TABLE `raw_fillings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `raw_products`
--
ALTER TABLE `raw_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_crudo` (`raw_id`),
  ADD KEY `id_producto` (`product_id`);

--
-- Indices de la tabla `raw_recipes`
--
ALTER TABLE `raw_recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_crudo` (`raw_id`),
  ADD KEY `id_cru_relleno` (`raw_filling_id`),
  ADD KEY `decoration_id` (`decoration_id`);

--
-- Indices de la tabla `recipe_dimensions`
--
ALTER TABLE `recipe_dimensions`
  ADD PRIMARY KEY (`recipe_dimensions_id`),
  ADD KEY `dimension_id` (`dimension_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indices de la tabla `recipe_product_measures`
--
ALTER TABLE `recipe_product_measures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_crudo_producto` (`raw_product_id`),
  ADD KEY `id_crudo_receta` (`raw_recipe_id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indices de la tabla `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `fk_asda` (`branch_id`),
  ADD KEY `fk_asdda` (`recipe_dimensions_id`);

--
-- Indices de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_warehouse_origin_id` (`branch_warehouse_origin_id`),
  ADD KEY `branch_warehouse_destiny_id` (`branch_warehouse_destiny_id`);

--
-- Indices de la tabla `transfer_final_cake`
--
ALTER TABLE `transfer_final_cake`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfer_id` (`transfer_id`),
  ADD KEY `final_cake_id` (`final_cake_id`);

--
-- Indices de la tabla `transfer_production_recipes`
--
ALTER TABLE `transfer_production_recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfer_id` (`transfer_id`),
  ADD KEY `prodrecipe_details_id` (`prodrecipe_details_id`);

--
-- Indices de la tabla `transfer_warehouse_products`
--
ALTER TABLE `transfer_warehouse_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_product_id` (`warehouse_product_id`),
  ADD KEY `transfer_id` (`transfer_id`);

--
-- Indices de la tabla `transformations`
--
ALTER TABLE `transformations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `final_cake_id` (`final_cake_id`),
  ADD KEY `prodrecipe_detail_id` (`prodrecipe_detail_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `warehouse_products`
--
ALTER TABLE `warehouse_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_almacen_sucursal_fk` (`branch_warehouse_id`),
  ADD KEY `id_producto_fk` (`product_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alliances`
--
ALTER TABLE `alliances`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `branch_warehouses`
--
ALTER TABLE `branch_warehouses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cakes`
--
ALTER TABLE `cakes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contract_recipes`
--
ALTER TABLE `contract_recipes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `decorations`
--
ALTER TABLE `decorations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `decoration_dimensions`
--
ALTER TABLE `decoration_dimensions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `decoration_products`
--
ALTER TABLE `decoration_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `decoration_product_measures`
--
ALTER TABLE `decoration_product_measures`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `dimensions`
--
ALTER TABLE `dimensions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `equivalences`
--
ALTER TABLE `equivalences`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `equivalence_dimensions`
--
ALTER TABLE `equivalence_dimensions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `filling_dimensions`
--
ALTER TABLE `filling_dimensions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `filling_products`
--
ALTER TABLE `filling_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `filling_product_measures`
--
ALTER TABLE `filling_product_measures`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `final_cakes`
--
ALTER TABLE `final_cakes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preparation_products`
--
ALTER TABLE `preparation_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `previous_preparations`
--
ALTER TABLE `previous_preparations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `prodrecipe_details`
--
ALTER TABLE `prodrecipe_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productions`
--
ALTER TABLE `productions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `production_recipes`
--
ALTER TABLE `production_recipes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `purchase_products`
--
ALTER TABLE `purchase_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `raws`
--
ALTER TABLE `raws`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `raw_fillings`
--
ALTER TABLE `raw_fillings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `raw_products`
--
ALTER TABLE `raw_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `raw_recipes`
--
ALTER TABLE `raw_recipes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `recipe_dimensions`
--
ALTER TABLE `recipe_dimensions`
  MODIFY `recipe_dimensions_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `recipe_product_measures`
--
ALTER TABLE `recipe_product_measures`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `stocks`
--
ALTER TABLE `stocks`
  MODIFY `stock_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transfer_final_cake`
--
ALTER TABLE `transfer_final_cake`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transfer_production_recipes`
--
ALTER TABLE `transfer_production_recipes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transfer_warehouse_products`
--
ALTER TABLE `transfer_warehouse_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transformations`
--
ALTER TABLE `transformations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `warehouse_products`
--
ALTER TABLE `warehouse_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `branch_warehouses`
--
ALTER TABLE `branch_warehouses`
  ADD CONSTRAINT `branch_warehouses_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branch_warehouses_ibfk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`alliance_id`) REFERENCES `alliances` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contracts_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contracts_ibfk_3` FOREIGN KEY (`production_id`) REFERENCES `productions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contracts_ibfk_4` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contract_recipes`
--
ALTER TABLE `contract_recipes`
  ADD CONSTRAINT `contract_recipes_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contracts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_recipes_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `decoration_dimensions`
--
ALTER TABLE `decoration_dimensions`
  ADD CONSTRAINT `decoration_dimensions_ibfk_1` FOREIGN KEY (`decoration_id`) REFERENCES `decorations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `decoration_dimensions_ibfk_2` FOREIGN KEY (`dimension_id`) REFERENCES `dimensions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `decoration_products`
--
ALTER TABLE `decoration_products`
  ADD CONSTRAINT `decoration_products_ibfk_1` FOREIGN KEY (`decoration_id`) REFERENCES `decorations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `decoration_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `decoration_product_measures`
--
ALTER TABLE `decoration_product_measures`
  ADD CONSTRAINT `decoration_product_measures_ibfk_1` FOREIGN KEY (`decoration_dimension_id`) REFERENCES `decoration_dimensions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `decoration_product_measures_ibfk_2` FOREIGN KEY (`decoration_product_id`) REFERENCES `decoration_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equivalence_dimensions`
--
ALTER TABLE `equivalence_dimensions`
  ADD CONSTRAINT `equivalence_dimensions_ibfk_1` FOREIGN KEY (`dimension_id`) REFERENCES `dimensions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equivalence_dimensions_ibfk_2` FOREIGN KEY (`equivalence_id`) REFERENCES `equivalences` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `filling_dimensions`
--
ALTER TABLE `filling_dimensions`
  ADD CONSTRAINT `filling_dimensions_ibfk_1` FOREIGN KEY (`raw_filling_id`) REFERENCES `raw_fillings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `filling_dimensions_ibfk_2` FOREIGN KEY (`dimension_id`) REFERENCES `dimensions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `filling_products`
--
ALTER TABLE `filling_products`
  ADD CONSTRAINT `filling_products_ibfk_1` FOREIGN KEY (`raw_filling_id`) REFERENCES `raw_fillings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `filling_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `filling_product_measures`
--
ALTER TABLE `filling_product_measures`
  ADD CONSTRAINT `filling_product_measures_ibfk_1` FOREIGN KEY (`filling_dimension_id`) REFERENCES `filling_dimensions` (`id`),
  ADD CONSTRAINT `filling_product_measures_ibfk_2` FOREIGN KEY (`filling_product_id`) REFERENCES `filling_products` (`id`);

--
-- Filtros para la tabla `preparation_products`
--
ALTER TABLE `preparation_products`
  ADD CONSTRAINT `preparation_products_ibfk_1` FOREIGN KEY (`previous_preparation_id`) REFERENCES `previous_preparations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preparation_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prodrecipe_details`
--
ALTER TABLE `prodrecipe_details`
  ADD CONSTRAINT `fk_pro_reci` FOREIGN KEY (`production_recipe_id`) REFERENCES `production_recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sucursal` FOREIGN KEY (`branch`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `production_recipes`
--
ALTER TABLE `production_recipes`
  ADD CONSTRAINT `fk_production` FOREIGN KEY (`production_id`) REFERENCES `productions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_recipes_dim` FOREIGN KEY (`recipe_dimension_id`) REFERENCES `recipe_dimensions` (`recipe_dimensions_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `fk_compras_proveedor` FOREIGN KEY (`provider_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `purchase_products`
--
ALTER TABLE `purchase_products`
  ADD CONSTRAINT `purchase_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_products_ibfk_2` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_products_ibfk_3` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `raws`
--
ALTER TABLE `raws`
  ADD CONSTRAINT `raws_ibfk_1` FOREIGN KEY (`equivalence_id`) REFERENCES `equivalences` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `raw_products`
--
ALTER TABLE `raw_products`
  ADD CONSTRAINT `raw_products_ibfk_1` FOREIGN KEY (`raw_id`) REFERENCES `raws` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `raw_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_2` FOREIGN KEY (`raw_id`) REFERENCES `raws` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipes_ibfk_3` FOREIGN KEY (`raw_filling_id`) REFERENCES `raw_fillings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipes_ibfk_4` FOREIGN KEY (`decoration_id`) REFERENCES `decorations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recipe_dimensions`
--
ALTER TABLE `recipe_dimensions`
  ADD CONSTRAINT `fk_dimensions` FOREIGN KEY (`dimension_id`) REFERENCES `dimensions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_recipes` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recipe_product_measures`
--
ALTER TABLE `recipe_product_measures`
  ADD CONSTRAINT `recipe_product_measures_ibfk_1` FOREIGN KEY (`raw_product_id`) REFERENCES `raw_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipe_product_measures_ibfk_2` FOREIGN KEY (`raw_recipe_id`) REFERENCES `raw_recipes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_sto_sal` FOREIGN KEY (`sale_id`) REFERENCES `stock` (`stock_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `fk_asda` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asdda` FOREIGN KEY (`recipe_dimensions_id`) REFERENCES `recipe_dimensions` (`recipe_dimensions_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_ibfk_1` FOREIGN KEY (`branch_warehouse_origin_id`) REFERENCES `branch_warehouses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transfers_ibfk_2` FOREIGN KEY (`branch_warehouse_destiny_id`) REFERENCES `branch_warehouses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `transfer_final_cake`
--
ALTER TABLE `transfer_final_cake`
  ADD CONSTRAINT `transfer_final_cake_ibfk_1` FOREIGN KEY (`transfer_id`) REFERENCES `transfers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transfer_final_cake_ibfk_2` FOREIGN KEY (`final_cake_id`) REFERENCES `final_cakes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `transfer_production_recipes`
--
ALTER TABLE `transfer_production_recipes`
  ADD CONSTRAINT `transfer_production_recipes_ibfk_1` FOREIGN KEY (`transfer_id`) REFERENCES `transfers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transfer_production_recipes_ibfk_2` FOREIGN KEY (`prodrecipe_details_id`) REFERENCES `prodrecipe_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `transfer_warehouse_products`
--
ALTER TABLE `transfer_warehouse_products`
  ADD CONSTRAINT `transfer_warehouse_products_ibfk_1` FOREIGN KEY (`transfer_id`) REFERENCES `transfers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transfer_warehouse_products_ibfk_2` FOREIGN KEY (`warehouse_product_id`) REFERENCES `warehouse_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `transformations`
--
ALTER TABLE `transformations`
  ADD CONSTRAINT `transformations_ibfk_1` FOREIGN KEY (`final_cake_id`) REFERENCES `recipe_dimensions` (`recipe_dimensions_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `transformations_ibfk_2` FOREIGN KEY (`prodrecipe_detail_id`) REFERENCES `prodrecipe_details` (`id`);

--
-- Filtros para la tabla `warehouse_products`
--
ALTER TABLE `warehouse_products`
  ADD CONSTRAINT `warehouse_products_ibfk_1` FOREIGN KEY (`branch_warehouse_id`) REFERENCES `branch_warehouses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `warehouse_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
