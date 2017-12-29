<?php

use yii\db\Migration;

/**
 * Class m171220_210115_added_offer_hotels_fk1_to_table_offer_hotels
 *
 * @author Hameljak Serhij <hameljak.serhij@gmail.com>
 */
class m171220_210115_added_offer_hotels_fk1_to_table_offer_hotels extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->execute("
	       ALTER TABLE `offer_hotels` ADD CONSTRAINT `offer_hotels_fk1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels`(`id`);
	    ");
    }

    public function safeDown()
    {
        $this->dropForeignKey('offer_hotels_fk1','offer_hotels');
    }
}
