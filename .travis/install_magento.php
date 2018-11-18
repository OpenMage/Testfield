<?php

passthru('git clone --depth 1 https://github.com/OpenMage/magento-lts.git magento');

passthru('./vendor/bin/n98-magerun install --noDownload \
    --dbHost="localhost" --dbUser="travis" \
    --dbPass="" --dbName="magentodb" --installSampleData=yes \
    --useDefaultConfigParams=yes \
    --magentoVersionByName="magento-mirror-1.9.3.10" \
    --installationFolder="magento" --baseUrl="http://127.0.0.5:8080/"
');

$composerJson = <<<JSON
{
    "require":{
        "magento-hackathon/magento-composer-installer": "*",
        "avstudnitz/fast-simple-import":"*"
    },
    "extra":{
        "magento-root-dir": "./"
    }
}
JSON;

chdir(__DIR__ . '/../magento');

file_put_contents('composer.json', $composerJson);
passthru('composer install');

//passthru('composer install magento-hackathon/magento-composer-installer');
//passthru('composer install avstudnitz/fast-simple-import');


chdir(__DIR__ . '/../');

