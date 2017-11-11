<?php
namespace ContentBundle\Util;

use ContentBundle\Entity\Article;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\EntityManager;

/**
 * Article management
 *
 * [CREATE, UPDATE, GET, DELETE]
 */
class ArticleManager
{
    private $em;
    private $slugify;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->slugify = new Slugify();
    }

    /**
     * Create an article in database
     * @param  String $name
     * @param  String $cover       file path
     * @param  String $text
     * @param  Integer $category_id
     * @return void
     */
    public function create(
        $name,
        $cover,
        $text,
        $category_id
    ) {
        // DONE Make the creation method
        //       Create an article using the entity manager
        
        $article = new Article();
        $article->setName($name);
        $article->setCover($cover)
        $article->setText($text);
        $article->setCategoryId($categoryId);
        $article->setSlug($this->slugify->slugify($name));
        
        $this->em->persist($article);
        $this->em->flush();
        
    }

    public function update($article)
    {
        $this->em->flush();
    }

    /**
     * Get an article from database
     * @param  Integer $id
     * @return Article|Article[]
     */
    public function get($id = NULL)
    {
        // DONE Make the get method
        //       Find an article from ID or if no ID find all articles, then return
        
        if($id == null){
            $article = $this->em->findAll();
        }
        else {
           $article = $this->em->findById($productId); 
        }
        
        return $article; 
    }

    /**
     * Get an article and delete it
     * @param  Integer $id
     * @return void
     */
    public function delete($id)
    {
        // DONE Make the delete method
        //       Find the article and delete it
       
        $article = $this->em->findOneById($id); 
        $this->em->remove($article);
        $this->em->flush();
        
    }
}
