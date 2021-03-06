<?php
namespace Omeka\Controller\Site;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PageController extends AbstractActionController
{
    public function browseAction()
    {
        $this->setBrowseDefaults('created');
        $query = $this->params()->fromQuery();
        $query['site_id'] = $this->currentSite()->id();

        $response = $this->api()->search('site_pages', $query);
        $this->paginator($response->getTotalResults());
        $pages = $response->getContent();

        $view = new ViewModel;
        $view->setVariable('pages', $pages);
        return $view;
    }

    public function showAction()
    {
        $site = $this->currentSite();
        $page = $this->api()->read('site_pages', [
            'slug' => $this->params('page-slug'),
            'site' => $site->id(),
        ])->getContent();

        $this->viewHelpers()->get('sitePagePagination')->setPage($page);

        $view = new ViewModel;

        $view->setVariable('site', $site);
        $view->setVariable('page', $page);
        $view->setVariable('displayNavigation', true);

        $contentView = clone $view;
        $contentView->setTemplate('omeka/site/page/content');
        $contentView->setVariable('pageViewModel', $view);

        $view->addChild($contentView, 'content');
        return $view;
    }
}
