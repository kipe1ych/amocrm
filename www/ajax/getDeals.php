<?
error_reporting(E_ALL ^ E_DEPRECATED);
require_once($_SERVER["DOCUMENT_ROOT"] . '/intr-sdk-test/autoload.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/classes/Client.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/classes/Service.php');

$dateFrom = isset($_GET['date_from']) ? (int)$_GET['date_from'] : strtotime('-1 month');
$dateTo = isset($_GET['date_to']) ? (int)$_GET['date_to'] : time();
$type = isset($_GET['type']) ? $_GET['type'] : '';

$service = new Service();
switch($type) {
    case 'booking':
        $data = $service->getBookingsByDate();
        break;
    default:
        $data = $service->listData($dateFrom, $dateTo);
}

echo json_encode($data);
exit;