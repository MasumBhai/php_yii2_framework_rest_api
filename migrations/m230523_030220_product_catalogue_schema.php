<?php

use yii\db\Migration;

/**
 * Class m230523_030220_product_catalogue_schema
 */
class m230523_030220_product_catalogue_schema extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'user_id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
            'access_token' => $this->string()->defaultValue(null),
        ], $tableOptions);

        $this->createTable('{{%product}}', [
            'product_id' => $this->primaryKey(),

            'product_name' => $this->string( 256)->notNull(),
            'product_price' => $this->decimal(10, 2)->notNull(),
            'product_description' => $this->text(),
        ], $tableOptions);

        $this->createTable('{{%cart}}', [
            'cart_id' => $this->primaryKey(),

            'user_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%cart_item}}', [
            'cart_item_id' => $this->primaryKey(),

            'cart_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'product_quantity' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ], $tableOptions);

        $this->addForeignKey('fk_cart_customer', '{{%cart}}', 'user_id',
            '{{%user}}', 'user_id',
            'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_cart_item_cart', '{{%cart_item}}', 'cart_id',
            '{{%cart}}', 'cart_id',
            'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_cart_item_product', '{{%cart_item}}', 'product_id',
            '{{%product}}', 'product_id',
            'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // But first need to drop foreign key constraints
        $this->dropForeignKey('fk_cart_item_product', '{{%cart_item}}');
        $this->dropForeignKey('fk_cart_item_cart', '{{%cart_item}}');
        $this->dropForeignKey('fk_cart_customer', '{{%cart}}');

        // After that, dropping tables in reverse order
        $this->dropTable('{{%cart_item}}');
        $this->dropTable('{{%cart}}');
        $this->dropTable('{{%product}}');
        $this->dropTable('{{%user}}');
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230523_030220_product_catalogue_schema cannot be reverted.\n";

        return false;
    }
    */
}
