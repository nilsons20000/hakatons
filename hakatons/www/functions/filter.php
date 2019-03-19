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
        'stipendijA' => 'macibu_iestades_papildus.stipendija = 1',
        'kopmitneE' => 'macibu_iestades_papildus.kopmitne = 1',
        'bernudarzi' => 'iestID = 1',
        'pec_bernudarza' => 'iestID = 2',
        'pec_9kl' => 'iestID = 4',
	    'pec_12kl' => 'iestID = 5',
	    'koledzi' => 'iestID = 6',
	    'tehnikumi' => 'iestID = 7',
        //Vajag pareizi aizpildit
        'pirms_izglitiba' => '',
	    'pamat_izglitiba' => '',
	    'vid_izglitiba' => '',
	    'prof_vid_izgl' => '',
	    'PecVid_izglitiba' => '',
	    'Augstaka_izglitiba' => '',
	    'PecDiploma_studija' => '',

        'matematika' => '',
	    'latv_val' => '',
	    'angl_val' => ''
    ];
    $keys = array_keys($filterArray);
    foreach ($posts['filter'] as $post ) {
        if (in_array($post,$keys)) {
            if ($queryWhere != '' and $filterArray[$post] != '') {
                    $queryWhere .= 'and ';
            }
            $queryWhere.=$filterArray[$post];
        } else {
            continue;
        }
        //TODO:Pievienot fitresanas kodu;


    }
    //Apvieno visas tabulas, lai varetu filtret varbut kaut kad tiks uztaisita labaka metode par so, bet pagaidam ta strada
    $queryDefault = '	SELECT 
		macibu_iestades.ID,macibu_iestades.registracijas_numurs,macibu_iestades.nosaukums,macibu_iestades.adrese,macibu_iestades.direktors,macibu_iestades.telefons,macibu_iestades.email
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
        LEFT JOIN macibu_iestades_papildus ON macibu_iestades.ID = macibu_iestades_papildus.iestades_ID WHERE  '.$queryWhere.' group by macibu_iestades.ID;';

    return $database->getFiltered($queryDefault);
}