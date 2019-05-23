<?php
namespace HackOro\GrapesJSBundle\Controller\Frontend;

use HackOro\GrapesJSBundle\Entity\GrapesJSPage;
use Oro\Bundle\LayoutBundle\Annotation\Layout;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class GrapesJSFrontendController extends Controller
{
    /**
     * @Route("/view/{id}", name="hackoro_grapesjs_frontend_page_view", requirements={"id"="\d+"})
     * @Layout()
     *
     * @param GrapesJSPage $page
     * @return array
     */
    public function viewAction(GrapesJSPage $page)
    {
        return ['data'=> ['page' => $page]];
    }
}
