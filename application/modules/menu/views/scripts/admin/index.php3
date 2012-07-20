<?php if (!empty($this->menu_result) && is_array($this->menu_result)): ?>
    <ul class="new_menu">
    <?php foreach ($this->menu_result as $item): ?>
        <li onmouseover="this.className='hover'" onmouseout="this.className='nohover'">
        <?php if ($item['current'] == 1): ?>
            <a href="<?php if ($item['link'] != ''){ echo $item['link']; } else { ?>#<?php } ?>" class="current"><?php echo $item['title']; ?></a>
        <?php else: ?>
            <a href="<?php if ($item['link'] != ''){ echo $item['link']; } else { ?>#<?php } ?>" ><?php echo $item['title']; ?></a>
        <?php endif; ?>
            
            <?php if (!empty($item['childs'])): ?>
                <ul class="dropdown">
                    <?php foreach ($item['childs'] as $child): ?>
                        <li><a href="<?php echo $child['link']; ?>"><?php echo $child['title']; ?></a></li>
                    <?php endforeach; ?>
                        <li class="drop_bottom"></li>
                </ul>
            <?php endif; ?>            
        </li>
    <?php endforeach; ?>    
    </ul>
<?php endif; ?> 
