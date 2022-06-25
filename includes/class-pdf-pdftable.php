<?php 
    class PDFTable{

        protected $table;

        public function __construct($table_name,$sql)
        {
            global $wpdb;
            $this->table = $wpdb->prefix.'wppdf'.$table_name;
            $this->maybe_create_entry_tables($sql);
        }

        public function maybe_create_entry_tables($sql){
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            $sql = "CREATE TABLE " . $this->table . $sql;
            \dbDelta($sql);
        }

        
    }