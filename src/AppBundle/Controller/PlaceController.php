<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Place;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PlaceController extends Controller
{
  /**
     * @Route("/places", name="places_list")
     * @Method({"GET"})
     */
    public function getPlacesAction(Request $request)
    {
      return new JsonResponse([
        new Place("Tour Eiffel", "78 Rue Mendès France, paris "),
        new Place("Mont-Saint-Michel", "50170 Le Mont-Saint-Michel"),
        new Place("Château de Versailles", "Place d'Armes, 78000 Versailles"),
      ]);
    }

}

 ?>
