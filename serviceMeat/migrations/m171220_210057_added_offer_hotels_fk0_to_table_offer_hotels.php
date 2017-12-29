<?php

use yii\db\Migration;

/**
 * Class m171220_210057_added_offer_hotels_fk0_to_table_offer_hotels
 *
 * @author Hameljak Serhij <hameljak.serhij@gmail.com>
 */
class m171220_210057_added_offer_hotels_fk0_to_table_offer_hotels extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->execute("
	       ALTER TABLE `offer_hotels` ADD CONSTRAINT `offer_hotels_fk0` FOREIGN KEY (`offer_id`) REFERENCES `offers`(`id`);
	    ");
    }

    public function safeDown()
    {
        $this->dropForeignKey('offer_hotels_fk0','offer_hotels');
    }
}
