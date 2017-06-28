<?php
namespace AppBundle\Repository;

use AppBundle\Entity\Post;
use Doctrine\ORM\EntityRepository;

/**
 * Class PostRepository
 * @package AppBundle\Repository
 */
class PostRepository extends  EntityRepository
{
    public function findByNewestPosts()
    {
        return $this->createQueryBuilder('post')
                    ->andWhere('post.status = :active')
                    ->setParameter('active', true)
                    ->orderBy('post.createdAt', 'DESC');
    }

    public function findByTags()
    {
        return $this->createQueryBuilder('post')
                    ->andwhere('post.tag = : tag')
                    ->setParameter('tag', );
    }

}