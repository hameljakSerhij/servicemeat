<?php

use yii\db\Migration;

/**
 * Class m171220_112025_create_tours
 *
 * @author Hameljak Serhij <hameljak.serhij@gmail.com>
 */
class m171220_112025_create_offers extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute('
	      CREATE TABLE `offers` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `operator` varchar(255) NOT NULL,
            `spo` varchar(255) NOT NULL,
            `date` TIMESTAMP NOT NULL,
            `tour` TEXT NOT NULL,
            `adl` int(11) NOT NULL,
            `chd` int(11) NOT NULL,
            `inf` int(11) NOT NULL,
            `currency` varchar(11) NOT NULL,
            `country` varchar(255) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	    ');
    }

    public function down()
    {
        $this->dropTable('offers');
    }

}
