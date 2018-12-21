<?php

    /*
     * @package Search Form
     * @subpackage MyBouazza
     * Developed by @5Baddi | baddi.info
     */

?>

<form role="search" method="get" class="form" action="<?= mybouazza_home(true); ?>">
    <label class="sr-only"><?php mybouazza_trs('البحث عن:'); ?></label>
    <div class="input-group">
        <input type="search" class="form-control search-right" value="<?php the_search_query(); ?>" placeholder="<?= mybouazza_trs('بحث '); ?>&hellip;" name="s"/>
        <button type="submit" class="btn mybtn mybtn-left"><i class="fa fa-search"></i></button>
    </div>
</form> 