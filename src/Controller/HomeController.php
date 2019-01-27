<?php
 namespace App\Controller;

 use App\Entity\Video;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\HttpKernel\Tests\Controller;
 use Twig\Environment;

 class HomeController {

     public function template()
     {
         return $this->render('base.html.twig');
     }

     /**
      * @Route("/video", name="video")
      */
     public function index()
     {
         $repo = $this->getDoctrine()->getRepository(Video::class);
         $videos = $repo->findAll();
        return $this->render('pages/accueil.html.twig',[
            'controller_name' => 'HomeController',
            'videos' => $videos
        ]);
     }

     /**
      * @Route("/video/{id}", name="video_unique")
      */
     public function video($id){
         $repo = $this->getDoctrine()->getRepository(Video::class);
         $video = $repo->find($id);

         return $this->render('pages/video.html.twig', [
             $video
         ]);
     }
 }
?>