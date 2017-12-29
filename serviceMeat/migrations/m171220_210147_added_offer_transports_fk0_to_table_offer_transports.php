<?php

use yii\db\Migration;

/**
 * Class m171220_210147_added_offer_transports_fk0_to_table_offer_transports
 *
 * @author Hameljak Serhij <hameljak.serhij@gmail.com>
 */
class m171220_210147_added_offer_transports_fk0_to_table_offer_transports extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->execute("
	       ALTER TABLE `offer_transports` ADD CONSTRAINT `offer_transports_fk0` FOREIGN KEY (`offer_id`) REFERENCES `offers`(`id`);
	    ");
    }

    public function safeDown()
    {
        $this->dropForeignKey('offer_transports_fk0','offer_transports');
    }
}
