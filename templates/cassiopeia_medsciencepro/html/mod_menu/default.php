<?php
defined('_JEXEC') or die;
use Joomla\CMS\Helper\ModuleHelper;
?>
<ul class="mod-menu mod-list nav <?php echo $class_sfx; ?>">
<?php foreach ($list as $i => &$item) :
    $class = 'nav-item item-' . $item->id;
    if ($item->id == $active_id) $class .= ' current';
    echo '<li class="' . $class . '">';
    require ModuleHelper::getLayoutPath('mod_menu', 'default_url');
    echo '</li>';
endforeach; ?>
</ul>