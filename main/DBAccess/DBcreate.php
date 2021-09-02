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

    function CreateDB($config){

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
            $sql = new ReadFileAgent();
            if ($check->connect_error) {
                return false;
            }else{
                $db->multi_query(
                    $sql->GetContentAsText($config["ConfigDirectory"] . "charlet.sql") . 
                    "
                    INSERT INTO `domain` (`id`, `name`, `description`, `grouplist`) VALUES
                    (1, 'すべて', '全てのツイートを対象とする', 'all');
                    INSERT INTO `account`(`id`, `name`, `mail`, `password`, `authority`, `option`) VALUES 
                    (1,'".$us_name."','".$us_mail."','".$us_pass."',' DOMAIN_EDIT','');
                    COMMIT;"
                );
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