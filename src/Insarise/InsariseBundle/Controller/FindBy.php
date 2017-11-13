<?php 
function findBy($em,$id, $statut)
{

  $query = $em->createQuery('SELECT p FROM Projet p WHERE p.idCandProj = :id AND p.statutProj = :statut');
  $query->setParameter('id', $id);
  $query->setParameter('statut', $statut);
  $results = $query->getResult();

  return $results;
}
?>