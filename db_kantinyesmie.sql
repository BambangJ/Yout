/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - db_kantinyesmie
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_kantinyesmie` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_kantinyesmie`;

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `idcart` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(100) NOT NULL,
  `kode_menu` varchar(100) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`idcart`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;

/*Data for the table `cart` */

/*Table structure for table `inv` */

DROP TABLE IF EXISTS `inv`;

CREATE TABLE `inv` (
  `invid` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(100) NOT NULL,
  `tgl_inv` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pembayaran` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`invid`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

/*Data for the table `inv` */

insert  into `inv`(`invid`,`invoice`,`tgl_inv`,`pembayaran`,`kembalian`,`status`) values 
(46,'AD3072394601','2023-07-30 09:46:09',5000,2500,'selesai'),
(47,'AD3072394947','2023-07-30 09:49:38',5000,2500,'selesai'),
(48,'AD30723211550','2023-07-30 21:15:29',50000,47500,'selesai'),
(49,'AD30723225550','2023-07-30 22:55:43',50000,35000,'selesai');

/*Table structure for table `laporan` */

DROP TABLE IF EXISTS `laporan`;

CREATE TABLE `laporan` (
  `idlaporan` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(100) NOT NULL,
  `kode_menu` varchar(100) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`idlaporan`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

/*Data for the table `laporan` */

insert  into `laporan`(`idlaporan`,`invoice`,`kode_menu`,`nama_menu`,`harga`,`harga_modal`,`qty`,`subtotal`) values 
(46,'AD3072394601','Cireng','Cireng Isi',2500,2000,1,2500),
(47,'AD3072394947','Cireng','Cireng Isi',2500,2000,1,2500),
(48,'AD30723211550','Cireng','Cireng Isi',2500,2000,1,2500),
(49,'AD30723225550','CIRENG001','Cireng Isi',2500,2000,2,5000),
(50,'AD30723225550','BASO001','Baso',5000,3500,2,10000);

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `toko` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `login` */

insert  into `login`(`userid`,`username`,`password`,`toko`,`alamat`,`telepon`,`logo`) values 
(1,'admin','$2y$10$iCsRopXtlyYc5Qvk.bQF8eCCUXAhwExf7Nma4T4TPJg47SAR6/usu','Kasir Yesmie!','cimahi','0812344567','Kantin.png');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `kode_menu` varchar(100) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idmenu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `menu` */

insert  into `menu`(`idmenu`,`kode_menu`,`nama_menu`,`harga_modal`,`harga_jual`,`tgl_input`) values 
(5,'CIRENG001','Cireng Isi',2000,2500,'2023-07-30 22:54:28'),
(6,'BASO001','Baso',3500,5000,'2023-07-30 22:54:19');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
