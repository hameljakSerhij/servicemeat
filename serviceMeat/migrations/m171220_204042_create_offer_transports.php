<?php

use yii\db\Migration;

/**
 * Class m171220_204042_create_offer_transports
 *
 * @author Hameljak Serhij <hameljak.serhij@gmail.com>
 */
class m171220_204042_create_offer_transports extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute('
	      CREATE TABLE `offer_transports` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `offer_id` int(11) NOT NULL,
            `transport_id` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	    ');
    }

    public function down()
    {
        $this->dropTable('offer_transports');
    }
}
