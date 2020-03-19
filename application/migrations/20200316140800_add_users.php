<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Users extends CI_Migration {

    //Function to create the database
    public function up() {

        //Create a table with 4 columns
        $this->dbforge->add_field(array (
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => TRUE
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => FALSE
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null'=> FALSE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null'=> TRUE
            ),
        ));
    
        //Add a primary key to the table
        $this->dbforge->add_key('user_id', TRUE);

        //Create a table called Users
        $this->dbforge->create_table('users');

        //Create a table with 4 columns
        $this->dbforge->add_field(array (
            'review_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => TRUE
            ),
            'FK_review_username' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => FALSE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null'=> FALSE
            ),
            'review_text' => array(
                'type' => 'VARCHAR',
                'constraint' => '1000',
                'null'=> FALSE
            ),
            'image' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null'=> FALSE
            ),
        ));
    
        //Add a primary key to the table
        $this->dbforge->add_key('review_id', TRUE);

        //Create a table called Users
        $this->dbforge->create_table('reviews');

        //Create a table with 4 columns
        $this->dbforge->add_field(array (
            'comment_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => TRUE
            ),
            'FK_comment_review' => array(
                'type' => 'INT',
                'constraint' => 5,
                'null' => FALSE
            ),
            'FK_comment_username' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => FALSE
            ),
            'comment_text' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null'=> FALSE
            ),
        ));
    
        //Add a primary key to the table
        $this->dbforge->add_key('comment_id', TRUE);

        //Create a table called Users
        $this->dbforge->create_table('comments');
    }

    //Function to remove all tables in the database
    public function down() {

        //Remove the table called Users
        $this->dbforge->drop_table('users');

        $this->dbforge->drop_table('reviews');

        $this->dbforge->drop_table('comments');
    }
}