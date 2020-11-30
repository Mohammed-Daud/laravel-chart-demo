<?php
namespace App\Services;

class CSVExport {
    protected $data;
    
    public function __construct($columns) {
        $this->data = '"' . implode('","', $columns) . '"' . "\n";
    }
    
    public function addRow($row) {
        $this->data .= '"' . implode('","', $row) . '"' . "\n";
    }
    
    public function export($filename) {
        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '.csv"');
        echo $this->data;
        die();
    }
    public function __toString() {
        return $this->data;
    }
}
	
