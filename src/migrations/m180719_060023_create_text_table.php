<?php

use yii\db\Migration;

/**
 * Handles the creation of table `text`.
 */
class m180719_060023_create_text_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $tableOptions = null;
	    if ($this->db->driverName === 'mysql') {
		    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
	    }

    	$this->createTable('text', [
            'id' => $this->primaryKey()->comment('Id'),
            'title' => $this->string(255)->notNull()->comment('Title'),
            'slug' => $this->string(255)->notNull()->comment('Slug'),
            'text' => ($this->db->driverName === 'mysql') ? 'LONGTEXT' : $this->text()->comment('Slug'),
            'cr_user' => $this->integer(11)->comment('Creation user'),
            'cr_date' => $this->timestamp()->comment('Creation user'),
            'mod_user' => $this->integer(11)->comment('Modification user'),
            'mod_date' => $this->timestamp()->comment('Modification time'),
            'status' => $this->integer(4)->comment('Status'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('text');
    }
}
