<?php
/**
 * @package      Projectfork
 * @subpackage   Dashboard
 *
 * @author       Tobias Kuhn (eaxs)
 * @copyright    Copyright (C) 2006-2012 Tobias Kuhn. All rights reserved.
 * @license      http://www.gnu.org/licenses/gpl.html GNU/GPL, see LICENSE.txt
 */

defined('_JEXEC') or die();


// Create shortcuts
$item    = &$this->item;
$params  = &$this->params;
$state   = &$this->state;
$modules = &$this->modules;

$nulldate = JFactory::getDbo()->getNullDate();

$details_in     = ($state->get('project.request') ? 'in ' : '');
$details_active = ($state->get('project.request') ? ' active' : '');
?>
<style type="text/css">
	.row-tasks .btn {
		margin-right: 10px;
	}
	.row-activity .thumbnail.pull-left {
		margin-bottom: 0;
	}
</style>
<div id="projectfork" class="category-list<?php echo $this->pageclass_sfx;?> view-dashboard">

    <?php if ($params->get('show_page_heading', 1)) : ?>
        <h1><?php echo $this->escape($params->get('page_heading')); ?></h1>
    <?php endif; ?>

    <div class="cat-items">

        <form id="adminForm" name="adminForm" method="post" style="display: none;" action="<?php echo JRoute::_(PFprojectsHelperRoute::getDashboardRoute($state->get('filter.project'))); ?>">

            <div class="btn-toolbar btn-toolbar-top">
                <?php echo $this->toolbar;?>
                <?php echo JHtml::_('pfhtml.project.filter');?>
            </div>

            <?php if($item) echo $item->event->afterDisplayTitle; ?>

            <input type="hidden" name="task" value="" />
	        <?php echo JHtml::_('form.token'); ?>

            <?php if($state->get('filter.project')) : ?>
                <div class="btn-group pull-right">
    			    <a data-toggle="collapse" data-target="#project-details" class="btn<?php echo $details_active;?>">
                        <?php echo JText::_('COM_PROJECTFORK_DETAILS_LABEL'); ?> <span class="caret"></span>
                    </a>
    			</div>
            <?php endif; ?>

            <div class="clearfix"></div>

            <?php if ($item) echo $item->event->beforeDisplayContent; ?>

            <?php if($state->get('filter.project')) : ?>
                <div class="<?php echo $details_in;?>collapse" id="project-details">
                    <div class="well">
                        <div class="item-description">

                            <?php echo $item->text; ?>

                            <dl class="article-info dl-horizontal pull-right">
                        		<?php if($item->start_date != $nulldate): ?>
                        			<dt class="start-title">
                        				<?php echo JText::_('JGRID_HEADING_START_DATE'); ?>:
                        			</dt>
                        			<dd class="start-data">
                                        <?php echo JHtml::_('pfhtml.label.datetime', $item->start_date); ?>
                        			</dd>
                        		<?php endif; ?>
                        		<?php if($item->end_date != $nulldate): ?>
                        			<dt class="due-title">
                        				<?php echo JText::_('JGRID_HEADING_DEADLINE'); ?>:
                        			</dt>
                        			<dd class="due-data">
                                        <?php echo JHtml::_('pfhtml.label.datetime', $item->end_date); ?>
                        			</dd>
                        		<?php endif;?>
                        		<dt class="owner-title">
                        			<?php echo JText::_('JGRID_HEADING_CREATED_BY'); ?>:
                        		</dt>
                        		<dd class="owner-data">
                                     <?php echo JHtml::_('pfhtml.label.author', $item->author, $item->created); ?>
                        		</dd>
                                <?php if ($item->params->get('website')) : ?>
                                    <dt class="owner-title">
                            			<?php echo JText::_('COM_PROJECTFORK_FIELD_WEBSITE_LABEL'); ?>:
                            		</dt>
                            		<dd class="owner-data">
                                        <a href="<?php echo $item->params->get('website');?>" target="_blank">
                                            <?php echo JText::_('COM_PROJECTFORK_FIELD_WEBSITE_VISIT_LABEL');?>
                                        </a>
                            		</dd>
                                <?php endif; ?>
                                <?php if ($item->params->get('email')) : ?>
                                    <dt class="owner-title">
                            			<?php echo JText::_('COM_PROJECTFORK_FIELD_EMAIL_LABEL'); ?>:
                            		</dt>
                            		<dd class="owner-data">
                                        <a href="mailto:<?php echo $item->params->get('email');?>" target="_blank">
                                            <?php echo $item->params->get('email');?>
                                        </a>
                            		</dd>
                                <?php endif; ?>
                                <?php if ($item->params->get('phone')) : ?>
                                    <dt class="owner-title">
                            			<?php echo JText::_('COM_PROJECTFORK_FIELD_PHONE_LABEL'); ?>:
                            		</dt>
                            		<dd class="owner-data">
                                        <?php echo $item->params->get('phone');?>
                            		</dd>
                                <?php endif; ?>
                                <?php if (PFApplicationHelper::enabled('com_pfrepo') && count($item->attachments)) : ?>
                                    <dt class="owner-title">
                            			<?php echo JText::_('COM_PROJECTFORK_FIELDSET_ATTACHMENTS'); ?>:
                            		</dt>
                            		<dd class="owner-data">
                                         <?php echo JHtml::_('pfrepo.attachments', $item->attachments); ?>
                            		</dd>
                                <?php endif; ?>
                        	</dl>

                            <div class="clearfix"></div>

                            <hr />


                    	</div>
                    </div>
                </div>
                <div class="clearfix"></div>
            <?php endif; ?>
            <input type="hidden" name="task" value="" />
            <?php echo JHtml::_('form.token'); ?>
        </form>

        <!-- Begin Dashboard Modules -->
        <div class="row-fluid" style="display: none;">
        	<div class="span12">
        		<?php echo $modules->render('pf-dashboard-top', array('style' => 'xhtml'), null); ?>
        	</div>
        </div>
        <div class="row-fluid">
        	<div class="span8">
        		<!-- Begin Placeholder -->
        		<h3>Recent Activity</h3>
        		<div class="btn-toolbar">
        			<div class="btn-group">
        				<input type="text" class="search-query" placeholder="Filter activity">
        			</div>
        			<div class="btn-group pull-right">
						<button class="btn">All Activity</button>
						<button class="btn dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="#">Projects</a></li>
							<li><a href="#">Milestones</a></li>
							<li><a href="#">Task Lists</a></li>
							<li><a href="#">Tasks</a></li>
							<li><a href="#">Files</a></li>
							<li><a href="#">Discussions</a></li>
						</ul>
        			</div>
        		</div>
        		<div class="row-striped row-activity">
        			<div class="row-fluid">
        				<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="thumbnail pull-left" height="32" width="32"></a> 
        				<span class="small muted pull-right">3 minutes ago</span>
        				<h4><a href="#">Firstname Lastname</a></h4>
        					created a new <span class="label label-warning"><span aria-hidden="true" class="icon-list-view"></span> task list</span> <a href="#">Designer Tasks</a>
        			</div>
        			<div class="row-fluid">
        				<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="thumbnail pull-left" height="32" width="32"></a> 
        				<span class="small muted pull-right">6 hours ago</span>
        				<h4><a href="#">Firstname Lastname</a></h4>
        					created a new <span class="label label-success"><span aria-hidden="true" class="icon-briefcase"></span> project</span> <a href="#">Project Name</a>
        			</div>
        			<div class="row-fluid">
        				<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="thumbnail pull-left" height="32" width="32"></a> 
        				<span class="small muted pull-right">1 day ago</span>
        				<h4><a href="#">Firstname Lastname</a></h4>
        					completed a <span class="label label-info"><span aria-hidden="true" class="icon-checkmark"></span> task</span> <a href="#">Task Name</a>
        			</div>
        			<div class="row-fluid">
        				<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="thumbnail pull-left" height="32" width="32"></a> 
        				<span class="small muted pull-right">4 days ago</span>
        				<h4><a href="#">Firstname Lastname</a></h4>
        					create a new <span class="label label-important"><span aria-hidden="true" class="icon-location"></span> milestone</span> <a href="#">Milestone Name</a>
        			</div>
        			<div class="row-fluid">
        				<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="thumbnail pull-left" height="32" width="32"></a> 
        				<span class="small muted pull-right">1 week ago</span>
        				<h4><a href="#">Firstname Lastname</a></h4>
        					edited a <span class="label"><span aria-hidden="true" class="icon-comment"></span> discussion</span> <a href="#">Discussion Name</a>
        			</div>
        			<div class="row-fluid center">
        				<a href="#" class="btn btn-primary"><span aria-hidden="true" class="icon-arrow-down"></span> More</a>
        			</div>
        		</div>
        		<!-- End Placeholder -->
        		<?php echo $modules->render('pf-dashboard-left', array('style' => 'xhtml'), null); ?>
        	</div>
        	<div class="span4">
        		<!-- Begin Placeholder -->
        		<h3>Pending Task List</h3>
        		<ul class="nav nav-tabs">
        			<li class="active"><a href="#overdue" data-toggle="tab">Overdue <span class="badge badge-important"><span aria-hidden="true" class="icon-calendar"></span></span></a></li>
        			<li><a href="#upcoming" data-toggle="tab">Upcoming <span class="badge badge-warning"><span aria-hidden="true" class="icon-warning"></span></span></a></li>
        		</ul>
        		<div class="tab-content">
        			<div class="tab-pane active" id="overdue">
        				<div class="row-striped row-tasks">
        					<div class="row-fluid">
        						<span class="small muted pull-right">due 3 weeks ago</span>
        						<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
        						<h4><a href="#">Task name</a></h4>
        					</div>
        					<div class="row-fluid">
        						<span class="small muted pull-right">due 2 weeks ago</span>
        						<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
        						<h4><a href="#">Task name</a></h4>
        					</div>
        					<div class="row-fluid">
        						<span class="small muted pull-right">due 1 week ago</span>
        						<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
        						<h4><a href="#">Task name</a></h4>
        					</div>
        					<div class="row-fluid">
        						<span class="small muted pull-right">due 6 days ago</span>
        						<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
        						<h4><a href="#">Task name</a></h4>
        					</div>
        					<div class="row-fluid">
        						<span class="small muted pull-right">due 5 days ago</span>
        						<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
        						<h4><a href="#">Task name</a></h4>
        					</div>
        					<div class="row-fluid">
        						<span class="small muted pull-right">due 4 days ago</span>
        						<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
        						<h4><a href="#">Task name</a></h4>
        					</div>
        					<div class="row-fluid">
        						<span class="small muted pull-right">due 3 days ago</span>
        						<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
        						<h4><a href="#">Task name</a></h4>
        					</div>
        					<div class="row-fluid">
        						<span class="small muted pull-right">due 2 days ago</span>
        						<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
        						<h4><a href="#">Task name</a></h4>
        					</div>
        					<div class="row-fluid">
        						<span class="small muted pull-right">due 1 day ago</span>
        						<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
        						<h4><a href="#">Task name</a></h4>
        					</div>
        				</div>
        			</div>
        			<div class="tab-pane" id="upcoming">
        			
        			</div>
        		</div>
        		<!-- End Placeholder -->
        		<?php echo $modules->render('pf-dashboard-right', array('style' => 'xhtml'), null); ?>
        	</div>
        </div>
        <hr />
        <div class="row-fluid">
        	<div class="span4">
        		<!-- Begin Placeholder -->
        		<h3>Project Manager Stats</h3>
        		<ul class="list-striped">
        			<li><span class="span6"><span aria-hidden="true" class="icon-briefcase"></span> Projects:</span><a href="#">10</a></li>
        			<li><span class="span6"><span aria-hidden="true" class="icon-location"></span> Milestones:</span><a href="#">72</a></li>
        			<li><span class="span6"><span aria-hidden="true" class="icon-list-view"></span> Task Lists:</span><a href="#">26</a></li>
        			<li><span class="span6"><span aria-hidden="true" class="icon-checkmark"></span> Tasks:</span><a href="#">84</a></li>
        			<li><span class="span6"><span aria-hidden="true" class="icon-comment"></span> Discussions:</span><a href="#">25</a></li>
        			<li><span class="span6"><span aria-hidden="true" class="icon-file"></span> Files:</span><a href="#">53</a></li>
        			<li><span class="span6"><span aria-hidden="true" class="icon-user"></span> Users:</span><a href="#">13</a></li>
        		</ul>
        		<!-- End Placeholder -->
        		<?php echo $modules->render('pf-dashboard-one', array('style' => 'xhtml'), null); ?>
        	</div>
        	<div class="span4">
        		<!-- Begin Placeholder -->
        		<h3>Upcoming Milestones</h3>
        		<ul class="list-striped">
        			<li>
        				<span class="small muted pull-right">due tomorrow</span>
        				<a href="#">Milestone Name</a>
						<div class="progress progress-success" style="margin-bottom: 0;">
							<div class="bar" style="width: 85%">
								<span class="label label-success pull-right">85%</span>
							</div>
						</div>
        			</li>
        			<li>
        				<span class="small muted pull-right">due in 5 days</span>
        				<a href="#">Milestone Name</a>
        				<div class="progress progress-info" style="margin-bottom: 0;">
        					<div class="bar" style="width: 75%">
        						<span class="label label-info pull-right">75%</span>
        					</div>
        				</div>
        			</li>
        			<li>
        				<span class="small muted pull-right">due next week</span>
        				<a href="#">Milestone Name</a>
        				<div class="progress progress-warning" style="margin-bottom: 0;">
        					<div class="bar" style="width: 40%">
        						<span class="label label-warning pull-right">40%</span>
        					</div>
        				</div>
        			</li>
        			<li>
        				<span class="small muted pull-right">due in 2 weeks</span>
        				<a href="#">Milestone Name</a>
        				<div class="progress progress-info" style="margin-bottom: 0;">
        					<div class="bar" style="width: 50%">
        						<span class="label label-info pull-right">50%</span>
        					</div>
        				</div>
        			</li>
        			<li>
        				<span class="small muted pull-right">due in 3 weeks</span>
        				<a href="#">Milestone Name</a>
        				<div class="progress progress-danger" style="margin-bottom: 0;">
        					<div class="bar" style="width: 33%">
        						<span class="label label-important pull-right">33%</span>
        					</div>
        				</div>
        			</li>
        		</ul>
        		<!-- End Placeholder -->
        		<?php echo $modules->render('pf-dashboard-two', array('style' => 'xhtml'), null); ?>
        	</div>
        	<div class="span4">
        		<!-- Begin Placeholder -->
        		<h3>Recent Files</h3>
        		<ul class="list-striped">
        			<li>
        				<span class="small muted pull-right">2 hours ago</span>
        				<a href="#"><span aria-hidden="true" class="icon-file"></span> filename.zip</a>
        			</li>
        			<li>
        				<span class="small muted pull-right">3 hours ago</span>
        				<a href="#"><span aria-hidden="true" class="icon-picture"></span> filename.png</a>
        			</li>
        			<li>
        				<span class="small muted pull-right">1 day ago</span>
        				<a href="#"><span aria-hidden="true" class="icon-file"></span> filename.zip</a>
        			</li>
        			<li>
        				<span class="small muted pull-right">2 days ago</span>
        				<a href="#"><span aria-hidden="true" class="icon-picture"></span> filename.png</a>
        			</li>
        			<li>
        				<span class="small muted pull-right">4 days ago</span>
        				<a href="#"><span aria-hidden="true" class="icon-file"></span> filename.zip</a>
        			</li>
        			<li>
        				<span class="small muted pull-right">1 week ago</span>
        				<a href="#"><span aria-hidden="true" class="icon-picture"></span> filename.png</a>
        			</li>
        			<li>
        				<span class="small muted pull-right">2 weeks ago</span>
        				<a href="#"><span aria-hidden="true" class="icon-file"></span> filename.zip</a>
        			</li>
        		</ul>
        		<!-- End Placeholder -->
        		<?php echo $modules->render('pf-dashboard-three', array('style' => 'xhtml'), null); ?>
        	</div>
        </div>
        <div class="row-fluid">
        	<div class="span12">
        		<?php echo $modules->render('pf-dashboard-bottom', array('style' => 'xhtml'), null); ?>
        	</div>
        </div>
        <!-- End Dashboard Modules -->

        <?php if ($item) echo $item->event->afterDisplayContent; ?>

	</div>
</div>