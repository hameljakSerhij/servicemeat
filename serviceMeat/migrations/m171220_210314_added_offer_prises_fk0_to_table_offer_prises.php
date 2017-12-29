<?php

use yii\db\Migration;

/**
 * Class m171220_210314_added_offer_prises_fk0_to_table_offer_prises
 *
 * @author Hameljak Serhij <hameljak.serhij@gmail.com>
 */
class m171220_210314_added_offer_prises_fk0_to_table_offer_prises extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->execute("
	       ALTER TABLE `offer_prises` ADD CONSTRAINT `offer_prises_fk0` FOREIGN KEY (`offer_id`) REFERENCES `offers`(`id`);
	    ");
    }

    public function safeDown()
    {
        $this->dropForeignKey('offer_prises_fk0','offer_prises');
    }
}
