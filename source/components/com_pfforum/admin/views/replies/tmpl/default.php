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


JHtml::_('behavior.tooltip');
JHtml::_('behavior.multiselect');

$user       = JFactory::getUser();
$uid        = $user->get('id');
$list_order = $this->escape($this->state->get('list.ordering'));
$list_dir   = $this->escape($this->state->get('list.direction'));
$save_order = ($list_order == 'a.ordering');
?>
<form action="<?php echo JRoute::_('index.php?option=com_pfforum&view=replies&filter_topic=' . (int) $this->state->get('filter.topic')); ?>" method="post" name="adminForm" id="adminForm">

    <fieldset id="filter-bar">
        <div class="filter-search fltlft btn-toolbar pull-left">
        	<div class="fltlft btn-group pull-left">
            	<label class="filter-search-lbl element-invisible" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
            	<input type="text" name="filter_search" id="filter_search" placeholder="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" />
        	</div>
        	<div class="fltlft btn-group pull-left hidden-phone">
            	<button type="submit" class="btn hasTooltip" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>"><span class="element-invisible"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></span><span aria-hidden="true" class="icon-search"></span></button>
            	<button type="button" class="btn hasTooltip" onclick="document.id('filter_search').value='';this.form.submit();" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>"><span class="element-invisible"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></span><span aria-hidden="true" class="icon-cancel-2"></span></button>
        	</div>
        	<div class="fltrt btn-group pull-left">
           		<?php echo JHtml::_('pfhtml.project.filter');?>
        	</div>
        </div>
        <div class="filter-select fltrt btn-toolbar pull-right hidden-phone">
        	<div class="fltrt btn-group">
	            <select name="filter_published" class="inputbox input-medium" onchange="this.form.submit()">
	                <option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED');?></option>
	                <?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.published'), true);?>
	            </select>
        	</div>
        	<div class="fltrt btn-group">
	            <select name="filter_author_id" class="inputbox input-medium" onchange="this.form.submit()">
	                <option value=""><?php echo JText::_('JOPTION_SELECT_AUTHOR');?></option>
	                <?php echo JHtml::_('select.options', $this->authors, 'value', 'text', $this->state->get('filter.author_id'));?>
	            </select>
        	</div>
        </div>
    </fieldset>
    <div class="clr clearfix"></div>
    <table class="adminlist table table-striped">
        <thead>
            <tr>
                <th width="1%" class="hidden-phone">
                    <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
                </th>
                <th width="5%">
                    <?php echo JHtml::_('grid.sort', 'JSTATUS', 'a.state', $list_dir, $list_order); ?>
                </th>
                <th>
                    <?php echo JHtml::_('grid.sort', 'JGLOBAL_DESCRIPTION', 'a.description', $list_dir, $list_order); ?>
                </th>
                <th width="15%" class="hidden-phone">
                    <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_CREATED_BY', 'a.created_by', $list_dir, $list_order); ?>
                </th>
                <th width="10%" class="hidden-phone">
                    <?php echo JHtml::_('grid.sort', 'JDATE', 'a.created', $list_dir, $list_order); ?>
                </th>
                <th width="1%" class="nowrap hidden-phone">
                    <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'a.id', $list_dir, $list_order); ?>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($this->items as $i => $item) :
            $access = PFforumHelper::getReplyActions($item->id);

            $can_create   = $access->get('core.create');
            $can_edit     = $access->get('core.edit');
            $can_checkin  = ($user->authorise('core.manage', 'com_checkin') || $item->checked_out == $uid || $item->checked_out == 0);
            $can_edit_own = ($access->get('core.edit.own') && $item->created_by == $uid);
            $can_change   = ($access->get('core.edit.state') && $can_checkin);
            ?>
            <tr class="row<?php echo $i % 2; ?>">
                <td class="center hidden-phone">
                    <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                </td>
                <td class="center">
                    <?php echo JHtml::_('jgrid.published', $item->state, $i, 'replies.', $can_change, 'cb'); ?>
                </td>
                <td>
                    <?php if ($item->checked_out) : ?>
                        <?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'replies.', $can_checkin); ?>
                    <?php endif; ?>
                    <?php if ($can_edit || $can_edit_own) : ?>
                        <a href="<?php echo JRoute::_('index.php?option=com_pfforum&task=reply.edit&id=' . $item->id);?>">
                            <?php echo $this->escape(JHtml::_('pf.html.truncate', $item->description)); ?>
                        </a>
                    <?php else : ?>
                        <?php echo $this->escape(JHtml::_('pf.html.truncate', $item->description)); ?>
                    <?php endif; ?>
                </td>
                <td class="center hidden-phone">
                    <?php echo $this->escape($item->author_name); ?>
                </td>
                <td class="center nowrap hidden-phone">
                    <?php echo JHtml::_('date', $item->created, JText::_('DATE_FORMAT_LC4')); ?>
                </td>
                <td class="center hidden-phone">
                    <?php echo (int) $item->id; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">
                    <?php echo $this->pagination->getListFooter(); ?>
                </td>
            </tr>
        </tfoot>
    </table>


    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="filter_order" value="<?php echo $list_order; ?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $list_dir; ?>" />
    <input type="hidden" name="filter_project" value="<?php echo (int) $this->state->get('filter.project');?>" />
    <input type="hidden" name="filter_topic" value="<?php echo (int) $this->state->get('filter.topic');?>" />
    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
</form>
