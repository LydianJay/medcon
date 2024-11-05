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
        $this->data['module_name']      = 'usermodules';

        $this->data['usermodules']      = [
            'appointments' => [
                'name'      => 'Appointments',
                'icon'      => 'bi-calendar3',
                'site'      => 'appointments'
            ],

            'dental'        => [
                'name'      => 'Dental Page',
                'icon'      => 'bi-prescription',
                'site'      => 'dental'
            ],

            'clinic'        => [
                'name'      => 'Clinic Services',
                'icon'      => 'bi-lungs-fill',
                'site'      => 'clinic'
            ],

            'announcement'  => [
                'name'      => 'Announcements',
                'icon'      => 'bi-paperclip',
                'site'      => 'announcements'
            ],

            'account'  => [
                'name'      => 'My Account',
                'icon'      => 'bi-person-fill-gear',
                'site'      => 'account'
            ],

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

            'registrar'     => [
                'name'      => 'Registration Request',
                'icon'      => 'bi-person-lines-fill',
                'site'      => 'admin/registrar'
            ],

            'users'         => [
                'name'      => 'View User Info',
                'icon'      => 'bi-clipboard-pulse',
                'site'      => 'admin/users'
            ],

            'dental'        => [
                'name'      => 'Dental Page',
                'icon'      => 'bi-prescription',
                'site'      => 'admin/dental'
            ],

            'clinic'        => [
                'name'      => 'Clinic Services',
                'icon'      => 'bi-lungs-fill',
                'site'      => 'admin/clinic'
            ],

            'announcement'  => [
                'name'      => 'General Announcements',
                'icon'      => 'bi-paperclip',
                'site'      => 'admin/announcements'
            ],

            
        ];


        $this->data['doctormodules']     = [
               
            'users'         => [
                'name'      => 'View User Info',
                'icon'      => 'bi-clipboard-pulse',
                'site'      => 'admin/users'
            ],

            'clinic'        => [
                'name'      => 'Clinic Services',
                'icon'      => 'bi-lungs-fill',
                'site'      => 'admin/clinic'
            ],

            'announcement'  => [
                'name'      => 'General Announcements',
                'icon'      => 'bi-paperclip',
                'site'      => 'admin/announcements'
            ],


        ];

        $this->data['dentistmodules']     = [

            'dental'        => [
                'name'      => 'Dental Page',
                'icon'      => 'bi-prescription',
                'site'      => 'admin/dental'
            ],


        ];
    }


    public function sendSMS($phone, $msg)
    {
        $server_ip = getenv('GSM_SERVER');
        $server_port = 80;

        $data  = [
            'number' => $phone,
            'msg' => $msg,
        ];
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if (!$socket) {
            die("Socket creation failed: " . socket_strerror(socket_last_error()));
        }
        $result = socket_connect($socket, $server_ip, $server_port);
        if (!$result) {
            die("Socket connection failed: " . socket_strerror(socket_last_error($socket)));
        }
        $jsonified = json_encode($data);
        socket_write($socket, $jsonified, strlen($jsonified));
        socket_close($socket);
    }

    public function getTable($tableName)
    {
        $this->db = \Config\Database::connect();
        return $this->db->table($tableName);
    }

    public function auth($subname) 
    {
        $userLevel = session()->get('level');
        if ($userLevel == null) {
            session()->setFlashdata('error_auth', 'Invalid Session. Please Log In!');
            return redirect()->to(site_url(''));
        } else if ($userLevel < 3) {
            session()->setFlashdata('error_auth', 'Unauthorized Access');
            return redirect()->to(site_url(''));
        }
        $this->data['current_module']    = $this->data[$this->data['module_name']][$subname];
    }
}
