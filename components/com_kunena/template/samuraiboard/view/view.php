<?php
/**
 * @version $Id: view.php 4336 2011-01-31 06:05:12Z severdia $
 * Kunena Component
 * @package Kunena
 *
 * @Copyright (C) 2008 - 2011 Kunena Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/

// Dont allow direct linking
defined( '_JEXEC' ) or die();

$document = JFactory::getDocument ();
$document->addScriptDeclaration('// <![CDATA[
var kunena_anonymous_name = "'.JText::_('COM_KUNENA_USERNAME_ANONYMOUS').'";
// ]]>');
?>
<div><?php $this->displayPathway(); ?></div>
<?php //print_r($this); ?>
<h1><span>
<?php echo CKunenaTools::topicIcon($this) ?> 
<?php echo CKunenaLink::GetThreadLink ( 'view', intval($this->catid), intval($this->id), $this->kunena_topic_title, '', 'follow', 'ktopic-title km' ); ?>
</span></h1>

<?php if ($this->headerdesc) : ?>
	<div id="kforum-head" class="<?php echo isset ( $this->catinfo->class_sfx ) ? ' kforum-headerdesc' . $this->escape($this->catinfo->class_sfx) : '' ?>">
		<?php echo $this->headerdesc ?>
	</div>
<?php endif ?>

<div class="klist-actions">
	<?php echo CKunenaLink::GetTopicPostReplyLink ( 'reply', $this->catid, $this->thread, CKunenaTools::showButton ( 'reply', JText::_('COM_KUNENA_BUTTON_REPLY_TOPIC') ), 'nofollow', 'readmore btn-left', JText::_('COM_KUNENA_BUTTON_REPLY_TOPIC_LONG') ) ?>

	<?php $subscribed = ($this->my->id != 0 && $this->config->allowsubscriptions && $this->config->topic_subscriptions != 'disabled' && $this->cansubscribe == 0); ?>
	<div class="kbutton-subscribe<?php echo ($subscribed)?' kbutton-subscribed':'' ?>">
	<?php 
		echo $this->thread_subscribe;
	?>
	</div>
	<div style="clear:both"></div>
</div>

<?php foreach ( $this->messages as $message ) $this->displayMessage($message) ?>

<!-- B: List Actions Bottom -->
<div class="kcontainer klist-bottom">
	<div class="kbody">
		<div class="kmoderatorslist-jump fltrt">
				<?php $this->displayForumJump (); ?>
		</div>
		<?php if (!empty ( $this->modslist ) ) : ?>
		<div class="klist-moderators">
				<?php
				echo '' . JText::_('COM_KUNENA_GEN_MODERATORS') . ": ";
				$modlinks = array();
				foreach ( $this->modslist as $mod ) {
					$modlinks[] = CKunenaLink::GetProfileLink ( intval($mod->userid) );
				}
				echo implode(', ', $modlinks);
				?>
		</div>
		<?php endif; ?>
	</div>
</div>
<!-- F: List Actions Bottom -->