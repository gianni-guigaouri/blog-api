<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Comment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 10; $i++) {
            $article = new Article();
            $article->setTitle("titre n°$i")
                    ->setImage("http://placehold.it/350x150")
                    ->setContent("contenu de l'article n°$i")
                    ->setCreatedAt(new \ DateTime());
            
            $manager->persist($article);

            for($j = 1; $j <= mt_rand(4, 10); $j++) {
                $comment = new Comment();
                $comment->setAuthor("author $j")
                        ->setContent("content $j")
                        ->setCreatedAt(new \ DateTime())
                        ->setArticle($article);
                
                $manager->persist($comment);        
            }

            $manager->flush();
        }
    }
}
