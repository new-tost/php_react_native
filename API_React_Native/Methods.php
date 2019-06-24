<?php


require 'Config.php';

class Methods
{
function __construct(){}
    /**
     * @param $idPost
     * @return array  
     */
    public static function getAllTovar()
    {
        $consulta = "SELECT idPost, imagePost, pricePost FROM object_item";
        try {
            $comando = BaseMysql::getInstance()->getDb()->prepare($consulta);
            $comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * @param $idPost 
     * @return mixed
     */
    public static function getByIdTovar($idPost)
    {
        $consulta = "SELECT idPost, namePost, descPost, imagePost, pricePost FROM object_item WHERE idPost = ?";

        try {
            $comando = BaseMysql::getInstance()->getDb()->prepare($consulta);
            $comando->execute(array($idPost));
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            return -1;
        }
    }

/**
     * @param $nameShop 
     * @param $priceShop    
     * @param $LastFirstName   
     * @param $Phone   
     * @return PDOStatement
     */

    public static function insert($nameShop,$priceShop,$LastFirstName,$Phone)
    {
 $comnd = "INSERT INTO shop ( " ."nameShop," ."priceShop," ."LastFirstName," . "Phone)" .
            " VALUES( ?,?,?,?)";

        $valParam= BaseMysql::getInstance()->getDb()->prepare($comnd);

        return $valParam->execute(
            array(
                $nameShop,
                $priceShop,
                $LastFirstName,
                $Phone
            )
        );

    }

    }
?>