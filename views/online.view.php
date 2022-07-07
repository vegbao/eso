<?php
/**
 * This file is part of the eso project, a derivative of esoTalk.
 * It has been modified by several contributors.  (contact@geteso.org)
 * Copyright (C) 2022 geteso.org.  <https://geteso.org>
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

/**
 * Online view: displays a list of members currently online.
 */
if(!defined("IN_ESO"))exit;?>
<fieldset id="fieldmembers">
<legend><?php echo $language["Online members"];?></legend>

<?php
// If there are members online, list them.
if($this->numberOnline):?>

<div id='membersOnline'>
<?php while(list($memberId,$name,$avatarFormat,$color,$account,$lastSeen,$lastAction)=$this->eso->db->fetchRow($this->online)):?>
<div class='p c<?php echo $color;?>'><div class='hdr'>
<div class='thumb'><a href='<?php echo makeLink("profile",$memberId);?>'><img src='<?php echo $this->eso->getAvatar($memberId,$avatarFormat,"thumb");?>' alt=''/></a></div>
<h3><a href='<?php echo makeLink("profile",$memberId);?>'><?php echo $name;?></a></h3>
<span><?php echo $lastAction;?> (<?php echo relativeTime($lastSeen);?>)</span>
</div></div>
<?php endwhile;?>
</div>

<?php
// Otherwise, display a message.
else:echo $this->eso->htmlMessage("noMembersOnline");endif;?>

</fieldset>
