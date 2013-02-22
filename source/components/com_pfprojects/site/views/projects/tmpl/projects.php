<?php
/**
 * @package      Projectfork
 * @subpackage   Projects
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

$filter_in     = ($this->state->get('filter.isset') ? 'in ' : '');
$milestones_enabled = PFApplicationHelper::enabled('com_pfmilestones');
$tasks_enabled = PFApplicationHelper::enabled('com_pftasks');
$time_enabled = PFApplicationHelper::enabled('com_pftime');
$repo_enabled  = PFApplicationHelper::enabled('com_pfrepo');
$forum_enabled = PFApplicationHelper::enabled('com_pfforum');
$users_enabled = PFApplicationHelper::enabled('com_pfusers');
$cmnts_enabled = PFApplicationHelper::enabled('com_pfcomments');
?>
<div id="projectfork" class="category-list<?php echo $this->pageclass_sfx;?> view-projects">
    <?php if ($this->params->get('show_page_heading', 1)) : ?>
        <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>

    <div class="clearfix"></div>

    <div class="grid">
        <form name="adminForm" id="adminForm" action="<?php echo JRoute::_(PFprojectsHelperRoute::getProjectsRoute()); ?>" method="post">

            <div class="btn-toolbar btn-toolbar-top">
                <?php echo $this->toolbar;?>
            </div>

            <div class="clearfix"></div>

            <div class="<?php echo $filter_in;?>collapse" id="filters">
                <div class="btn-toolbar clearfix">
                    <div class="filter-search btn-group pull-left">
                        <input type="text" name="filter_search" placeholder="<?php echo JText::_('JSEARCH_FILTER_SEARCH'); ?>" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>"/>
                    </div>
                    <div class="filter-search-buttons btn-group pull-left">
                        <button type="submit" class="btn" rel="tooltip" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>">
                            <i class="icon-search"></i>
                        </button>
                        <button type="button" class="btn" rel="tooltip" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>" onclick="document.id('filter_search').value='';this.form.submit();">
                            <i class="icon-remove"></i>
                        </button>
                    </div>
                    <div class="filter-order btn-group pull-left">
                        <select name="filter_order" class="inputbox input-small" onchange="this.form.submit()">
                            <?php echo JHtml::_('select.options', $this->sort_options, 'value', 'text', $list_order, true);?>
                        </select>
                    </div>
                    <div class="folder-order-dir btn-group pull-left">
                        <select name="filter_order_Dir" class="inputbox input-small" onchange="this.form.submit()">
                            <?php echo JHtml::_('select.options', $this->order_options, 'value', 'text', $list_dir, true);?>
                        </select>
                    </div>
                    <div class="filter-category btn-group pull-left">
                        <select name="filter_category" class="inputbox input-small" onchange="this.form.submit()">
                            <option value=""><?php echo JText::_('JOPTION_SELECT_CATEGORY');?></option>
                            <?php echo JHtml::_('select.options', JHtml::_('category.options', 'com_pfprojects'), 'value', 'text', $this->state->get('filter.category'));?>
                        </select>
                    </div>
                    <?php if ($this->access->get('core.edit.state') || $this->access->get('core.edit')) : ?>
                        <div class="filter-author btn-group pull-left">
                            <select name="filter_published" class="inputbox input-small" onchange="this.form.submit()">
                                <option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED');?></option>
                                <?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.published'), true);?>
                            </select>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="clearfix"></div>

                <?php
                $k = 0;
                $current_cat = '';
                foreach($this->items AS $i => $item) :
                    $access = PFprojectsHelper::getActions($item->id);
                    $link   = PfprojectsHelperRoute::getDashboardRoute($item->slug);

                    $can_create   = $access->get('core.create');
                    $can_edit     = $access->get('core.edit');
                    $can_checkin  = ($user->authorise('core.manage', 'com_checkin') || $item->checked_out == $uid || $item->checked_out == 0);
                    $can_edit_own = ($access->get('core.edit.own') && $item->created_by == $uid);
                    $can_change   = ($access->get('core.edit.state') && $can_checkin);

                    // Calculate project progress
                    $task_count = (int) $item->tasks;
                    $completed  = (int) $item->completed_tasks;
                    $progress   = ($task_count == 0) ? 0 : round($completed * (100 / $task_count));
                    
                    // Repo directory
                    $repo_dir = (int) $this->params->get('repo_dir');

                    if ($progress >= 67)  $progress_class = 'info';
                    if ($progress == 100) $progress_class = 'success';
                    if ($progress < 67)   $progress_class = 'warning';
                    if ($progress < 34)   $progress_class = 'danger label-important';

                    // Prepare the watch button
                    $watch = '';

                    if ($uid) {
                        $options = array('div-class' => '', 'a-class' => 'btn-mini');
                        $watch = JHtml::_('pfhtml.button.watch', 'projects', $i, $item->watching, $options);
                    }
                ?>
                <?php if ($item->category_title != $current_cat && !is_numeric($this->state->get('filter.category'))) : ?>
                    <h3><?php echo $this->escape($item->category_title);?></h3>
                    <hr />
                <?php $current_cat = $item->category_title; endif; ?>
                <div class="well well-small clearfix well-project">
                	<div class="row-fluid">
    	    	    	<div class="span5">
    	    	    		<?php if (!empty($item->logo_img)) : ?>
    	    	    		    <a href="<?php echo JRoute::_($link);?>" class="height-90 thumbnail" style="overflow:hidden;">
    	    	    		        <img src="<?php echo $item->logo_img;?>" alt="<?php echo $this->escape($item->title);?>" />
    	    	    		    </a>
    	    	    		<?php endif ; ?>
    	    	    		<div class="item-title">
                                <?php if ($can_change || $uid) : ?>
                                    <label for="cb<?php echo $i; ?>" class="checkbox pull-left">
                                        <?php echo JHtml::_('pf.html.id', $i, $item->id); ?>
                                    </label>
                                <?php endif; ?>

                                <?php if ($item->checked_out) : ?>
                                    <span aria-hidden="true" class="icon-lock"></span>
                                <?php endif; ?>

                                <a href="<?php echo JRoute::_($link);?>" rel="tooltip" data-placement="bottom">
                                    <?php echo $this->escape($item->title);?>
                                </a>
                            </div>
    	    	    		<div class="item-description small"><?php echo JHtml::_('pf.html.truncate', $item->description, 180); ?></div>
    	    	    		<div class="btn-toolbar">
    	    	    			<div class="btn-group">
    	    	    				<?php if ($cmnts_enabled) : echo JHtml::_('pfcomments.label', $item->comments); endif; ?>
    	    	    				<?php // echo JHtml::_('pfhtml.label.author', $item->author_name, $item->created); 
    	    	    				?>
    	    	    				<?php // echo JHtml::_('pfhtml.label.access', $item->access); 
    	    	    				?>
    	    	    				<?php // echo JHtml::_('pfhtml.label.datetime', $item->end_date, true); 
    	    	    				?>
    	    	    			</div>
    	    	    			<?php if ($can_edit || $can_edit_own) : ?>
    	    	    			<div class="btn-group">
    	    	    			    <a class="btn btn-mini" href="<?php echo JRoute::_('index.php?option=com_pfprojects&task=form.edit&id=' . $item->slug);?>">
    	    	    			        <span aria-hidden="true" class="icon-pencil"></span> Edit
    	    	    			    </a>
    	    	    			</div>
    	    	    			<?php endif; ?>
    	    	    			<?php echo $watch; ?>
    	    	    		</div>
    	    	    	</div>
    	    	    	<div class="span3">
    	    	    		<ul class="nav nav-tabs nav-stacked">
    	    	    			<?php if ($milestones_enabled) : ?>
    	    	    				<li>
    	    	    			        <a href="<?php echo JRoute::_(PFmilestonesHelperRoute::getMilestonesRoute($item->slug, $item->slug));?>">
    	    	    			            <span aria-hidden="true" class="icon-location muted"></span> 
    	    	    			            <?php echo JText::_('JGRID_HEADING_MILESTONES'); ?>
    	    	    			            <span class="badge badge-info pull-right"><?php echo (int) $item->milestones;?></span>
    	    	    			        </a>
    	    	    				</li>
    	    	    			<?php endif; ?>
    	    	    			<?php if ($tasks_enabled) : ?>
    	    	    				<li>
    	    	    			        <a href="<?php echo JRoute::_(PFtasksHelperRoute::getTasksRoute($item->slug, $item->slug));?>">
    	    	    			            <span aria-hidden="true" class="icon-list-view muted"></span> 
    	    	    			            <?php echo JText::_('JGRID_HEADING_TASKLISTS'); ?>
    	    	    			            <span class="badge badge-info pull-right"><?php echo (int) $item->tasklists;?></span>
    	    	    			        </a>
    	    	    				</li>
    	    	    			<?php endif; ?>
    	    	    			<?php if ($tasks_enabled) : ?>
	    	    	    			<li>
	                                    <a href="<?php echo JRoute::_(PFtasksHelperRoute::getTasksRoute($item->slug, $item->slug));?>">
	                                        <span aria-hidden="true" class="icon-checkmark muted"></span> 
	                                        <?php echo JText::_('JGRID_HEADING_TASKS'); ?>
	                                        <span class="badge badge-info pull-right"><?php echo (int) $item->tasks;?></span>
	                                    </a>
	    	    	    			</li>
    	    	    			<?php endif; ?>
    	    	    			<?php if ($time_enabled) : ?>
    	    	    				<li>
    	    	    			        <a href="<?php echo JRoute::_(PFtimeHelperRoute::getTimesheetRoute($item->slug, $item->slug));?>">
    	    	    			            <span aria-hidden="true" class="icon-clock muted"></span> 
    	    	    			            <?php echo JText::_('COM_PROJECTFORK_TIME_TRACKING_TIME'); ?>
    	    	    			            <span class="badge badge-info pull-right"><?php echo JHtml::_('time.format', $item->total_time, 'decimal');?></span>
    	    	    			        </a>
    	    	    				</li>
    	    	    			<?php endif; ?>
    	    	    			<?php if ($repo_enabled) : ?>
    	    	    				<li>
    	    	    			        <a href="<?php echo JRoute::_(PFrepoHelperRoute::getRepositoryRoute($item->slug, $repo_dir));?>">
    	    	    			            <span aria-hidden="true" class="icon-flag-2 muted"></span> 
    	    	    			            <?php echo JText::_('COM_PROJECTFORK_FILES'); ?>
    	    	    			            <span class="badge badge-info pull-right"><?php echo (int) $item->attachments;?></span>
    	    	    			        </a>
    	    	    				</li>
    	    	    			<?php endif; ?>
    	    	    			<?php if ($forum_enabled) : ?>
    	    	    				<li>
    	    	    			        <a href="<?php echo JRoute::_(PFforumHelperRoute::getTopicsRoute($item->slug, $item->slug));?>">
    	    	    			            <span aria-hidden="true" class="icon-comments-2 muted"></span> 
    	    	    			            <?php echo JText::_('COM_PROJECTFORK_TOPICS'); ?>
    	    	    			            <span class="badge badge-info pull-right"><?php echo (int) $item->forums;?></span>
    	    	    			        </a>
    	    	    				</li>
    	    	    			<?php endif; ?>
    	    	    			<?php if ($users_enabled) : ?>
    	    	    				<li>
    	    	    			        <a href="<?php echo JRoute::_(PFusersHelperRoute::getUsersRoute($item->slug, $item->slug));?>">
    	    	    			            <span aria-hidden="true" class="icon-users muted"></span> 
    	    	    			            <?php echo JText::_('COM_PROJECTFORK_USERS'); ?>
    	    	    			            <span class="badge badge-info pull-right"><?php echo (int) $item->users;?></span>
    	    	    			        </a>
    	    	    				</li>
    	    	    			<?php endif; ?>
    	    	    		</ul>
    	    	    	</div>
    	    	    	<div class="span4">
    	    	    		<h4>Project Completion</h4>
    	    	    		<div class="progress progress-<?php echo $progress_class;?> progress-striped progress-project">
    	    	    		    <div class="bar" style="width: <?php echo ($progress > 0) ? $progress."%": "24px";?>">
    	    	    		        <span class="label label-<?php echo $progress_class;?> pull-right"><?php echo $progress;?>%</span>
    	    	    		    </div>
    	    	    		</div>
    	    	    		<h4>Project Members</h4>
    	    	    		<div class="row-users">
    	    	    			<?php
    	    	    			$k = 0;
    	    	    			foreach($item->users AS $i => $item) :
    	    	    			$asset_name = 'com_users&task=profile.edit&user_id=.' . $item->id;
    	    	    			$slug       = $item->id.':'.JFilterOutput::stringURLSafe($item->username);
    	    	    			?>
    	    	    			<a href="<?php echo PFusersHelperRoute::getUserRoute($slug);?>">
    	    	    			    <?php echo JHtml::_('projectfork.avatar.image', $item->id, $item->name);?>
    	    	    			</a>
    	    	    			<?php
    	    	    			$k = 1 - $k;
    	    	    			endforeach;
    	    	    			?>
    	    	    		</div>
    	    	    	</div>
    	    	    </div> 
                </div>
                <?php
                    $k = 1 - $k;
                    endforeach;
                ?>

            
        	<?php if ($this->pagination->get('pages.total') > 1) : ?>
        	    <div class="pagination center">
        	        <?php echo $this->pagination->getPagesLinks(); ?>
        	    </div>
        	    <p class="counter center"><?php echo $this->pagination->getPagesCounter(); ?></p>
        	<?php endif; ?>
            <div class="filters center">
            	<span class="display-limit">
            	    <?php echo $this->pagination->getLimitBox(); ?>
            	</span>
            </div>

            <input type="hidden" id="boxchecked" name="boxchecked" value="0" />
            <input type="hidden" name="task" value="" />
            <?php echo JHtml::_('form.token'); ?>
        </form>
    </div>
</div>
