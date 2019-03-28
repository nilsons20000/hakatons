<?php
/**
 * Created by PhpStorm.
 * User: 62dnbusalovs
 * Date: 19.03.2019
 * Time: 12:37
 */

function filter($posts,$database){

    $queryWhere = '';
    $filterArray = [
        //Kamer nav daudz opcijas var pievienot ar roku.
        'iestades1' => '(iestID = 1)',
        'iestades2' => '(iestID = 2)',
        'iestades3' => '(iestID = 3)',
	    'iestades4' => '(iestID = 4)',
	    'iestades5' => '(iestID = 5)',
	    'iestades6' => '(iestID = 6)',
        'iestades7' => '(iestID = 7)',
        'izglitiba1' => '(iestID = 1)',
	    'izglitiba2' => '(iestID = 2)',
	    'izglitiba3' => '(iestID = 4)',
	    'izglitiba4' => '(iestID = 7)',
	    'izglitiba5' => '(iestID = 5)',
	    'izglitiba6' => '(iestID = 6)'

    ];
    if (!empty($posts)) {
        $filterArray += getProfesijasForFilter();
        $keys = array_keys($filterArray);
        foreach ($posts['filter'] as $post) {
            if (in_array($post, $keys)) {
                if ($queryWhere != '' and $filterArray[$post] != '') {
                    $queryWhere .= ' and ';
                }

                $queryWhere .= $filterArray[$post];
            } else {
                continue;
            }
        }
        //Meklēšana
        if ($posts['filter'][3] != '') {
            if ($queryWhere != '') {
                $queryWhere .= ' and ';
            }

            $queryWhere .= '(macibu_iestades.nosaukums like \'%' . $posts['filter'][3] . '%\')';
        }
    }

        if ($queryWhere != '') {
            $queryWhere = 'WHERE ' . $queryWhere;
        }
    //Apvieno visas tabulas, lai varetu filtret varbut kaut kad tiks uztaisita labaka metode par so, bet pagaidam ta strada
    $queryDefault = '	SELECT 
		macibu_iestades.ID,macibu_iestades.registracijas_numurs,macibu_iestades.nosaukums,macibu_iestades.adrese,macibu_iestades.direktors,macibu_iestades.telefons,macibu_iestades.email,macibu_iestades.latitude,macibu_iestades.longtitude
	FROM
		macibu_iestades
			LEFT JOIN
		(SELECT 
			izglitiba, iestades_ID,iestasanas_tips.ID as iestID
		FROM
			iestasanas_tips
		INNER JOIN izglitiba_iestades ON iestasanas_tips.ID = izglitiba_iestades.izglitibas_veids) AS izglitiba ON macibu_iestades.ID = izglitiba.iestades_ID
			LEFT JOIN
		(SELECT 
			profesijas.profesija, iestades_ID, profesijas.ID
		FROM
			izglitibas_profesijas
		LEFT JOIN profesijas ON izglitibas_profesijas.profesija = profesijas.ID) AS profesijas ON macibu_iestades.ID = profesijas.iestades_ID 
        LEFT JOIN macibu_iestades_papildus ON macibu_iestades.ID = macibu_iestades_papildus.iestades_ID '.$queryWhere.' group by macibu_iestades.ID limit 100 ORDER BY macibu_iestades.nosaukums ASC;';

    return $database->getFiltered($queryDefault);
}

    function getProfesijasForFilter() {
        $profArray = [];
        $profesijasList = Database::getProfesijasList();
        foreach ($profesijasList as $profesija) {
            $profArray += [$profesija['profesija'] => 'profesijas.profesija = \''.$profesija['profesija'].'\''];
        }
        return $profArray;
    }