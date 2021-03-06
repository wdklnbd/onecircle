<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 主页 显示 图文 default
 */
?>
<div class="row">

<div class="post-content-inner col-xl-12">
    <?php if ($this->fields->excerpt && $this->fields->excerpt != ''): ?>
        <?php echo $this->fields->excerpt; ?>
    <?php else: ?>
        <?php echo $this->excerpt(70); ?>
    <? endif; ?>
</div>
<?php if ($this->fields->banner && $this->fields->banner != ''): ?>
    <div class="post-cover col-xl-12">
        <div class="post-cover-inner">
            <img src="<?php echo $this->fields->banner; ?>"
                 class="post-cover-img"
                 alt="cover">
        </div>
    </div>
<?php else: ?>
    <div class="post-cover col-xl-12">
        <div class="post-cover-img-container">
            <?php ehco9gridPics($this);?>
        </div>
    </div>
<? endif; ?>
</div>