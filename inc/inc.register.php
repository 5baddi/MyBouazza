<?php

function mybouazza_jquery()
{
    // Deregister default jquery
    wp_deregister_script('jquery');
    // Register jquery into footer
    wp_register_script('jquery', mybouazza_assets('js/jquery-3.3.1.min.js'), '', '3.3.1', true);
    // Enqueue the new JQuery
    wp_enqueue_script('jquery');
}

function mybouazza_footer_sidebar()
{
        // myb_footer_sidebar
        register_sidebar([
                'name'          =>      mybouazza_trs('منطقة الودجات السفلية'),
                'id'            =>      'myb_footer_sidebar',
                'description'   =>      mybouazza_trs('قم بسحب الإضافات المراد تفعيلها هنا ...')   
        ]);
}

function mybouazza_menus()
{
        // top-menu
        register_nav_menu('top-menu', mybouazza_trs('القائمة العلوية'));
}