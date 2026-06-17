<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;

// 1. Get the current menu item ID
$app = Factory::getApplication();
$menu = $app->getMenu()->getActive();
$itemId = $menu ? $menu->id : 0;

// 2. Target Menu ID (Education page)
$targetMenuId = 117;

// 3. Logic: If on the target page, use Accordion Item; otherwise use Standard
if ($itemId == $targetMenuId) : 
    // --- ACCORDION ITEM ---
    $uniqueId = 'collapse-' . $this->item->id; ?>
    
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-<?php echo $this->item->id; ?>">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $uniqueId; ?>" aria-expanded="false" aria-controls="<?php echo $uniqueId; ?>">
                <?php echo $this->item->title; ?>
            </button>
        </h2>
        <div id="<?php echo $uniqueId; ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo $this->item->id; ?>">
            <div class="accordion-body">
                <?php echo LayoutHelper::render('joomla.content.intro_image', $this->item); ?>
                <div class="item-content">
                    <?php echo $this->item->introtext; ?>
                </div>
            </div>
        </div>
    </div>

<?php else : 
    // --- STANDARD BLOG ITEM ---
    $params = $this->item->params;
    $isUnpublished = ($this->item->state == ContentComponent::CONDITION_UNPUBLISHED);
    ?>
    <?php echo LayoutHelper::render('joomla.content.intro_image', $this->item); ?>
    <div class="item-content">
        <?php echo LayoutHelper::render('joomla.content.blog_style_default_item_title', $this->item); ?>
        <?php echo $this->item->introtext; ?>
    </div>
<?php endif; ?>