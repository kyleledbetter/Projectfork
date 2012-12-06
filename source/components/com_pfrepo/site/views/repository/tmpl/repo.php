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
        <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>
    
    <!-- Begin Placeholder -->
    <style type="text/css">
    	.progress .close {
    		line-height: 12px;
    	}
    	.reveal {
    		visibility: hidden;
    	}
    	tr:hover .reveal {
    		visibility: visible;
    	}
    	.well-drop {
    		border: 3px dashed #ddd;
    	}
    	.text-xxlarge {
    		font-size: 50px;
    		line-height: 50px;
    	}
    	.text-xxlarge [class^="icon-"] {
    		height: auto;
    		width: auto;
    		line-height: inherit;
    	}
    </style>
    <div class="row-fluid">
    	<div class="span8">
    		<table class="table table-striped table-time">
    			<thead>
    				<tr>
    					<th colspan="6">
    						<div class="btn-toolbar form-inline">
    							<div class="btn-group">
    								<input type="search" class="search-query" placeholder="search" data-provide="typeahead" data-items="4" data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]">
    							</div>
    							<div class="btn-group pull-right">
    								<button class="btn btn-small"><span aria-hidden="true" class="icon-download"></span></button>
    							</div>
    							<div class="btn-group pull-right">
    								<button class="btn btn-small">Sort</button>
    								<button class="btn btn-small dropdown-toggle" data-toggle="dropdown">
    								<span class="caret"></span>
    								</button>
    								<ul class="dropdown-menu">
    									<li><a href="#">Modified</a></li>
    									<li><a href="#">Title</a></li>
    									<li><a href="#">Type</a></li>
    									<li><a href="#">Size</a></li>
    								</ul>
    							</div>
    						</div>
    					</th>
    				</tr>
    				<tr>
    					<th width="1%"><span aria-hidden="true" class="icon-checkbox"></span></th>
    					<th>Title</th>
    					<th>Type</th>
    					<th>Modified</th>
    					<th>Size</th>
    					<th width="1%"></th>
    				</tr>
    			</thead>
    			<tbody>
    				<tr>
    					<td><span aria-hidden="true" class="icon-checkbox-unchecked"></span></td>
    					<td><a href="#"><span aria-hidden="true" class="icon-folder-2"></span> Folder Name</a> <a href="#"><span aria-hidden="true" class="icon-pencil muted reveal"></span></a></td>
    					<td>folder</td>
    					<td>12/06/2012 10:00 AM</td>
    					<td>23 MB</td>
    					<td><a href="#"><span aria-hidden="true" class="icon-cancel-2 muted reveal"></span></a></td>
    				</tr>
    				<tr>
    					<td><span aria-hidden="true" class="icon-checkbox-unchecked"></span></td>
    					<td><a href="#"><span aria-hidden="true" class="icon-folder-2"></span> Folder Name</a> <a href="#"><span aria-hidden="true" class="icon-pencil muted reveal"></span></a></td>
    					<td>folder</td>
    					<td>12/06/2012 10:30 PM</td>
    					<td>3 MB</td>
    					<td><a href="#"><span aria-hidden="true" class="icon-cancel-2 muted reveal"></span></a></td>
    				</tr>
    				<tr>
    					<td><span aria-hidden="true" class="icon-checkbox-unchecked"></span></td>
    					<td><a href="#"><span class="text-warning"><span aria-hidden="true" class="icon-pencil-2"></span></span> Note Name</a> <a href="#"><span aria-hidden="true" class="icon-pencil muted reveal"></span></a></td>
    					<td>note</td>
    					<td>12/03/2012 02:30 PM</td>
    					<td>233 KB</td>
    					<td><a href="#"><span aria-hidden="true" class="icon-cancel-2 muted reveal"></span></a></td>
    				</tr>
    				<tr>
    					<td><span aria-hidden="true" class="icon-checkbox-unchecked"></span></td>
    					<td><a href="#"><span class="text-success"><span aria-hidden="true" class="icon-picture"></span></span> filename.jpg</a> <a href="#"><span aria-hidden="true" class="icon-pencil muted reveal"></span></a></td>
    					<td>image</td>
    					<td>12/02/2012 05:00 AM</td>
    					<td>1 MB</td>
    					<td><a href="#"><span aria-hidden="true" class="icon-cancel-2 muted reveal"></span></a></td>
    				</tr>
    				<tr>
    					<td><span aria-hidden="true" class="icon-checkbox-unchecked"></span></td>
    					<td><a href="#"><span aria-hidden="true" class="icon-folder-2"></span> Folder Name</a> <a href="#"><span aria-hidden="true" class="icon-pencil muted reveal"></span></a></td>
    					<td>folder</td>
    					<td>11/06/2012 05:00 PM</td>
    					<td>2 MB</td>
    					<td><a href="#"><span aria-hidden="true" class="icon-cancel-2 muted reveal"></span></a></td>
    				</tr>
    				<tr>
    					<td><span aria-hidden="true" class="icon-checkbox-unchecked"></span></td>
    					<td><a href="#"><span class="muted"><span aria-hidden="true" class="icon-file"></span></span> filename.zip</a> <a href="#"><span aria-hidden="true" class="icon-pencil muted reveal"></span></a></td>
    					<td>archive</td>
    					<td>12/12/2012 5:45 PM</td>
    					<td>52 KB</td>
    					<td><a href="#"><span aria-hidden="true" class="icon-cancel-2 muted reveal"></span></a></td>
    				</tr>
    				<tr>
    					<td><span aria-hidden="true" class="icon-checkbox-unchecked"></span></td>
    					<td><a href="#"><span class="text-error"><span aria-hidden="true" class="icon-play"></span></span> filename.mov</a> <a href="#"><span aria-hidden="true" class="icon-pencil muted reveal"></span></a></td>
    					<td>movie</td>
    					<td>11/30/2012 10:00 AM</td>
    					<td>6 MB</td>
    					<td><a href="#"><span aria-hidden="true" class="icon-cancel-2 muted reveal"></span></a></td>
    				</tr>
    				<tr>
    					<td><span aria-hidden="true" class="icon-checkbox-unchecked"></span></td>
    					<td><a href="#"><span aria-hidden="true" class="icon-folder-2"></span> Folder Name</a> <a href="#"><span aria-hidden="true" class="icon-pencil muted reveal"></span></a></td>
    					<td>folder</td>
    					<td>10/02/2012 12:00 PM</td>
    					<td>315 MB</td>
    					<td><a href="#"><span aria-hidden="true" class="icon-cancel-2 muted reveal"></span></a></td>
    				</tr>
    				<tr>
    					<td><span aria-hidden="true" class="icon-checkbox-unchecked"></span></td>
    					<td><a href="#"><span class="text-success"><span aria-hidden="true" class="icon-picture"></span></span> filename.png</a> <a href="#"><span aria-hidden="true" class="icon-pencil muted reveal"></span></a></td>
    					<td>image</td>
    					<td>12/05/2012 10:00 PM</td>
    					<td>352 KB</td>
    					<td><a href="#"><span aria-hidden="true" class="icon-cancel-2 muted reveal"></span></a></td>
    				</tr>
    				<tr>
    					<td><span aria-hidden="true" class="icon-checkbox-unchecked"></span></td>
    					<td><a href="#"><span class="muted"><span aria-hidden="true" class="icon-file"></span></span> filename.zip</a> <a href="#"><span aria-hidden="true" class="icon-pencil muted reveal"></span></a></td>
    					<td>archive</td>
    					<td>10/01/2012 05:15 AM</td>
    					<td>2 MB</td>
    					<td><a href="#"><span aria-hidden="true" class="icon-cancel-2 muted reveal"></span></a></td>
    				</tr>
    				<tr>
    					<td><span aria-hidden="true" class="icon-checkbox-unchecked"></span></td>
    					<td><a href="#"><span aria-hidden="true" class="icon-folder-2"></span> Folder Name</a> <a href="#"><span aria-hidden="true" class="icon-pencil muted reveal"></span></a></td>
    					<td>folder</td>
    					<td>11/15/2012 02:30 PM</td>
    					<td>352 MB</td>
    					<td><a href="#"><span aria-hidden="true" class="icon-cancel-2 muted reveal"></span></a></td>
    				</tr>
    				<tr>
    					<td><span aria-hidden="true" class="icon-checkbox-unchecked"></span></td>
    					<td><a href="#"><span class="text-error"><span aria-hidden="true" class="icon-play"></span></span> filename.mov</a> <a href="#"><span aria-hidden="true" class="icon-pencil muted reveal"></span></a></td>
    					<td>movie</td>
    					<td>11/08/2012 05:00 AM</td>
    					<td>2 GB</td>
    					<td><a href="#"><span aria-hidden="true" class="icon-cancel-2 muted reveal"></span></a></td>
    				</tr>
    				<tr>
    					<td><span aria-hidden="true" class="icon-checkbox-unchecked"></span></td>
    					<td><a href="#"><span aria-hidden="true" class="icon-folder-2"></span> Folder Name</a> <a href="#"><span aria-hidden="true" class="icon-pencil muted reveal"></span></a></td>
    					<td>folder</td>
    					<td>12/01/2012 03:00 PM</td>
    					<td>85 MB</td>
    					<td><a href="#"><span aria-hidden="true" class="icon-cancel-2 muted reveal"></span></a></td>
    				</tr>
    				<tr>
    					<td><span aria-hidden="true" class="icon-checkbox-unchecked"></span></td>
    					<td><a href="#"><span aria-hidden="true" class="icon-folder-2"></span> Folder Name</a> <a href="#"><span aria-hidden="true" class="icon-pencil muted reveal"></span></a></td>
    					<td>folder</td>
    					<td>12/12/2012 5:45 PM</td>
    					<td>46 MB</td>
    					<td><a href="#"><span aria-hidden="true" class="icon-cancel-2 muted reveal"></span></a></td>
    				</tr>
    				<tr>
    					<td><span aria-hidden="true" class="icon-checkbox-unchecked"></span></td>
    					<td><a href="#"><span aria-hidden="true" class="icon-folder-2"></span> Folder Name</a> <a href="#"><span aria-hidden="true" class="icon-pencil muted reveal"></span></a></td>
    					<td>folder</td>
    					<td>12/17/2012 10:00 AM</td>
    					<td>452 MB</td>
    					<td><a href="#"><span aria-hidden="true" class="icon-cancel-2 muted reveal"></span></a></td>
    				</tr>
    			</tbody>
    			<tfoot>
    				<tr>
    					<td colspan="6">
    						<div class="center">
    							<a href="#" class="btn btn-primary"><span aria-hidden="true" class="icon-arrow-down"></span> More</a>
    						</div>
    					</td>
    				</tr>
    			</tfoot>
    		</table>
    	</div>
    	<div class="span4">
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
    						<div class="bar bar-success" style="width: 100%;"><a class="close" data-dismiss="alert" href="#">&times;</a>filename.jpg</div>
    					</div>
    					<div class="progress progress-striped"><a class="close" data-dismiss="alert" href="#">&times;</a>
    						<div class="bar" style="width: 65%;">filename.zip</div>
    					</div>
    					<div class="progress progress-striped"><a class="close" data-dismiss="alert" href="#">&times;</a>
    						<div class="bar" style="width: 25%;">filename.ppt</div>
    					</div>
    					<div class="center">
    						<a href="#" class="btn btn-primary btn-wide"><span aria-hidden="true" class="icon-upload"></span> Upload</a>
    					</div>
    				</div>
    			</div>
    		</form>
    		<hr />
    		<h3>Recent Files</h3>
    		<ul class="list-striped">
    			<li>
    				<span class="small muted pull-right">2 hours ago</span>
    				<a href="#"><span class="muted"><span aria-hidden="true" class="icon-file"></span></span> filename.zip</a>
    			</li>
    			<li>
    				<span class="small muted pull-right">3 hours ago</span>
    				<a href="#"><span class="text-success"><span aria-hidden="true" class="icon-picture"></span></span> filename.png</a>
    			</li>
    			<li>
    				<span class="small muted pull-right">1 day ago</span>
    				<a href="#"><span class="muted"><span aria-hidden="true" class="icon-file"></span></span> filename.zip</a>
    			</li>
    			<li>
    				<span class="small muted pull-right">2 days ago</span>
    				<a href="#"><span class="text-success"><span aria-hidden="true" class="icon-picture"></span></span> filename.jpg</a>
    			</li>
    			<li>
    				<span class="small muted pull-right">4 days ago</span>
    				<a href="#"><span class="muted"><span aria-hidden="true" class="icon-file"></span></span> filename.zip</a>
    			</li>
    			<li>
    				<span class="small muted pull-right">1 week ago</span>
    				<a href="#"><span class="text-success"><span aria-hidden="true" class="icon-picture"></span></span> filename.png</a>
    			</li>
    			<li>
    				<span class="small muted pull-right">2 weeks ago</span>
    				<a href="#"><span class="muted"><span aria-hidden="true" class="icon-file"></span></span> filename.zip</a>
    			</li>
    		</ul>
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
