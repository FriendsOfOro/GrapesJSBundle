<?php
namespace HackOro\GrapesJSBundle\ContentVariantType;

use HackOro\GrapesJSBundle\Entity\GrapesJSPage;
use HackOro\GrapesJSBundle\Form\Type\GrapesJSPageVariantType;
use Oro\Component\Routing\RouteData;
use Oro\Component\WebCatalog\ContentVariantTypeInterface;
use Oro\Component\WebCatalog\Entity\ContentVariantInterface;
use Symfony\Component\PropertyAccess\PropertyAccessor;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class GrapesJSContentVariantType implements ContentVariantTypeInterface
{
    const TYPE = 'grapesjs_content';

    /** @var PropertyAccessor */
    private $propertyAccessor;

    /**
     * @param PropertyAccessor              $propertyAccessor
     */
    public function __construct(
        PropertyAccessor $propertyAccessor
    ) {
        $this->propertyAccessor = $propertyAccessor;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return self::TYPE;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return 'GrapesJS Content Block';
    }

    /**
     * {@inheritdoc}
     */
    public function getFormType()
    {
        return GrapesJSPageVariantType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function isAllowed()
    {
        return true;
    }

    /**
     * @param ContentVariantInterface $contentVariant
     *
     * {@inheritdoc}
     */
    public function getRouteData(ContentVariantInterface $contentVariant)
    {
        /** @var GrapesJSPage $grapesjsPage */
        $grapesjsPage = $this->propertyAccessor->getValue($contentVariant, 'grapesjs_page');

        return new RouteData('hackoro_grapesjs_frontend_page_view', ['id' => $grapesjsPage->getId()]);
    }
}
