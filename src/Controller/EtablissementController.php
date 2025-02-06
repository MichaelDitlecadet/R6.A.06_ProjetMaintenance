<?php

namespace App\Controller;

use App\Repository\EtablissementRepository;
use App\Entity\Etablissement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtablissementController extends AbstractController
{
    #[Route('/etablissements', name: 'app_etablissements')]
    public function index(EtablissementRepository $repo): Response
    {
        $etablissements = $repo->findAll();

        return $this->render('etablissement/index.html.twig', [
            'etablissements' => $etablissements,
        ]);
    }
    #[Route('/etablissements/{id}', name: 'app_etablissement_show')]
    public function show(Etablissement $etablissement): Response
    {
        return $this->render('etablissement/show.html.twig', [
            'etablissement' => $etablissement,
            'licencies' => $etablissement->getLicencies(),
        ]);
    }
}
