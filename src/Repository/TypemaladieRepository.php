<?php

namespace App\Repository;

use App\Entity\Typemaladie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Typemaladie>
 *
 * @method Typemaladie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typemaladie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typemaladie[]    findAll()
 * @method Typemaladie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypemaladieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typemaladie::class);
    }

//    /**
//     * @return Typemaladie[] Returns an array of Typemaladie objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Typemaladie
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
