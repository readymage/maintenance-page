<?php
/**
 * Maintenance Page
 *
 * @copyright Scandiweb, Inc. All rights reserved.
 */

declare(strict_types=1);

namespace ReadyMage\MaintenancePage\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Filesystem\Driver\File;

class InstallData implements InstallDataInterface
{
    protected $file;

    public function __construct(
        File $file
    ) {
        $this->file = $file;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $source = __DIR__ . '/../503.phtml';
        $destination = BP . '/pub/errors/default/503.phtml';

        if ($this->file->isExists($source)) {
            $this->file->copy($source, $destination);
        }
    }
}