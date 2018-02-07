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

      $places = $this->get('doctrine.orm.entity_manager')
      ->getRepository('AppBundle:Place')
      ->findAll();

      $formatted = [];
      foreach ($places as $place)
      {
        $formatted[] = [
          'id' => $place->getId(),
          'name' => $place->getName(),
          'address' => $place->getAddress(),
        ];
      }
      return new JsonResponse($formatted);
    }

}

 ?>
