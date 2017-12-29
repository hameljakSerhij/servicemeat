<?php

use yii\db\Migration;

/**
 * Class m171220_210240_added_offer_services_fk0_to_table_offer_services
 *
 * @author Hameljak Serhij <hameljak.serhij@gmail.com>
 */
class m171220_210240_added_offer_services_fk0_to_table_offer_services extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->execute("
	       ALTER TABLE `offer_services` ADD CONSTRAINT `offer_services_fk0` FOREIGN KEY (`offer_id`) REFERENCES `offers`(`id`);
	    ");
    }

    public function safeDown()
    {
        $this->dropForeignKey('offer_services_fk0','offer_services');
    }
}
