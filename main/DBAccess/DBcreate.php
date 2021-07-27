<?php
    function DBcreate_ConnectCheck($post){
        $host = $post["host"];
        $user = $post["user"];
        $pass = $post["pass"];
        $check = new mysqli($host,$user,$pass);

        if ($check->connect_error) {
            return false;
        }else{
            $check->close();
            return true;
        }
    }

    function CreateDB(){

        $host = SessionGet("SETUP_DB_HOST");
        $user = SessionGet("SETUP_DB_ACCOUNT");
        $pass = SessionGet("SETUP_DB_PASSWORD");
        $check = new mysqli($host,$user,$pass);

        $us_name = mysqli_real_escape_string($check,SessionGet("SETUP_RA_NAME"));
        $us_mail = mysqli_real_escape_string($check,SessionGet("SETUP_RA_MAIL"));
        $us_pass = mysqli_real_escape_string($check,md5(SessionGet("SETUP_RA_PASSWORD")));

        if ($check->connect_error) {
            return false;
        }else{
            $check->Query("CREATE DATABASE charlet");
            $check->close();

            $db = new mysqli($host,$user,$pass,"charlet");
            if ($check->connect_error) {
                return false;
            }else{
                $db->multi_query("
                -- phpMyAdmin SQL Dump
                -- version 4.8.3
                -- https://www.phpmyadmin.net/
                --
                -- Host: localhost:3306
                -- Generation Time: 
                -- サーバのバージョン： 5.7.24
                -- PHP Version: 7.2.14
                
                SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
                SET AUTOCOMMIT = 0;
                START TRANSACTION;
                SET time_zone = \"+00:00\";
                
                
                /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
                /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
                /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
                /*!40101 SET NAMES utf8mb4 */;
                
                --
                -- Database: `charlet_popo`
                --
                
                -- --------------------------------------------------------
                
                --
                -- テーブルの構造 `account`
                --
                
                CREATE TABLE `account` (
                  `id` int(11) NOT NULL,
                  `name` char(80) NOT NULL,
                  `mail` char(120) NOT NULL,
                  `password` varchar(2048) NOT NULL,
                  `timeline` char(120) NOT NULL,
                  `authority` char(80) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                
                INSERT INTO `account`(`id`, `name`, `mail`, `password`, `authority`) VALUES 
                (1,'".$us_name."','".$us_mail."','".$us_pass."',' DOMAIN_EDIT');

                -- --------------------------------------------------------
                
                --
                -- テーブルの構造 `domain`
                --
                
                CREATE TABLE `domain` (
                  `id` int(11) NOT NULL,
                  `name` char(80) NOT NULL,
                  `description` char(200) NOT NULL,
                  `grouplist` varchar(500) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                
                --
                -- テーブルのデータのダンプ `domain`
                --
    
                INSERT INTO `domain` (`id`, `name`, `description`, `grouplist`) VALUES
                (1, 'すべて', '全てのツイートを対象とする', 'all');
    
                -- --------------------------------------------------------
                
                --
                -- テーブルの構造 `group`
                --
                
                CREATE TABLE `group` (
                  `id` int(11) NOT NULL,
                  `name` char(80) NOT NULL,
                  `description` char(200) NOT NULL,
                  `hashtaglist` varchar(300) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                
                -- --------------------------------------------------------
    
                --
                -- テーブルの構造 `hashtag`
                --
                
                CREATE TABLE `hashtag` (
                  `id` int(11) NOT NULL,
                  `name` char(80) NOT NULL,
                  `parentgroup` varchar(500) NOT NULL DEFAULT ''
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                
                -- --------------------------------------------------------
                
                --
                -- テーブルの構造 `timeline`
                --
                
                CREATE TABLE `timeline` (
                  `id` int(11) NOT NULL,
                  `accesser` char(120) NOT NULL,
                  `name` char(80) NOT NULL,
                  `description` char(200) NOT NULL,
                  `userlist` varchar(2048) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                
                -- --------------------------------------------------------
                
                --
                -- テーブルの構造 `tweet`
                --
                
                CREATE TABLE `tweet` (
                  `id` int(11) NOT NULL,
                  `tweet` char(240) NOT NULL,
                  `poster` int(11) NOT NULL,
                  `time` char(20) NOT NULL,
                  `type` char(12) NOT NULL DEFAULT '',
                  `favorite` int(6) NOT NULL DEFAULT '0',
                  `retweet` int(6) NOT NULL DEFAULT '0',
                  `reply` int(11) NOT NULL DEFAULT '0'
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                
                --
                -- Indexes for dumped tables
                --
                
                --
                -- Indexes for table `account`
                --
                ALTER TABLE `account`
                  ADD PRIMARY KEY (`id`);
                
                --
                -- Indexes for table `domain`
                --
                ALTER TABLE `domain`
                  ADD PRIMARY KEY (`id`);
                
                --
                -- Indexes for table `group`
                --
                ALTER TABLE `group`
                  ADD PRIMARY KEY (`id`);
                
                --
                -- Indexes for table `hashtag`
                --
                ALTER TABLE `hashtag`
                  ADD PRIMARY KEY (`id`);
                
                --
                -- Indexes for table `timeline`
                --
                ALTER TABLE `timeline`
                  ADD PRIMARY KEY (`id`);
                
                --
                -- Indexes for table `tweet`
                --
                ALTER TABLE `tweet`
                  ADD PRIMARY KEY (`id`);
                
                --
                -- AUTO_INCREMENT for dumped tables
                --
                
                --
                -- AUTO_INCREMENT for table `account`
                --
                ALTER TABLE `account`
                  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
                
                --
                -- AUTO_INCREMENT for table `domain`
                --
                ALTER TABLE `domain`
                  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
                
                --
                -- AUTO_INCREMENT for table `group`
                --
                ALTER TABLE `group`
                  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
                
                --
                -- AUTO_INCREMENT for table `hashtag`
                --
                ALTER TABLE `hashtag`
                  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
                
                --
                -- AUTO_INCREMENT for table `timeline`
                --
                ALTER TABLE `timeline`
                  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
                
                --
                -- AUTO_INCREMENT for table `tweet`
                --
                ALTER TABLE `tweet`
                  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
                COMMIT;
                
                /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
                /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
                /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
                
                ");
                $db->close();

                $fp = fopen(ROOT_DIRECTORY . "config/db_resource.txt","a");

                fwrite($fp,"DB_HOST,".$host.",\r\n");
                fwrite($fp,"DB_USER,".$user.",\r\n");
                fwrite($fp,"DB_PASS,".$pass.",\r\n");
                fwrite($fp,"DB_NAME,"."charlet".",\r\n");

                fclose($fp);

                return true;
      
            }
      }
    }
?>