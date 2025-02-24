<?php

use yii\db\Migration;

class m250224_060053_create_records_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('records', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('records');
    }
}
