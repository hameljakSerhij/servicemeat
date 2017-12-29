<?php

use yii\db\Migration;

/**
 * Class m171220_111139_create_hotels
 *
 * @author Hameljak Serhij <hameljak.serhij@gmail.com>
 */
class m171220_111139_create_hotels extends Migration
{

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute('
	      CREATE TABLE `hotels` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `beg` int(11) NOT NULL,
            `end` int(11) NOT NULL,
            `name` varchar(255) NOT NULL,
            `htc` int(11) NOT NULL,
            `star` varchar(11) NOT NULL,
            `room` varchar(11) NOT NULL,
            `rmc` int(11) NOT NULL,
            `place` varchar(11) NOT NULL,
            `plc` int(11) NOT NULL,
            `meal` varchar(11) NOT NULL,
            `mlc` int(11) NOT NULL,
            `town` varchar(255) NOT NULL,
            `cnt` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	    ');
    }

    public function down()
    {
        $this->dropTable('hotels');
    }

}
