<?php

function getUniqueCode($length = "")
{
    $code = md5(uniqid(rand(), true));
    if ($length != "") return substr($code, 0, $length);
    else return $code;
}

require_once __DIR__.'/../openmage/app/Mage.php';
umask(0);
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
ini_set('display_errors', 1);
/*
// Delete Products
$data = array();
for ($i = 1; $i <= 10; $i++) {
    $data[] = array(
        'sku' => $i,
    );
}
$time = microtime(true);
Mage::getModel('fastsimpleimport/import')
    ->setPartialIndexing(true)
    ->setBehavior(Mage_ImportExport_Model_Import::BEHAVIOR_DELETE)
    ->processProductImport($data);
echo 'Elapsed time: ' . round(microtime(true) - $time, 2) . 's' . "\n";
*/
// Create/Update products
$data = array();
$numberOfProducts = getenv('MAGENTO_GENERATED_PRODUCTS');
if (!$numberOfProducts) {
    $numberOfProducts = 1000;
}
for ($i = 1; $i <= $numberOfProducts; $i++) {
    $randomString = getUniqueCode(20);
    $data[] = array(
        'sku' => 'imported-'.$i,
        '_type' => 'simple',
        '_attribute_set' => 'Default',
        '_product_websites' => 'base',
        '_category' => 3,
        'name' => $randomString,
        'price' => 0.99,
        'special_price' => 0.90,
        'cost' => 0.50,
        'description' => 'Default',
        'short_description' => 'Default',
        'meta_title' => 'Default',
        'meta_description' => 'Default',
        'meta_keyword' => 'Default',
        'weight' => 11,
        'status' => 1,
        'visibility' => 4,
        'tax_class_id' => 2,
        'qty' => 0,
        'is_in_stock' => 0,
        'enable_googlecheckout' => '1',
        'gift_message_available' => '0',
        'url_key' => strtolower($randomString),
    );
}
$time = microtime(true);
try {
    /** @var $import AvS_FastSimpleImport_Model_Import */
    $import = Mage::getModel('fastsimpleimport/import');
    $import->processProductImport($data);
} catch (Exception $e) {
    print_r($import->getErrorMessages());
}
echo 'Elapsed time: ' . round(microtime(true) - $time, 2) . 's' . "\n";


// following code taken and modified from a comment at http://php.net/manual/en/function.memory-get-peak-usage.php

$getNiceFileSize = function($bytes, $binaryPrefix=true) {
    if ($binaryPrefix) {
        $unit=array('B','KiB','MiB','GiB','TiB','PiB');
        if ($bytes==0) return '0 ' . $unit[0];
        return round($bytes/pow(1024,($i=floor(log($bytes,1024)))),2) .' '. (isset($unit[$i]) ? $unit[$i] : 'B');
    } else {
        $unit=array('B','KB','MB','GB','TB','PB');
        if ($bytes==0) return '0 ' . $unit[0];
        return round($bytes/pow(1000,($i=floor(log($bytes,1000)))),2) .' '. (isset($unit[$i]) ? $unit[$i] : 'B');
    }
};

echo sprintf("Memory usage: %s / %s \n",
    $getNiceFileSize(memory_get_usage()),
    $getNiceFileSize(memory_get_peak_usage())
);
echo sprintf("real Memory usage: %s / %s \n",
    $getNiceFileSize(memory_get_usage(true)),
    $getNiceFileSize(memory_get_peak_usage(true))
);
