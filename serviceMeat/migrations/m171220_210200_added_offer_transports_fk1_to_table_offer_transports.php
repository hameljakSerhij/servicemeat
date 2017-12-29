<?php

use yii\db\Migration;

/**
 * Class m171220_210200_added_offer_transports_fk1_to_table_offer_transports
 *
 * @author Hameljak Serhij <hameljak.serhij@gmail.com>
 */
class m171220_210200_added_offer_transports_fk1_to_table_offer_transports extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->execute("
	       ALTER TABLE `offer_transports` ADD CONSTRAINT `offer_transports_fk1` FOREIGN KEY (`transport_id`) REFERENCES `transports`(`id`);
	    ");
    }

    public function safeDown()
    {
        $this->dropForeignKey('offer_transports_fk1','offer_transports');
    }
}
