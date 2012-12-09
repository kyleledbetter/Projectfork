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
        <h1><a href="#">Design Review</a> / <a href="#">Album Name</a> / Design Name</h1>
    <?php endif; ?>
    
    <!-- Begin Placeholder -->
    <style type="text/css">
    	.thumbnails-designs .text-large {
    		font-size: 16px;
    		margin: 5px 0;
    		display: block;
    	}
    	.row-comments img {
    		float: left;
    		margin-right: 10px;
    	}
    	.row-comments .btn-toolbar {
    		margin: 0 0 0 26px;
    	}
    	.row-comments blockquote {
    		margin-left: 26px;
    		padding-left: 5px;
    		font-size: 12px;
    	}
    	.row-versions {
    		white-space: nowrap;
    		width: 100%;
    		overflow-x: auto;
    		overflow-y: hidden;
    		padding-bottom: 10px;
    	}
    </style>
    
    <div class="row-fluid">
    	<div class="span8">
    		<div class="btn-toolbar center">
    			<div class="btn-group" data-toggle="buttons-radio">
    				<a href="#" class="btn btn-mini"><span aria-hidden="true" class="icon-thumbs-up"></span> Approved</a>
    				<a href="#" class="btn btn-mini active"><span aria-hidden="true" class="icon-minus-2"></span> Pending</a>
    				<a href="#" class="btn btn-mini"><span aria-hidden="true" class="icon-thumbs-down"></span> Declined</a>
    			</div>
    			<div class="btn-group">
    				<a href="#" class="btn btn-mini"><span aria-hidden="true" class="icon-zoom-in"></span> Full Image</a>
    				<a href="#" class="btn btn-mini"><span aria-hidden="true" class="icon-download"></span> Download</a>
    			</div>
    		</div>
    		<div class="row-image">
    			<a href="#" title="Click to view full image" class="hasTooltip" rel="tooltip"><img class="img-polaroid" src="http://placehold.it/1280x1024/B13254/FFF/&amp;text=Design" alt=""></a>
    		</div>
    		<hr />
    		<h3>Recent Versions</h3>
    		<div class="row-versions">
    			<a href="#" class=""><img class="img-polaroid" src="http://placehold.it/150x100/471437/FFF/&amp;text=Design" alt=""></a>
    			<a href="#" class=""><img class="img-polaroid" src="http://placehold.it/150x100/B13254/FFF/&amp;text=Design" alt=""></a>
    			<a href="#" class=""><img class="img-polaroid" src="http://placehold.it/150x100/FF5449/FFF/&amp;text=Design" alt=""></a>
    			<a href="#" class=""><img class="img-polaroid" src="http://placehold.it/150x100/FF7349/FFF/&amp;text=Design" alt=""></a>
    			<a href="#" class=""><img class="img-polaroid" src="http://placehold.it/150x100/FF9249/FFF/&amp;text=Design" alt=""></a>
    			<a href="#" class=""><img class="img-polaroid" src="http://placehold.it/150x100/FFB44A/FFF/&amp;text=Design" alt=""></a>
    		</div>
    	</div>
    	<div class="span4">
    		<h3>Upload New Version</h3>
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
    						<div class="bar bar-success" style="width: 100%;"><a class="close" data-dismiss="alert" href="#">&times;</a>design_v3.png</div>
    					</div>
    					<div class="center">
    						<a href="#" class="btn btn-primary btn-wide"><span aria-hidden="true" class="icon-refresh"></span> Update</a>
    					</div>
    				</div>
    			</div>
    		</form>
    		<hr />
    		<div class="row-comments">
    			<h3>Comments &amp; Revisions</h3>
    			<ul class="nav nav-tabs">
    				<li class="active"><a href="#comment" data-toggle="tab">Comment</a></li>
    				<li><a href="#task" data-toggle="tab">Add as Task</a></li>
    			</ul>
    			<div class="tab-content tab-comments">
    				<div class="tab-pane active" id="comment">
    					<img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="16" width="16">
    					<textarea class="span10" placeholder="enter your comment here"></textarea>
    					<div class="btn-toolbar">
    						<div class="btn-group">
    							<a href="#" class="btn btn-mini btn-primary">Post</a>
    						</div>
    						<div class="btn-group">
    							<a href="#comments1" class="btn btn-mini" data-toggle="collapse">Cancel</a>
    						</div>
    					</div>
    				</div>
    				<div class="tab-pane" id="task">
    					<textarea class="span10" placeholder="enter your comment here"></textarea>
    					<form class="form-inline">
    						<input type="text" class="input-small" placeholder="Task Name">
    						<input type="text" class="input-small" placeholder="due on">
    						<a href="#task1" data-toggle="collapse" class="btn btn-mini btn-primary">Add Task</a>
    					</form>
    				</div>
    			</div>
    			<div>
    				<hr class="hr-condensed" />
    				<div class="comment">
    					<img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="16" width="16">
    					<blockquote>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</blockquote>
    				</div>
    				<hr class="hr-condensed" />
    				<div class="comment">
    					<img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="16" width="16">
    					<blockquote>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</blockquote>
    				</div>
    				<hr class="hr-condensed" />
    				<div class="comment">
    					<img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="16" width="16">
    					<blockquote>uploaded new version design_v3.png</blockquote>
    				</div>
    				<hr class="hr-condensed" />
    				<div class="comment">
    					<img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="16" width="16">
    					<blockquote>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</blockquote>
    				</div>
    				<hr class="hr-condensed" />
    				<div class="comment">
    					<img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="16" width="16">
    					<blockquote>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</blockquote>
    				</div>
    				<hr class="hr-condensed" />
    				<div class="comment">
    					<img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="16" width="16">
    					<blockquote>uploaded new version design_v2.png</blockquote>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
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
