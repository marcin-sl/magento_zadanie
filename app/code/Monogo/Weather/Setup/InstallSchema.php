<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Monogo\Weather\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        /**
         * Create table 'weather_data'
         */
        $table = $setup->getConnection()
            ->newTable($setup->getTable('weather_data'))
            ->addColumn(
                'data_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'unsigned' => true,
                    'nullable' => false,
                    'primary' => true,
                ],
                'Data ID'
            )
            ->addColumn(
                'city_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                [
                    'nullable' => false,
                ],
                'City id'
            )
            ->addColumn(
                'error',
                \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                null,
                [
                    'nullable'  => false,
                    'default'   => false,
                ],
                'Error'
            )
            ->addColumn(
                'error_message',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [
                    'nullable' => true,
                    'default' => '',
                ],
                'Error message'
            )
            ->addColumn(
                'temp',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '4,2',
                [
                    'nullable'  => true,

                ],
                'Temperature'
            )
            ->addColumn(
                'temp_min',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '4,2',
                [
                    'nullable'  => true,
                ],
                'Minimum temperature'
            )
            ->addColumn(
                'temp_max',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '4,2',
                [
                    'nullable'  => true,
                ],
                'Maximum temperature'
            )
            ->addColumn(
                'wind',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '4,1',
                [
                    'nullable'  => true,
                ],
                'Wind m/s'
            )
            ->addColumn(
                'humidity',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                [
                    'nullable'  => true,
                ],
                'humidity'
            )
            ->addColumn(
                'pressure',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                [
                    'nullable'  => true,
                ],
                'pressure'
            )
            ->addColumn(
                'timestamp',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                [   'nullable' => false,
                    'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT,
                ],
                'Insert timestamp'
            )
            ->addColumn(
                'data',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [
                    'nullable' => false,
                    'default' => '',
                ],
                'Data'
            )
            ->setComment("Weather table");
        $setup->getConnection()->createTable($table);
    }
}
