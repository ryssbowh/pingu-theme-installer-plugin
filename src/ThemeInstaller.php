<?php 

namespace ThemeInstaller;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class ThemeInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        preg_match('/^pingu\/([a-z]+)-theme$/', $package->getPrettyName(), $matches);
        if (sizeof($matches) != 2) {
            throw new \InvalidArgumentException(
                'Unable to install theme, pingu theme must have the following name : pingu/{name}-theme'
            );
        }

        return 'public/themes/'.ucfirst($matches[1]);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'pingu-theme' === $packageType;
    }
}