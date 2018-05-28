/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.30-MariaDB : Database - vkvxweok_mbd_05111640000004
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`vkvxweok_mbd_05111640000004` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `vkvxweok_mbd_05111640000004`;

/*Table structure for table `detail_produk` */

DROP TABLE IF EXISTS `detail_produk`;

CREATE TABLE `detail_produk` (
  `ph_id` int(11) NOT NULL,
  `pm_id` int(11) NOT NULL,
  `dp_jumlah` int(11) DEFAULT '0',
  PRIMARY KEY (`ph_id`,`pm_id`),
  KEY `fk_relationship_3` (`pm_id`),
  CONSTRAINT `fk_relationship_2` FOREIGN KEY (`ph_id`) REFERENCES `produk_hewan` (`ph_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_relationship_3` FOREIGN KEY (`pm_id`) REFERENCES `produk_mesin` (`pm_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_produk` */

/*Table structure for table `katalog_hewan` */

DROP TABLE IF EXISTS `katalog_hewan`;

CREATE TABLE `katalog_hewan` (
  `kh_id` int(11) NOT NULL,
  `kh_hewan` varchar(100) DEFAULT NULL,
  `kh_harga` int(11) DEFAULT NULL,
  `kh_level` int(11) DEFAULT NULL,
  `kh_exp` int(11) DEFAULT NULL,
  PRIMARY KEY (`kh_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `katalog_hewan` */

insert  into `katalog_hewan`(`kh_id`,`kh_hewan`,`kh_harga`,`kh_level`,`kh_exp`) values (1,'Lele',500,1,50),(2,'Ayam',1000,1,70),(3,'Bebek',1500,2,100),(4,'Domba',2500,2,150),(5,'Kambing',3000,3,200),(6,'Sapi',5000,4,500),(7,'Unta',8000,5,1000);

/*Table structure for table `level` */

DROP TABLE IF EXISTS `level`;

CREATE TABLE `level` (
  `l_level` int(11) NOT NULL,
  `l_exp` int(11) DEFAULT NULL,
  PRIMARY KEY (`l_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `level` */

insert  into `level`(`l_level`,`l_exp`) values (1,500),(2,1000),(3,2000),(4,4000),(5,8000);

/*Table structure for table `makanan_ternak` */

DROP TABLE IF EXISTS `makanan_ternak`;

CREATE TABLE `makanan_ternak` (
  `mt_id` int(11) NOT NULL,
  `mt_nama` varchar(50) DEFAULT NULL,
  `mt_harga` int(11) DEFAULT NULL,
  `mt_level` int(11) DEFAULT NULL,
  `mt_hewan` int(11) DEFAULT NULL,
  `mt_lamamakan` int(11) DEFAULT NULL,
  PRIMARY KEY (`mt_id`),
  KEY `mt_level` (`mt_level`),
  KEY `mt_hewan` (`mt_hewan`),
  CONSTRAINT `makanan_ternak_ibfk_1` FOREIGN KEY (`mt_level`) REFERENCES `level` (`l_level`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `makanan_ternak_ibfk_2` FOREIGN KEY (`mt_hewan`) REFERENCES `katalog_hewan` (`kh_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `makanan_ternak` */

insert  into `makanan_ternak`(`mt_id`,`mt_nama`,`mt_harga`,`mt_level`,`mt_hewan`,`mt_lamamakan`) values (1,'Pelet',10,1,1,10),(2,'Jagung',30,1,2,30),(3,'Ampas Tahu',30,2,3,30),(4,'Rumput Kelas C',50,2,4,60),(5,'Rumput Kelas B',75,3,5,80),(6,'Rumput Kelas A',100,4,6,120),(7,'Rumput Kelas S',150,5,7,150);

/*Table structure for table `mesin` */

DROP TABLE IF EXISTS `mesin`;

CREATE TABLE `mesin` (
  `m_id` int(11) NOT NULL,
  `m_nama` varchar(50) DEFAULT NULL,
  `m_harga` int(11) DEFAULT NULL,
  `m_level` int(11) DEFAULT NULL,
  `m_exp` int(11) DEFAULT NULL,
  `m_status` int(11) DEFAULT '0',
  `ph_id` int(11) DEFAULT NULL,
  `m_waktuolah` int(11) DEFAULT NULL,
  PRIMARY KEY (`m_id`),
  KEY `ph_id` (`ph_id`),
  CONSTRAINT `mesin_ibfk_1` FOREIGN KEY (`ph_id`) REFERENCES `produk_hewan` (`ph_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mesin` */

insert  into `mesin`(`m_id`,`m_nama`,`m_harga`,`m_level`,`m_exp`,`m_status`,`ph_id`,`m_waktuolah`) values (1,'Pembuat Telur Asin',5000,1,500,0,2,120),(2,'Pembuat Telur Asin Bebek',6000,2,700,0,3,150),(3,'Pembuat Baju',15000,4,1500,0,4,360),(4,'Pembuat Keju',10000,3,1000,0,5,240),(5,'Pembuat Mentega',10000,5,1000,0,6,240),(6,'Pembuat Yogurt',12000,6,1200,0,7,300);

/*Table structure for table `produk_hewan` */

DROP TABLE IF EXISTS `produk_hewan`;

CREATE TABLE `produk_hewan` (
  `ph_id` int(11) NOT NULL,
  `kh_id` int(11) NOT NULL,
  `ph_produk` varchar(100) DEFAULT NULL,
  `ph_exp` int(11) DEFAULT NULL,
  `ph_harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`ph_id`),
  KEY `fk_relationship_1` (`kh_id`),
  CONSTRAINT `fk_relationship_1` FOREIGN KEY (`kh_id`) REFERENCES `katalog_hewan` (`kh_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `produk_hewan` */

insert  into `produk_hewan`(`ph_id`,`kh_id`,`ph_produk`,`ph_exp`,`ph_harga`) values (1,1,'Telur Lele',100,600),(2,2,'Telur Ayam',120,1200),(3,3,'Telur Bebek',150,1500),(4,4,'Kain Wol',300,2000),(5,5,'Susu Kambing',350,2500),(6,6,'Susu Sapi',500,3000),(7,7,'Susu Unta',700,4000);

/*Table structure for table `produk_mesin` */

DROP TABLE IF EXISTS `produk_mesin`;

CREATE TABLE `produk_mesin` (
  `pm_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `pm_produk` varchar(100) DEFAULT NULL,
  `pm_exp` int(11) DEFAULT NULL,
  `pm_harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`pm_id`),
  KEY `fk_relationship_5` (`m_id`),
  CONSTRAINT `fk_relationship_5` FOREIGN KEY (`m_id`) REFERENCES `mesin` (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `produk_mesin` */

insert  into `produk_mesin`(`pm_id`,`m_id`,`pm_produk`,`pm_exp`,`pm_harga`) values (1,1,'Telur Asin Ayam',200,1500),(2,2,'Telur Asin Bebek',250,2000),(3,4,'Keju',300,2500),(4,5,'Mentega',400,3000),(5,6,'Yogurt',600,4000),(6,3,'Baju',800,7000);

/*Table structure for table `punya_hewan` */

DROP TABLE IF EXISTS `punya_hewan`;

CREATE TABLE `punya_hewan` (
  `u_id` int(11) NOT NULL,
  `kh_id` int(11) NOT NULL,
  `ph_jumlahewan` int(11) DEFAULT '0',
  `ph_status` int(11) DEFAULT '0',
  PRIMARY KEY (`u_id`,`kh_id`),
  KEY `fk_punya_hewan2` (`kh_id`),
  CONSTRAINT `fk_punya_hewan` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_punya_hewan2` FOREIGN KEY (`kh_id`) REFERENCES `katalog_hewan` (`kh_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `punya_hewan` */

insert  into `punya_hewan`(`u_id`,`kh_id`,`ph_jumlahewan`,`ph_status`) values (18,1,5,0),(20,1,2,0),(20,2,3,0),(20,5,1,0);

/*Table structure for table `punya_makanan` */

DROP TABLE IF EXISTS `punya_makanan`;

CREATE TABLE `punya_makanan` (
  `u_id` int(11) DEFAULT NULL,
  `mt_id` int(11) DEFAULT NULL,
  `pmk_jumlah` int(11) DEFAULT NULL,
  KEY `u_id` (`u_id`),
  KEY `mt_id` (`mt_id`),
  CONSTRAINT `punya_makanan_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `punya_makanan_ibfk_2` FOREIGN KEY (`mt_id`) REFERENCES `makanan_ternak` (`mt_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `punya_makanan` */

insert  into `punya_makanan`(`u_id`,`mt_id`,`pmk_jumlah`) values (20,1,46),(20,4,4),(20,6,2),(20,2,-6);

/*Table structure for table `punya_mesin` */

DROP TABLE IF EXISTS `punya_mesin`;

CREATE TABLE `punya_mesin` (
  `u_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `pm_jumlahmesin` int(11) DEFAULT NULL,
  PRIMARY KEY (`u_id`,`m_id`),
  KEY `fk_relationship_11` (`m_id`),
  CONSTRAINT `fk_relationship_10` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`),
  CONSTRAINT `fk_relationship_11` FOREIGN KEY (`m_id`) REFERENCES `mesin` (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `punya_mesin` */

insert  into `punya_mesin`(`u_id`,`m_id`,`pm_jumlahmesin`) values (18,1,1),(18,2,1),(18,4,1),(20,1,1),(20,2,1),(20,3,1),(20,4,1);

/*Table structure for table `punya_produk_hewan` */

DROP TABLE IF EXISTS `punya_produk_hewan`;

CREATE TABLE `punya_produk_hewan` (
  `u_id` int(11) NOT NULL,
  `ph_id` int(11) NOT NULL,
  `pph_jumlah` int(11) DEFAULT '0',
  `pph_ygdijual` int(11) DEFAULT '0',
  PRIMARY KEY (`u_id`,`ph_id`),
  KEY `fk_relationship_7` (`ph_id`),
  CONSTRAINT `fk_relationship_6` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_relationship_7` FOREIGN KEY (`ph_id`) REFERENCES `produk_hewan` (`ph_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `punya_produk_hewan` */

insert  into `punya_produk_hewan`(`u_id`,`ph_id`,`pph_jumlah`,`pph_ygdijual`) values (18,1,2,0),(20,1,61,18),(20,2,-2,-8);

/*Table structure for table `punya_produk_mesin` */

DROP TABLE IF EXISTS `punya_produk_mesin`;

CREATE TABLE `punya_produk_mesin` (
  `u_id` int(11) NOT NULL,
  `pm_id` int(11) NOT NULL,
  `ppm_jumlah` int(11) DEFAULT NULL,
  `ppm_ygdijual` int(11) DEFAULT '0',
  PRIMARY KEY (`u_id`,`pm_id`),
  KEY `fk_relationship_9` (`pm_id`),
  CONSTRAINT `fk_relationship_8` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`),
  CONSTRAINT `fk_relationship_9` FOREIGN KEY (`pm_id`) REFERENCES `produk_mesin` (`pm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `punya_produk_mesin` */

insert  into `punya_produk_mesin`(`u_id`,`pm_id`,`ppm_jumlah`,`ppm_ygdijual`) values (18,1,2,0),(20,1,12,7);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_username` varchar(50) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_password` varchar(255) DEFAULT NULL,
  `u_money` int(11) NOT NULL DEFAULT '5000',
  `u_exp` int(11) DEFAULT '0',
  `l_level` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`u_id`),
  KEY `fk_relationship_12` (`l_level`),
  CONSTRAINT `fk_relationship_12` FOREIGN KEY (`l_level`) REFERENCES `level` (`l_level`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`u_id`,`u_username`,`u_name`,`u_password`,`u_money`,`u_exp`,`l_level`) values (18,'user','user','91f0dc24870a3752ff8c07a0e7eff543',18000,1200,1),(19,'dosen','superuser','e54e7968130c3483281515d83d2811f3',4000,0,1),(20,'user1','USER','4297f44b13955235245b2497399d7a93',7710,14210,5);

/* Procedure structure for procedure `sp_beliprodukhewan` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_beliprodukhewan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_beliprodukhewan`(
	p_user int, p_id int, p_user2 int, p_jumlah int, harga int
	)
BEGIN
	update punya_produk_hewan set pph_ygdijual = pph_ygdijual - p_jumlah where u_id = p_user2 and ph_id = p_id;
	IF NOT EXISTS (SELECT pph_jumlah FROM punya_produk_hewan WHERE u_id = p_user AND ph_id = p_id) THEN
		INSERT INTO punya_produk_hewan VALUES (p_user, p_id, p_jumlah, '0');
	ELSE
		UPDATE punya_produk_hewan SET pph_jumlah = pph_jumlah + p_jumlah WHERE u_id = p_user AND ph_id = p_id;
	END IF;
	update users set u_money = u_money + (p_jumlah*harga), u_exp = u_exp + (select ph_exp from produk_hewan where ph_id = p_id) where u_id = p_user2;
	update users set u_money = u_money - (p_jumlah * harga) where u_id = p_user;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_beliprodukmesin` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_beliprodukmesin` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_beliprodukmesin`(
	p_user INT, p_id INT, p_user2 INT, p_jumlah INT, harga INT
	)
BEGIN
	UPDATE punya_produk_mesin SET ppm_ygdijual = ppm_ygdijual - p_jumlah WHERE u_id = p_user2 AND pm_id = p_id;
	IF NOT EXISTS (SELECT ppm_jumlah FROM punya_produk_mesin WHERE u_id = p_user AND pm_id = p_id) THEN
		INSERT INTO punya_produk_mesin VALUES (p_user, p_id, p_jumlah, '0');
	ELSE
		UPDATE punya_produk_mesin SET ppm_jumlah = ppm_jumlah + p_jumlah WHERE u_id = p_user AND pm_id = p_id;
	END IF;
	UPDATE users SET u_money = u_money + (p_jumlah*harga), u_exp = u_exp + (SELECT pm_exp FROM produk_mesin WHERE pm_id = p_id) WHERE u_id = p_user2;
	UPDATE users SET u_money = u_money - (p_jumlah * harga) WHERE u_id = p_user;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_buyanimals` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buyanimals` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buyanimals`(
	p_user INT,
	p_item INT, 
	p_butuh INT)
BEGIN
	IF (SELECT u_money FROM users WHERE u_id=p_user) >= (SELECT kh_harga FROM katalog_hewan WHERE kh_id=p_item)*p_butuh  THEN
		IF NOT EXISTS (SELECT ph_status FROM punya_hewan WHERE kh_id=p_item AND u_id = p_user) OR (SELECT ph_status FROM punya_hewan WHERE kh_id=p_item AND u_id = p_user)=0 THEN
			IF NOT EXISTS (SELECT ph_jumlahewan FROM punya_hewan WHERE kh_id=p_item AND u_id = p_user) THEN
				INSERT INTO punya_hewan VALUES(p_user, p_item, p_butuh, '0');
				UPDATE users SET u_money = u_money - ((SELECT kh_harga FROM katalog_hewan WHERE kh_id=p_item)*p_butuh) WHERE u_id = p_user;
				UPDATE users SET u_exp = u_exp + ((SELECT kh_exp FROM katalog_hewan WHERE kh_id=p_item)*p_butuh) WHERE u_id = p_user;
				SELECT 0, "1";
			ELSE
				UPDATE punya_hewan SET ph_jumlahewan = ph_jumlahewan + p_butuh WHERE kh_id=p_item AND u_id = p_user;
				UPDATE users SET u_money = u_money - ((SELECT kh_harga FROM katalog_hewan WHERE kh_id=p_item)*p_butuh)WHERE u_id = p_user;
				UPDATE users SET u_exp = u_exp + ((SELECT kh_exp FROM katalog_hewan WHERE kh_id=p_item)*p_butuh) WHERE u_id = p_user;
				SELECT 0, "1";
			END IF;
		ELSEIF (SELECT ph_status FROM punya_hewan WHERE kh_id=p_item AND u_id = p_user)=1 THEN
			SELECT -1, "0";
		END IF;
	ELSE
		SELECT -2, "-1";
	END IF;
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_buyfoods` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buyfoods` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buyfoods`(
	p_user INT,
	p_item INT, 
	p_butuh INT)
BEGIN
	IF (SELECT u_money FROM users WHERE u_id=p_user) >= (SELECT mt_harga FROM makanan_ternak WHERE mt_id=p_item)*p_butuh  THEN
		IF NOT EXISTS (SELECT pmk_jumlah FROM punya_makanan WHERE mt_id=p_item AND u_id = p_user) THEN			
			INSERT INTO punya_makanan VALUES(p_user, p_item, p_butuh);
			UPDATE users SET u_money = u_money - ((SELECT mt_harga FROM makanan_ternak WHERE mt_id=p_item)*p_butuh) WHERE u_id = p_user;
			SELECT 0, "1";
		ELSE
			UPDATE punya_makanan SET pmk_jumlah = pmk_jumlah + p_butuh WHERE mt_id=p_item AND u_id = p_user;
			UPDATE users SET u_money = u_money - ((SELECT mt_harga FROM makanan_ternak WHERE mt_id=p_item)*p_butuh) WHERE u_id = p_user;
			SELECT 0, "1";
		END IF;
	ELSE
		SELECT -1, "-1";
	END IF;
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_buymesin` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_buymesin` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buymesin`(
	p_user INT,
	p_item INT)
BEGIN
	IF NOT EXISTS (SELECT pm_jumlahmesin FROM punya_mesin WHERE u_id = p_user AND m_id = p_item) THEN
		IF (SELECT u_money FROM users WHERE u_id=p_user) >= (SELECT m_harga FROM mesin WHERE m_id=6) THEN
			INSERT INTO punya_mesin VALUES(p_user, p_item, '1');
			UPDATE users SET u_money = u_money - (SELECT m_harga FROM mesin WHERE m_id = p_item) WHERE u_id = p_user;
			UPDATE users SET u_exp = u_exp + (SELECT m_exp FROM mesin WHERE m_id = p_item) WHERE u_id = p_user;
			SELECT 0, "1";
			
		ELSE
			SELECT -1, "0";
		END IF;
	ELSE
		SELECT -2, "0";
	END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_selectusername` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_selectusername` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_selectusername`(
p_id int)
BEGIN
	SELECT * FROM users where u_id = p_id;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_sellprodukhewan` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_sellprodukhewan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_sellprodukhewan`(
	p_user INT,
	p_item INT, 
	p_jual INT
	)
BEGIN
	UPDATE punya_produk_hewan set pph_jumlah = pph_jumlah - p_jual, pph_ygdijual = pph_ygdijual + p_jual where u_id = p_user and ph_id = p_item;	
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_sellprodukmesin` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_sellprodukmesin` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_sellprodukmesin`(
	p_user INT,
	p_item INT, 
	p_jual INT
	)
BEGIN
	UPDATE punya_produk_mesin SET ppm_jumlah = ppm_jumlah - p_jual, ppm_ygdijual = ppm_ygdijual + p_jual WHERE u_id = p_user AND pm_id = p_item;	
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_showmakanternak` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_showmakanternak` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_showmakanternak`()
BEGIN
	SELECT * FROM makanan_ternak ORDER BY mt_level;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_showmesin` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_showmesin` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_showmesin`()
BEGIN
	SELECT * FROM mesin order by m_level;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_viewkataloghewan` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_viewkataloghewan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_viewkataloghewan`()
BEGIN
	SELECT * FROM katalog_hewan ORDER BY kh_level ASC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_viewpunyahewan` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_viewpunyahewan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_viewpunyahewan`(
	p_user INT
	)
BEGIN
	SELECT kh.kh_hewan, ph.`ph_jumlahewan`, ph.`ph_status`, u.`u_name`, kh.kh_id
	FROM users u, katalog_hewan kh, punya_hewan ph
	WHERE u.`u_id` = ph.`u_id` AND ph.`kh_id` = kh.`kh_id` AND u.`u_id` = p_user;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_produksiprodukhewan` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_produksiprodukhewan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_produksiprodukhewan`(p_u_id INT,p_punyahewan_id INT, p_jumlah int)
proc:BEGIN
	/*cari nilai id makanan ternak dulu*/
	
	SELECT DISTINCT pmt.`mt_id`
	FROM punya_makanan pmt,users u,punya_hewan ph,katalog_hewan kh, makanan_ternak mt
	WHERE pmt.`u_id`=p_u_id AND pmt.`mt_id`= mt.`mt_id` AND mt.`mt_hewan`=kh.`kh_id` AND kh.`kh_id`= ph.`kh_id` AND ph.`kh_id`= p_punyahewan_id
	INTO @p_mt_id; 
	
	IF (SELECT DISTINCT pmt.`pmk_jumlah`
	FROM punya_makanan pmt,users u,punya_hewan ph,katalog_hewan kh, makanan_ternak mt
	WHERE pmt.`u_id`=20 AND pmt.`mt_id`= mt.`mt_id` AND mt.`mt_hewan`=kh.`kh_id` AND kh.`kh_id`= ph.`kh_id` AND ph.`kh_id`= 1) < p_jumlah THEN
		SELECT -1, "0";
		leave proc;
	end if;
	
	SELECT IF( EXISTS(
		SELECT *
		FROM punya_makanan pmt,users u,punya_hewan ph,katalog_hewan kh, makanan_ternak mt
		WHERE pmt.`u_id`=p_u_id AND pmt.`mt_id`= mt.`mt_id` AND mt.`mt_hewan`=kh.`kh_id` AND kh.`kh_id`= ph.`kh_id` AND ph.`kh_id`= p_punyahewan_id),1,0)
        INTO @status;
	
        IF (@status = 0) THEN
		SELECT 0, 'Tidak bisa memberi makan' AS fail;
		LEAVE proc;
	END IF;
	
	/*udah dapet idnya baru makanan ternaknya dikurangi*/
	UPDATE punya_makanan SET `pmk_jumlah`=`pmk_jumlah` - p_jumlah
	WHERE `u_id`=p_u_id AND `mt_id`= @p_mt_id;
	
	/*cari waktu lama makannya*/
	SELECT DISTINCT mt.mt_lamamakan 
	FROM makanan_ternak mt,users u,punya_makanan pmt
	WHERE pmt.mt_id=@p_mt_id AND pmt.`mt_id`=mt.`mt_id` AND p_u_id=u.u_id
	INTO @waktu;
	
	/*cari itu produk hewan apa*/
	SELECT DISTINCT prh.ph_id
	FROM produk_hewan prh, punya_hewan ph
	WHERE ph.`kh_id`= p_punyahewan_id AND prh.`kh_id`=ph.`kh_id`
	INTO @produkhewan;
	
	/*cek apa data produk hewannya sebelumnya udah ada atau belum*/
	SELECT IF( EXISTS(
             SELECT *
             FROM punya_produk_hewan
             WHERE u_id= p_u_id AND ph_id= @produkhewan), 1, 0)
        INTO @status_adanya_data;
             
         /*tambahkan interval waktu*/
        
        
      SELECT DATE_ADD(NOW(), INTERVAL @waktu SECOND)
        INTO @done; 
	IF (NOW() <= @done) THEN
		/*kalau udah ada produknya*/
		IF (@status_adanya_data = 1 ) THEN
				UPDATE punya_produk_hewan SET pph_jumlah = pph_jumlah + p_jumlah
				WHERE p_u_id = u_id;
				
		/*kalau gak ada*/
		ELSE
				INSERT INTO punya_produk_hewan(u_id,ph_id,pph_jumlah,pph_ygdijual) VALUES (p_u_id,@produkhewan,1,1);
				
		END IF;
	END IF;
	
	SELECT 1, 'Bisa';
	
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_produksiprodukmesin` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_produksiprodukmesin` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_produksiprodukmesin`(p_u_id INT,p_punyamesin_id INT)
proc:BEGIN
	/*cari nilai id produk hewan dulu*/
	
	SELECT DISTINCT pph.`ph_id`
	FROM punya_mesin pm,users u,punya_produk_hewan pph,mesin m, produk_hewan ph
	WHERE pph.`u_id`=p_u_id AND pph.`ph_id`=ph.`ph_id` AND ph.`ph_id`=m.`ph_id` AND m.`m_id`= pm.`m_id` AND pm.`m_id`=p_punyamesin_id
	INTO @p_ph_id;
	
	SELECT IF( EXISTS(
		SELECT *
		FROM punya_mesin pm,users u,punya_produk_hewan pph,mesin m, produk_hewan ph
		WHERE pph.`u_id`=p_u_id AND pph.`ph_id`=ph.`ph_id` AND ph.`ph_id`=m.`ph_id` AND m.`m_id`= pm.`m_id` AND pm.`m_id`=p_punyamesin_id),1,0)
        INTO @status;
	
        IF (@status = 0) THEN
		SELECT 0, 'Tidak bisa mengolah produk hewan' AS fail;
		LEAVE proc;
	END IF;
	
	/*udah dapet idnya baru produk hewannya dikurangi*/
	if (select pph_jumlah from punya_produk_hewan where u_id = p_u_id and ph_id = @p_ph_id) <=0 then
		SELECT 0, 'Tidak bisa mengolah produk hewan' AS fail;
		LEAVE proc;
	END IF;
	UPDATE punya_produk_hewan SET `pph_jumlah`=`pph_jumlah` - 1 , pph_ygdijual = pph_ygdijual - 1
	WHERE `u_id`=p_u_id AND `ph_id`= @p_ph_id;
	
	/*cari waktu lama makannya*/
	SELECT DISTINCT m.m_waktuolah 
	FROM users u,mesin m, punya_mesin pm
	WHERE p_u_id = u.u_id AND pm.m_id=p_punyamesin_id AND pm.m_id = m.m_id
	INTO @waktu;
	
	/*cari itu produk mesin apa*/
	SELECT DISTINCT prm.pm_id
	FROM produk_mesin prm, punya_mesin pm, mesin m
	WHERE pm.m_id = p_punyamesin_id AND pm.m_id = m.m_id AND prm.m_id=m.m_id
	INTO @produkmesin;
	
	/*cek apa data produk hewannya sebelumnya udah ada atau belum*/
	SELECT IF( EXISTS(
             SELECT *
             FROM punya_produk_mesin
             WHERE u_id= p_u_id AND pm_id= @produkmesin), 1, 0)
        INTO @status_adanya_data;
             
         /*tambahkan interval waktu*/
        
        
      SELECT DATE_ADD(NOW(), INTERVAL @waktu SECOND)
        INTO @done; 
	IF (NOW() <= @done) THEN
		/*kalau udah ada produknya*/
		IF (@status_adanya_data = 1 ) THEN
				UPDATE punya_produk_mesin SET ppm_jumlah = ppm_jumlah + 1, ppm_ygdijual = ppm_ygdijual + 1
				WHERE p_u_id = u_id;
				
		/*kalau gak ada*/
		ELSE
				INSERT INTO punya_produk_mesin(u_id,pm_id,ppm_jumlah,ppm_ygdijual) VALUES (p_u_id,@produkmesin,1,1);
				
		END IF;
	END IF;
	select 1, "bisa";
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_viewpunyamakanan` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_viewpunyamakanan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_viewpunyamakanan`(
	p_user INT
	)
BEGIN
	SELECT mt.mt_nama, pmk.pmk_jumlah
	FROM users u, punya_makanan pmk, makanan_ternak mt
	WHERE u.`u_id` = pmk.`u_id` AND pmk.`mt_id` = mt.`mt_id` AND u.`u_id` = p_user;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_viewpunyamesin` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_viewpunyamesin` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_viewpunyamesin`(
	p_user INT
	)
BEGIN
	SELECT m.m_nama, m.m_status, m.m_id
	FROM users u, mesin m, punya_mesin pm
	WHERE u.`u_id` = pm.`u_id` AND pm.`m_id` = m.`m_id` AND u.`u_id` = p_user;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_viewpunyaprodukhewan` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_viewpunyaprodukhewan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_viewpunyaprodukhewan`(
	p_user INT
	)
BEGIN
	SELECT *
	FROM users u, produk_hewan ph, punya_produk_hewan pph
	WHERE u.`u_id` = pph.`u_id` AND pph.`ph_id` = ph.`ph_id` AND u.`u_id` = p_user;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_viewpunyaprodukhewanmarket` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_viewpunyaprodukhewanmarket` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_viewpunyaprodukhewanmarket`(
	)
BEGIN
	SELECT *
	FROM users u, produk_hewan ph, punya_produk_hewan pph
	WHERE u.`u_id` = pph.`u_id` AND pph.`ph_id` = ph.`ph_id` AND pph.pph_ygdijual != '0';
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_viewpunyaprodukmesin` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_viewpunyaprodukmesin` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_viewpunyaprodukmesin`(
	p_user INT
	)
BEGIN
	SELECT *
	FROM users u, produk_mesin ppm, punya_produk_mesin ppmm
	WHERE u.`u_id` = ppmm.`u_id` AND ppm.`pm_id` = ppmm.`pm_id` AND u.`u_id` = p_user;
END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_viewpunyaprodukmesinmarket` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_viewpunyaprodukmesinmarket` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_viewpunyaprodukmesinmarket`(
	)
BEGIN
	SELECT *
	FROM users u, produk_mesin ppm, punya_produk_mesin ppmm
	WHERE u.`u_id` = ppmm.`u_id` AND ppm.`pm_id` = ppmm.`pm_id` AND ppmm.ppm_ygdijual != '0';
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
