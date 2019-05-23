<?php
namespace HackOro\GrapesJSBundle\Controller;

use HackOro\GrapesJSBundle\Entity\GrapesJSPage;
use HackOro\GrapesJSBundle\Form\Type\GrapesJSPageType;
use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class GrapesJSController extends Controller
{
    /**
     * @Route("/", name="hackoro_grapesjs_page_index")
     * @Template
     * @Acl(
     *      id="hackoro_grapes_js_view",
     *      type="entity",
     *      class="HackOroGrapesJSBundle:GrapesJSPage",
     *      permission="VIEW"
     * )
     * @return array
     */
    public function indexAction()
    {
        return [];
    }

    /**
     * @Route("/view/{id}", name="hackoro_grapesjs_page_view", requirements={"id"="\d+"})
     * @Template("HackOroGrapesJSBundle:GrapesJS:view.html.twig")
     * @Acl(
     *      id="hackoro_grapesjs_page_view",
     *      type="entity",
     *      class="HackOroGrapesJSBundle:GrapesJSPage",
     *      permission="VIEW"
     * )
     * @param GrapesJSPage $page
     * @return array
     */
    public function viewAction(GrapesJSPage $page)
    {
        return [
            'entity' => $page
        ];
    }

    /**
     * @Route("/create", name="hackoro_grapesjs_page_create")
     * @Template("HackOroGrapesJSBundle:GrapesJS:update.html.twig")
     * @Acl(
     *      id="hackoro_grapesjs_page_create",
     *      type="entity",
     *      class="HackOroGrapesJSBundle:GrapesJSPage",
     *      permission="CREATE"
     * )
     * @param Request $request
     * @return array|RedirectResponse
     */
    public function createAction(Request $request)
    {
        return $this->update(new GrapesJSPage(), $request);
    }

    /**
     * @Route("/update/{id}", name="hackoro_grapesjs_page_update", requirements={"id"="\d+"})
     * @Template
     * @Acl(
     *      id="hackoro_grapesjs_page_update",
     *      type="entity",
     *      class="HackOroGrapesJSBundle:GrapesJSPage",
     *      permission="EDIT"
     * )
     * @param GrapesJSPage $page
     * @param Request $request
     * @return array|RedirectResponse
     */
    public function updateAction(GrapesJSPage $page, Request $request)
    {
        return $this->update($page, $request);
    }

    /**
     * @param GrapesJSPage $page
     * @param Request $request
     * @return array|RedirectResponse
     */
    protected function update(GrapesJSPage $page, Request $request)
    {
        return $this->get('oro_form.update_handler')->update(
            $page,
            $this->createForm(GrapesJSPageType::class, $page),
            $this->get('translator')->trans('hackoro.grapes_js.controller.page.saved.message'),
            $request,
            null
        );
    }
}
