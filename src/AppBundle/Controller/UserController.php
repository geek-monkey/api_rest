<?php
namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
  /**
  * @Route("/users", name="users_list")
  * @Method({"GET"})
  */
  public function getUsersAction(Request $request)
  {
    $users = $this->get('doctrine.orm.entity_manager')
    ->getRepository('AppBundle:User')
    ->findAll();

    $formatted = [];
    foreach ($users as $user)
    {
      $formatted[] = [
        'id' => $user->getId(),
        'firstname' => $user->getFirstname(),
        'lastname' => $user->getLastname(),
        'email' => $user->getEmail(),
      ];
    }
    return new JsonResponse($formatted);
  }

  /**
    * @Route("/users/{user_id}", requirements={"user_id" = "\d+"}, name="users_one")
    * @Method({"GET"})
    */
  public function getUserAction(Request $request)
  {
    $user = $this->get('doctrine.orm.entity_manager')
    ->getRepository('AppBundle:User')
    ->find($request->get('user_id'));

    if (empty($user))
    {
      return new JsonResponse(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
    }

    $formatted = [
      'id' => $user->getId(),
      'firstname' => $user->getFirstname(),
      'lastname' => $user->getLastname(),
      'email' => $user->getEmail(),
    ];
    return new JsonResponse($formatted);
  }
}
 ?>
