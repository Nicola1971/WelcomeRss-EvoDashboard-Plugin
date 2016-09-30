//<?php
/**
 * WelcomeRSSReader
 *
 * Dashboard RSS widget plugin for EvoDashboard and MODx Evo 1.1.1
 *
 * @author    Nicola Lambathakis http://www.tattoocms.it/
 * @category    plugin
 * @version    3.1 RC
 * @license	 http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 * @internal    @events OnManagerWelcomeHome
 * @internal    @installset base
 * @internal    @modx_category Dashboard
 * @internal    @properties  &WidgetTitle=Widget Title:;string;RSS Reader &WidgetIcon=Widget Icon:;string;fa-rss-square &FeedUrl=Rss url:;string;http://www.tattoocms.it/feed.rss &rssitemsnumber=Feed items number:;string;3 &datarow=widget row position:;list;1,2,3,4,5,6,7,8,9,10;1 &datacol=widget col position:;list;1,2,3,4;1 &datasizex=widget x size:;list;1,2,3,4;2 &datasizey=widget y size:;list;1,2,3,4,5,6,7,8,9,10;4  &WidgetID= Unique Widget ID:;string;RSS-widget
 * /
 
/**
 * WelcomeRSSReader RC 3.1
 * author Nicola Lambathakis http://www.tattoocms.it/
 *
 * RSS widget plugin for EvoDashboard
 * Event: OnManagerWelcomeHome
&WidgetTitle=Widget Title:;string;RSS Reader &FeedUrl=Rss url:;string;http://www.tattoocms.it/feed.rss &rssitemsnumber=Feed items number:;string;3 &datarow=widget row position:;list;1,2,3,4,5,6,7,8,9,10;1 &datacol=widget col position:;list;1,2,3,4;1 &datasizex=widget x size:;list;1,2,3,4;4 &datasizey=widget y size:;list;1,2,3,4,5,6,7,8,9,10;2
****
*/
// Run the main code
include($modx->config['base_path'].'assets/plugins/welcomerss/welcomerss.php');