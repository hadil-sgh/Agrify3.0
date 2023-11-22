<?php

namespace App\Repository;

use App\Entity\AnimalBatch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AnimalBatch>
 *
 * @method AnimalBatch|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimalBatch|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimalBatch[]    findAll()
 * @method AnimalBatch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimalBatchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimalBatch::class);
    }

    /**
     * @return AnimalBatch[] Returns an array of AnimalBatch objects
     */
    public function findByExampleField($field, $value): array
    {
        $result = $this->createQueryBuilder('a')
            ->andWhere("a.{$field} = :val")
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    
        // Return the result in JSON format
        return new JsonResponse($result);
    }
    

//    public function findOneBySomeField($value): ?AnimalBatch
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
