<?php



require_once __DIR__.'/../magento/app/Mage.php';
umask(0);
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
ini_set('display_errors', 1);

$data = array();
$data[] = array(
    '_root' => 'Default Category',
    '_category' => 'Test2',
    'description' => 'Test2',
    'is_active' => 'yes',
    'include_in_menu' => 'yes',
    'meta_description' => 'Meta Test',
    'available_sort_by' => 'position',
    'default_sort_by' => 'position',
);
$data[] = array(
    '_root' => 'Default Category',
    '_category' => 'Test2/Test3',
    'description' => 'Test3',
    'is_active' => 'yes',
    'include_in_menu' => 'yes',
    'meta_description' => 'Meta Test',
    'available_sort_by' => 'position',
    'default_sort_by' => 'position',
);
$data[] = array(
    '_root' => 'Default Category',
    '_category' => 'Test2/Test4 \/ WithSlash',
    'description' => 'When specifying a category path for a category with a slash (/) in the name, escape the slash with a backslash (Test \/ WithSlash).',
    'is_active' => 'yes',
    'include_in_menu' => 'yes',
    'meta_description' => 'Meta Test',
    'available_sort_by' => 'position',
    'default_sort_by' => 'position',
);
$data[] = array(
    '_store' => 'default',
    'name' => 'Storeview name',
    'description' => 'Never specify a name in admin store level, the name is extracted out of the _category path'
);

$time = microtime(true);
/** @var $import AvS_FastSimpleImport_Model_Import */
$import = Mage::getModel('fastsimpleimport/import');
try {
    $import->processCategoryImport($data);
} catch (Exception $e) {
    print_r($import->getErrorMessages());
}
echo 'Elapsed time: ' . round(microtime(true) - $time, 2) . 's' . "\n";

