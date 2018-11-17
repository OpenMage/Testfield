#!/usr/bin/env bash
git clone https://github.com/OpenMage/magento-lts.git magento
./vendor/bin/n98-magerun install --noDownload \
    --dbHost="localhost" --dbUser="travis" \
    --dbPass="" --dbName="magentodb" --installSampleData=yes \
    --useDefaultConfigParams=yes \
    --magentoVersionByName="magento-mirror-1.9.3.10" \
    --installationFolder="magento" --baseUrl="http://magento.localdomain/"

php -t magento/ -S 127.0.0.5:8080 php-dev-router.php&

