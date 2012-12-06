<?php
/**
 * @package      Projectfork
 * @subpackage   Forum
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

$filter_in  = ($this->state->get('filter.isset') ? 'in ' : '');
$repo_enabled  = PFApplicationHelper::enabled('com_pfrepo');
?>
<div id="projectfork" class="category-list<?php echo $this->pageclass_sfx;?> view-topics">

    <?php if ($this->params->get('show_page_heading', 1)) : ?>
        <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>
    
    <!-- Begin Placeholder -->
    <style type="text/css">
    	.row-topics .well,
    	.row-topics .btn-toolbar {
    		margin-bottom: 0;
    	}
    	.row-tags .btn {
    		margin-bottom: 10px;
    	}
    	.row-tags .label {
    		position: relative;
    		top: 1px;
    		left: 3px;
    	}
    	.list-comments img,
    	.collapse-comments img {
    		float: left;
    		margin-right: 10px;
    	}
    	.collapse-comments .btn-toolbar {
    		margin: 0 0 0 50px;
    	}
    	.collapse-comments blockquote {
    		margin-left: 50px;
    	}
    </style>
    <div class="row-fluid">
    	<div class="span8">
    		<h2>Topics</h2>
    		<div class="row-striped row-topics">
    			<!-- Begin Topic -->
    			<div class="row-fluid">
    				<div class="span1">
    					<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
    				</div>
    				<div class="span11">
    					<div class="well well-small">
    						<span class="small muted pull-right">4 hours ago</span>
    						<h4><a href="#">Topic Name</a></h4>
    						<div class="well-description">
    							At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident... 
        							<a href="#" class="btn btn-micro">more</a>
    						</div>
    					</div>
    					<div class="btn-toolbar">
    						<div class="btn-group">
    							<a href="#comments1" class="btn btn-mini" data-toggle="collapse">
    								<span aria-hidden="true" class="icon-comment"></span> 4 comments
    							</a>
    						</div>
    						<div class="btn-group">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-flag-2"></span> 1 file
    							</a>
    						</div>
    						<div class="btn-group pull-right">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-pencil"></span> edit
    							</a>
    						</div>
    						<div class="btn-group pull-right">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-mail"></span> subscribe
    							</a>
    						</div>
    					</div>
    					<div id="comments1" class="collapse collapse-comments">
    						<hr class="hr-condensed" />
    						<img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="32" width="32">
    						<textarea class="span10" placeholder="enter your comment here"></textarea>
    						<div class="btn-toolbar">
    							<div class="btn-group">
    								<a href="#" class="btn btn-mini btn-primary">Post</a>
    							</div>
    							<div class="btn-group">
    								<a href="#comments1" class="btn btn-mini" data-toggle="collapse">Cancel</a>
    							</div>
    						</div>
    						<hr class="hr-condensed" />
    						<div class="comment">
    							<span class="small muted pull-right">30 min ago</span>
    							<img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="32" width="32">
    							<blockquote>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</blockquote>
    						</div>
    						<hr class="hr-condensed" />
    						<div class="comment">
    							<span class="small muted pull-right">52 min ago</span>
    							<img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="32" width="32">
    							<blockquote>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</blockquote>
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- End Topic -->
    			<!-- Begin Topic -->
    			<div class="row-fluid">
    				<div class="span1">
    					<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
    				</div>
    				<div class="span11">
    					<div class="well well-small">
    						<span class="small muted pull-right">8 hours ago</span>
    						<h4><a href="#">Topic Name</a></h4>
    						<div class="well-description">
    							At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident... 
    								<a href="#" class="btn btn-micro">more</a>
    						</div>
    					</div>
    					<div class="btn-toolbar">
    						<div class="btn-group">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-comment"></span> 2 comments
    							</a>
    						</div>
    						<div class="btn-group pull-right">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-pencil"></span> edit
    							</a>
    						</div>
    						<div class="btn-group pull-right">
    							<a href="#" class="btn btn-mini active">
    								<span aria-hidden="true" class="icon-mail"></span> subscribed
    							</a>
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- End Topic -->
    			<!-- Begin Topic -->
    			<div class="row-fluid">
    				<div class="span1">
    					<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
    				</div>
    				<div class="span11">
    					<div class="well well-small">
    						<span class="small muted pull-right">1 day ago</span>
    						<h4><a href="#">Topic Name</a></h4>
    						<div class="well-description">
    							At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident... 
    								<a href="#" class="btn btn-micro">more</a>
    						</div>
    					</div>
    					<div class="btn-toolbar">
    						<div class="btn-group">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-comment"></span> 11 comments
    							</a>
    						</div>
    						<div class="btn-group">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-flag-2"></span> 1 file
    							</a>
    						</div>
    						<div class="btn-group pull-right">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-pencil"></span> edit
    							</a>
    						</div>
    						<div class="btn-group pull-right">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-mail"></span> subscribe
    							</a>
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- End Topic -->
    			<!-- Begin Topic -->
    			<div class="row-fluid">
    				<div class="span1">
    					<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
    				</div>
    				<div class="span11">
    					<div class="well well-small">
    						<span class="small muted pull-right">2 days ago</span>
    						<h4><a href="#">Topic Name</a></h4>
    						<div class="well-description">
    							At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident... 
    								<a href="#" class="btn btn-micro">more</a>
    						</div>
    					</div>
    					<div class="btn-toolbar">
    						<div class="btn-group">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-comment"></span> 2 comments
    							</a>
    						</div>
    						<div class="btn-group pull-right">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-pencil"></span> edit
    							</a>
    						</div>
    						<div class="btn-group pull-right">
    							<a href="#" class="btn btn-mini active">
    								<span aria-hidden="true" class="icon-mail"></span> subscribed
    							</a>
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- End Topic -->
    			<!-- Begin Topic -->
    			<div class="row-fluid">
    				<div class="span1">
    					<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
    				</div>
    				<div class="span11">
    					<div class="well well-small">
    						<span class="small muted pull-right">1 week ago</span>
    						<h4><a href="#">Topic Name</a></h4>
    						<div class="well-description">
    							At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident... 
    								<a href="#" class="btn btn-micro">more</a>
    						</div>
    					</div>
    					<div class="btn-toolbar">
    						<div class="btn-group">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-comment"></span> 2 comments
    							</a>
    						</div>
    						<div class="btn-group">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-flag-2"></span> 2 files
    							</a>
    						</div>
    						<div class="btn-group pull-right">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-pencil"></span> edit
    							</a>
    						</div>
    						<div class="btn-group pull-right">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-mail"></span> subscribe
    							</a>
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- End Topic -->
    			<!-- Begin Topic -->
    			<div class="row-fluid">
    				<div class="span1">
    					<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
    				</div>
    				<div class="span11">
    					<div class="well well-small">
    						<span class="small muted pull-right">2 weeks ago</span>
    						<h4><a href="#">Topic Name</a></h4>
    						<div class="well-description">
    							At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident... 
    								<a href="#" class="btn btn-micro">more</a>
    						</div>
    					</div>
    					<div class="btn-toolbar">
    						<div class="btn-group">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-comment"></span> 4 comments
    							</a>
    						</div>
    						<div class="btn-group">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-flag-2"></span> 1 file
    							</a>
    						</div>
    						<div class="btn-group pull-right">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-pencil"></span> edit
    							</a>
    						</div>
    						<div class="btn-group pull-right">
    							<a href="#" class="btn btn-mini">
    								<span aria-hidden="true" class="icon-mail"></span> subscribe
    							</a>
    						</div>
    					</div>
    				</div>
    			</div>
    			<!-- End Topic -->
    		</div>
    	</div>
    	<div class="span4">
    		<!-- Begin Placeholder -->
    		<h3>Recent Comments</h3>
    		<ul class="list-striped list-comments">
    			<li>
    				<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="16" width="16"></a>
    				<p><span aria-hidden="true" class="icon-quote muted"></span> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium...<span aria-hidden="true" class="icon-quote-2 muted"></span></p>
    				<span class="small muted pull-right">30 minutes ago</span>
    				in <a href="#">Topic Name</a>
    			</li>
    			<li>
    				<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="16" width="16"></a>
    				<p><span aria-hidden="true" class="icon-quote muted"></span> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium...<span aria-hidden="true" class="icon-quote-2 muted"></span></p>
    				<span class="small muted pull-right">52 minutes ago</span>
    				in <a href="#">Topic Name</a>
    			</li>
    			<li>
    				<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="16" width="16"></a>
    				<p><span aria-hidden="true" class="icon-quote muted"></span> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium...<span aria-hidden="true" class="icon-quote-2 muted"></span></p>
    				<span class="small muted pull-right">1 hour ago</span>
    				in <a href="#">Topic Name</a>
    			</li>
    			<li>
    				<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="16" width="16"></a>
    				<p><span aria-hidden="true" class="icon-quote muted"></span> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium...<span aria-hidden="true" class="icon-quote-2 muted"></span></p>
    				<span class="small muted pull-right">2 hours ago</span>
    				in <a href="#">Topic Name</a>
    			</li>
    			<li>
    				<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="16" width="16"></a>
    				<p><span aria-hidden="true" class="icon-quote muted"></span> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium...<span aria-hidden="true" class="icon-quote-2 muted"></span></p>
    				<span class="small muted pull-right">8 hours ago</span>
    				in <a href="#">Topic Name</a>
    			</li>
    		</ul>
    		<!-- End Placeholder -->
    		<!-- Begin Placeholder -->
    		<br />
    		<h3>Popular Tags</h3>
    		<div class="row-tags">
    			<a href="#" class="btn btn-small">design <span class="label label-info">42</span></a> <a href="#" class="btn btn-small">development <span class="label label-info">37</span></a> <a href="#" class="btn btn-small">ui <span class="label label-info">32</span></a> <a href="#" class="btn btn-small">ux <span class="label label-info">29</span></a> <a href="#" class="btn btn-small">php <span class="label label-info">26</span></a> <a href="#" class="btn btn-small">css <span class="label label-info">23</span></a> <a href="#" class="btn btn-small">joomla <span class="label label-info">19</span></a> <a href="#" class="btn btn-small">deliverable <span class="label label-info">16</span></a> <a href="#" class="btn btn-small">bug <span class="label label-info">13</span></a> <a href="#" class="btn btn-small">feature <span class="label label-info">11</span></a> <a href="#" class="btn btn-small">employees <span class="label label-info">5</span></a> <a href="#" class="btn btn-small">marketing <span class="label label-info">3</span></a> <a href="#" class="btn btn-small">legal <span class="label label-info">2</span></a>
    		</div>
    		<!-- End Placeholder -->
    	</div>
    </div>
    <!-- End Placeholder -->

    <div class="clearfix"></div>

    <div class="cat-items" style="display: none;">

        <form name="adminForm" id="adminForm" action="<?php echo JRoute::_(PFforumHelperRoute::getTopicsRoute()); ?>" method="post">
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
                    <hr />

                    <?php if (is_numeric($this->state->get('filter.project'))) : ?>
                        <div class="filter-author btn-group">
                            <select id="filter_author" name="filter_author" class="inputbox input-medium" onchange="this.form.submit()">
                                <option value=""><?php echo JText::_('JOPTION_SELECT_AUTHOR');?></option>
                                <?php echo JHtml::_('select.options', $this->authors, 'value', 'text', $this->state->get('filter.author'), true);?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->access->get('core.edit.state') || $this->access->get('core.edit')) : ?>
                        <div class="filter-published btn-group">
                            <select name="filter_published" class="inputbox input-medium" onchange="this.form.submit()">
                                <option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED');?></option>
                                <?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.published'), true);?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <div class="clearfix"> </div>

                    <?php if ($this->state->get('filter.project')) : ?>
                        <hr />
                        <div class="filter-labels">
                            <?php echo JHtml::_('pfhtml.label.filter', 'com_pfforum.topic', $this->state->get('filter.project'), $this->state->get('filter.labels'));?>
                        </div>
                        <div class="clearfix"> </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row-striped row-discussions">
            <?php
            $k = 0;
            foreach($this->items AS $i => $item) :
                $access = PFforumHelper::getActions($item->id);

                $can_create   = $access->get('core.create');
                $can_edit     = $access->get('core.edit');
                $can_change   = $access->get('core.edit.state');
                $can_edit_own = ($access->get('core.edit.own') && $item->created_by == $uid);

                // Prepare the watch button
                $watch = '';

                if ($uid) {
                    $options = array('div-class' => 'pull-right', 'a-class' => 'btn-mini');
                    $watch = JHtml::_('pfhtml.button.watch', 'topics', $i, $item->watching, $options);
                }
            ?>
                <div class="row-fluid row-<?php echo $k;?>">
                    <?php if ($can_change || $uid) : ?>
                        <label for="cb<?php echo $i; ?>" class="checkbox pull-left">
                            <?php echo JHtml::_('pf.html.id', $i, $item->id); ?>
                        </label>
                    <?php endif; ?>
                    <?php
                        $this->menu->start(array('class' => 'btn-mini', 'pull' => 'left'));
                        $this->menu->itemEdit('topicform', $item->id, ($can_edit || $can_edit_own));
                        $this->menu->itemTrash('topics', $i, $can_change);
                        $this->menu->end();

                        echo $this->menu->render(array('class' => 'btn-mini'));
                    ?>

                    <?php echo $watch; ?>

                    <h3 class="topic-title">
                        <a href="<?php echo JRoute::_(PFforumHelperRoute::getTopicRoute($item->slug, $item->project_slug));?>">
                            <?php if ($item->checked_out) : ?><i class="icon-lock"></i> <?php endif; ?>
                            <?php echo $this->escape($item->title);?>
                        </a>
                        &nbsp;
                        <?php echo JHtml::_('pfforum.repliesLabel', $item->replies, $item->last_activity); ?>
                    </h3>

                    <blockquote class="item-description" id="topic-<?php echo $item->id;?>">
                        <?php echo JHtml::_('pf.html.truncate', $item->description, 300); ?>
                    </blockquote>
                    <hr />
                    <?php echo JHtml::_('pfhtml.label.author', $item->author_name, $item->created); ?>
                    <?php echo JHtml::_('pfhtml.label.access', $item->access); ?>
                    <?php if ($repo_enabled) : echo JHtml::_('pfrepo.attachmentsLabel', $item->attachments); endif; ?>
                    <?php if ($item->label_count) : echo JHtml::_('pfhtml.label.labels', $item->labels); endif; ?>
                </div>
            <?php
            $k = 1 - $k;
            endforeach;
            ?>
            </div>

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
                <div class="btn-group display-limit">
                    <?php echo $this->pagination->getLimitBox(); ?>
                </div>
                <?php if ($this->pagination->get('pages.total') > 1) : ?>
                    <div class="btn-group pagination">
                        <p class="counter"><?php echo $this->pagination->getPagesCounter(); ?></p>
                        <?php echo $this->pagination->getPagesLinks(); ?>
                    </div>
                <?php endif; ?>
            </div>

            <input type="hidden" id="boxchecked" name="boxchecked" value="0" />
            <input type="hidden" name="task" value="" />
            <?php echo JHtml::_('form.token'); ?>
        </form>
    </div>
</div>
