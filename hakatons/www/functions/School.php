<?php
/**
 * Created by PhpStorm.
 * User: sloppynick3
 * Date: 3/15/2019
 * Time: 11:42 PM
 */

class School
{
    protected $ID,$nosaukums,$registracijas_numurs,$adrese,$direktors,$telefons,$email;
    protected $profesija;
    protected $izglitiba;
    public $longtitude,$latitude;

    private function __construct()
    {
        $this->profesija = Database::getProfesijas($this->ID);
        $this->izglitiba = Database::getIestasanasTips($this->ID);
    }

    public function getID() {
        return $this->ID;
    }

    public function getName(){
        return $this->nosaukums;
    }

    public function getRegistrationNr() {
        return $this->registracijas_numurs;
    }
    public function getAddress() {
        return mb_convert_case($this->adrese,MB_CASE_UPPER_SIMPLE);
    }

    public function getDirector() {
        return mb_convert_case($this->direktors,MB_CASE_TITLE_SIMPLE);
    }

    public function getPhoneNr(){
        return $this->telefons;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getIzglitiba() {
        if ($this->izglitiba == 0) {
            return 'NULL';
        } else {
            $izglString = '';
            $i = 0;
            foreach ($this->izglitiba as $izgl) {
                if ($i > 0) {
                    $izglString .= ', ';
                    $izglString .= mb_convert_case($izgl['izglitiba'],MB_CASE_LOWER);
                } else {
                    $izglString .= mb_convert_case($izgl['izglitiba'],MB_CASE_TITLE_SIMPLE);
                }


                $i++;
            }

            return $izglString;
        }
    }

    public function getLongtitude(){
        return $this->longtitude;
    }
    public function getLatitude(){
        return $this->latitude;
    }

}