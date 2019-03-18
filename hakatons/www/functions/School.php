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
    protected $extra;
    protected $profesija;
    protected $izglitiba;
    protected $koordinates; //TODO:Pievienot datubazei tabulu ar koordinatem, lai es varetu no ta iegut datus pareizi

    private function __construct()
    {
        $this->extra = Database::getExtra($this->ID);
        $this->profesija = Database::getProfesijas($this->ID);
        $this->izglitiba = Database::getIestasanasTips($this->ID);
        $this->koordinates = Database::getKoordinates($this->ID);
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
        return $this->adrese;
    }

    public function getDirector() {
        return $this->direktors;
    }

    public function getPhoneNr(){
        return $this->telefons;
    }

    public function getEmail(){
        return $this->email;
    }

}