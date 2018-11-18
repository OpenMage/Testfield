<?php

passthru('git clone --depth 1 https://github.com/OpenMage/magento-lts.git magento');

passthru('./vendor/bin/n98-magerun install --noDownload \
    --dbHost="localhost" --dbUser="travis" \
    --dbPass="" --dbName="magentodb" --installSampleData=yes \
    --useDefaultConfigParams=yes \
    --magentoVersionByName="magento-mirror-1.9.3.10" \
    --installationFolder="magento" --baseUrl="http://magento.localdomain/"
');


