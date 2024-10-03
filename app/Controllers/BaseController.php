<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;
    protected $mail;
    protected $session;
    protected $db;
    protected $data;
    protected $current_module;
    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->session      = \Config\Services::session();
        $this->db           = \Config\Database::connect();

        $this->mail         = new PHPMailer(true);
        $this->data['web_owner']        = 'NEMSU Students';
        $this->data['title']            = 'MEDCON';

        $this->data['usermodules']      = [
            'appointments' => [
                'name'      => 'Appointments',
                'status'    => 0,
                'icon'      => 'bi-calendar3',
                'site'      => 'appointments'
            ],

            'dental'        => [
                'name'      => 'Dental Services',
                'status'    => 0,
                'icon'      => 'bi-calendar3',
                'site'      => 'appointments'
            ]

        ];

        $this->data['adminmodules']     = [
            'appointments'  => [
                'name'      => 'Manage Appointments',
                'status'    => 1,
                'icon'      => 'bi-calendar3',
                'site'      => 'admin/appointments'
            ],
            'inventory'     => [
                'name'      => 'Manage Inventory',
                'status'    => 0,
                'icon'      => 'bi-prescription2',
                'site'      => 'admin/inventory'
            ],
        ];
    }

    public function initData()
    {
        $this->data['usermodules']      = [
            'appointments' => [
                'name'      => 'Appointments',
                'icon'      => 'bi-calendar3',
                'site'      => 'appointments'
            ],

            'dental'        => [
                'name'      => 'Dental Services',
                'icon'      => 'bi-calendar3',
                'site'      => 'appointments'
            ]

        ];

        $this->data['adminmodules']     = [
            'appointments'  => [
                'name'      => 'Manage Appointments',
                'icon'      => 'bi-calendar3',
                'site'      => 'admin/appointments'
            ],
            'inventory'     => [
                'name'      => 'Manage Inventory',
                'icon'      => 'bi-prescription2',
                'site'      => 'admin/inventory'
            ],
        ];
    }

    public function getTable($tableName)
    {
        $this->db = \Config\Database::connect();
        return $this->db->table($tableName);
    }
}
