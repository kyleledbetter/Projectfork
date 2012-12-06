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
    		margin-bottom: 10px;
    	}
    	.row-tasks .btn {
    		margin-right: 10px;
    	}
    	
    	.flip {
    	  -webkit-perspective: 800;
    	   width: 100%;
    	   height: 220px;
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
    
    
    <div class="row-striped">
    	<div class="row-fluid">
    		<div class="span5">
    			<div class="flip"> 
    			    <div class="card"> 
    			        <div class="face front"> 
    			            <img class="thumbnail" src="http://placehold.it/320x200/567d84/FFF/&amp;text=Logo" alt="">
    			        </div> 
    			        <div class="face back"> 
    			        	<div class="well">
	    			            <input type="file" placeholder="logoname.jpg" />
	    			            <input type="text" value="Project Name" />
	    			            <textarea rows="10">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos</textarea>
	    			            <div><a href="#" class="btn btn-primary btn-small">Update</a> <a href="#" class="btn btn-small">Cancel</a></div>
    			            </div>
    			        </div> 
    			    </div> 
    			</div> 
    			<h3><a href="#">Project Name</a></h3>
    			<div>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia...</div>
    			<div class="btn-toolbar">
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-comment"></span> 4
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-location"></span> 5
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-list-view"></span> 6
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-checkmark"></span> 32
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-flag-2"></span> 21
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-pencil"></span>
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-mail"></span>
    					</a>
    				</div>
    			</div>
    		</div>
    		<div class="span3">
    			<h4>Project Tasks</h4>
    			<div class="row-striped row-tasks">
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    			</div>
    		</div>
    		<div class="span3">
    			<h4>Project Activity</h4>
    			<div class="row-striped row-activity">
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						created a new <span class="label label-warning"><span aria-hidden="true" class="icon-list-view"></span> task list</span> <a href="#">Designer Tasks</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						created a new <span class="label label-success"><span aria-hidden="true" class="icon-briefcase"></span> project</span> <a href="#">Project Name</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						completed a <span class="label label-info"><span aria-hidden="true" class="icon-checkmark"></span> task</span> <a href="#">Task Name</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						create a new <span class="label label-important"><span aria-hidden="true" class="icon-location"></span> milestone</span> <a href="#">Milestone Name</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						edited a <span class="label"><span aria-hidden="true" class="icon-comment"></span> discussion</span> <a href="#">Discussion Name</a>
    				</div>
    			</div>
    		</div>
    		<div class="span1">
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
    	
    	<div class="row-fluid">
    		<div class="span5">
    			<div class="flip"> 
    			    <div class="card"> 
    			        <div class="face front"> 
    			            <img class="thumbnail" src="http://placehold.it/320x200/537f52/FFF/&amp;text=Logo" alt="">
    			        </div> 
    			        <div class="face back"> 
    			        	<div class="well">
	    			            <input type="file" placeholder="logoname.jpg" />
	    			            <input type="text" value="Project Name" />
	    			            <textarea rows="10">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos</textarea>
	    			            <div><a href="#" class="btn btn-primary btn-small">Update</a> <a href="#" class="btn btn-small">Cancel</a></div>
    			            </div>
    			        </div> 
    			    </div> 
    			</div> 
    			<h3><a href="#">Project Name</a></h3>
    			<div>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia...</div>
    			<div class="btn-toolbar">
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-comment"></span> 4
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-location"></span> 5
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-list-view"></span> 6
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-checkmark"></span> 32
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-flag-2"></span> 21
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-pencil"></span>
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-mail"></span>
    					</a>
    				</div>
    			</div>
    		</div>
    		<div class="span3">
    			<h4>Project Tasks</h4>
    			<div class="row-striped row-tasks">
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    			</div>
    		</div>
    		<div class="span3">
    			<h4>Project Activity</h4>
    			<div class="row-striped row-activity">
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						created a new <span class="label label-warning"><span aria-hidden="true" class="icon-list-view"></span> task list</span> <a href="#">Designer Tasks</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						created a new <span class="label label-success"><span aria-hidden="true" class="icon-briefcase"></span> project</span> <a href="#">Project Name</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						completed a <span class="label label-info"><span aria-hidden="true" class="icon-checkmark"></span> task</span> <a href="#">Task Name</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						create a new <span class="label label-important"><span aria-hidden="true" class="icon-location"></span> milestone</span> <a href="#">Milestone Name</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						edited a <span class="label"><span aria-hidden="true" class="icon-comment"></span> discussion</span> <a href="#">Discussion Name</a>
    				</div>
    			</div>
    		</div>
    		<div class="span1">
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
    	
    	<div class="row-fluid">
    		<div class="span5">
    			<div class="flip"> 
    			    <div class="card"> 
    			        <div class="face front"> 
    			            <img class="thumbnail" src="http://placehold.it/320x200/65577c/FFF/&amp;text=Logo" alt="">
    			        </div> 
    			        <div class="face back"> 
    			        	<div class="well">
	    			            <input type="file" placeholder="logoname.jpg" />
	    			            <input type="text" value="Project Name" />
	    			            <textarea rows="10">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos</textarea>
	    			            <div><a href="#" class="btn btn-primary btn-small">Update</a> <a href="#" class="btn btn-small">Cancel</a></div>
    			            </div>
    			        </div> 
    			    </div> 
    			</div> 
    			<h3><a href="#">Project Name</a></h3>
    			<div>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia...</div>
    			<div class="btn-toolbar">
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-comment"></span> 4
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-location"></span> 5
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-list-view"></span> 6
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-checkmark"></span> 32
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-flag-2"></span> 21
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-pencil"></span>
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-mail"></span>
    					</a>
    				</div>
    			</div>
    		</div>
    		<div class="span3">
    			<h4>Project Tasks</h4>
    			<div class="row-striped row-tasks">
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    			</div>
    		</div>
    		<div class="span3">
    			<h4>Project Activity</h4>
    			<div class="row-striped row-activity">
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						created a new <span class="label label-warning"><span aria-hidden="true" class="icon-list-view"></span> task list</span> <a href="#">Designer Tasks</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						created a new <span class="label label-success"><span aria-hidden="true" class="icon-briefcase"></span> project</span> <a href="#">Project Name</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						completed a <span class="label label-info"><span aria-hidden="true" class="icon-checkmark"></span> task</span> <a href="#">Task Name</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						create a new <span class="label label-important"><span aria-hidden="true" class="icon-location"></span> milestone</span> <a href="#">Milestone Name</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						edited a <span class="label"><span aria-hidden="true" class="icon-comment"></span> discussion</span> <a href="#">Discussion Name</a>
    				</div>
    			</div>
    		</div>
    		<div class="span1">
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
    	
    	<div class="row-fluid">
    		<div class="span5">
    			<div class="flip"> 
    			    <div class="card"> 
    			        <div class="face front"> 
    			            <img class="thumbnail" src="http://placehold.it/320x200/129fe5/FFF/&amp;text=Logo" alt="">
    			        </div> 
    			        <div class="face back"> 
    			        	<div class="well">
	    			            <input type="file" placeholder="logoname.jpg" />
	    			            <input type="text" value="Project Name" />
	    			            <textarea rows="10">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos</textarea>
	    			            <div><a href="#" class="btn btn-primary btn-small">Update</a> <a href="#" class="btn btn-small">Cancel</a></div>
    			            </div>
    			        </div> 
    			    </div> 
    			</div> 
    			<h3><a href="#">Project Name</a></h3>
    			<div>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia...</div>
    			<div class="btn-toolbar">
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-comment"></span> 4
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-location"></span> 5
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-list-view"></span> 6
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-checkmark"></span> 32
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-flag-2"></span> 21
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-pencil"></span>
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-mail"></span>
    					</a>
    				</div>
    			</div>
    		</div>
    		<div class="span3">
    			<h4>Project Tasks</h4>
    			<div class="row-striped row-tasks">
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    			</div>
    		</div>
    		<div class="span3">
    			<h4>Project Activity</h4>
    			<div class="row-striped row-activity">
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						created a new <span class="label label-warning"><span aria-hidden="true" class="icon-list-view"></span> task list</span> <a href="#">Designer Tasks</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						created a new <span class="label label-success"><span aria-hidden="true" class="icon-briefcase"></span> project</span> <a href="#">Project Name</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						completed a <span class="label label-info"><span aria-hidden="true" class="icon-checkmark"></span> task</span> <a href="#">Task Name</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						create a new <span class="label label-important"><span aria-hidden="true" class="icon-location"></span> milestone</span> <a href="#">Milestone Name</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						edited a <span class="label"><span aria-hidden="true" class="icon-comment"></span> discussion</span> <a href="#">Discussion Name</a>
    				</div>
    			</div>
    		</div>
    		<div class="span1">
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
    	
    	<div class="row-fluid">
    		<div class="span5">
    			<div class="flip"> 
    			    <div class="card"> 
    			        <div class="face front"> 
    			            <img class="thumbnail" src="http://placehold.it/320x200/129fe5/FFF/&amp;text=Logo" alt="">
    			        </div> 
    			        <div class="face back"> 
    			        	<div class="well">
	    			            <input type="file" placeholder="logoname.jpg" />
	    			            <input type="text" value="Project Name" />
	    			            <textarea rows="10">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos</textarea>
	    			            <div><a href="#" class="btn btn-primary btn-small">Update</a> <a href="#" class="btn btn-small">Cancel</a></div>
    			            </div>
    			        </div> 
    			    </div> 
    			</div> 
    			<h3><a href="#">Project Name</a></h3>
    			<div>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia...</div>
    			<div class="btn-toolbar">
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-comment"></span> 4
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-location"></span> 5
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-list-view"></span> 6
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-checkmark"></span> 32
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-flag-2"></span> 21
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-pencil"></span>
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-mail"></span>
    					</a>
    				</div>
    			</div>
    		</div>
    		<div class="span3">
    			<h4>Project Tasks</h4>
    			<div class="row-striped row-tasks">
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    			</div>
    		</div>
    		<div class="span3">
    			<h4>Project Activity</h4>
    			<div class="row-striped row-activity">
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						created a new <span class="label label-warning"><span aria-hidden="true" class="icon-list-view"></span> task list</span> <a href="#">Designer Tasks</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						created a new <span class="label label-success"><span aria-hidden="true" class="icon-briefcase"></span> project</span> <a href="#">Project Name</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						completed a <span class="label label-info"><span aria-hidden="true" class="icon-checkmark"></span> task</span> <a href="#">Task Name</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						create a new <span class="label label-important"><span aria-hidden="true" class="icon-location"></span> milestone</span> <a href="#">Milestone Name</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						edited a <span class="label"><span aria-hidden="true" class="icon-comment"></span> discussion</span> <a href="#">Discussion Name</a>
    				</div>
    			</div>
    		</div>
    		<div class="span1">
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
    	
    	<div class="row-fluid">
    		<div class="span5">
    			<div class="flip"> 
    			    <div class="card"> 
    			        <div class="face front"> 
    			            <img class="thumbnail" src="http://placehold.it/320x200/d67220/FFF/&amp;text=Logo" alt="">
    			        </div> 
    			        <div class="face back"> 
    			        	<div class="well">
	    			            <input type="file" placeholder="logoname.jpg" />
	    			            <input type="text" value="Project Name" />
	    			            <textarea rows="10">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos</textarea>
	    			            <div><a href="#" class="btn btn-primary btn-small">Update</a> <a href="#" class="btn btn-small">Cancel</a></div>
    			            </div>
    			        </div> 
    			    </div> 
    			</div> 
    			<h3><a href="#">Project Name</a></h3>
    			<div>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia...</div>
    			<div class="btn-toolbar">
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-comment"></span> 4
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-location"></span> 5
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-list-view"></span> 6
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-checkmark"></span> 32
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-flag-2"></span> 21
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-pencil"></span>
    					</a>
    				</div>
    				<div class="btn-group">
    					<a href="#" class="btn btn-mini">
    						<span aria-hidden="true" class="icon-mail"></span>
    					</a>
    				</div>
    			</div>
    		</div>
    		<div class="span3">
    			<h4>Project Tasks</h4>
    			<div class="row-striped row-tasks">
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    				<div class="row-fluid">
    					<a href="#" class="btn btn-mini pull-left"><span aria-hidden="true" class="icon-checkmark"></span></a> 
    					<h4><a href="#">Task name</a></h4>
    				</div>
    			</div>
    		</div>
    		<div class="span3">
    			<h4>Project Activity</h4>
    			<div class="row-striped row-activity">
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						created a new <span class="label label-warning"><span aria-hidden="true" class="icon-list-view"></span> task list</span> <a href="#">Designer Tasks</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						created a new <span class="label label-success"><span aria-hidden="true" class="icon-briefcase"></span> project</span> <a href="#">Project Name</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						completed a <span class="label label-info"><span aria-hidden="true" class="icon-checkmark"></span> task</span> <a href="#">Task Name</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						create a new <span class="label label-important"><span aria-hidden="true" class="icon-location"></span> milestone</span> <a href="#">Milestone Name</a>
    				</div>
    				<div class="row-fluid">
    					<h4><a href="#">Firstname Lastname</a></h4>
    						edited a <span class="label"><span aria-hidden="true" class="icon-comment"></span> discussion</span> <a href="#">Discussion Name</a>
    				</div>
    			</div>
    		</div>
    		<div class="span1">
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
