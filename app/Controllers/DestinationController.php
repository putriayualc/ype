<?php

namespace App\Controllers;

use App\Models\ItineraryModel;
use App\Models\DestinationModel;
use App\Models\SocialMediaModel;
use App\Controllers\BaseController;
use App\Models\ImageDescriptionDestinationModel;
use App\Models\HomepageModel;

class DestinationController extends BaseController
{
    protected $destinationModel;
    protected $itineraryModel;
    protected $imageDescriptionDestinationModel;
    protected $socmedModel;
    protected $homepageModel;
    protected $currentUrl;
    protected $language;

    public function __construct()
    {
        $this->homepageModel = new HomepageModel();
        $this->destinationModel = new DestinationModel();
        $this->imageDescriptionDestinationModel = new ImageDescriptionDestinationModel();
        $this->itineraryModel = new ItineraryModel();
        $this->socmedModel = new SocialMediaModel();
        $this->currentUrl = current_url();
        $this->language = session()->get('lang');
    }

    public function index(): void
    {
        // Check the URL segment to determine the locale
        $segment = $this->request->uri->getSegment(1);

        // Ensure the locale is either 'id' or 'en', default to 'id' if invalid
        $locale = ($segment === 'en') ? 'en' : 'id';

        // Update the session language
        session()->set('lang', $locale);
        $this->language = $locale;
        
        // $data['title'] = 'Tour Destination – Astrip';
        $data = [
            'title' => $this->destinationModel->select(['seo_tag_title_id', 'seo_tag_title_en'])->first(),
            'description' => $this->destinationModel->select(['seo_description_id', 'seo_description_en'])->first(),
            'currentUrl' => $this->currentUrl,
            'language' => $this->language,
            'homepage' => $this->homepageModel->first(),
            'navbarDestinations' => $this->destinationModel->select(['title', 'slug'])->findAll(),
            'destinations' => $this->destinationModel->findAll(),
            'socmeds' => $this->socmedModel->findAll(),
        ];

        echo view('pages/destination', $data);
    }

    public function detail($slug = ''): void
    {
        $session = session();

        // Detect the language from the URL segment (e.g., /en or /id)
        $segment = $this->request->uri->getSegment(1);
        $locale = ($segment === 'en') ? 'en' : 'id';

        // Update the session language if it does not match the detected locale
        // Update the session language
        session()->set('lang', $locale);
        $this->language = $locale;
        $lang = session()->get('lang') ?? 'id';

        // Set the locale for the current request
        service('request')->setLocale($locale);

        $data = [
            'title' => $this->destinationModel->select(['seo_tag_title_id', 'seo_tag_title_en'])->where('destination.slug', $slug)->first(),
            'description' => $this->destinationModel->select(['seo_description_id', 'seo_description_en'])->where('destination.slug', $slug)->first(),
            'currentUrl' => $this->currentUrl,
            'language' => $this->language,
            'navbarDestinations' => $this->destinationModel->select(['title', 'slug'])->findAll(),
            'destination' => $this->destinationModel->join('image_destination', 'image_destination.destination_id = destination.id', 'left')->where('destination.slug', $slug)->findAll(),
            'itineraries' => $this->itineraryModel->where('destination_slug', $slug)->findAll(),
            'imagesDescriptionDestinations' => $this->imageDescriptionDestinationModel->where('destination_id', $this->destinationModel->select('id')->where('slug', $slug)->first()['id'])->findAll(),
            'socmeds' => $this->socmedModel->findAll(),
            'lang' => $lang,
        ];

        // dd($data['itineraries']);

        echo view('pages/detail_destination', $data);
    }
}
