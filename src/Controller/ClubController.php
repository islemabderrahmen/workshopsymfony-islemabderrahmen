<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    #[Route('/club', name: 'app_club')]
    public function index(): Response
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }

    #[Route('/list', name: 'list_formation')]
    public function listFormation()
    {
        $var1 = "3A32";
        $var2 = "J12";
        $formations = array(
            array('ref' => 'form147', 'Titre' => 'Formation Symfony 4', 'Description' => 'formation pratique',
                'date_debut' => '12/06/2020', 'date_fin' => '19/06/2020',
                'nb_participants' => 19),
            array('ref' => 'form177', 'Titre' => 'Formation SOA',
                'Description' => 'formation theorique', 'date_debut' => '03/12/2020', 'date_fin' => '10/12/2020',
                'nb_participants' => 0),
            array('ref' => 'form178', 'Titre' => 'Formation Angular',
                'Description' => 'formation theorique', 'date_debut' => '10/06/2020', 'date_fin' => '14/06/2020',
                'nb_participants' => 12));

        $max = max(array_column($formations, 'nb_participants'));
        $titre = Null;
        foreach ($formations as $array) {
            foreach ($array as $key => $value) {
                if ($key == "nb_participants" && ($value == $max)) {
                    $titre = $array['Titre'];
                }
            }
        }
        return $this->render("club/list.html.twig",
            array("x" => $var1,'maxTitre'=>$titre, "y" => $var2, "tabFormation" => $formations));

    }
    #[Route('/participer', name: 'formation')]

    public function reservation() : Response
    {

        return $this->render('club/detail.html.twig', [
            'controller_name' => 'ClubController',

        ]);
    }

}