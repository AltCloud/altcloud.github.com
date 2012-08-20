<?php

namespace AltCloud\Instance3BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AltCloud\Instance3BlogBundle\Entity\Post;
use AltCloud\Instance3BlogBundle\Form\PostType;

/**
 * Post controller.
 *
 */
class PostController extends Controller
{
    public function listAction($node=false,$category=false,$_format=false, $displayoptions=false)
    {
        $em = $this->getDoctrine()->getEntityManager();

		if(is_string($category)){
        	$posts = $em->getRepository('ACInst3BlogBundle:Post')->findBy( array( 'category' => $category ) );
        }else{
		  	$posts = $em->getRepository('ACInst3BlogBundle:Post')->findAll();
		}
		
		if (is_object($node)){
			$nodetpl = $node->getSite()->getDeftemp();
			if(is_string($nodetpl))
				$tpl=$nodetpl;
		}
		
		if(!isset($tpl)){
			// Determine tpl based on request uri, if possible
		}
		
		if(!isset($tpl)){
			// Use default tpl
			// FIXME: Move to setting somewhere
			$tpl="JMORGSTJMBundle::layout.html.twig";
		}
		
		if($_format && $_format == 'rss' ){
			$response = $this->render("ACInst3BlogBundle:Post:list.rss.twig", array('posts' => $posts));
			$response->headers->set('Content-Type', 'application/rss+xml');
		
	        return $response;
		}else
	        return $this->render("ACInst3BlogBundle:Post:list.html.twig", array('posts' => $posts, 'tpl' => $tpl, 'node' => $node, 'displayoptions' => $displayoptions));

    }
    
    public function listPartialAction($category=false, $displayoptions=false)
    {
        $em = $this->getDoctrine()->getEntityManager();

		if(is_int($category)){
        	$posts = $em->getRepository('ACInst3BlogBundle:Post')->findBy( array( 'category' => $category ) );
        }else{
		  	$posts = $em->getRepository('ACInst3BlogBundle:Post')->findAll();
		}
		
        return $this->render('ACInst3BlogBundle:Post:listPartial.html.twig', array('posts' => $posts, 'displayoptions' => $displayoptions));

    }

	public function renderPartialAction($id, $displayoptions=false)
	{
			$post = $this->getDoctrine()
				->getRepository('ACInst3BlogBundle:Post')
				->find($id);

			if (!$post) {
				throw $this->createNotFoundException('No Post found for id '.$id);
			}
		
        	return $this->render('ACInst3BlogBundle:Post:renderPartial.html.twig', array('post' => $post, 'displayoptions' => $displayoptions));
    }

	public function renderAction($id, $node=false, $displayoptions=false)
	{
			$post = $this->getDoctrine()
				->getRepository('ACInst3BlogBundle:Post')
				->find($id);

			if (!$post) {
				throw $this->createNotFoundException('No Post found for id '.$id);
			}
	
			if (is_object($node)){
				$nodetpl = $node->getSite()->getDeftemp();
				if(is_string($nodetpl))
					$tpl=$nodetpl;
			}
			
			if(!isset($tpl)){
				// Determine tpl based on request uri, if possible
			}
			
			if(!isset($tpl)){
				// Use default tpl
				// FIXME: Move to setting somewhere
				$tpl="JMCOMPRCTRBundle::layout.html.twig";
			}
		
        	return $this->render('ACInst3BlogBundle:Post:render.html.twig', array('post' => $post, 'tpl' => $tpl, 'node' => $node, 'displayoptions' => $displayoptions));
    }
    
    /**
     * Lists all Post entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ACInst3BlogBundle:Post')->findAll();

        return $this->render('ACInst3BlogBundle:Post:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Post entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ACInst3BlogBundle:Post')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Post entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ACInst3BlogBundle:Post:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Post entity.
     *
     */
    public function newAction()
    {
        $entity = new Post();
        $form   = $this->createForm(new PostType(), $entity);

        return $this->render('ACInst3BlogBundle:Post:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Post entity.
     *
     */
    public function createAction()
    {
        $entity  = new Post();
        $request = $this->getRequest();
        $form    = $this->createForm(new PostType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_post_show', array('id' => $entity->getId())));
            
        }

        return $this->render('ACInst3BlogBundle:Post:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Post entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ACInst3BlogBundle:Post')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Post entity.');
        }

        $editForm = $this->createForm(new PostType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ACInst3BlogBundle:Post:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Post entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ACInst3BlogBundle:Post')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Post entity.');
        }

        $editForm   = $this->createForm(new PostType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_post_edit', array('id' => $id)));
        }

        return $this->render('ACInst3BlogBundle:Post:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Post entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ACInst3BlogBundle:Post')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Post entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_post'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
