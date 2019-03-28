<?php
/**
 * Created by PhpStorm.
 * User: sloppynick3
 * Date: 3/15/2019
 * Time: 11:41 PM
 */

class Database
{

    public static function &conn() {
  $server = 'localhost';$dbName = 'macibu_iestades_latvija';$user = 'root';$pass = '';
        $conn = NULL;
        if ($conn == NULL) {
            try {
                $conn = new PDO('mysql:host=' . $server . ';dbname=' . $dbName, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'PDO Error: ' . $e->getMessage();
            }
        }
        return $conn;
    }

    public static function getIestasanasTips($id) {
        $stm = self::conn()->prepare('Select iestasanas_tips.izglitiba from iestasanas_tips inner join izglitiba_iestades on iestasanas_tips.ID = izglitiba_iestades.izglitibas_veids WHERE izglitiba_iestades.iestades_ID = :id;');
        $stm->execute(array(':id' => $id));
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getProfesijas($id) {
        $stm = self::conn()->prepare('Select profesijas.profesija from izglitibas_profesijas left join profesijas on izglitibas_profesijas.profesija = profesijas.ID WHERE izglitibas_profesijas.iestades_ID = :id');
        $stm->execute(array(':id' => $id));
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getProfesijasList() {
        $stm = self::conn()->prepare('Select profesija from profesijas');
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getExtra($school) {
        $stm = self::conn()->prepare('Select * from macibu_iestades_papildus WHERE iestades_ID = :school');
        $stm->execute(array(':school'=> $school));
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    //
    public function getSchools(){
        require 'School.php';
        $stm = self::conn()->prepare('Select ID,nosaukums,registracijas_numurs,adrese,direktors,telefons,email,latitude ,longtitude from macibu_iestades limit 100 ORDER BY nosaukums ASC');
        $stm->execute();
        #die(var_dump($stm->fetchAll(PDO::FETCH_ASSOC)));
        return $stm->fetchAll(PDO::FETCH_CLASS,'School');
    }

    public function getFiltered($query) {
        require_once 'School.php';
        $stm = self::conn()->prepare($query);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_CLASS,'School');
    }

    public function printIestades() {
        $stm = self::conn()->prepare('Select * from iestasanas_tips');
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
                echo '<option name="filter[]" value="iestades'.$row['ID'].'">'.$row['izglitiba'].'</option>';
        }
    }
    public function printProfesijas(){
        $stm = self::conn()->prepare('Select * from profesijas');
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            echo '<option name="filter[]" value="'.$row['profesija'].'">'.$row['profesija'].'</option>';
        }
    }
}