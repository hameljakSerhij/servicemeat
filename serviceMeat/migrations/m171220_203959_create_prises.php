<?php

use yii\db\Migration;

/**
 * Class m171220_203959_create_prises
 *
 * @author Hameljak Serhij <hameljak.serhij@gmail.com>
 */
class m171220_203959_create_prises extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->execute('
	      CREATE TABLE `prises` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `idn` int(21) NOT NULL UNIQUE,
            `date` TIMESTAMP NOT NULL,
            `n` int(11) NOT NULL,
            `val` int(11) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	    ');
    }

    public function down()
    {
        $this->dropTable('prises');
    }

}
