<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Post::class);
    }
	
	//#############################   Set  what we want query from base ######################################
	public function findAllValues()
    {
        $query=$this->createQueryBuilder('p')
            ->select("p.name,  DATE_FORMAT(p.date,'%m-%d-%y') AS date, p.id, p.autor, p.data, p.dates1,p.data_summary")
			->orderBy('p.date', 'ASC')
            ->getQuery();
            //->getResult()
         return $query->execute();
    }
	
	//#############################   Set  what we want query from base ######################################
//#############################   find by one  ######################################
    public function findOneValue($value)
    {
        $query=$this->createQueryBuilder('p')
            ->select("p.name,  DATE_FORMAT(p.date,'%m-%d-%y') AS date, p.id, p.autor, p.data, p.dates1,p.data_summary")
            ->where("p.id=$value")
            ->orderBy('p.date', 'ASC')
            ->getQuery();
        //->getResult()
        return $query->execute();
    }

    //#############################   Set  what we want query from base ######################################
	
	
	

    // /**
    //  * @return Post[] Returns an array of Post objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Post
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
