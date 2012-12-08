<?php
/**
 * @package      Projectfork
 * @subpackage   Users
 *
 * @author       Tobias Kuhn (eaxs)
 * @copyright    Copyright (C) 2006-2012 Tobias Kuhn. All rights reserved.
 * @license      http://www.gnu.org/licenses/gpl.html GNU/GPL, see LICENSE.txt
 */

defined('_JEXEC') or die();


$list_order = $this->escape($this->state->get('list.ordering'));
$list_dir   = $this->escape($this->state->get('list.direction'));
$user       = JFactory::getUser();
$uid        = $user->get('id');
?>
<div id="projectfork" class="category-list<?php echo $this->pageclass_sfx;?> view-users">

    <?php if ($this->params->get('show_page_heading', 1)) : ?>
        <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>
    
    <!-- Begin Placeholder -->
    <style type="text/css">
    	.text-large {
    		font-size: 16px;
    		display: block;
    	}
    	.row-fluid .thumbnails.thumbnails-users > li[class*="span"]:first-child,
    	.thumbnails.thumbnails-users > li[class*="span"] {
    		margin-left: 0.7em;
    		margin-bottom: 0.7em;
    	}
    	.thumbnails-users .img-circle {
    		margin: 5px auto;
    	}
    	.flip .img-polaroid {
    		height: 197px;
    	}
    	.flip {
    	  -webkit-perspective: 800;
    	   width: 100%;
    	   height: 207px;
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
    		<ul class="thumbnails thumbnails-users">
    			<li class="span3">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="128" width="128"></a>
    				    			<div class="text-large"><a href="#">Firstname Lastname</a></div>
    				    			<div class="small">User Group, Super User</div>
    				    			<div class="small"><a href="#">send email</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<a href="#" class="close">x</a>
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Firstname's Stats</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Projects <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Milestones <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-list-view muted"></span> Task Lists <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-checkmark muted"></span> Tasks <span class="badge badge-info pull-right">32</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-clock muted"></span> Time <span class="badge badge-info pull-right">48h</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-flag-2 muted"></span> Files <span class="badge badge-info pull-right">21</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments-2 muted"></span> Topics <span class="badge badge-info pull-right">14</span></a></li>
    				    			</ul>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    			<li class="span3">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="128" width="128"></a>
    				    			<div class="text-large"><a href="#">Firstname Lastname</a></div>
    				    			<div class="small">User Group</div>
    				    			<div class="small"><a href="#">send email</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Firstname's Stats</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Projects <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Milestones <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-list-view muted"></span> Task Lists <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-checkmark muted"></span> Tasks <span class="badge badge-info pull-right">32</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-clock muted"></span> Time <span class="badge badge-info pull-right">48h</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-flag-2 muted"></span> Files <span class="badge badge-info pull-right">21</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments-2 muted"></span> Topics <span class="badge badge-info pull-right">14</span></a></li>
    				    			</ul>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    			<li class="span3">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="128" width="128"></a>
    				    			<div class="text-large"><a href="#">Firstname Lastname</a></div>
    				    			<div class="small">User Group, Project Manager</div>
    				    			<div class="small"><a href="#">send email</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Firstname's Stats</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Projects <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Milestones <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-list-view muted"></span> Task Lists <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-checkmark muted"></span> Tasks <span class="badge badge-info pull-right">32</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-clock muted"></span> Time <span class="badge badge-info pull-right">48h</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-flag-2 muted"></span> Files <span class="badge badge-info pull-right">21</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments-2 muted"></span> Topics <span class="badge badge-info pull-right">14</span></a></li>
    				    			</ul>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    			<li class="span3">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="128" width="128"></a>
    				    			<div class="text-large"><a href="#">Firstname Lastname</a></div>
    				    			<div class="small">User Group</div>
    				    			<div class="small"><a href="#">send email</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Firstname's Stats</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Projects <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Milestones <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-list-view muted"></span> Task Lists <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-checkmark muted"></span> Tasks <span class="badge badge-info pull-right">32</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-clock muted"></span> Time <span class="badge badge-info pull-right">48h</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-flag-2 muted"></span> Files <span class="badge badge-info pull-right">21</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments-2 muted"></span> Topics <span class="badge badge-info pull-right">14</span></a></li>
    				    			</ul>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    			<li class="span3">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="128" width="128"></a>
    				    			<div class="text-large"><a href="#">Firstname Lastname</a></div>
    				    			<div class="small">User Group</div>
    				    			<div class="small"><a href="#">send email</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Firstname's Stats</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Projects <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Milestones <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-list-view muted"></span> Task Lists <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-checkmark muted"></span> Tasks <span class="badge badge-info pull-right">32</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-clock muted"></span> Time <span class="badge badge-info pull-right">48h</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-flag-2 muted"></span> Files <span class="badge badge-info pull-right">21</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments-2 muted"></span> Topics <span class="badge badge-info pull-right">14</span></a></li>
    				    			</ul>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    			<li class="span3">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="128" width="128"></a>
    				    			<div class="text-large"><a href="#">Firstname Lastname</a></div>
    				    			<div class="small">User Group</div>
    				    			<div class="small"><a href="#">send email</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Firstname's Stats</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Projects <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Milestones <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-list-view muted"></span> Task Lists <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-checkmark muted"></span> Tasks <span class="badge badge-info pull-right">32</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-clock muted"></span> Time <span class="badge badge-info pull-right">48h</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-flag-2 muted"></span> Files <span class="badge badge-info pull-right">21</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments-2 muted"></span> Topics <span class="badge badge-info pull-right">14</span></a></li>
    				    			</ul>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    			<li class="span3">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="128" width="128"></a>
    				    			<div class="text-large"><a href="#">Firstname Lastname</a></div>
    				    			<div class="small">User Group Two</div>
    				    			<div class="small"><a href="#">send email</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Firstname's Stats</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Projects <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Milestones <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-list-view muted"></span> Task Lists <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-checkmark muted"></span> Tasks <span class="badge badge-info pull-right">32</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-clock muted"></span> Time <span class="badge badge-info pull-right">48h</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-flag-2 muted"></span> Files <span class="badge badge-info pull-right">21</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments-2 muted"></span> Topics <span class="badge badge-info pull-right">14</span></a></li>
    				    			</ul>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    			<li class="span3">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="128" width="128"></a>
    				    			<div class="text-large"><a href="#">Firstname Lastname</a></div>
    				    			<div class="small">User Group</div>
    				    			<div class="small"><a href="#">send email</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Firstname's Stats</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Projects <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Milestones <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-list-view muted"></span> Task Lists <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-checkmark muted"></span> Tasks <span class="badge badge-info pull-right">32</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-clock muted"></span> Time <span class="badge badge-info pull-right">48h</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-flag-2 muted"></span> Files <span class="badge badge-info pull-right">21</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments-2 muted"></span> Topics <span class="badge badge-info pull-right">14</span></a></li>
    				    			</ul>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    			<li class="span3">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="128" width="128"></a>
    				    			<div class="text-large"><a href="#">Firstname Lastname</a></div>
    				    			<div class="small">User Group Two</div>
    				    			<div class="small"><a href="#">send email</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Firstname's Stats</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Projects <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Milestones <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-list-view muted"></span> Task Lists <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-checkmark muted"></span> Tasks <span class="badge badge-info pull-right">32</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-clock muted"></span> Time <span class="badge badge-info pull-right">48h</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-flag-2 muted"></span> Files <span class="badge badge-info pull-right">21</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments-2 muted"></span> Topics <span class="badge badge-info pull-right">14</span></a></li>
    				    			</ul>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    			<li class="span3">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="128" width="128"></a>
    				    			<div class="text-large"><a href="#">Firstname Lastname</a></div>
    				    			<div class="small">User Group</div>
    				    			<div class="small"><a href="#">send email</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Firstname's Stats</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Projects <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Milestones <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-list-view muted"></span> Task Lists <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-checkmark muted"></span> Tasks <span class="badge badge-info pull-right">32</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-clock muted"></span> Time <span class="badge badge-info pull-right">48h</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-flag-2 muted"></span> Files <span class="badge badge-info pull-right">21</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments-2 muted"></span> Topics <span class="badge badge-info pull-right">14</span></a></li>
    				    			</ul>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    			<li class="span3">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="128" width="128"></a>
    				    			<div class="text-large"><a href="#">Firstname Lastname</a></div>
    				    			<div class="small">User Group</div>
    				    			<div class="small"><a href="#">send email</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Firstname's Stats</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Projects <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Milestones <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-list-view muted"></span> Task Lists <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-checkmark muted"></span> Tasks <span class="badge badge-info pull-right">32</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-clock muted"></span> Time <span class="badge badge-info pull-right">48h</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-flag-2 muted"></span> Files <span class="badge badge-info pull-right">21</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments-2 muted"></span> Topics <span class="badge badge-info pull-right">14</span></a></li>
    				    			</ul>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    			<li class="span3">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="128" width="128"></a>
    				    			<div class="text-large"><a href="#">Firstname Lastname</a></div>
    				    			<div class="small">User Group</div>
    				    			<div class="small"><a href="#">send email</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Firstname's Stats</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Projects <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Milestones <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-list-view muted"></span> Task Lists <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-checkmark muted"></span> Tasks <span class="badge badge-info pull-right">32</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-clock muted"></span> Time <span class="badge badge-info pull-right">48h</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-flag-2 muted"></span> Files <span class="badge badge-info pull-right">21</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments-2 muted"></span> Topics <span class="badge badge-info pull-right">14</span></a></li>
    				    			</ul>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    			<li class="span3">
    				<div class="flip"> 
    				    <div class="card"> 
    				    	<div class="face front">
    				    		<div class="img-polaroid center">
    				    			<a href="#"><img src="<?php echo JURI::base(true);?>/media/com_projectfork/projectfork/images/icons/avatar.jpg" class="img-circle" height="128" width="128"></a>
    				    			<div class="text-large"><a href="#">Firstname Lastname</a></div>
    				    			<div class="small">User Group</div>
    				    			<div class="small"><a href="#">send email</a></div>
    				    		</div>
    				    	</div>
    				    	<div class="face back">
    				    		<div class="img-polaroid">
    				    			<ul class="nav nav-list">
    				    				<li class="nav-header">Firstname's Stats</li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Projects <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-briefcase muted"></span> Milestones <span class="badge badge-info pull-right">10</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-list-view muted"></span> Task Lists <span class="badge badge-info pull-right">6</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-checkmark muted"></span> Tasks <span class="badge badge-info pull-right">32</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-clock muted"></span> Time <span class="badge badge-info pull-right">48h</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-flag-2 muted"></span> Files <span class="badge badge-info pull-right">21</span></a></li>
    				    				<li><a href="#"><span aria-hidden="true" class="icon-comments-2 muted"></span> Topics <span class="badge badge-info pull-right">14</span></a></li>
    				    			</ul>
    				    		</div>
    				    	</div>
    				    </div>
    				</div>
    			</li>
    		</ul>
    	</div>
    	<div class="span3">
    		<form class="form-vertical">
    			<h3>Add people to this project</h3>
    			<p>These people will be added to this project and receive an email with a link and welcome message. (The users must already exist in the <a href="#">user manager</a>.)</p>
    			<h4>Enter email addresses:</h4>
    			<div class="input-prepend">
    				<span class="add-on"><span aria-hidden="true" class="icon-mail muted"></span></span>
    				<input class="input-medium" id="" type="text" placeholder="email">
    			</div>
    			<div class="input-prepend">
    				<span class="add-on"><span aria-hidden="true" class="icon-mail muted"></span></span>
    				<input class="input-medium" id="" type="text" placeholder="email">
    			</div>
    			<div class="input-prepend">
    				<span class="add-on"><span aria-hidden="true" class="icon-mail muted"></span></span>
    				<input class="input-medium" id="" type="text" placeholder="email">
    			</div>
    			<div class="input-prepend">
    				<span class="add-on"><span aria-hidden="true" class="icon-mail muted"></span></span>
    				<input class="input-medium" id="" type="text" placeholder="email">
    			</div>
    			<div class="">
    				<label for="">Custom message (optional):</label>
    				<textarea class="span10" rows="6"></textarea>
    			</div>
    			<a href="#" class="btn btn-primary">Add users</a>
    		</form>
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

    <div class="grid" style="display: none;">
        <form name="adminForm" id="adminForm" action="<?php echo htmlspecialchars(JFactory::getURI()->toString()); ?>" method="post">
            <div class="filters btn-toolbar btn-toolbar-top">
                <?php echo $this->toolbar; ?>
                <div class="filter-project btn-group">
                    <?php echo JHtml::_('pfhtml.project.filter');?>
                </div>
            </div>

            <div class="clearfix"> </div>

            <div class="collapse" id="filters">
                <div class="well btn-toolbar">
                    <div class="filter-search btn-group pull-left">
                        <input type="text" name="filter_search" placeholder="<?php echo JText::_('JSEARCH_FILTER'); ?>" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" />
                    </div>
                    <div class="filter-search-buttons btn-group pull-left">
                        <button type="submit" class="btn" rel="tooltip" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>"><i class="icon-search"></i></button>
                        <button type="button" class="btn" rel="tooltip" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>" onclick="document.id('filter_search').value='';this.form.submit();"><i class="icon-remove"></i></button>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>

            <div class="clearfix"> </div>

            <ul class="thumbnails">
                <?php
                $k = 0;
                foreach($this->items AS $i => $item) :
                $asset_name = 'com_users&task=profile.edit&user_id=.' . $item->id;
                $slug       = $item->id.':'.JFilterOutput::stringURLSafe($item->username);
                ?>
                <li class="span2">
                    <div class="thumbnail">
                        <a href="<?php echo PFusersHelperRoute::getUserRoute($slug);?>">
                            <?php echo JHtml::_('projectfork.avatar.image', $item->id, $item->name);?>
                        </a>
                        <div class="caption">
                            <h4>
                                <a href="<?php echo PFusersHelperRoute::getUserRoute($slug);?>">
                                    <?php echo $this->escape($item->name);?>
                                </a>
                            </h4>
                            <h5>
                                <?php echo $this->escape($item->username);?>
                            </h5>
                        </div>
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
