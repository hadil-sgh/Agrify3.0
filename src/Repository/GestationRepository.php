<?php

namespace App\Repository;

use App\Entity\Gestation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Gestation>
 *
 * @method Gestation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gestation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gestation[]    findAll()
 * @method Gestation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GestationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gestation::class);
    }
    /**
     * @return Gestation[] Returns an array of Gestation objects
     */
    public function findByExampleField($field, $value): array
    {
        return $this->createQueryBuilder('ab')
            ->andWhere("ab.{$field} = :val")
            ->setParameter('val', $value)
            ->orderBy('ab.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }    

//    public function findOneBySomeField($value): ?Gestation
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
