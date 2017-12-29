<?php

use yii\db\Migration;

/**
 * Class m171220_210249_added_offer_services_fk1_to_table_offer_services
 *
 * @author Hameljak Serhij <hameljak.serhij@gmail.com>
 */
class m171220_210249_added_offer_services_fk1_to_table_offer_services extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->execute("
	       ALTER TABLE `offer_services` ADD CONSTRAINT `offer_services_fk1` FOREIGN KEY (`service_id`) REFERENCES `services`(`id`);
	    ");
    }

    public function safeDown()
    {
        $this->dropForeignKey('offer_services_fk1','offer_services');
    }
}
