<?php

namespace App\Controller;

use App\Entity\Voitures;
use App\Repository\VoituresRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GlobaleController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(VoituresRepository $repo ,Request $request,PaginatorInterface $paginator  )
    {
        $allvoitures=$repo->findAll();
        $voitures=$paginator->paginate($allvoitures,
        $request->query->getInt('page',1),4
        );

        return $this->render('globale/index.html.twig', [
            'voitures'=>$voitures
        ]);
    }

    /**
     * @Route("/show/{id}", name="show")
     */
    public function show(Voitures $voiture)
    {
    
        return $this->render('globale/show.html.twig', [
            'voiture'=>$voiture
        ]);
    }
}
