<?php

namespace App\Controller;

use App\Entity\Subscriber;
use App\Form\SubscriberType;
use App\Repository\SubscriberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubscriberController extends AbstractController
{
    /**
     * @Route("/new_subscriber", name="app_new_subscriber")
     */
    public function new(Request $request, SubscriberRepository $subscriberRepository): Response
    {
        $subscriber = new Subscriber();
        $form = $this->createForm(SubscriberType::class, $subscriber);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $subscriberRepository->add($subscriber, true);
        
            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->renderForm('subscriber/new.html.twig', [
            'subscriber' => $subscriber,
            'form' => $form,
            'title' => 'Yeni abone'
        ]);
    }
}
