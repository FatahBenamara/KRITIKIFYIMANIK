<?php

namespace App\Controller;

use App\Entity\Label;
use App\Entity\Artist;
use App\Entity\Record;
use App\Repository\ArtistRepository;
use App\Repository\RecordRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class RecordController extends AbstractController
{
    /**
     * @Route("/artist", name="artist_list")
     */
    public function index(ArtistRepository $repository)
    {

        return $this->render('record/artist_list.html.twig', [
            'artist_list' => $repository->findAll(),
        ]);
    }

    /**
     * @Route("/artist/{id} ", name="artist_page")
     */
    public function artistPage(Artist $artist)
    {

        return $this->render('record/artist_page.html.twig', [
            'artist' => $artist
        ]);
    }


    /**
     * @Route("/record/{id}", name="record_page")
     */
    public function recordPage( Record $record)
    {

  
        return $this->render('record/record_page.html.twig', [
        'record' => $record
        ]);
    
    }


    /**
     * @Route("/news", name="record_news")
     */
    public function recordNews(RecordRepository $repository)
    {
        return $this->render('record/record_news.html.twig', [
            'record_news' => $repository->findNews(),
        ]);
    }


    /**
     * @Route("/label/{id}", name="label_page")
     */
    public function labelPage(Label $label)
    {
        return $this->render('record/label_page.html.twig', [
            'label' => $label
        ]);
    }





















}
