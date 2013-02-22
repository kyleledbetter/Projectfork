<?php
/**
 * @package      Projectfork
 * @subpackage   Timetracking
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

$list_total_time = 0;
$list_total_billable = 0.00;

// Calculate un/billable time percentage
$billable_percent   = ($this->total_time == 0) ? 0 : round($this->total_time_billable * (100 / $this->total_time));
$unbillable_percent = ($this->total_time == 0) ? 0 : round($this->total_time_unbillable * (100 / $this->total_time));

$filter_in = ($this->state->get('filter.isset') ? 'in ' : '');
?>
<div id="projectfork" class="category-list<?php echo $this->pageclass_sfx;?> view-timesheet">

    <?php if ($this->params->get('show_page_heading', 1)) : ?>
        <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>
	<!-- Begin Placeholder -->
	<style type="text/css">
		.table-time .progress {
			margin-bottom: 0;
		}
	</style>
	<div class="row-fluid">
		<div class="span8">
			<table class="table table-striped table-time">
				<thead>
					<tr>
						<th colspan="6">
							<div class="btn-toolbar pull-right">
								<div class="btn-group">
									<button class="btn btn-small">Export</button>
									<button class="btn btn-small dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#">Excel</a></li>
										<li><a href="#">CSV</a></li>
										<li><a href="#">Quickbooks</a></li>
									</ul>
								</div>
								<div class="btn-group">
									<button class="btn btn-small"><span aria-hidden="true" class="icon-printer"></span></button>
								</div>
							</div>
						</th>
					</tr>
					<tr>
						<th>User</th>
						<th>Task</th>
						<th>Start Time</th>
						<th>Stop Time</th>
						<th>Duration</th>
						<th style="white-space: nowrap;">Actual vs Estimate</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="24" width="24"></a></td>
						<td><a href="#">Task Name</a></td>
						<td>09:15 AM</td>
						<td>10:00 AM</td>
						<td>0:45</td>
						<td>
							<div class="progress">
								<div class="bar bar-info" style="width: 65%;"></div>
							</div>
						</td>
					</tr>
					<tr>
						<td><a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="24" width="24"></a></td>
						<td><a href="#">Task Name</a></td>
						<td>05:30 PM</td>
						<td>10:30 PM</td>
						<td>5:00</td>
						<td>
							<div class="progress">
								<div class="bar bar-info" style="width: 95%;"></div>
							</div>
						</td>
					</tr>
					<tr>
						<td><a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="24" width="24"></a></td>
						<td><a href="#">Task Name</a></td>
						<td>10:00 AM</td>
						<td>02:30 PM</td>
						<td>4:30</td>
						<td>
							<div class="progress">
								<div class="bar bar-info" style="width: 85%;"></div>
							</div>
						</td>
					</tr>
					<tr>
						<td><a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="24" width="24"></a></td>
						<td><a href="#">Task Name</a></td>
						<td>03:15 AM</td>
						<td>05:00 AM</td>
						<td>1:45</td>
						<td>
							<div class="progress">
								<div class="bar bar-info" style="width: 75%;"></div>
							</div>
						</td>
					</tr>
					<tr>
						<td><a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="24" width="24"></a></td>
						<td><a href="#">Task Name</a></td>
						<td>09:00 AM</td>
						<td>05:00 PM</td>
						<td>8:00</td>
						<td>
							<div class="progress">
								<div class="bar bar-danger" style="width: 100%;"></div>
							</div>
						</td>
					</tr>
					<tr>
						<td><a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="24" width="24"></a></td>
						<td><a href="#">Task Name</a></td>
						<td>03:00 PM</td>
						<td>5:45 PM</td>
						<td>2:45</td>
						<td>
							<div class="progress">
								<div class="bar bar-info" style="width: 97%;"></div>
							</div>
						</td>
					</tr>
					<tr>
						<td><a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="24" width="24"></a></td>
						<td><a href="#">Task Name</a></td>
						<td>09:15 AM</td>
						<td>10:00 AM</td>
						<td>0:45</td>
						<td>
							<div class="progress">
								<div class="bar bar-info" style="width: 65%;"></div>
							</div>
						</td>
					</tr>
					<tr>
						<td><a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="24" width="24"></a></td>
						<td><a href="#">Task Name</a></td>
						<td>10:45 AM</td>
						<td>12:00 PM</td>
						<td>1:15</td>
						<td>
							<div class="progress">
								<div class="bar bar-info" style="width: 92%;"></div>
							</div>
						</td>
					</tr>
					<tr>
						<td><a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="24" width="24"></a></td>
						<td><a href="#">Task Name</a></td>
						<td>07:00 PM</td>
						<td>10:00 PM</td>
						<td>3:00</td>
						<td>
							<div class="progress">
								<div class="bar bar-info" style="width: 88%;"></div>
							</div>
						</td>
					</tr>
					<tr>
						<td><a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="24" width="24"></a></td>
						<td><a href="#">Task Name</a></td>
						<td>12:15 AM</td>
						<td>05:15 AM</td>
						<td>5:00</td>
						<td>
							<div class="progress">
								<div class="bar bar-info" style="width: 78%;"></div>
							</div>
						</td>
					</tr>
					<tr>
						<td><a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="24" width="24"></a></td>
						<td><a href="#">Task Name</a></td>
						<td>10:00 AM</td>
						<td>02:30 PM</td>
						<td>4:30</td>
						<td>
							<div class="progress">
								<div class="bar bar-info" style="width: 85%;"></div>
							</div>
						</td>
					</tr>
					<tr>
						<td><a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="24" width="24"></a></td>
						<td><a href="#">Task Name</a></td>
						<td>03:15 AM</td>
						<td>05:00 AM</td>
						<td>1:45</td>
						<td>
							<div class="progress">
								<div class="bar bar-info" style="width: 75%;"></div>
							</div>
						</td>
					</tr>
					<tr>
						<td><a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="24" width="24"></a></td>
						<td><a href="#">Task Name</a></td>
						<td>10:00 AM</td>
						<td>03:00 PM</td>
						<td>5:00</td>
						<td>
							<div class="progress">
								<div class="bar bar-danger" style="width: 100%;"></div>
							</div>
						</td>
					</tr>
					<tr>
						<td><a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="24" width="24"></a></td>
						<td><a href="#">Task Name</a></td>
						<td>03:00 PM</td>
						<td>5:45 PM</td>
						<td>2:45</td>
						<td>
							<div class="progress">
								<div class="bar bar-info" style="width: 97%;"></div>
							</div>
						</td>
					</tr>
					<tr>
						<td><a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="24" width="24"></a></td>
						<td><a href="#">Task Name</a></td>
						<td>09:15 AM</td>
						<td>10:00 AM</td>
						<td>0:45</td>
						<td>
							<div class="progress">
								<div class="bar bar-info" style="width: 65%;"></div>
							</div>
						</td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td>
							<div class="btn-group">
								<a href="#" class="btn btn-small dropdown-toggle" data-toggle="dropdown">
									<span aria-hidden="true" class="icon-user"></span>
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Firstname Lastname</a></li>
									<li><a href="#">Firstname Lastname</a></li>
									<li><a href="#">Firstname Lastname</a></li>
									<li><a href="#">Firstname Lastname</a></li>
									<li><a href="#">Firstname Lastname</a></li>
									<li><a href="#">Firstname Lastname</a></li>
								</ul>
							</div>
						</td>
						<td><input type="text" class="span11" placeholder="Task Name" data-provide="typeahead" data-items="4" data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]"></td>
						<td><input type="text" class="span9" placeholder="00:00" data-provide="typeahead" data-items="4" data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]"></td>
						<td><input type="text" class="span9" placeholder="00:00" data-provide="typeahead" data-items="4" data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]"></td>
						<td><input type="text" class="span9" placeholder="0:00" data-provide="typeahead" data-items="4" data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]"></td>
						<td>
							<a href="#" class="btn btn-primary">Save</a>
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
		<div class="span4">
			<h3>Timer</h3>
			<form>
				<div class="control-group">
					<div class="controls">
						<p>
							<a href="#" class="btn btn-wide"><span class="btn btn-wide active">02:32:57</span></a>
						</p>
						<a href="#" class="btn btn-success btn-wide"><span aria-hidden="true" class="icon-play-2"></span> Start</a>
					</div>
				</div>
				<div class="control-group">
					<label for="task">Select a task</label>
					<div class="controls">
						<select name="task" id="task">
							<optgroup label="Task List Name">
								<option selected="selected">Task Name</option>
								<option>Task Name</option>
								<option>Task Name</option>
							</optgroup>
							<optgroup label="Task List Name">
								<option>Task Name</option>
								<option>Task Name</option>
								<option>Task Name</option>
							</optgroup>
							<optgroup label="Task List Name">
								<option>Task Name</option>
								<option>Task Name</option>
								<option>Task Name</option>
							</optgroup>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label for="description">Description</label>
					<div class="controls">
						<textarea id="description" rows="1" name="description" placeholder="Enter description"></textarea>
					</div>
				</div>
			</form>
			<h3>Actual VS Estimate</h3>
			<span class="label label-info">Actual</span> <span class="label label-warning">Estimate</span>
			<hr />
			<div class="row-estimate">
				<div class="progress">
					<div class="bar bar-info" style="width: 75%;">36 hours</div>
					<div class="bar bar-warning" style="width: 25%;">48 hours</div>
				</div>
			</div>
			<h4>Billable Time</h4>
			<div class="row-estimate">
				<div class="progress">
					<div class="bar bar-success" style="width: 75%;">27 hours</div>
				</div>
			</div>
			<h4>Unbillable Time</h4>
			<div class="row-estimate">
				<div class="progress">
					<div class="bar" style="width: 25%;">9 hours</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Placeholder -->
	
    <div class="clearfix"></div>

    <div class="cat-items" style="display: none;">

        <form name="adminForm" id="adminForm" action="<?php echo JRoute::_(PFtimeHelperRoute::getTimesheetRoute()); ?>" method="post">
            <div class="btn-toolbar btn-toolbar-top">
                <?php echo $this->toolbar; ?>
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

                    <?php if ($this->access->get('time.edit.state') || $this->access->get('time.edit')) : ?>
                        <div class="filter-published btn-group">
                            <select name="filter_published" class="inputbox input-medium" onchange="this.form.submit()">
                                <option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED');?></option>
                                <?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.published'), true);?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <?php if (intval($this->state->get('filter.project')) > 0) : ?>
                        <div class="filter-author btn-group">
                            <select id="filter_author" name="filter_author" class="inputbox input-medium" onchange="this.form.submit()">
                                <option value=""><?php echo JText::_('JOPTION_SELECT_AUTHOR');?></option>
                                <?php echo JHtml::_('select.options', $this->authors, 'value', 'text', $this->state->get('filter.author'), true);?>
                            </select>
                        </div>
                        <div class="filter-task btn-group">
                            <select id="filter_task" name="filter_task" class="inputbox input-medium" onchange="this.form.submit()">
                                <option value=""><?php echo JText::_('COM_PROJECTFORK_OPTION_SELECT_TASK');?></option>
                                <?php echo JHtml::_('select.options', $this->tasks, 'value', 'text', $this->state->get('filter.task'), true);?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <div class="clearfix"> </div>
                </div>
            </div>

            <?php if (intval($this->state->get('filter.project')) > 0) : ?>
                <h3><?php echo PFApplicationHelper::getActiveProjectTitle();?></h3>

                <div class="row-fluid">
                	<div class="span3">
                		<div class="thumbnail thumbnail-timesheet">
                			<h6><?php echo JText::_('COM_PROJECTFORK_TIME_TRACKING_TOTAL_HOURS');?></h6>
                			<h1><?php echo JHtml::_('time.format', $this->total_time, 'decimal');?></h1>
                			<h5><?php echo JText::_('COM_PROJECTFORK_TIME_TRACKING_ESTIMATED');?> (<?php echo JHtml::_('time.format', $this->total_estimated_time, 'decimal');?>)</h5>
                		</div>
                	</div>
                	<div class="span6">
                		<div class="thumbnail thumbnail-timesheet">
                			<h6><?php echo JText::_('COM_PROJECTFORK_TIME_TRACKING_TOTAL_HOURS');?></h6>
                			<div class="row-fluid">
                				<div class="span6">
                					<div class="progress progress-success">
    									<div class="bar" style="width: <?php echo $billable_percent;?>%;"></div>
    								</div>
    								<div class="progress">
    									<div class="bar" style="width: <?php echo $unbillable_percent;?>%;"></div>
    								</div>
                				</div>
                				<div class="span6">
                					<h2>
                                        <?php echo JHtml::_('time.format', $this->total_time_billable, 'decimal');?>
                                        <span class="label label-success"><?php echo JText::_('COM_PROJECTFORK_TIME_TRACKING_BILLABLE');?></span>
                                    </h2>
                					<h2>
                                        <?php echo JHtml::_('time.format', $this->total_time_unbillable, 'decimal');?>
                                        <span class="label label-info"><?php echo JText::_('COM_PROJECTFORK_TIME_TRACKING_UNBILLABLE');?></span>
                                    </h2>
                				</div>
                			</div>
                		</div>
                	</div>
                	<div class="span3">
                		<div class="thumbnail thumbnail-timesheet">
                			<h6><?php echo JText::_('COM_PROJECTFORK_TIME_TRACKING_BILLABLE_TOTAL');?></h6>
                			<h2><?php echo JHtml::_('pfhtml.format.money', $this->total_billable);?></h2>
                			<h5><?php echo JText::_('COM_PROJECTFORK_TIME_TRACKING_ESTIMATED');?> (<?php echo JHtml::_('pfhtml.format.money', $this->total_estimated_cost);?>)</h5>
                		</div>
                	</div>
                </div>
            <?php endif; ?>

            <hr />

            <table class="table table-striped">
            	<thead>
            		<tr>
            			<th width="1%"></th>
                        <th><?php echo JText::_('JGRID_HEADING_TASK');?></th>
            			<th width="10%"><?php echo JText::_('COM_PROJECTFORK_TIME_TRACKING_TIME');?></th>
            			<th width="10%"></th>
            			<th width="10%"><?php echo JText::_('JGRID_HEADING_AUTHOR');?></th>
            			<th width="10%"><?php echo JText::_('JGRID_HEADING_DATE');?></th>
            			<th width="10%"><?php echo JText::_('COM_PROJECTFORK_TIME_TRACKING_RATE');?></th>
            			<th width="10%"><?php echo JText::_('COM_PROJECTFORK_TIME_TRACKING_BILLABLE');?></th>
            		</tr>
            	</thead>
            	<tbody>
			        <?php
			        $k = 0;
			        foreach($this->items AS $i => $item) :
			            $access = PFtimeHelper::getActions($item->id);

			            $can_create   = $access->get('core.create');
			            $can_edit     = $access->get('core.edit');
			            $can_change   = $access->get('core.edit.state');
			            $can_edit_own = ($access->get('core.edit.own') && $item->created_by == $uid);

                        if ($item->log_time > 0) {
                            $list_total_time += (int) $item->log_time;
                        }

                        if ((float) $item->billable_total > 0.00) {
                            $list_total_billable += (float) $item->billable_total;
                        }

                        $percentage = ($item->estimate == 0) ? 0 : round($item->log_time * (100 / $item->estimate));
                        $percentage_class = 'progress';

                        if ($percentage > 100) {
                            $percentage = 100;
                            $percentage_class .= ' progress-info';
                        }
                        else {
                            $percentage_class .= ($item->billable == 1) ? ' progress-success' : '';
                        }

                        $exists = ((int) $item->task_exists > 0);
			        ?>
			        <tr>
                        <td>
                            <?php echo JHtml::_('pf.html.id', $i, $item->id); ?>
			        		<?php
                            $this->menu->start(array('class' => 'btn-mini', 'pull' => 'right'));
                            $this->menu->itemEdit('form', $item->id, ($can_edit || $can_edit_own));
                            $this->menu->itemTrash('timesheet', $i, $can_change);
                            $this->menu->end();

                            echo $this->menu->render(array('class' => 'btn-mini'));
	                        ?>
			        	</td>
			        	<td>
                            <?php if ($exists) : ?>
                                <a href="<?php echo JRoute::_(PFtasksHelperRoute::getTaskRoute($item->task_slug, $item->project_slug, $item->milestone_slug, $item->list_slug));?>"
                                    rel="popover"
                                    title="<?php echo $this->escape($item->task_title); ?>"
                                    data-content="<?php echo $this->escape($item->description); ?>"
                                >
                                    <?php echo $this->escape($item->task_title); ?>
                                </a>
                            <?php else : ?>
                                <?php echo $this->escape($item->task_title); ?>
                            <?php endif; ?>
			        	</td>
			        	<td>
			        		<?php echo JHtml::_('time.format', $item->log_time); ?>
			        	</td>
			        	<td>
							<div class="<?php echo $percentage_class;?>">
								<div class="bar" style="width: <?php echo $percentage;?>%;"></div>
							</div>
			        	</td>
			        	<td>
			        		<?php echo $item->author_name; ?>
			        	</td>
			        	<td>
			        		<?php echo JHtml::_('date', $item->log_date, JText::_('DATE_FORMAT_LC4')); ?>
			        	</td>
			        	<td>
                            <?php echo JHtml::_('pfhtml.format.money', $item->rate);?>
			        	</td>
			        	<td>
                            <?php echo JHtml::_('pfhtml.format.money', $item->billable_total);?>
			        	</td>
			        </tr>

			        <?php
			        $k = 1 - $k;
			        endforeach;
			        ?>
            	</tbody>
            	<tfoot>
            		<tr>
            			<th><?php echo JText::_('COM_PROJECTFORK_TIME_TRACKING_TOTALS');?></th>
            			<th></th>
            			<th><?php echo JHtml::_('time.format', $list_total_time); ?></th>
            			<th></th>
            			<th></th>
            			<th></th>
	            		<th></th>
	            		<th><?php echo JHtml::_('pfhtml.format.money', $list_total_billable);?></th>
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
