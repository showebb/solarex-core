<?php

namespace Solarex\Core;



use Solarex\Core\Widgets\CategoryWidget;
use Solarex\Core\Widgets\FollowUsWidget;
use Solarex\Core\Widgets\ResourcesWidget;
use Solarex\Core\Widgets\SolarexLetsTalk;
use Solarex\Core\Widgets\FooterInfoWidget;
use Solarex\Core\Widgets\RecentPostWidget;
use Solarex\Core\Widgets\SolarexMoreServices;
use Solarex\Core\Widgets\SolarexPrefooterHome;
use Solarex\Core\Widgets\SolarexPrefooterMain;
use Solarex\Core\Widgets\CustomerSupportWidget;
use Solarex\Core\Widgets\SolarexPostHeaderMain;

class SolarexCoreWidgets
{

    public function __construct()
    {
        register_widget(FooterInfoWidget::class);
        register_widget(CustomerSupportWidget::class);
        register_widget(ResourcesWidget::class);
        register_widget(FollowUsWidget::class);
        register_widget(RecentPostWidget::class);
        register_widget(CategoryWidget::class);
        register_widget(SolarexMoreServices::class);
        register_widget(SolarexLetsTalk::class);
        register_widget(SolarexPrefooterMain::class);
        register_widget(SolarexPrefooterHome::class);
        register_widget(SolarexPostHeaderMain::class);
     

    }
}
