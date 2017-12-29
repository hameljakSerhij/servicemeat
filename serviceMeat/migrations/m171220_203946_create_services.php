<?php

use yii\db\Migration;

/**
 * Class m171220_203946_create_services
 *
 * @author Hameljak Serhij <hameljak.serhij@gmail.com>
 */
class m171220_203946_create_services extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute('
	      CREATE TABLE `services` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `beg` int(11) NOT NULL,
            `end` int(11) NOT NULL,
            `type` int(11) NOT NULL,
            `name` varchar(255) NOT NULL,
            `cnt` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	    ');
    }

    public function down()
    {
        $this->dropTable('services');
    }

}
