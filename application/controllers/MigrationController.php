<?php

class MigrationController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index($key = null, $ver = null)
    {
        $result = false;

        switch ($key) {
            case 'lat':
                $result = $this->migration->latest();
                break;
            case 'cur':
                $result = $this->migration->current();
                break;
            case 'up':
                $result = $this->migration->version($ver);
                break;
            default:
                $result = $this->migration->latest();
                break;
        }

        if ($result === false) {
            show_error($this->migration->error_string());    
        } else {
            echo "Version $result";
        }
    }
}