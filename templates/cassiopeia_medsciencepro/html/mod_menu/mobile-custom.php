<?php
defined('_JEXEC') or die;
?>
<div class="my-custom-mobile-nav">
    <button id="my-mobile-trigger" aria-label="Toggle Navigation">
        <span></span>
    </button>
    <ul id="my-mobile-menu" class="hidden-nav">
        <?php foreach ($list as $i => $item) : 
            $hasChildren = isset($list[$i + 1]) && $list[$i + 1]->level > $item->level;
            $isChild = $item->level > 1;
        ?>
            <?php if ($item->level == 1) : ?>
                <li class="item-<?php echo $item->id; ?> <?php echo $hasChildren ? 'parent' : ''; ?>">
                    <a href="<?php echo $item->flink; ?>"><?php echo $item->title; ?></a>
                    <?php if ($hasChildren) : ?><ul class="mm-collapse"><?php endif; ?>
            <?php else : ?>
                <li class="item-<?php echo $item->id; ?>">
                    <a href="<?php echo $item->flink; ?>"><?php echo $item->title; ?></a>
                </li>
                <?php if (!isset($list[$i+1]) || $list[$i+1]->level < $item->level) : ?>
                    </ul></li>
                <?php endif; ?>
            <?php endif; ?>
            
            <?php if (!$hasChildren && $item->level == 1) : ?></li><?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>