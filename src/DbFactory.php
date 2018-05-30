<?php
/**
 * The MIT License (MIT)
 * Copyright (c) 2018 Serhii Popov
 * This source file is subject to The MIT License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/MIT
 *
 * @category Popov
 * @package Popov_<package>
 * @author Serhii Popov <popow.serhii@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Popov\ZfcDb;

use Psr\Container\ContainerInterface;
use Popov\Db\Db;

class DbFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');
        $dbParams = $config['db'] ?? $config['database'];

        return (new Db([
            'options' => $dbParams['options'],
            //'dsn' => sprintf('mysql:dbname=%s;host=%s', $dbParams['database'], $dbParams['hostname']),
            'username' => $dbParams['username'],
            'password' => $dbParams['password'],
            'database' => $dbParams['database'],
            'hostname' => $dbParams['hostname'],
            'port' => $dbParams['port'],
            ]
        ));
    }
}