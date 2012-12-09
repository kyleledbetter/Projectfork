<?php
/**
 * @package      Projectfork
 * @subpackage   Repository
 *
 * @author       Tobias Kuhn (eaxs)
 * @copyright    Copyright (C) 2006-2012 Tobias Kuhn. All rights reserved.
 * @license      http://www.gnu.org/licenses/gpl.html GNU/GPL, see LICENSE.txt
 */

defined('_JEXEC') or die();


JHtml::_('pfhtml.script.listform');

$list_order = $this->escape($this->state->get('list.ordering'));
$list_dir   = $this->escape($this->state->get('list.direction'));
$user       = JFactory::getUser();
$uid        = $user->get('id');
$dir        = $this->items['directory'];

$filter_in  = ($this->state->get('filter.isset') ? 'in ' : '');
?>
<div id="projectfork" class="category-list<?php echo $this->pageclass_sfx;?> view-repository">

    <?php if ($this->params->get('show_page_heading', 1)) : ?>
        <h1><a href="#">Design Review</a> / Album Name</h1>
    <?php endif; ?>
    
    <!-- Begin Placeholder -->
    <style type="text/css">
    	.thumbnails-designs .text-large {
    		font-size: 16px;
    		margin: 5px 0;
    		display: block;
    	}
    	.row-fluid .thumbnails.thumbnails-designs > li[class*="span"]:first-child,
    	.thumbnails.thumbnails-designs > li[class*="span"] {
    		margin-left: 0.7em;
    		margin-bottom: 0.7em;
    	}
    	.flip {
    	  -webkit-perspective: 800;
    	   width: 100%;
    	   height: 216px;
    	    position: relative;
    	}
    	.flip .card.flipped {
    	  -webkit-transform: rotateY(180deg);
    	}
    	.flip .card {
    	  width: 100%;
    	  height: 100%;
    	  -webkit-transform-style: preserve-3d;
    	  -webkit-transition: 0.5s;
    	}
    	.flip .card .face {
    	  width: 100%;
    	  height: 100%;
    	  position: absolute;
    	  -webkit-backface-visibility: hidden ;
    	  z-index: 2;
    	}
    	.flip .card .front {
    	  position: absolute;
    	  z-index: 1;
    	    cursor: pointer;
    	}
    	.flip .card .back {
    	  -webkit-transform: rotateY(180deg);
    	    cursor: pointer;
    	}​
    </style>
    
    <div class="row-fluid">
    	<div class="span9">
    		<ul class="thumbnails thumbnails-designs">
    			<li class="span4">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img class="" src="http://placehold.it/400x334/471437/FFF/&amp;text=Design" alt=""></a>
    				    			<div class="text-large"><a href="#">Design Name</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<a href="#" class="close">x</a>
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Design Name</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-eye muted"></span> Views <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments muted"></span> Comments <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-refresh muted"></span> Revisions <span class="badge badge-info pull-right">6</span></a></li>
    				    			</ul>
    				    			<hr />
    				    			<div class="btn-toolbar center">
    				    				<div class="btn-group" data-toggle="buttons-radio">
    				    					<a href="#" class="btn btn-mini">Approved</a>
    				    					<a href="#" class="btn btn-mini active">Pending</a>
    				    					<a href="#" class="btn btn-mini">Declined</a>
    				    				</div>
    				    			</div>
    				    			<p class="center">
    				    				<a href="#" class="btn btn-large btn-wide btn-primary">View Detail</a>
    				    			</p>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    			<li class="span4">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img class="" src="http://placehold.it/400x334/B13254/FFF/&amp;text=Design" alt=""></a>
    				    			<div class="text-large"><a href="#">Design Name</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<a href="#" class="close">x</a>
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Design Name</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-eye muted"></span> Views <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments muted"></span> Comments <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-refresh muted"></span> Revisions <span class="badge badge-info pull-right">6</span></a></li>
    				    			</ul>
    				    			<hr />
    				    			<div class="btn-toolbar center">
    				    				<div class="btn-group" data-toggle="buttons-radio">
    				    					<a href="#" class="btn btn-mini">Approved</a>
    				    					<a href="#" class="btn btn-mini active">Pending</a>
    				    					<a href="#" class="btn btn-mini">Declined</a>
    				    				</div>
    				    			</div>
    				    			<p class="center">
    				    				<a href="#" class="btn btn-large btn-wide btn-primary">View Detail</a>
    				    			</p>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    			<li class="span4">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img class="" src="http://placehold.it/400x334/FF5449/FFF/&amp;text=Design" alt=""></a>
    				    			<div class="text-large"><a href="#">Design Name</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<a href="#" class="close">x</a>
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Design Name</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-eye muted"></span> Views <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments muted"></span> Comments <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-refresh muted"></span> Revisions <span class="badge badge-info pull-right">6</span></a></li>
    				    			</ul>
    				    			<hr />
    				    			<div class="btn-toolbar center">
    				    				<div class="btn-group" data-toggle="buttons-radio">
    				    					<a href="#" class="btn btn-mini">Approved</a>
    				    					<a href="#" class="btn btn-mini active">Pending</a>
    				    					<a href="#" class="btn btn-mini">Declined</a>
    				    				</div>
    				    			</div>
    				    			<p class="center">
    				    				<a href="#" class="btn btn-large btn-wide btn-primary">View Detail</a>
    				    			</p>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    			<li class="span4">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img class="" src="http://placehold.it/400x334/FF7349/FFF/&amp;text=Design" alt=""></a>
    				    			<div class="text-large"><a href="#">Design Name</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<a href="#" class="close">x</a>
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Design Name</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-eye muted"></span> Views <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments muted"></span> Comments <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-refresh muted"></span> Revisions <span class="badge badge-info pull-right">6</span></a></li>
    				    			</ul>
    				    			<hr />
    				    			<div class="btn-toolbar center">
    				    				<div class="btn-group" data-toggle="buttons-radio">
    				    					<a href="#" class="btn btn-mini">Approved</a>
    				    					<a href="#" class="btn btn-mini active">Pending</a>
    				    					<a href="#" class="btn btn-mini">Declined</a>
    				    				</div>
    				    			</div>
    				    			<p class="center">
    				    				<a href="#" class="btn btn-large btn-wide btn-primary">View Detail</a>
    				    			</p>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    			<li class="span4">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img class="" src="http://placehold.it/400x334/FF9249/FFF/&amp;text=Design" alt=""></a>
    				    			<div class="text-large"><a href="#">Design Name</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<a href="#" class="close">x</a>
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Design Name</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-eye muted"></span> Views <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments muted"></span> Comments <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-refresh muted"></span> Revisions <span class="badge badge-info pull-right">6</span></a></li>
    				    			</ul>
    				    			<hr />
    				    			<div class="btn-toolbar center">
    				    				<div class="btn-group" data-toggle="buttons-radio">
    				    					<a href="#" class="btn btn-mini">Approved</a>
    				    					<a href="#" class="btn btn-mini active">Pending</a>
    				    					<a href="#" class="btn btn-mini">Declined</a>
    				    				</div>
    				    			</div>
    				    			<p class="center">
    				    				<a href="#" class="btn btn-large btn-wide btn-primary">View Detail</a>
    				    			</p>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    			<li class="span4">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img class="" src="http://placehold.it/400x334/FFB44A/FFF/&amp;text=Design" alt=""></a>
    				    			<div class="text-large"><a href="#">Design Name</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<a href="#" class="close">x</a>
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Design Name</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-eye muted"></span> Views <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments muted"></span> Comments <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-refresh muted"></span> Revisions <span class="badge badge-info pull-right">6</span></a></li>
    				    			</ul>
    				    			<hr />
    				    			<div class="btn-toolbar center">
    				    				<div class="btn-group" data-toggle="buttons-radio">
    				    					<a href="#" class="btn btn-mini">Approved</a>
    				    					<a href="#" class="btn btn-mini active">Pending</a>
    				    					<a href="#" class="btn btn-mini">Declined</a>
    				    				</div>
    				    			</div>
    				    			<p class="center">
    				    				<a href="#" class="btn btn-large btn-wide btn-primary">View Detail</a>
    				    			</p>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    			<li class="span4">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img class="" src="http://placehold.it/400x334/ffe14c/FFF/&amp;text=Design" alt=""></a>
    				    			<div class="text-large"><a href="#">Design Name</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<a href="#" class="close">x</a>
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Design Name</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-eye muted"></span> Views <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments muted"></span> Comments <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-refresh muted"></span> Revisions <span class="badge badge-info pull-right">6</span></a></li>
    				    			</ul>
    				    			<hr />
    				    			<div class="btn-toolbar center">
    				    				<div class="btn-group" data-toggle="buttons-radio">
    				    					<a href="#" class="btn btn-mini">Approved</a>
    				    					<a href="#" class="btn btn-mini active">Pending</a>
    				    					<a href="#" class="btn btn-mini">Declined</a>
    				    				</div>
    				    			</div>
    				    			<p class="center">
    				    				<a href="#" class="btn btn-large btn-wide btn-primary">View Detail</a>
    				    			</p>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    		</ul>
    	</div>
    	<div class="span3">
    		<h3>Upload</h3>
    		<form>
    			<div class="control-group">
    				<div class="controls">
    					<div class="well well-drop center muted">
    						<div class="text-xxlarge">
    							<span aria-hidden="true" class="icon-download"></span>
    						</div>
    						
    						 Drop Files Here
    					</div>
    					<div class="progress progress-striped">
    						<div class="bar bar-success" style="width: 100%;"><a class="close" data-dismiss="alert" href="#">&times;</a>design.png</div>
    					</div>
    					<div class="center">
    						<a href="#" class="btn btn-primary btn-wide"><span aria-hidden="true" class="icon-plus"></span> Add To Album</a>
    					</div>
    				</div>
    			</div>
    		</form>
    		<hr />
    		<h3>Recent Designs &amp; Revisions</h3>
    		<ul class="list-striped">
    			<li>
    				<span class="small muted pull-right">2 hours ago</span>
    				<a href="#"><span class="text-info"><span aria-hidden="true" class="icon-refresh"></span></span> filename.png</a>
    			</li>
    			<li>
    				<span class="small muted pull-right">3 hours ago</span>
    				<a href="#"><span class="text-success"><span aria-hidden="true" class="icon-picture"></span></span> filename.png</a>
    			</li>
    			<li>
    				<span class="small muted pull-right">1 day ago</span>
    				<a href="#"><span class="text-info"><span aria-hidden="true" class="icon-refresh"></span></span> filename.png</a>
    			</li>
    			<li>
    				<span class="small muted pull-right">2 days ago</span>
    				<a href="#"><span class="text-success"><span aria-hidden="true" class="icon-picture"></span></span> filename.jpg</a>
    			</li>
    			<li>
    				<span class="small muted pull-right">4 days ago</span>
    				<a href="#"><span class="text-info"><span aria-hidden="true" class="icon-refresh"></span></span> filename.png</a>
    			</li>
    			<li>
    				<span class="small muted pull-right">1 week ago</span>
    				<a href="#"><span class="text-success"><span aria-hidden="true" class="icon-picture"></span></span> filename.png</a>
    			</li>
    			<li>
    				<span class="small muted pull-right">2 weeks ago</span>
    				<a href="#"><span class="text-info"><span aria-hidden="true" class="icon-refresh"></span></span> filename.png</a>
    			</li>
    		</ul>
    	</div>
    </div>
    
    <script>
    	!function ($) {
    		$('.flip').mouseenter(function(){
    			$(this).find('.card').addClass('flipped').mouseleave(function(){
    				$(this).removeClass('flipped');
    			});
    			return false;
    		})
    	}(window.jQuery)
    </script>
    <!-- End Placeholder -->
    

    <div class="clearfix"></div>

    <div class="cat-items" style="display: none;">
        <form name="adminForm" id="adminForm" action="<?php echo JRoute::_(PFrepoHelperRoute::getRepositoryRoute($dir->project_id, $dir->id)); ?>" method="post">
            <div class="btn-toolbar btn-toolbar-top">
                <?php echo $this->toolbar;?>
                <div class="filter-project btn-group">
                    <?php echo JHtml::_('pfhtml.project.filter');?>
                </div>
            </div>

            <div class="clearfix"> </div>

            <div class="<?php echo $filter_in;?>collapse" id="filters">
                <div class="well btn-toolbar">
                    <div class="filter-search btn-group pull-left">
                        <input type="text" name="filter_search" placeholder="<?php echo JText::_('JSEARCH_FILTER'); ?>" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" />
                    </div>
                    <div class="filter-search-buttons btn-group pull-left">
                        <button type="submit" class="btn" rel="tooltip" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>"><i class="icon-search"></i></button>
                        <button type="button" class="btn" rel="tooltip" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>" onclick="document.id('filter_search').value='';this.form.submit();"><i class="icon-remove"></i></button>
                    </div>
                    <div class="clearfix"> </div>

                    <?php if ($this->state->get('filter.project')) : ?>
                        <hr />
                        <div class="filter-labels">
                            <?php echo JHtml::_('pfhtml.label.filter', 'com_pfrepo', $this->state->get('filter.project'), $this->state->get('filter.labels'));?>
                        </div>
                        <div class="clearfix"> </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="clearfix"> </div>

            <hr />

            <table class="adminlist table table-striped">
                <thead>
                    <tr>
                        <?php if ($dir->parent_id >= 1) : ?>
                        <th width="1%">
                            <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
                        </th>
                        <?php endif; ?>
                        <th width="25%">
                            <?php echo JHtml::_('grid.sort', 'JGLOBAL_TITLE', 'a.title', $list_dir, $list_order); ?>
                        </th>
                        <th width="1%">

                        </th>
                        <th width="10%">
                            <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_CREATED_ON', 'a.created', $list_dir, $list_order); ?>
                        </th>
                        <th>
                            <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_DESCRIPTION', 'a.description', $list_dir, $list_order); ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $this->loadTemplate('directories'); ?>
                    <?php echo $this->loadTemplate('notes'); ?>
                    <?php echo $this->loadTemplate('files'); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="10">

                        </td>
                    </tr>
                </tfoot>
            </table>

            <div class="filters btn-toolbar">
                <div class="btn-group filter-order">
                    <select name="filter_order" class="inputbox input-medium" onchange="this.form.submit()">
                        <?php echo JHtml::_('select.options', $this->sort_options, 'value', 'text', $list_order, true);?>
                    </select>
                </div>
                <div class="btn-group folder-order-dir">
                    <select name="filter_order_Dir" class="inputbox input-medium" onchange="this.form.submit()">
                        <?php echo JHtml::_('select.options', $this->order_options, 'value', 'text', $list_dir, true);?>
                    </select>
                </div>
                <?php /*if (!$this->state->get('filter.project')) :*/ ?>
                    <div class="btn-group display-limit">
                        <?php /*echo $this->pagination->getLimitBox();*/ ?>
                    </div>
                    <?php /*if ($this->pagination->get('pages.total') > 1) :*/ ?>
                        <div class="btn-group pagination">
                            <p class="counter"><?php /*echo $this->pagination->getPagesCounter();*/ ?></p>
                            <?php /*echo $this->pagination->getPagesLinks();*/ ?>
                        </div>
                    <?php /*endif;*/ ?>
                <?php /*endif;*/ ?>
            </div>

            <input type="hidden" id="boxchecked" name="boxchecked" value="0" />
            <input type="hidden" name="task" value="" />
            <?php echo JHtml::_('form.token'); ?>
        </form>
    </div>
</div>
