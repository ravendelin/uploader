<?php

/**
 * Description of Db
 *
 * @author pavel7mikhaylov@gmail.com
 */
namespace model;
use config\AdminCfg;
class Db
{

    protected $pdo;
    protected $dbname;


    /**
     * @return mixed
     */
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * @param mixed $dbname
     */
    public function setDbname($dbname)
    {
        $this->dbname = $dbname;
    }


    function __construct($new = '')
    {
        $cfg = new AdminCfg();
        $config = $cfg->getConfig();
        $user = $config['loginbase'];
        $pass = $config['passbase'];


        if ('' == $new) {
            try {
                $this->setDbname($config['base']);
                $this->pdo = $this->connect('mysql:host=127.0.0.1;dbname=' . $this->getDbname() . ';charset=utf8', $user, $pass);
            } catch (\PDOException $Exception) {

                echo 'Подключение к базе не удалось <a href="/?action=createdb" >создать базу данных</a>';
                die();
            }
        } else {

            if (!isset($config['db'])) {
                $this->pdo = $this->connect('mysql:host=127.0.0.1;charset=utf8', $user, $pass);
                $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->setDbname($new);
                $this->createDb();
            } else {
                echo 'база уже была создана';
            }
        }
    }

    function createDb()
    {
        try {


            $this->pdo->exec("CREATE DATABASE `" . $this->getDbname() . "` CHARACTER SET utf8 COLLATE utf8_general_ci;")
            or die(print_r($this->pdo->errorInfo(), true));
            $cfg = new AdminCfg();
            $cfg->addItem('db', 1);
            $queryTable = "CREATE TABLE `" . $this->getDbname() . "`.`post` (
	        `id` INT NOT NULL AUTO_INCREMENT,
	        `title` VARCHAR(255) NOT NULL,
	        pretext TEXT NOT NULL,
	        `text` TEXT NOT NULL,
	        `images` TEXT NOT NULL,
	        category INT NOT NULL,
	        `date` DATETIME NOT NULL,
	        PRIMARY KEY (`id`)
            ) ENGINE = InnoDB";

            $queryComments = "CREATE TABLE `" . $this->getDbname() . "`.`comments` (
            cid INT NOT NULL AUTO_INCREMENT,
            post_id INT NOT NULL,
            cname VARCHAR(20) NOT NULL,
            ctext TEXT NOT NULL,
            capprov INT NOT NULL,
            cdate DATETIME NOT NULL,
            PRIMARY KEY (`cid`),
            FOREIGN KEY (post_id) REFERENCES post (id) ON UPDATE CASCADE ON DELETE CASCADE
            ) ENGINE = InnoDB";

            $queryCategory = "CREATE TABLE `" . $this->getDbname() . "`.`category` (
            catid INT NOT NULL AUTO_INCREMENT,
            catposition INT NOT NULL,
            catname VARCHAR(100) NOT NULL,
            alt_name VARCHAR(100) NOT NULL,
            PRIMARY KEY (catid)
            ) ENGINE = InnoDB";


            $this->pdo->query('use ' . $this->getDbname());
            $this->pdo->query($queryTable);
            $this->pdo->query($queryComments);
            $this->pdo->query($queryCategory);

        } catch (\PDOException $e) {
            die("DB ERROR: " . $e->getMessage());
        }
    }

    function connect($dsn, $user, $pass)
    {

        return new \PDO($dsn, $user, $pass);
    }



    function execute($query, $params = [])
    {

        $dbh = $this->pdo->prepare($query);
        $result = $dbh->execute($params);
        return $result;

    }


    function getObject($query, $params = [])
    {
        $dbh = $this->pdo->prepare($query);
        $res = $dbh->execute($params);
        $result = $dbh->fetchObject();

        if (false !== $res) {
            return $result;
        }
        return null;

    }

    function getLastNews($page = 1, $pageStart = 0, $pageEnd = 1, $numNews = 10)
    {
        $dbh = $this->pdo->prepare('SELECT * FROM post LEFT JOIN category ON category = category.catid ORDER BY post.id DESC LIMIT ' . $pageStart . ',' . $pageEnd);
        $res = $dbh->execute();
        $result = $dbh->fetchAll();

        if (false !== $res) {
            return $result;
        }
        return [];

    }

    function getAll($query, $params = [])
    {


        $dbh = $this->pdo->prepare($query);
        $res = $dbh->execute($params);
        $result = $dbh->fetchAll();

        if (false !== $res) {
            return $result;
        }
        return [];

    }


    function getAssoc($query)
    {

        $stmt = $this->pdo->prepare($query);

        $res = $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (false !== $res) {
            return $result;
        }
        return [];
    }

    public function query($sql, $params = [], $class)
    {
        $sth = $this->pdo->prepare($sql);
        $res = $sth->execute($params);
        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }

}