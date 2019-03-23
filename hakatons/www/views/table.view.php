<?php

for ($i = 0; $i < count($schools); $i++)  {
    //TODO:Uzlabot koda lasamibu
    $id="sub_m$i";
    $id_subT="Subtable$i";
    $td_id="tdd$i";

    echo'
     <div class="row" id="list-item">
        <div class="col">
            <p>
                <h2>'.$schools[$i]->getName().'</h2>
                <h5>'. $schools[$i]->getIzglitiba().'</h5>
            </p>
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#'.$id.'-kontakti" aria-expanded="false" aria-controls="'.$id.'-kontakti">
                        Kontakti
                    </button>
                    <div class="collapse multi-collapse" id="'.$id.'-kontakti">
                        <div class="card card-body">
                            Adrese: '.$schools[$i]->getAddress().'<br>
                            Talr: '.$schools[$i]->getPhoneNr().'<br>
                            Direktors: '.$schools[$i]->getDirector().'<br>
                            Epasts: '.$schools[$i]->getEmail().'
                        </div>
                    </div>
                </div>
    ';
//    bernudarzam jabūt bez statistika
//    if(.$schools[$i]->getIzglitiba(). == '1-12 klase' or  .$schools[$i]->getIzglitiba(). =='pec 9 klases' or  .$schools[$i]->getIzglitiba(). == 'Tehnikumi' or  .$schools[$i]->getIzglitiba(). =='Koledži')
        echo'
                <div class="col-12">
                    <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#'.$id.'-statistika" aria-expanded="false" aria-controls="'.$id.'-statistika">
                        Eksamena statistika
                    </button>
                    <div class="collapse multi-collapse" id="'.$id.'-statistika">
                        <div class="card card-body">
                            <h4>Matematika</h4>
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width:75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4>Latviešu valoda</h4>
                            <div class="progress">
                                <div class="progress-bar  bg-info" role="progressbar" style="width:50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
    echo'
            </div>
            <hr>
        </div>
    </div>';
};