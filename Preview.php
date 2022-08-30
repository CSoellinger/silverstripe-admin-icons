<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Csoellinger\Silverstripe\AdminIcons\AdminIcon;
use Csoellinger\Silverstripe\AdminIcons\AdminIconUnicode;

?>

<html>
    <head>
        <title>SilverStripe Font Icon Preview</title>
        <link rel="stylesheet" href="/vendor/silverstripe/admin/client/dist/styles/bundle.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php
                    $refl = new ReflectionClass(AdminIcon::class);
                    $constants = $refl->getConstants();

                    $refl = new ReflectionClass(AdminIconUnicode::class);
                    $constantsUnicode = $refl->getConstants();

                    foreach($constants as $key => $value) {
                ?>
                <div class="col-2 py-3">
                    <div class="text-center"><i class="font-icon-<?php echo $value; ?>" style="font-size: 3rem;"></i></div>

                    <div class="text-center small"><?php echo $key; ?></div>
                    <input type="text" class="form-control form-control-sm" readonly="readonly" onClick="this.select();" value="font-icon-<?php echo $value; ?>" />
                    <input type="text" class="form-control form-control-sm" readonly="readonly" onClick="this.select();" value="<?php echo $constantsUnicode[$key]; ?>" />
                </div>
                <?php
                    }
                ?>
    </body>
</html>
