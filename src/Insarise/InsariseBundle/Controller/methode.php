 <?php
function search_for ($tab , $idC)
    {
        $taille= count($tab);
        for ($i = 0 ;$i<$taille;$i++)
        {
            //echo 'competence : '.$tab[$i]->getNomCom();
            if ($idC == $tab[$i]->getIdCom())
            {
                return 1;
            }
        }
        return 0;
    }
  
