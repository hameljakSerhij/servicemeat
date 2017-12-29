<?php

use yii\db\Migration;

/**
 * Class m171220_204106_create_offer_services
 *
 * @author Hameljak Serhij <hameljak.serhij@gmail.com>
 */
class m171220_204106_create_offer_services extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute('
	      CREATE TABLE `offer_services` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `offer_id` int(11) NOT NULL,
            `service_id` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	    ');
    }

    public function down()
    {
        $this->dropTable('offer_services');
    }
}
