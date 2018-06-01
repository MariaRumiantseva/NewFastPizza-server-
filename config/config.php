<?php

Config::set('site_name', 'New Fast Pizza');

Config::set('languages', array('en', 'fr'));

// Routes. Route name => method prefix
Config::set('routes', array(
    'default' => '',
    'admin'   => 'admin_',
));

Config::set('default_route', 'default');
Config::set('default_language', 'en');
Config::set('default_controller', 'products');
Config::set('default_action', 'index');

Config::set('db.host', 'localhost');
Config::set('db.user', 'root');
Config::set('db.password', '');
Config::set('db.db_name', 'pizza_base');

Config::set('salt', 'jd7sj3sdkd964he7e');