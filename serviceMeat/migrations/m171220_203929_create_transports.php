<?php

use yii\db\Migration;

/**
 * Class m171220_203929_create_transports
 *
 * @author Hameljak Serhij <hameljak.serhij@gmail.com>
 */
class m171220_203929_create_transports extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute('
	      CREATE TABLE `transports` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `beg` int(11) NOT NULL,
            `end` int(11) NOT NULL,
            `type` int(11) NOT NULL,
            `name` varchar(255) NOT NULL,
            `trc` int(11) NOT NULL,
            `class` varchar(255) NOT NULL,
            `place` varchar(255) NOT NULL,
            `townfr` varchar(255) NOT NULL,
            `townto` varchar(255) NOT NULL,
            `cnt` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	    ');
    }

    public function down()
    {
        $this->dropTable('transports');
    }

}
