<?php

	namespace OrderingApp\Bundle\OrderBundle\Controller;

	use OrderingApp\Bundle\OrderBundle\Entity\Order;
	use OrderingApp\Bundle\OrderBundle\Form\OrderForm;

	use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
	use Symfony\Component\HttpFoundation\Request;

	/**
	 * OrderBundle Controller
	 * @package OrderingApp\Bundle\OrderBundle\Controler
	 *
	 * @Route("/")
	 */
	class Controller extends BaseController {
		# region Actions

		/**
		 * Order form
		 *
		 * @Route("/", name="OrderBundle:form")
		 * @Template("OrderBundle::form.html.twig")
		 *
		 * @param Request $request
		 * @return array
		 */
		public function formAction(Request $request) {
			$order = new Order();

			$em = $this
				->getDoctrine()
				->getManager();

			//Build form
			$form = $this->createForm(OrderForm::class, $order);
			$form->handleRequest($request);

			if ($form->isValid()) {
				//Form has been posted and is valid - persist to database
				$em->persist($order);
				$em->flush();


				//Redirect to edit page
				return $this->redirect(
					$this->generateUrl(
						'OrderBundle:confirmation',
						array('uuid' => $order->getUuid())
					)
				);
			}

			//Render defined template with this data
			return array(
				'form' => $form->createView(),
			);
		}

		/**
		 * Order form
		 *
		 * @Route("/confirmation/{uuid}/", name="OrderBundle:confirmation")
		 * @Template("OrderBundle::confirmation.html.twig")
		 *
		 * @param string $uuid
		 * @param Request $request
		 * @return array
		 */
		public function confirmationAction($uuid, Request $request) {
			$em = $this
				->getDoctrine()
				->getManager();

			// Get order
			$order = $em
				->getRepository('OrderBundle:Order')
				->findOneByUuid($uuid);

			if ($order === null) {
				// Order doesn't exist
				throw $this->createNotFoundException();
			}

			// Render defined template with this data
			return array(
				'order' => $order
			);
		}

		/**
		 * Order form
		 *
		 * @Route("/list/", name="OrderBundle:list")
		 * @Template("OrderBundle::list.html.twig")
		 *
		 * @param Request $request
		 * @return array
		 */
		public function listAction(Request $request) {
			$em = $this
				->getDoctrine()
				->getManager();

			// Get orders
			$orders = $em
				->getRepository('OrderBundle:Order')
				->findAll();

			// Render defined template with this data
			return array(
				'orders' => $orders
			);
		}

		/**
		 * Order form
		 *
		 * @Route("/view/{uuid}/", name="OrderBundle:view")
		 * @Template("OrderBundle::view.html.twig")
		 *
		 * @param string $uuid
		 * @param Request $request
		 * @return array
		 */
		public function viewAction($uuid, Request $request) {
			$em = $this
				->getDoctrine()
				->getManager();

			// Get order
			$order = $em
				->getRepository('OrderBundle:Order')
				->findOneByUuid($uuid);

			if ($order === null) {
				// Order doesn't exist
				throw $this->createNotFoundException();
			}

			// Render defined template with this data
			return array(
				'order' => $order
			);
		}

		# endregion Actions
	}