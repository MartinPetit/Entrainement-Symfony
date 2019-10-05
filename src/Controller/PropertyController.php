<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;

class PropertyController extends AbstractController {

	/**
	*@var PropertyRepository
	*/
	private $repository;

	/**
	*@var ObjectManager
	*/
	private $em;


	
	public function __construct(PropertyRepository $repository, ObjectManager $em) 
	{
		$this->repository = $repository;
		$this->em = $em;
	}



	/**
	* @Route("/Biens", name = "property.index")
	* @return Response
	*/
	
	public function index() : Response
	{

		$property = $this->repository->findAllVisible(); 
		return $this->render('property/index.html.twig', [
			'current_menu' => 'properties'
		]);
	}

}


?>