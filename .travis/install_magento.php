<?php

passthru('git clone --depth 1 '.getenv('MAGENTO_REPOSITORY').' -b '.getenv('MAGENTO_REPOSITORY_BRANCH').' openmage');

passthru('./vendor/bin/n98-magerun install --noDownload \
    --dbHost="localhost" --dbUser="travis" \
    --dbPass="" --dbName="magentodb" --installSampleData=yes \
    --useDefaultConfigParams=yes \
    --magentoVersionByName="magento-mirror-1.9.3.10" \
    --installationFolder="openmage" --baseUrl="http://127.0.0.5:8080/"
');

$composerJson = <<<JSON
{
    "require":{
        "magento-hackathon/magento-composer-installer": "*",
        "avstudnitz/fast-simple-import":"*"
    },
    "extra":{
        "magento-deploystrategy": "copy",
        "magento-root-dir": "./"
    }
}
JSON;

chdir(__DIR__ . '/../openmage');

file_put_contents('composer.json', $composerJson);
passthru('composer install');

//passthru('composer install magento-hackathon/magento-composer-installer');
//passthru('composer install avstudnitz/fast-simple-import');


chdir(__DIR__ . '/../');

