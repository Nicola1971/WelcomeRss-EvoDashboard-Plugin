<?php
/**
 * WelcomeRSSReader RC 3.1
 * author Nicola Lambathakis http://www.tattoocms.it/
 *
 * RSS widget plugin for EvoDashboard 
 * Event: OnManagerWelcomeHome,OnManagerMainFrameHeaderHTMLBlock
&WidgetTitle=Widget Title:;string;RSS Reader &WidgetIcon=Widget Icon:;string;fa-rss-square &FeedUrl=Rss url:;string;http://www.tattoocms.it/feed.rss &rssitemsnumber=Feed items number:;string;3 &datarow=widget row position:;list;1,2,3,4,5,6,7,8,9,10;1 &datacol=widget col position:;list;1,2,3,4;1 &datasizex=widget x size:;list;1,2,3,4;2 &datasizey=widget y size:;list;1,2,3,4,5,6,7,8,9,10;4  &WidgetID= Unique Widget ID:;string;RSS-widget
****
*/
// Run the main code
//include($modx->config['base_path'].'assets/plugins/welcomefeed/welcomefeed.php');
 /*
 *  MODX Manager Home Page Implmentation by pixelchutes (www.pixelchutes.com)
 *  Based on kudo's kRSS Module v1.0.72
 *
 *  Written by: kudo, based on MagpieRSS
 *  Contact: kudo@kudolink.com
 *  Created: 11/05/2006 (November 5)
 *  For: MODX cms (modx.com)
 *  Name: kRSS
 *  Version (MODX Module): 1.0.72
 *  Version (Magpie): 0.72
 */

/* Configuration
---------------------------------------------- */
// Here you can set the urls to retrieve the RSS from. Simply add a $urls line following the numbering progress in the square brakets.

//$urls['http://www.ideefesta.it/rss.rss'] = $rss_url;

$urls[0] = $FeedUrl;

// How many items per Feed?
$itemsNumber = $rssitemsnumber;

/* End of configuration
NO NEED TO EDIT BELOW THIS LINE
---------------------------------------------- */

// include MagPieRSS
require_once('media/rss/rss_fetch.inc');

$feedData = array();

// create Feed
foreach ($urls as $section=>$url) {
	$rssoutput = '';
    $rss = @fetch_rss($url);
    if( !$rss ){
    	$feedData[$section] = 'Failed to retrieve ' . $url;
    	continue;
	}
    $rssoutput .= '<ul>';

    $items = array_slice($rss->items, 0, $itemsNumber);
    foreach ($items as $item) {
        $href = $item['link'];
        $title = $item['title'];
        $pubdate = $item['pubdate'];
        $pubdate = $modx->toDateFormat(strtotime($pubdate));
        $description = strip_tags($item['description']);
        if (strlen($description) > 199) {
            $description = substr($description, 0, 200);
            $description .= '...<br />Read <a href="'.$href.'" target="_blank">more</a>.';
        }
        $rssoutput .= '<li><a href="'.$href.'" target="_blank">'.$title.'</a> - <b>'.$pubdate.'</b><br />'.$description.'</li>';
    }

    $rssoutput .= '</ul>';
	$feedData[$section] = $rssoutput;
}

//widget name
$WidgetID = isset($WidgetID) ? $WidgetID : 'RSS-widget';
$WidgetIcon = isset($WidgetIcon) ? $WidgetIcon : 'fa-rss-square';
// size and position
$datarow = isset($datarow) ? $datarow : '1';
$datacol = isset($datacol) ? $datacol : '2';
$datasizex = isset($datasizex) ? $datasizex : '2';
$datasizey = isset($datasizey) ? $datasizey : '2';
//output
$WidgetOutput = isset($WidgetOutput) ? $WidgetOutput : '';
//events
$EvoEvent = isset($EvoEvent) ? $EvoEvent : 'OnManagerWelcomeHome';
$output = "";
$e = &$modx->Event;

/*Widget Box */
if($e->name == ''.$EvoEvent.'') {
$WidgetOutput = '
<li id="'.$WidgetID.'" data-row="'.$datarow.'" data-col="'.$datacol.'" data-sizex="'.$datasizex.'" data-sizey="'.$datasizey.'">
                    <div class="panel panel-default widget-wrapper">
                      <div class="panel-headingx widget-title sectionHeader clearfix">
                          <span class="pull-left"><i class="fa '.$WidgetIcon.'"></i> '.$WidgetTitle.'</span>
                            <div class="widget-controls pull-right">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-default btn-xs panel-hide hide-full fa fa-minus" data-id="'.$WidgetID.'"></a>
                                </div>     
                            </div>

                      </div>
                      <div class="panel-body widget-stage sectionBody">
                       '.$feedData[$section].'
                      </div>
                    </div>           
                </li>

';
}
//end widget
$output = $WidgetOutput;
$e->output($output);
return;
?>