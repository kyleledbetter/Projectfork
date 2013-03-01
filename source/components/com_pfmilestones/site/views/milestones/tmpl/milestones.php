<?php
/**
 * @package      Projectfork
 * @subpackage   Milestones
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
$pid        = (int) $this->state->get('filter.project');

$filter_in     = ($this->state->get('filter.isset') ? 'in ' : '');
$tasks_enabled = PFApplicationHelper::enabled('com_pftasks');
$repo_enabled  = PFApplicationHelper::enabled('com_pfrepo');
$cmnts_enabled = PFApplicationHelper::enabled('com_pfcomments');

$doc =& JFactory::getDocument();
$style = '.large {'
        . 'font-size: 20px;'
        . 'line-height: 24px;'
        . '}' 
        . '.medium {'
        . 'font-size: 16px;'
        . 'line-height: 20px;'
        . '}'
        . '.margin-none {'
        . 'margin: 0;'
        . '}';
$doc->addStyleDeclaration( $style );
?>
<div id="projectfork" class="category-list<?php echo $this->pageclass_sfx;?> view-milestones">

    <?php if ($this->params->get('show_page_heading', 1)) : ?>
        <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>

    <div class="clearfix"></div>

    <div class="cat-items">
        <form name="adminForm" id="adminForm" action="<?php echo JRoute::_(PFmilestonesHelperRoute::getMilestonesRoute()); ?>" method="post">
            <div class="btn-toolbar btn-toolbar-top">
                <?php echo $this->toolbar;?>
                <div class="filter-project btn-group">
                    <?php echo JHtml::_('pfhtml.project.filter');?>
                </div>
            </div>

            <div class="<?php echo $filter_in;?>collapse" id="filters">
                <div class="btn-toolbar clearfix">
                    <div class="filter-search btn-group pull-left">
                        <input type="text" name="filter_search" placeholder="<?php echo JText::_('JSEARCH_FILTER_SEARCH'); ?>" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" />
                    </div>
                    <div class="filter-search-buttons btn-group pull-left">
                        <button type="submit" class="btn" rel="tooltip" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>"><i class="icon-search"></i></button>
                        <button type="button" class="btn" rel="tooltip" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>" onclick="document.id('filter_search').value='';this.form.submit();"><i class="icon-remove"></i></button>
                    </div>
                    <?php if ($pid) : ?>
                        <div class="filter-author btn-group pull-left">
                            <select id="filter_author" name="filter_author" class="inputbox input-small" onchange="this.form.submit()">
                                <option value=""><?php echo JText::_('JOPTION_SELECT_AUTHOR');?></option>
                                <?php echo JHtml::_('select.options', $this->authors, 'value', 'text', $this->state->get('filter.author'), true);?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->access->get('core.edit.state') || $this->access->get('core.edit')) : ?>
                        <div class="filter-published btn-group pull-left">
                            <select name="filter_published" class="inputbox input-small" onchange="this.form.submit()">
                                <option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED');?></option>
                                <?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.published'), true);?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <?php if ($pid) : ?>
                        <div class="filter-labels btn-group pull-left">
                            <?php echo JHtml::_('pfhtml.label.filter', 'com_pfmilestones.milestone', $pid, $this->state->get('filter.labels'));?>
                        </div>
                    <?php endif; ?>
                    <div class="btn-group filter-order pull-left">
                        <select name="filter_order" class="inputbox input-small" onchange="this.form.submit()">
                            <?php echo JHtml::_('select.options', $this->sort_options, 'value', 'text', $list_order, true);?>
                        </select>
                    </div>
                    <div class="btn-group folder-order-dir pull-left">
                        <select name="filter_order_Dir" class="inputbox input-small" onchange="this.form.submit()">
                            <?php echo JHtml::_('select.options', $this->order_options, 'value', 'text', $list_dir, true);?>
                        </select>
                    </div>
                </div>
            </div>

            <?php
            $k = 0;
            $current_project = '';
            foreach($this->items AS $i => $item) :
                $access = PFmilestonesHelper::getActions($item->id);

                $can_create   = $access->get('core.create');
                $can_edit     = $access->get('core.edit');
                $can_edit_own = ($access->get('core.edit.own') && $item->created_by == $uid);
                $can_checkin  = ($user->authorise('core.manage', 'com_checkin') || $item->checked_out == $uid || $item->checked_out == 0);
                $can_change   = ($access->get('core.edit.state') && $can_checkin);

                // Calculate milestone progress
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
                    $options = array('div-class' => 'pull-right', 'a-class' => 'btn-mini');
                    $watch = JHtml::_('pfhtml.button.watch', 'milestones', $i, $item->watching, $options);
                }
            ?>
                <?php if ($item->project_title != $current_project && $pid <= 0) : ?>
                    <h3><?php echo $this->escape($item->project_title);?></h3>
                    <hr />
                <?php $current_project = $item->project_title; endif; ?>
                
                <div class="row-fluid">
                	<div class="span1">
                		<div class="badge center">
                			<div class="large"><?php echo JHtml::_('date', $item->end_date, JText::_('d')); ?></div>
                			<div class="medium"><?php echo JHtml::_('date', $item->end_date, JText::_('M')); ?></div>
                		</div>
                	</div>
                	<div class="span11">
                		<div class="well well-small margin-none">
                			<?php if ($can_change || $uid) : ?>
                			    <label for="cb<?php echo $i; ?>" class="checkbox pull-left">
                			        <?php echo JHtml::_('pf.html.id', $i, $item->id); ?>
                			    </label>
                			<?php endif; ?>
                			<h4>
                				<?php if ($item->checked_out) : ?>
                				    <i class="icon-lock"></i>
                				<?php endif; ?>
                				<a href="<?php echo JRoute::_(PFmilestonesHelperRoute::getMilestoneRoute($item->slug, $item->project_slug));?>">
                				    <?php echo $this->escape($item->title);?>
                				</a>
                				<?php if ($item->label_count) : echo JHtml::_('pfhtml.label.labels', $item->labels); endif; ?>
                			</h4>
                			<div class="well-description">
                				<?php echo JHtml::_('pf.html.truncate', $item->description, 180); ?>
                			</div>
                		</div>
                		<div class="btn-toolbar">
                			<?php if ($cmnts_enabled) : echo JHtml::_('pfcomments.label', $item->comments); endif; ?>
                			<?php if ($tasks_enabled) : ?>
	    	    				<div class="btn-group">
	    	    			        <a href="<?php echo JRoute::_(PFtasksHelperRoute::getTasksRoute($item->project_slug, $item->slug));?>" class="btn btn-mini">
	    	    			            <span aria-hidden="true" class="icon-list-view"></span> 
	    	    			            <?php echo (int) $item->tasklists;?> <?php echo JText::_('JGRID_HEADING_TASKLISTS'); ?>
	    	    			        </a>
	    	    				</div>
	    	    			<?php endif; ?>
	    	    			<?php if ($tasks_enabled) : ?>
    	    	    			<div class="btn-group">
                                    <a href="<?php echo JRoute::_(PFtasksHelperRoute::getTasksRoute($item->project_slug, $item->slug));?>" class="btn btn-mini">
                                        <span aria-hidden="true" class="icon-checkmark"></span> 
                                        <?php echo (int) $item->tasks;?> <?php echo JText::_('JGRID_HEADING_TASKS'); ?>
                                    </a>
    	    	    			</div>
	    	    			<?php endif; ?>
	    	    			<?php if ($repo_enabled) : ?>
	    	    				<div class="btn-group">
	    	    			        <a href="<?php echo JRoute::_(PFrepoHelperRoute::getRepositoryRoute($item->project_slug, $repo_dir));?>" class="btn btn-mini">
	    	    			            <span aria-hidden="true" class="icon-flag-2"></span> 
	    	    			            <?php echo (int) $item->attachments;?> <?php echo JText::_('COM_PROJECTFORK_FILES'); ?>
	    	    			        </a>
	    	    				</div>
	    	    			<?php endif; ?>
	    	    			<?php if ($can_edit || $can_edit_own) : ?>
    	    	    			<div class="btn-group pull-right">
    	    	    			    <a class="btn btn-mini" href="<?php echo JRoute::_('index.php?option=com_pfmilestones&task=form.edit&id=' . $item->slug);?>">
    	    	    			        <span aria-hidden="true" class="icon-pencil"></span> Edit
    	    	    			    </a>
    	    	    			</div>
	    	    			<?php endif; ?>
                			<?php echo $watch; ?>
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

            <input type="hidden" id="boxchecked" name="boxchecked" value="0"/>
            <input type="hidden" name="task" value="" />
            <?php echo JHtml::_('form.token'); ?>
        </form>
    </div>
</div>
