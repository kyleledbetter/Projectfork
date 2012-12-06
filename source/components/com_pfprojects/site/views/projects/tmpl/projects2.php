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
$repo_enabled  = PFApplicationHelper::enabled('com_pfrepo');
$cmnts_enabled = PFApplicationHelper::enabled('com_pfcomments');
?>
<div id="projectfork" class="category-list<?php echo $this->pageclass_sfx;?> view-projects">
    <?php if ($this->params->get('show_page_heading', 1)) : ?>
        <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>
    
    <!-- Begin Placeholder -->
    <style type="text/css">
    	.row-users img {
    		margin-bottom: 5px;
    		margin-right: 5px;
    	}
    	.row-tasks .btn {
    		margin-right: 10px;
    	}
    	.well-project .btn-toolbar,
    	.well-project .nav {
    		margin-bottom: 0;
    	}
    	
    	.flip {
    	  -webkit-perspective: 800;
    	   width: 100%;
    	   height: 250px;
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
    
    
	<div class="well well-small clearfix well-project">
		<div class="flip"> 
		    <div class="card"> 
		    	<div class="face front"> 
		    	    <div class="row-fluid">
		    	    	<div class="span5">
		    	    		<img class="thumbnail" src="http://placehold.it/320x100/274257/FFF/&amp;text=Logo" alt="">
		    	    		<h3><a href="#">Project Name</a></h3>
		    	    		<div>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia...</div>
		    	    		<div class="btn-toolbar">
		    	    			<div class="btn-group">
		    	    				<a href="#" class="btn btn-mini">
		    	    					<span aria-hidden="true" class="icon-comment"></span> 4 comments
		    	    				</a>
		    	    			</div>
		    	    			<div class="btn-group">
		    	    				<a href="#" class="btn btn-mini">
		    	    					<span aria-hidden="true" class="icon-pencil"></span> Edit
		    	    				</a>
		    	    			</div>
		    	    			<div class="btn-group">
		    	    				<a href="#" class="btn btn-mini">
		    	    					<span aria-hidden="true" class="icon-mail"></span> Subscribe
		    	    				</a>
		    	    			</div>
		    	    		</div>
		    	    	</div>
		    	    	<div class="span3">
		    	    		<ul class="nav nav-tabs nav-stacked">
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Milestones <span class="badge badge-info pull-right">10</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-list-view muted"></span> Task Lists <span class="badge badge-info pull-right">6</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-checkmark muted"></span> Tasks <span class="badge badge-info pull-right">32</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-clock muted"></span> Time <span class="badge badge-info pull-right">48h</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-flag-2 muted"></span> Files <span class="badge badge-info pull-right">21</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-comments-2 muted"></span> Topics <span class="badge badge-info pull-right">14</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-users muted"></span> Users <span class="badge badge-info pull-right">6</span></a></li>
		    	    		</ul>
		    	    	</div>
		    	    	<div class="span4">
		    	    		<h4>Project Completion</h4>
		    	    		<div class="progress progress-striped">
		    	    			<div class="bar" style="width: 65%;">65%</div>
		    	    		</div>
		    	    		<h4>Project Members</h4>
		    	    		<div class="row-users">
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    		</div>
		    	    	</div>
		    	    </div>
		    	</div> 
		    	<div class="face back"> 
		    		<div class="well">
		    			<form class="form-horizontal">
		    				<div class="control-group">
		    					<label for="" class="control-label">Project Logo</label>
		    					<div class="controls">
		    						<input type="file" placeholder="logoname.jpg" />
		    					</div>
		    				</div>
		    				<div class="control-group">
		    					<label for="" class="control-label">Project Name</label>
		    					<div class="controls">
		    						<input type="text" class="span6" value="Project Name" />
		    					</div>
		    				</div>
		    				<div class="control-group">
		    					<label for="" class="control-label">Project Description</label>
		    					<div class="controls">
		    						<textarea rows="3" class="span9">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos</textarea>
		    					</div>
		    				</div>
		    			</form>
		    	        <div><a href="#" class="btn btn-primary btn-small">Update</a> <a href="#" class="btn btn-small">Cancel</a></div>
		    	    </div>
		    	</div>
		    </div> 
		</div> 
	</div> 
	
	<div class="well well-small clearfix well-project">
		<div class="flip"> 
		    <div class="card"> 
		    	<div class="face front"> 
		    	    <div class="row-fluid">
		    	    	<div class="span5">
		    	    		<img class="thumbnail" src="http://placehold.it/320x100/2A75A9/FFF/&amp;text=Logo" alt="">
		    	    		<h3><a href="#">Project Name</a></h3>
		    	    		<div>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia...</div>
		    	    		<div class="btn-toolbar">
		    	    			<div class="btn-group">
		    	    				<a href="#" class="btn btn-mini">
		    	    					<span aria-hidden="true" class="icon-comment"></span> 4 comments
		    	    				</a>
		    	    			</div>
		    	    			<div class="btn-group">
		    	    				<a href="#" class="btn btn-mini">
		    	    					<span aria-hidden="true" class="icon-pencil"></span> Edit
		    	    				</a>
		    	    			</div>
		    	    			<div class="btn-group">
		    	    				<a href="#" class="btn btn-mini">
		    	    					<span aria-hidden="true" class="icon-mail"></span> Subscribe
		    	    				</a>
		    	    			</div>
		    	    		</div>
		    	    	</div>
		    	    	<div class="span3">
		    	    		<ul class="nav nav-tabs nav-stacked">
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Milestones <span class="badge badge-info pull-right">4</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-list-view muted"></span> Task Lists <span class="badge badge-info pull-right">3</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-checkmark muted"></span> Tasks <span class="badge badge-info pull-right">25</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-clock muted"></span> Time <span class="badge badge-info pull-right">24h</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-flag-2 muted"></span> Files <span class="badge badge-info pull-right">13</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-comments-2 muted"></span> Topics <span class="badge badge-info pull-right">14</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-users muted"></span> Users <span class="badge badge-info pull-right">7</span></a></li>
		    	    		</ul>
		    	    	</div>
		    	    	<div class="span4">
		    	    		<h4>Project Completion</h4>
		    	    		<div class="progress progress-warning progress-striped">
		    	    			<div class="bar" style="width: 32%;">32%</div>
		    	    		</div>
		    	    		<h4>Project Members</h4>
		    	    		<div class="row-users">
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    		</div>
		    	    	</div>
		    	    </div>
		    	</div> 
		    	<div class="face back"> 
		    		<div class="well">
		    			<form class="form-horizontal">
		    				<div class="control-group">
		    					<label for="" class="control-label">Project Logo</label>
		    					<div class="controls">
		    						<input type="file" placeholder="logoname.jpg" />
		    					</div>
		    				</div>
		    				<div class="control-group">
		    					<label for="" class="control-label">Project Name</label>
		    					<div class="controls">
		    						<input type="text" class="span6" value="Project Name" />
		    					</div>
		    				</div>
		    				<div class="control-group">
		    					<label for="" class="control-label">Project Description</label>
		    					<div class="controls">
		    						<textarea rows="3" class="span9">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos</textarea>
		    					</div>
		    				</div>
		    			</form>
		    	        <div><a href="#" class="btn btn-primary btn-small">Update</a> <a href="#" class="btn btn-small">Cancel</a></div>
		    	    </div>
		    	</div>
		    </div> 
		</div> 
	</div>
	
	<div class="well well-small clearfix well-project">
		<div class="flip"> 
		    <div class="card"> 
		    	<div class="face front"> 
		    	    <div class="row-fluid">
		    	    	<div class="span5">
		    	    		<img class="thumbnail" src="http://placehold.it/320x100/7EB5D6/FFF/&amp;text=Logo" alt="">
		    	    		<h3><a href="#">Project Name</a></h3>
		    	    		<div>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia...</div>
		    	    		<div class="btn-toolbar">
		    	    			<div class="btn-group">
		    	    				<a href="#" class="btn btn-mini">
		    	    					<span aria-hidden="true" class="icon-comment"></span> 4 comments
		    	    				</a>
		    	    			</div>
		    	    			<div class="btn-group">
		    	    				<a href="#" class="btn btn-mini">
		    	    					<span aria-hidden="true" class="icon-pencil"></span> Edit
		    	    				</a>
		    	    			</div>
		    	    			<div class="btn-group">
		    	    				<a href="#" class="btn btn-mini">
		    	    					<span aria-hidden="true" class="icon-mail"></span> Subscribe
		    	    				</a>
		    	    			</div>
		    	    		</div>
		    	    	</div>
		    	    	<div class="span3">
		    	    		<ul class="nav nav-tabs nav-stacked">
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Milestones <span class="badge badge-info pull-right">7</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-list-view muted"></span> Task Lists <span class="badge badge-info pull-right">12</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-checkmark muted"></span> Tasks <span class="badge badge-info pull-right">45</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-clock muted"></span> Time <span class="badge badge-info pull-right">63h</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-flag-2 muted"></span> Files <span class="badge badge-info pull-right">32</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-comments-2 muted"></span> Topics <span class="badge badge-info pull-right">14</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-users muted"></span> Users <span class="badge badge-info pull-right">8</span></a></li>
		    	    		</ul>
		    	    	</div>
		    	    	<div class="span4">
		    	    		<h4>Project Completion</h4>
		    	    		<div class="progress progress-success progress-striped">
		    	    			<div class="bar" style="width: 95%;">95%</div>
		    	    		</div>
		    	    		<h4>Project Members</h4>
		    	    		<div class="row-users">
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    		</div>
		    	    	</div>
		    	    </div>
		    	</div> 
		    	<div class="face back"> 
		    		<div class="well">
		    			<form class="form-horizontal">
		    				<div class="control-group">
		    					<label for="" class="control-label">Project Logo</label>
		    					<div class="controls">
		    						<input type="file" placeholder="logoname.jpg" />
		    					</div>
		    				</div>
		    				<div class="control-group">
		    					<label for="" class="control-label">Project Name</label>
		    					<div class="controls">
		    						<input type="text" class="span6" value="Project Name" />
		    					</div>
		    				</div>
		    				<div class="control-group">
		    					<label for="" class="control-label">Project Description</label>
		    					<div class="controls">
		    						<textarea rows="3" class="span9">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos</textarea>
		    					</div>
		    				</div>
		    			</form>
		    	        <div><a href="#" class="btn btn-primary btn-small">Update</a> <a href="#" class="btn btn-small">Cancel</a></div>
		    	    </div>
		    	</div>
		    </div> 
		</div> 
	</div>
	
	<div class="well well-small clearfix well-project">
		<div class="flip"> 
		    <div class="card"> 
		    	<div class="face front"> 
		    	    <div class="row-fluid">
		    	    	<div class="span5">
		    	    		<img class="thumbnail" src="http://placehold.it/320x100/567d84/FFF/&amp;text=Logo" alt="">
		    	    		<h3><a href="#">Project Name</a></h3>
		    	    		<div>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia...</div>
		    	    		<div class="btn-toolbar">
		    	    			<div class="btn-group">
		    	    				<a href="#" class="btn btn-mini">
		    	    					<span aria-hidden="true" class="icon-comment"></span> 4 comments
		    	    				</a>
		    	    			</div>
		    	    			<div class="btn-group">
		    	    				<a href="#" class="btn btn-mini">
		    	    					<span aria-hidden="true" class="icon-pencil"></span> Edit
		    	    				</a>
		    	    			</div>
		    	    			<div class="btn-group">
		    	    				<a href="#" class="btn btn-mini">
		    	    					<span aria-hidden="true" class="icon-mail"></span> Subscribe
		    	    				</a>
		    	    			</div>
		    	    		</div>
		    	    	</div>
		    	    	<div class="span3">
		    	    		<ul class="nav nav-tabs nav-stacked">
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Milestones <span class="badge badge-info pull-right">2</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-list-view muted"></span> Task Lists <span class="badge badge-info pull-right">4</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-checkmark muted"></span> Tasks <span class="badge badge-info pull-right">45</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-clock muted"></span> Time <span class="badge badge-info pull-right">25h</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-flag-2 muted"></span> Files <span class="badge badge-info pull-right">11</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-comments-2 muted"></span> Topics <span class="badge badge-info pull-right">14</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-users muted"></span> Users <span class="badge badge-info pull-right">5</span></a></li>
		    	    		</ul>
		    	    	</div>
		    	    	<div class="span4">
		    	    		<h4>Project Completion</h4>
		    	    		<div class="progress progress-danger progress-striped">
		    	    			<div class="bar" style="width: 12%;">12%</div>
		    	    		</div>
		    	    		<h4>Project Members</h4>
		    	    		<div class="row-users">
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    		</div>
		    	    	</div>
		    	    </div>
		    	</div> 
		    	<div class="face back"> 
		    		<div class="well">
		    			<form class="form-horizontal">
		    				<div class="control-group">
		    					<label for="" class="control-label">Project Logo</label>
		    					<div class="controls">
		    						<input type="file" placeholder="logoname.jpg" />
		    					</div>
		    				</div>
		    				<div class="control-group">
		    					<label for="" class="control-label">Project Name</label>
		    					<div class="controls">
		    						<input type="text" class="span6" value="Project Name" />
		    					</div>
		    				</div>
		    				<div class="control-group">
		    					<label for="" class="control-label">Project Description</label>
		    					<div class="controls">
		    						<textarea rows="3" class="span9">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos</textarea>
		    					</div>
		    				</div>
		    			</form>
		    	        <div><a href="#" class="btn btn-primary btn-small">Update</a> <a href="#" class="btn btn-small">Cancel</a></div>
		    	    </div>
		    	</div>
		    </div> 
		</div> 
	</div>
	
	<div class="well well-small clearfix well-project">
		<div class="flip"> 
		    <div class="card"> 
		    	<div class="face front"> 
		    	    <div class="row-fluid">
		    	    	<div class="span5">
		    	    		<img class="thumbnail" src="http://placehold.it/320x100/644436/FFF/&amp;text=Logo" alt="">
		    	    		<h3><a href="#">Project Name</a></h3>
		    	    		<div>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia...</div>
		    	    		<div class="btn-toolbar">
		    	    			<div class="btn-group">
		    	    				<a href="#" class="btn btn-mini">
		    	    					<span aria-hidden="true" class="icon-comment"></span> 4 comments
		    	    				</a>
		    	    			</div>
		    	    			<div class="btn-group">
		    	    				<a href="#" class="btn btn-mini">
		    	    					<span aria-hidden="true" class="icon-pencil"></span> Edit
		    	    				</a>
		    	    			</div>
		    	    			<div class="btn-group">
		    	    				<a href="#" class="btn btn-mini">
		    	    					<span aria-hidden="true" class="icon-mail"></span> Subscribe
		    	    				</a>
		    	    			</div>
		    	    		</div>
		    	    	</div>
		    	    	<div class="span3">
		    	    		<ul class="nav nav-tabs nav-stacked">
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Milestones <span class="badge badge-info pull-right">10</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-list-view muted"></span> Task Lists <span class="badge badge-info pull-right">6</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-checkmark muted"></span> Tasks <span class="badge badge-info pull-right">32</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-clock muted"></span> Time <span class="badge badge-info pull-right">48h</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-flag-2 muted"></span> Files <span class="badge badge-info pull-right">21</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-comments-2 muted"></span> Topics <span class="badge badge-info pull-right">14</span></a></li>
		    	    			<li><a href="#"><span aria-hidden="true" class="icon-users muted"></span> Users <span class="badge badge-info pull-right">6</span></a></li>
		    	    		</ul>
		    	    	</div>
		    	    	<div class="span4">
		    	    		<h4>Project Completion</h4>
		    	    		<div class="progress progress-striped">
		    	    			<div class="bar" style="width: 65%;">65%</div>
		    	    		</div>
		    	    		<h4>Project Members</h4>
		    	    		<div class="row-users">
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="64" width="64"></a>
		    	    		</div>
		    	    	</div>
		    	    </div>
		    	</div> 
		    	<div class="face back"> 
		    		<div class="well">
		    			<form class="form-horizontal">
		    				<div class="control-group">
		    					<label for="" class="control-label">Project Logo</label>
		    					<div class="controls">
		    						<input type="file" placeholder="logoname.jpg" />
		    					</div>
		    				</div>
		    				<div class="control-group">
		    					<label for="" class="control-label">Project Name</label>
		    					<div class="controls">
		    						<input type="text" class="span6" value="Project Name" />
		    					</div>
		    				</div>
		    				<div class="control-group">
		    					<label for="" class="control-label">Project Description</label>
		    					<div class="controls">
		    						<textarea rows="3" class="span9">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos</textarea>
		    					</div>
		    				</div>
		    			</form>
		    	        <div><a href="#" class="btn btn-primary btn-small">Update</a> <a href="#" class="btn btn-small">Cancel</a></div>
		    	    </div>
		    	</div>
		    </div> 
		</div> 
	</div>
    
    
    <script>
    	!function ($) {
    		$('.flip').click(function(){
    			$(this).find('.card').addClass('flipped').mouseleave(function(){
    				$(this).removeClass('flipped');
    			});
    			return false;
    		})
    	}(window.jQuery)
    </script>
    <!-- End Placeholder -->

    <div class="clearfix"></div>

    <div class="grid" style="display: none;">
        <form name="adminForm" id="adminForm" action="<?php echo JRoute::_(PFprojectsHelperRoute::getProjectsRoute()); ?>" method="post">

            <div class="btn-toolbar btn-toolbar-top">
                <?php echo $this->toolbar;?>
            </div>

            <div class="clearfix"></div>

            <div class="<?php echo $filter_in;?>collapse" id="filters">
                <div class="well btn-toolbar">
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

                    <div class="clearfix"> </div>
                    <hr />

                    <div class="filter-category btn-group">
                        <select name="filter_category" class="inputbox input-medium" onchange="this.form.submit()">
                            <option value=""><?php echo JText::_('JOPTION_SELECT_CATEGORY');?></option>
                            <?php echo JHtml::_('select.options', JHtml::_('category.options', 'com_pfprojects'), 'value', 'text', $this->state->get('filter.category'));?>
                        </select>
                    </div>
                    <?php if ($this->access->get('core.edit.state') || $this->access->get('core.edit')) : ?>
                        <div class="filter-author btn-group">
                            <select name="filter_published" class="inputbox input-medium" onchange="this.form.submit()">
                                <option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED');?></option>
                                <?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.published'), true);?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <div class="clearfix"> </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <ul class="thumbnails">
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

                    if ($progress >= 67)  $progress_class = 'info';
                    if ($progress == 100) $progress_class = 'success';
                    if ($progress < 67)   $progress_class = 'warning';
                    if ($progress < 34)   $progress_class = 'danger label-important';

                    // Prepare the watch button
                    $watch = '';

                    if ($uid) {
                        $options = array('div-class' => 'pull-right', 'a-class' => 'btn-mini');
                        $watch = JHtml::_('pfhtml.button.watch', 'projects', $i, $item->watching, $options);
                    }
                ?>
                <?php if ($item->category_title != $current_cat && !is_numeric($this->state->get('filter.category'))) : ?>
                    </ul>
                    <h3><?php echo $this->escape($item->category_title);?></h3>
                    <hr />
                    <ul class="thumbnails">
                <?php $current_cat = $item->category_title; endif; ?>
                <li class="span3">
                    <div class="thumbnail">
                        <?php if (!empty($item->logo_img)) : ?>
                            <a href="<?php echo JRoute::_($link);?>">
                                <img src="<?php echo $item->logo_img;?>" alt="<?php echo $this->escape($item->title);?>" />
                            </a>
                        <?php endif ; ?>
                        <div class="caption">
                            <h3>
                                <?php if ($can_change || $uid) : ?>
                                    <label for="cb<?php echo $i; ?>" class="checkbox pull-left">
                                        <?php echo JHtml::_('pf.html.id', $i, $item->id); ?>
                                    </label>
                                <?php endif; ?>

                                <?php if ($item->checked_out) : ?>
                                    <i class="icon-lock"></i>
                                <?php endif; ?>

                                <a href="<?php echo JRoute::_($link);?>" rel="tooltip" data-placement="bottom">
                                    <?php echo $this->escape($item->title);?>
                                </a>

                                <?php echo $watch; ?>

                                <?php if ($can_edit || $can_edit_own) : ?>
                                <div class="btn-group pull-right">
                                    <a class="btn btn-mini" href="<?php echo JRoute::_('index.php?option=com_pfprojects&task=form.edit&id=' . $item->slug);?>">
                                        <i class="icon-edit"></i>
                                    </a>
                                </div>
                                <?php endif; ?>
                            </h3>

                            <div class="clearfix"></div>
                            <hr />
                            <div class="progress progress-<?php echo $progress_class;?> progress-striped progress-project">
                                <div class="bar" style="width: <?php echo ($progress > 0) ? $progress."%": "24px";?>">
                                    <span class="label label-<?php echo $progress_class;?> pull-right"><?php echo $progress;?>%</span>
                                </div>
                            </div>
                            <?php echo JHtml::_('pfhtml.label.author', $item->author_name, $item->created); ?>
                            <?php echo JHtml::_('pfhtml.label.access', $item->access); ?>
                            <?php echo JHtml::_('pfhtml.label.datetime', $item->end_date, true); ?>
                            <?php if ($cmnts_enabled) : echo JHtml::_('pfcomments.label', $item->comments); endif; ?>
                            <?php if ($repo_enabled) : echo JHtml::_('pfrepo.attachmentsLabel', $item->attachments); endif; ?>
                    </div>
                </li>
                <?php
                    $k = 1 - $k;
                    endforeach;
                ?>
            </ul>

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
