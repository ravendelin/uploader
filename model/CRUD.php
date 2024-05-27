<?php
/**
 * CREATE READ UPDATE DELETE class
 * User: pavel7mikhaylov@gmail.com
 * Date: 2/13/2024
 * 
 */

namespace model;


abstract class CRUD
{
    const TABLE = '';
    public function create()
    {
       
        $params = array();

        foreach ($this as $key => $value) {
            $keys .= $key . ', ';
            $parameters .= ':' . $key . ', ';
            $params[':' . $key] = $value;
        }

        $keys = substr($keys, 0, -2);
        $parameters = substr($parameters, 0, -2);
        $db = new Db();
        $createQuery = 'INSERT INTO ' . $db->getDbname() . '.' . static::TABLE . ' (' . $keys . ') VALUES (' . $parameters . ')';
        if ($db->execute($createQuery, $params)) {
            echo 'ok';
        } else {
            echo 'error';
        }
    }


    public static function read($id)
    {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $query = 'SELECT * FROM ' . static::TABLE . ' WHERE ' . static::getPrimaryKeyOf() . ' = ' . $id;
        $db = new Db();
        return $db->getObject($query);
    }

    public static function readAll()
    {
        $db = new Db();
        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            [],
            static::class
        );
    }
    /// reading with limit 
    public static function readLimit($start = 0, $count= 10 )
    {
        $start -=1;
        if ($start != 0) {
            $start = $start * $count;
        }
        $db = new Db();
        return $db->query(
            'SELECT * FROM ' . static::TABLE . ' LIMIT '.$start.','.$count,
            [],
            static::class
        );
    }

    function update($id)
    {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $keys = '';
        $params = array();
        $primaryId = $this->getPrimaryKeyOf();
        foreach ($this as $key => $value) {
            if ($key == $primaryId) {
                continue;
            } else {
                $keys .= $key . ' = ' . ':' . $key . ', ';
                $params[':' . $key] = $value;
            }
        }

        $keys = substr($keys, 0, -2);
        $db = new Db();
        $query = 'UPDATE ' . $db->getDbname() . '.' . static::TABLE . ' SET ' . $keys . ' WHERE ' . $primaryId . ' = :' . $primaryId;
        $params[':' . $primaryId] = $id;

        if ($db->execute($query, $params)) {
            echo 'ok';
        } else {
            echo 'error';
        }
    }

    static function delete($id)
    {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $query = 'DELETE FROM ' . static::TABLE . ' WHERE ' . static::getPrimaryKeyOf() . ' = ' . $id;
        $db = new Db();
        if ($db->execute($query)) {
            echo 'ok';
        } else {
            echo 'error';
        }
    }

    public function postVars()
    {
        foreach ($_POST as $key => $postVar) {
            if (is_array($postVar)) {
                $this->$key = serialize($postVar);
            } else {
                $this->$key = $postVar;
            }
        }
    }


    private static function getPrimaryKeyOf()
    {

        $db = new Db();
        $sql = 'SHOW KEYS FROM `' . static::TABLE . '`';
        $res = $db->getAssoc($sql);

        return $res['Column_name'];
    }

}